<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    class DB {
        public $host;
        public $user;
        public $password;
        public $dbname;
        public $conn;

        
        public function __construct($host = 'localhost', $user = 'root', $password = '', $dbname = 'vio') {
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
            $this->dbname = $dbname;
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname) or die("Failed to connect to MySQLi" . $this->conn->connect_error);
        }

        public function sanitize($field) {
            return $this->conn->real_escape_string(htmlentities(trim($field)));
        }

        // public function addSolarRecord() {
        //     // check for signature 
        //     // if 
            
        // }
        
        
        
    }
