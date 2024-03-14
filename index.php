<?php
include_once('include/factory.php');

if(!Auth::isAuthenticated()){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Página Inicial</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <a href="logout.php">Sair</a>
        <h1>Bem-vindo à Biblioteca Virtual</h1>
    </header>
    <nav>
        <ul>
            <li><a href="funcionario.html">Funcionários</a></li>
            <li><a href="cliente.html">Clientes</a></li>
            <li><a href="livro.html">Livros</a></li>
            <li><a href="emprestimo.html">Empréstimos</a></li>
        </ul>
</nav>

    

</body>
</html>
