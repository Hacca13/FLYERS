<?php

class Connector
{

    public static function getConnector() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'Flyers';
        return new mysqli($host, $user, $pass, $db);
    }

}