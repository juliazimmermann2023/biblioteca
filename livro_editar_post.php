<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location:livro_listagem.php?1");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == NULL){
    header("location: livro_listagem.php?2");
    exit();
}
$livro = LivroRepository::get($_POST["id"]);
if(!$livro){
    header("location: livro_listagem.php?3");
    exit();
}

if(!isset($_POST['nome'])){
    header("Location: livro_novo.php?id=".$livro->getId());
    exit();
}
if($_POST["nome" ] == "" || $_POST["nome" == null]){
    header("Location: livro_novo.php?id=".$livro->getId());
    exit();
}



$livro->setTitulo($_POST['titulo']);
$livro->setAno($_POST['ano']);
$livro->setGenero($_POST['genero']);
$livro->setAutorId($_POST['autor_id']);
$livro->setIsbn($_POST['isbn']);
$livro->setAlteracaoFuncionarioId($user->getID());
$livro->setDataAlteracao(date('Y-d-m H:i:s'));

LivroRepository::update($livro);


header("location:livro_editar.php?id=".$livro->getId());
 