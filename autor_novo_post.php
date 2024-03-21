<?php
include_once("include/factory.php");
if (!Auth::isAuthenticated()) {
    header('Location: login.php');
    exit();
}

$user = Auth::getUser();
if (!isset ($_POST["nome"])) {
    header("location: autor_novo.php");
    exit();
}
if ($_POST["nome"] == "" || $_POST["nome"] == NULL) {
    header("location: autor_novo.php");
    exit();
}
$autor = Factory::autor();
$autor->setNome($_POST["nome"]);
$autor->setInclusaoFuncionarioId($user->getId());
$autor->setDataInclusao(date("y-m-d H:i:s"));
$autor_retorno = AutorRepository::insert($autor);

if ($autor_retorno > 0) {
    header("location: autor_editar.php?id=".$autor_retorno);
    exit();
}
header("location: autor_novo.php");
