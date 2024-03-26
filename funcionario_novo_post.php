<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['nome'])){
    header("Location: funcionario_novo.php");
    exit();
}
if($_POST["nome" == ""] || $_POST["nome" == null]){
    header("Location: funcionario_novo.php");
    exit();
}

$funcionario = Factory::funcionario();

$funcionario->setNome($_POST['nome']);
$funcionario->setCpf($_POST['cpf']);
$funcionario->setTelefone($_POST['telefone']);
$funcionario->setSenha($_POST['senha']);
$funcionario->setEmail($_POST['email']);
$funcionario->setInclusaoFuncionarioId($user->getID());
$funcionario->setDataInclusao(date('Y-d-m H:i:s'));

$funcionario_retorno = FuncionarioRepository::insert($funcionario);

if($funcionario_retorno > 0){
    header("Location: funcionario_editar.php?id=".$funcionario_retorno);
    exit();
}

header("Location: funcionario_novo.php");
 exit();