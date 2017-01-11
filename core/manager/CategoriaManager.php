<?php
include_once '../model/Categoria.php';
include_once '../control/Connector.php';


class CategoriaManager {

    private $db;

    public function __construct() {
        $this->db = new Connector();
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM CATEGORIA";

        $res = mysqli_query($this->db->getConnector(), $sql);
        $categorie = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $categoria = new Categoria($obj['KEYCATEGORIA'], $obj['NOME']);
                $categorie[] = $categoria;
            }
        }
        return $categorie;
    }

    public function getCategoriesFromName($nome) {
        $sql = "SELECT * FROM `CATEGORIA` WHERE NOME = '%s' ";
        $query = sprintf($sql, $nome);
        $res = mysqli_query($this->db->getConnector(), $query);
        $categorie = array();
        if ($res) {
            while ($obj = $res->fetch_assoc()) {
                $categoria = new Categoria($obj['KEYCATEGORIA'], $obj['NOME']);
                $categorie[] = $categoria;
            }
        }
        return $categorie;
    }

}






?>
