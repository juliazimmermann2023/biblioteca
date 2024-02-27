<?php
class DB{
    static function getInstance() {
        return new PDO("mysql:host=localhost;database=projeto_db","root","");
    }
} DB:: getInstance();