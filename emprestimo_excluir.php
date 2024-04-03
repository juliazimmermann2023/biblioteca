<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_GET['id'])) {
    header("location: emprestimo_listagem.php?1");
    exit();
}
if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: emprestimo_listagem.php?2");
    exit();
}
$empres = EmprestimoRepository::get($_GET["id"]);
if (!$empres) {
    header("location: emprestimo_listagem.php?3");
    exit();
}

if(EmprestimoRepository::countByDataDevolucao($_GET["id"]) > 0){
    header("location: emprestimo_listagem.php?4");
    exit(); 
}
if(EmprestimoRepository::countByDataRenovacao($_GET["id"]) > 0){
    header("location: emprestimo_listagem.php?6");
    exit(); 
}
if(EmprestimoRepository::countByDataAlteracao($_GET["id"]) > 0){
    header("location: emprestimo_listagem.php?5");
    exit(); 
}

EmprestimoRepository::delete($empres->getId());

header("Location: emprestimo_listagem.php?7");
