<?php
include_once("include/factory.php");
if (!Auth::isAuthenticated()) {
    header('Location: login.php');
    exit();
}

date_default_timezone_set('America/Sao_Paulo');
$user = Auth::getUser();
if (!isset($_POST["id"])) {
    header("location:autor_listagem.php");
    exit();
}
if ($_POST["id"] == "" || $_POST["id"] == null) {
    header("location:autor_listagem.php");
    exit();
}

$autor = AutorRepository::get($_POST["id"]);

if (!$autor) {
    header("location:autor_listagem.php");
    exit();
}
if (!isset($_POST["nome"])) {
    header("location:autor_editar.php?e=1&id=".$autor->getId());
    exit();
}
if ($_POST["nome"] == "" || $_POST["nome"] == NULL) {
    header("location: autor_editar.php?e=2&id=".$autor->getId());
    exit();
}

$autor->setNome($_POST["nome"]);
$autor->setAlteracaoFuncionarioId($user->getId());
$autor->setDataAlteracao(date("Y-m-d H:i:s"));
AutorRepository::update($autor);

header("location: autor_editar.php?ok=1&id=".$autor->getId());
