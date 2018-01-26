<?php

class database{

    private $host ;
    private $user ;
    private $pass ;
    private $database;
    private $linkdb;

    public function __construct(){
        $this->host="localhost";
        $this->user="root";
        $this->pass="";
        $this->database="hwcompany";
        $this->connect();
    }

    public function dbConLink(){
        return $this->linkdb;
    }

    private function connect() {
        try{
            $this->linkdb = new mysqli($this->host, $this->user,$this->pass, $this->database);      
        }catch(Exception $e){
            throw $e;
        }
    }
}