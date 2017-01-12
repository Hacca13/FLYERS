<?php

class Connector
{

    public function getConnector() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'Flyers';
        return mysqli_connect($host, $user, $pass, $db);
    }

}