<?php

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

    public function insertTag($tag){
        $insertTag = "INSERT INTO TAG( NOME) VALUES ( '%s'); SELECT LAST_INSERT_ID()";
        $query = sprintf($insertTag,$tag->getNome());
        $keyTag = mysqli_query(Connector::getConnector(), $query);
        return $keyTag;
    }

    public function insertTagsByAppunti($keyAppunti,$listTags){
        for($i=0;$i<count($listTags);$i++) {
            $tag = $listTags[$i];

            if($this->thereAre($tag->getNome())){
                $tagExists = $this->getTag($tag->getNome());
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

            if($this->thereAre($tag->getNome())){
                $tagExists = $this->getTag($tag->getNome());
            }else{
                $tagExists = $this->insertTag($tag);
            }
            $insertSql = "INSERT INTO TAGPERANNUNCIO (KEYTAG , KEYANNUNCIO) VALUES ('%s' ,'%s'); ";
            $query = sprintf($insertSql,$tagExists->getKeyTag(),$keyAnnuncio);
            mysqli_query(Connector::getConnector(), $query);
        }
    }

    public function thereAre($nameTag){
        $selectSql = "SELECT COUNT(*) FROM TAG WHERE NOME = '%s'";
        $query = sprintf($selectSql,$nameTag);
        $count = mysqli_query(Connector::getConnector(), $query);

        if($count==1){
            return true;
        }elseif($count==0){
            return false;
        }

    }

    public function getTag($nameTag){
        $selectSql = "SELECT * FROM TAG WHERE NOME = '%s'";
        $query = sprintf($selectSql,$nameTag);
        $result = mysqli_query(Connector::getConnector(), $query);
        if ($result) {
            while ($obj = $result->fetch_assoc()) {
                $tag = new Tag($obj['KEYTAG'], $obj['NOME']);
            }
            return $tag;
        }
        return NULL;
    }

    public function searchByTag($nameTag){
        $GET_TAG_REFERENCES_OBJECTS = "SELECT * FROM annuncio,tag,appunti WHERE annuncio.id = tag.id_annuncio 
                                        AND appunti.id = tag.id_appunti LIKE '%s'";
        $query = sprintf($GET_TAG_REFERENCES_OBJECTS,$nameTag);
        $result = array();//query
        return $result;

    }
}