<?php
include_once BEANS_DIR . "Tag.php";
include_once BEANS_DIR . "Annuncio.php";
include_once BEANS_DIR . "Appunti.php";
/**
 * Created by PhpStorm.
 * User: Paolo
 * Date: 12/01/2017
 * Time: 09:43
 */
class TagManager
{
    public function __construct()
    {

    }

    private function lastInsertKey(){
        $lastInsert = "SELECT MAX(KEYTAG) FROM TAG";
        $result_query = mysqli_query(Connector::getConnector(),$lastInsert);
        if($result_query){
            while($r = $result_query->fetch_assoc()){
                $keyTag = $r["MAX(KEYTAG)"];
                return $keyTag;
            }
        }
    }

    private function insertTag($tag){
        $insertTag = "INSERT INTO TAG(NOME) VALUES ('%s');";
        $query = sprintf($insertTag,$tag);
        mysqli_query(Connector::getConnector(), $query);
        $keyTag = $this->lastInsertKey();
        return $keyTag;
    }

    public function insertTagsByAppunti($keyAppunti,$listTags){

        for($i=0;$i<count($listTags);$i++) {
            $nameTagSelected = $listTags[$i];

            if($this->checkExist($nameTagSelected)){

                $tagExists = $this->getTagByName($nameTagSelected);
                $insertSql = "INSERT INTO TAGPERAPPUNTI (KEYTAG , KEYAPPUNTI) VALUES ('%s' ,'%s'); ";
                $query = sprintf($insertSql,$tagExists->getKeyTag(),$keyAppunti);
                mysqli_query(Connector::getConnector(), $query);

            }else{

                $keyTag = $this->insertTag($nameTagSelected);
                $insertSql = "INSERT INTO TAGPERAPPUNTI (KEYTAG , KEYAPPUNTI) VALUES ('%s' ,'%s'); ";
                $query = sprintf($insertSql,$keyTag,$keyAppunti);
                mysqli_query(Connector::getConnector(), $query);

            }

        }
    }

    public function insertTagsByAnnuncio($keyAnnuncio,$listTags){

        for($i=0;$i<count($listTags);$i++) {
            $nameTagSelected = $listTags[$i];

            if($this->checkExist($nameTagSelected)){

                $tagExists = $this->getTagByName($nameTagSelected);
                $insertSql = "INSERT INTO TAGPERANNUNCIO (KEYTAG , KEYANNUNCIO) VALUES ('%s' ,'%s'); ";
                $query = sprintf($insertSql,$tagExists->getKeyTag(),$keyAnnuncio);
                mysqli_query(Connector::getConnector(), $query);

            }else{

                $keyTag = $this->insertTag($nameTagSelected);
                $insertSql = "INSERT INTO TAGPERANNUNCIO (KEYTAG , KEYANNUNCIO) VALUES ('%s' ,'%s'); ";
                $query = sprintf($insertSql,$keyTag,$keyAnnuncio);
                mysqli_query(Connector::getConnector(), $query);

            }

        }
    }

    public function checkExist($nameTag){
        $selectSql = "SELECT * FROM TAG WHERE NOME = '%s'";
        $query = sprintf($selectSql,$nameTag);
        $result = mysqli_query(Connector::getConnector(), $query);

        if($result->num_rows>0 ){

            return true;

        }else{

            return false;
        }


    }

    public function getTagByName($nameTag){
        $selectSql = "SELECT * FROM TAG WHERE NOME = '%s'";
        $query = sprintf($selectSql,$nameTag);
        $result = mysqli_query(Connector::getConnector(), $query);
        if ($result) {
            while ($obj = $result->fetch_assoc()) {
                $tag = new Tag($obj['KEYTAG'], $obj['NOME']);
                return $tag;
            }

        }
        return null;
    }

    public function getTagByKey($keyTag){
        $selectSql = "SELECT * FROM TAG WHERE KEYTAG = '%s'";
        $query = sprintf($selectSql,$keyTag);
        $result = mysqli_query(Connector::getConnector(), $query);
        if ($result) {
            while ($obj = $result->fetch_assoc()) {
                $tag = new Tag($obj['KEYTAG'], $obj['NOME']);
                return $tag;
            }

        }
        return null;
    }

    public function getTagByAnnuncio($keyAnnuncio){
        $selectSql = "SELECT * FROM TAG,TAGPERANNUNCIO,ANNUNCIO WHERE TAGPERANNUNCIO.KEYANNUNCIO ='%s' 
                      AND TAGPERANNUNCIO.KEYANNUNCIO = ANNUNCIO.KEYANNUNCIO
                      AND TAGPERANNUNCIO.KEYTAG = TAG.KEYTAG";
        $query = sprintf($selectSql,$keyAnnuncio);
        $result = mysqli_query(Connector::getConnector(), $query);
        $listTags = array();
        if ($result) {
            while ($obj = $result->fetch_assoc()) {
                $tag = new Tag($obj['KEYTAG'], $obj['NOME']);
                array_push($listTags,$tag);
            }
        }
        return $listTags;
    }
    public function getTagByAppunti($keyAppunti){
        $selectSql = "SELECT * FROM TAG,TAGPERAPPUNTI,APPUNTI WHERE TAGPERAPPUNTI.KEYAPPUNTI ='%s' 
                      AND TAGPERAPPUNTI.KEYAPPUNTI = APPUNTI.KEYAPPUNTI
                      AND TAGPERAPPUNTI.KEYTAG = TAG.KEYTAG";
        $query = sprintf($selectSql,$keyAppunti);
        $result = mysqli_query(Connector::getConnector(), $query);
        $listTags = array();
        if ($result) {
            while ($obj = $result->fetch_assoc()) {
                $tag = new Tag($obj['KEYTAG'], $obj['NOME']);
                array_push($listTags,$tag);
            }
        }
        return $listTags;
    }


    public function searchAppuntiByTag($nameTag){
        $GET_TAG_REFERENCES_OBJECTS = "SELECT APPUNTI FROM TAG,TAGPERAPPUNTI,APPUNTI 
                                        WHERE TAG.NOME = '%s' AND 
                                        TAG.KEYTAG = TAPERAPPUNTI.KEYTAG 
                                        AND APPUNTI.KEYAPPUNTI = TAGPERAPPUNTI.KEYAPPUNTI";
        $query = sprintf($GET_TAG_REFERENCES_OBJECTS,$nameTag);
        $result = mysqli_query(Connector::getConnector(),$query);
        $listAppunti = array();
        if($result){
            while ($obj = $result->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAppunti($obj['KEYAPPUNTI']);
                $appunti = new Appunti($obj['KEYAPPUNTI'],$obj['NOME'],$obj['CATEGORIA'],$obj['DESCRIZIONE'],$obj['RAITING'],$obj['PATH'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAppunti,$appunti);
            }
        }
        return $listAppunti;
    }


    public function searchAnnunciByTag($nameTag){
        $GET_TAG_REFERENCES_OBJECTS = "SELECT ANNUNCIO FROM TAG,TAGPERANNUNCIO,ANNUNCIO
                                        WHERE TAG.NOME = '%s' AND 
                                        TAG.KEYTAG = TAGPERANNUNCIO.KEYTAG 
                                        AND ANNUNCIO.KEYANNUNCIO = TAGPERANNUNCIO.KEYANNUNCIO";
        $query = sprintf($GET_TAG_REFERENCES_OBJECTS,$nameTag);
        $result = mysqli_query(Connector::getConnector(),$query);
        $listAnnunci = array();
        if($result){
            while ($obj = $result->fetch_assoc()) {
                $listTag = $this->tagManager->getTagByAnnuncio($obj['KEYANNUNCIO']);
                $annuncio = new Annuncio($obj['KEYANNUNCIO'],$obj['TITOLO'],$obj['DESCRIZIONE'],$obj['CONTATTO'],$obj['DATADICARICAMENTO'],$obj['KEYUTENTE'],$listTag);
                array_push($listAnnunci,$annuncio);
            }
        }
        return $listAnnunci;
    }
}