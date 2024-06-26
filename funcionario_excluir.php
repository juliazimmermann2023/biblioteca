<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_GET['id'])) {
    header("location: funcionario_listagem.php");
    exit();
}
if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: funcionario_listagem.php");
    exit();
}
$funcio = FuncionarioRepository::get($_GET["id"]);
if (!$funcio) {
    header("location: funcionario_listagem.php");
    exit();
}

if (EmprestimoRepository::countByInclusaoFuncionario($funcio->getId()) > 0) {
    header("location:  funcionario_listagem.php");
    exit();
}
if (EmprestimoRepository::countByAlteracaoFuncionario($funcio->getId()) > 0) {
    header("location: funcionario_listagem.php");
    exit();
}
if (EmprestimoRepository::countByDevolucaoFuncionario($funcio->getId()) > 0) {
    header("location: funcionario_listagem.php");
    exit();
}
if (EmprestimoRepository::countByRenovacaoFuncionario($funcio->getId()) > 0) {
    header("location: funcionario_listagem.php");
    exit();
}
if (ClienteRepository::countByInclusaoFuncionario($funcio->getId()) > 0) {
    header("location: funcionario_listagem.php");
    exit();
}
if (ClienteRepository::countByAlteracaoFuncionario($funcio->getId()) > 0) {
    header("location: funcionario_listagem.php");
    exit();
}
if (AutorRepository::countByInclusaoFuncionario($funcio->getId()) > 0) {
    header("location: funcionario_listagem.php");
    exit();
}
if (AutorRepository::countByAlteracaoFuncionario($funcio->getId()) > 0) {
    header("location: funcionario_listagem.php");
    exit();
}
if (LivroRepository::countByInclusaoFuncionario($funcio->getId()) > 0) {
    header("location: funcionario_listagem.php");
    exit();
}
if (LivroRepository::countByAlteracaoFuncionario($funcio->getId()) > 0) {
    header("location: ffuncionario_listagem.php");
    exit();
}


FuncionarioRepository::delete($funcio->getId());

header("Location: funcionario_listagem.php");
