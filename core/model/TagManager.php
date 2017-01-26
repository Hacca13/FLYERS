<?php
include_once BEANS_DIR . "Tag.php";
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

    private function insertTag($tag){
        $insertTag = "INSERT INTO TAG(NOME) VALUES ('%s'); SELECT LAST_INSERT_ID()";
        $query = sprintf($insertTag,$tag);
        $keyTag = mysqli_query(Connector::getConnector(), $query);
        return $keyTag;
    }

    public function insertTagsByAppunti($keyAppunti,$listTags){
        for($i=0;$i<count($listTags);$i++) {
            $tag = $listTags[$i];

            if($this->thereAre($tag->getNome())){
                $tagExists = $this->getTagByName($tag->getNome());
            }else{
                $tagExists = $this->insertTag($tag);
            }
            $insertSql = "INSERT INTO TAGPERAPPUNTI (KEYTAG , KEYAPPUNTI) VALUES ('%s' ,'%s'); ";
            $query = sprintf($insertSql,$tagExists->getKeyTag(),$keyAppunti);
            mysqli_query(Connector::getConnector(), $query);
        }
    }

    public function insertTagsByAnnuncio($keyAnnuncio,$listTags){
        for($i=0;$i<count($listTags);$i++) {
            $tag = $listTags[$i];

            if($this->checkExist($tag)){
                $tagExists = $this->getTagByName($tag);
                $insertSql = "INSERT INTO TAGPERANNUNCIO (KEYTAG , KEYANNUNCIO) VALUES ('%s' ,'%s'); ";
                $query = sprintf($insertSql,$tagExists->getKeyTag(),$keyAnnuncio);
                mysqli_query(Connector::getConnector(), $query);
            }else{
                $keyTag = $this->insertTag($tag);
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

        if($result->num_rows >0 ){

            return true;

        }else{

            return false;
        }


    }

    public function getTagByName($nameTag){
        $selectSql = "SELECT * FROM TAG WHERE NOME='%s'";
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
        $selectSql = "SELECT * FROM TAG WHERE KEYTAG ='%s'";
        $query = sprintf($selectSql,$keyTag);
        $result = mysqli_query(Connector::getConnector(), $query);
        if ($result) {
            while ($obj = $result->fetch_assoc()) {
                $tag = new Tag($obj['KEYTAG'], $obj['NOME']);
                return $tag;
            }

        }
        return NULL;
    }

    public function getTagByAnnuncio($keyAnnuncio){
        $selectSql = "SELECT * FROM TAGPERANNUNCIO WHERE KEYANNUNCIO ='%s'";
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
        $selectSql = "SELECT * FROM TAGPERAPPUNTI WHERE KEYAAPPUNTI ='%s'";
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


/*
    public function searchByTag($nameTag){
        $GET_TAG_REFERENCES_OBJECTS = "SELECT * FROM annuncio,tag,appunti WHERE annuncio.id = tag.id_annuncio 
                                        AND appunti.id = tag.id_appunti LIKE '%s'";
        $query = sprintf($GET_TAG_REFERENCES_OBJECTS,$nameTag);
        $result = array();//query
        return $result;

    }*/
}