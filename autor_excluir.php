<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: autor_listagem.php");
    exit();
}
if($_GET['id'] == '' || $_GET['id'] == null){
    header("Location: autor_listagem.php");
    exit();
}

$autor = AutorRepository::get($_GET['id']);

if (!$autor){
    header("Location: autor_listagem.php");
    exit();
}
if(LivroRepository::countByAutor($autor->getId()) > 0)
    header("location: autor_listagem.php");
    exit();

AutorRepository::delete($autor->getId());

header("location: autor_listagem.php");

?>