<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_POST["id"])) {
    header("location: funcionario_listagem.php");
    exit();
}

date_default_timezone_set('America/Sao_Paulo');
if ($_POST["id"] == "" || $_POST["id"] == null) {
    header("location: funcionario_listagem.php?2");
    exit();
}

$funcionario = FuncionarioRepository::get($_POST["id"]);

if (!$funcionario) {
    header("location: funcionario_listagem.php?3");
    exit();
}


if (!isset($_POST["senha"])){
    header("location: funcionario_editar.php?id=".$funcionario->getId());

    exit();
}

if( $_POST["repSenha"] !=  $_POST ["repSenha"]){
    header("location: funcionario_senha.php?id=".$funcionario->getId());
    
    exit();
}

$funcionario->setSenha($_POST["senha"]);
$funcionario->setAlteracaoFuncionarioId($user->getId());
$funcionario->setDataAlteracao(date("Y-m-d H:i:s")); 

FuncionarioRepository::update($funcionario);

header("location: funcionario_listagem.php?id=".$funcionario->getId());

?>