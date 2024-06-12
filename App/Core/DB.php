<?php

require_once ("../App/Environment/env.php");

class DB {
    private static $instance = null;
    private $HOST = HOST;
    private $PASS = PASS;
    private $USER = USER;
    private $DB_NAME = DB_NAME;

    private function __construct() {
        $this->conn = new PDO("mysql:host=" . $this->HOST . ";dbname=" . $this->DB_NAME . ";", $this->USER, $this->PASS);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DB;
        }

        return self::$instance;
    }
}