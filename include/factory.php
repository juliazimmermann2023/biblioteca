<?php
include_once("db.php");
include_once("class/autor.php");
include_once("class/cliente.php");
include_once("class/emprestimo.php");
include_once("class/funcionario.php");
include_once("class/livro.php");
class Factory{
    public static function  db(){
        return DB:: getInstance();
    }
    public static function funcionario(){
        return new Funcionario();
    }
    public static function livro(){
        return new Livro();
    }
    public static function emprestimo(){
        return new Emprestimo();
    }
    public static function cliente(){
        return new Cliente();
    }
    public static function autor(){
        return new Autor();
    }
}  
?>
