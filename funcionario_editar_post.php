<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

date_default_timezone_set('America/Sao_Paulo');
$user = Auth::getUser();

if (!isset($_POST["id"])) {
    header("location: funcionario_listagem.php");
    exit();
}

if ($_POST["id"] == "" || $_POST["id"] == null) {
    header("location: funcionario_listagem.php");
    exit();
}

$funcionario = FuncionarioRepository::get($_POST["id"]);

if (!$funcionario) {
    header("location: funcionario_listagem.php");
    exit();
}


if (!isset($_POST["nome"])){
    header("location: funcionario_editar.php?id=".$funcionario->getId());

    exit();
}

if( $_POST["nome"] == "" || $_POST ["nome"] == null){
    header("location: funcionario_editar.php");
    
    exit();
}


$funcionario->setNome($_POST["nome"]);
$funcionario->setCpf($_POST["cpf"]);
$funcionario->setTelefone($_POST["telefone"]);
$funcionario->setSenha($_POST["senha"]);
$funcionario->setEmail($_POST["email"]);
$funcionario->setAlteracaoFuncionarioId($user->getId());
$funcionario->setDataAlteracao(date("Y-m-d H:i:s")); 

FuncionarioRepository::update($funcionario);

header("location: funcionario_editar.php?id".$funcionario->getId());

?>