<?php
include_once("include/factory.php");
if (!Auth::isAuthenticated()) {
    header('Location: login.php');
    exit();
}

$user = Auth::getUser();
if (!isset($_POST["id"])) {
    header("location:cliente_listagem.php?1");
    exit();
}
if ($_POST["id"] == "" || $_POST["id"] == null) {
    header("location:cliente_listagem.php?2");
    exit();
}
$cliente = ClienteRepository::get($_POST["id"]);

if (!$cliente) {
    header("location:cliente_listagem.php?3");
    exit();
}
if (!isset($_POST["nome"])) {
    header("location:cliente_editar.php?id=".$cliente->getId());
    exit();
}
if ($_POST["nome"] == "" || $_POST["nome"] == NULL) {
    header("location: cliente_editar.php?id=".$cliente->getId());
    exit();
}
$cliente->setNome($_POST["nome"]);
$cliente->setTelefone($_POST["telefone"]);
$cliente->setEmail($_POST["email"]);
$cliente->setCpf($_POST["cpf"]);
$cliente->setRg($_POST["rg"]);
$cliente->setDataNascimento($_POST["data_nascimento"]);
$cliente->setAlteracaoFuncionarioId($user->getId());
$cliente->setDataAlteracao(date("Y-m-d H:i:s"));
ClienteRepository::update($cliente);

header("location: cliente_editar.php?id=".$cliente->getId());
