<?php

class Connector
{

    public static function getConnector() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'flyers';
        return new mysqli($host, $user, $pass, $db);
    }

}