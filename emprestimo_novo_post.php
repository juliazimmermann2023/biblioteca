<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_POST["cliente_id"])){
    header("location: emprestimo_novo.php?1");

    exit();
}

if( $_POST["cliente_id"] == "" || $_POST ["cliente_id"] == null){
    header("location: emprestimo_novo.php?2");
    
    exit();
}

if (!isset($_POST["livro_id"])){
    header("location: emprestimo_novo.php?3");

    exit();
}

if( $_POST["livro_id"] == "" || $_POST ["livro_id"] == null){
    header("location: emprestimo_novo.php?4");
    
    exit();
}


date_default_timezone_set('America/Sao_Paulo');
$emprestimo = Factory::emprestimo();

$emprestimo->setLivroId($_POST["livro_id"]);
$emprestimo->setClienteId($_POST["cliente_id"]);
// $emprestimo->setDataVencimento($_POST["data_vencimento"]);
$emprestimo->setInclusaoFuncionarioId($user->getId());
$emprestimo->setDataInclusao(date("Y-m-d h:i:s"));

$emprestimo_retorno = EmprestimoRepository::insert($emprestimo);

if($emprestimo_retorno > 0){
    header("location: emprestimo_listagem.php?id=". $emprestimo_retorno);
    exit();
}

header("location: emprestimo_novo.php?7");

?>