<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}


$user = Auth::getUser();

if(!isset($_POST["nome"])){
    header("location: cliente_novo.php?1");
    exit();
}
if($_POST["nome"] == "" || $_POST["nome"] == null){
    header("location: cliente_novo.php?2");
    exit();
}

$cliente = Factory::cliente();

$cliente->setNome($_POST["nome"]);
$cliente->setTelefone($_POST["telefone"]);
$cliente->setEmail($_POST["email"]);
$cliente->setCpf($_POST["cpf"]);
$cliente->setRg($_POST["rg"]);
$cliente->setDataNascimento($_POST["data_nascimento"]);
$cliente->setInclusaoFuncionarioId($user->getId());
$cliente->setDataInclusao(date("Y-m-d H:i:s"));

$cliente_retorno = ClienteRepository::insert($cliente);

if ($cliente_retorno > 0){
    header("location: cliente.editar.php?id=".$cliente_retorno);
    exit();
}

header("location: cliente_novo.php?3");
?>