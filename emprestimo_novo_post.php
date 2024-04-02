<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['data_vencimento'])){
    header("Location: emprestimo_novo.php");
    
    exit();
}
if($_POST["data_vencimento" ] == '' || $_POST["data_vencimento" ] == null){
    header("Location: emprestimo_novo.php");
    exit();
}

$emprestimo = Factory::emprestimo();

$emprestimo->setLivroId($_POST['livro_id']);
$emprestimo->setClienteId($_POST['cliente_id']);
$emprestimo->setDataVencimento($_POST['data_vencimento']);
$emprestimo->setInclusaoFuncionarioId($user->getID());
$emprestimo->setDataInclusao(date('Y-d-m h:i:s'));

$emprestimo_retorno = EmprestimoRepository::insert($emprestimo);

if($emprestimo_retorno > 0){
    header("Location: emprestimo_listagem.php");
    exit();
}

header("Location: emprestimo_novo.php");
 exit();