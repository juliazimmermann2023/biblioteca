<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['titulo'])){
    header("Location: livro_listagem.php?112");
    exit();
}
if($_POST["titulo" ] == ""|| $_POST["titulo"] == NULL){
    header("Location: livro_listagem.php13");
    exit();
}
if(!isset($_POST['ano'])){
    header("Location: livro_listagem.php?114");
    exit();
}
if($_POST["ano" ] == ""|| $_POST["ano"] == NULL){
    header("Location: livro_listagem.php15");
    exit();
}
if(!isset($_POST['genero'])){
    header("Location: livro_listagem.php?17");
    exit();
}
if($_POST["genero" ] == ""|| $_POST["genero"] == NULL){
    header("Location: livro_listagem.php?87");
    exit();
}
if(!isset($_POST['isbn'])){
    header("Location: livro_listagem.php?1134");
    exit();
}
if($_POST["isbn" ] == ""|| $_POST["isbn"] == NULL){
    header("Location: livro_listagem.php?321");
    exit();
}
if(!isset($_POST['autor'])){
    header("Location: livro_listagem.php?31231");
    exit();
}
if($_POST["autor" ] == ""|| $_POST["autor"] == NULL){
    header("Location: livro_listagem.php?3131");
    exit();
}
$livro = Factory::livro(); 

$livro->setTitulo($_POST['titulo']);
$livro->setAno($_POST['ano']);
$livro->setGenero($_POST['genero']);
$livro->setIsbn($_POST['isbn']);
$livro->setAutorId($_POST['autor']);
$livro->setinclusaoFuncionarioId($user->getID());
$livro->setDataInclusao(date('Y-d-m H:i:s'));

$livro_retorno = LivroRepository::insert($livro);

date_default_timezone_set('America/Sao_Paulo');
if($livro_retorno > 0){
    header("Location: livro_editar.php?id=".$livro_retorno);
    exit();
}



header("Location: livro_listagem.php?3");
    exit();

    ?>