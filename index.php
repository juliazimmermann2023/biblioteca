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
 
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color:pink;
    padding: 20px;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    text align: center;
    color: #333;
    background-color: pink;
    padding: 10px 20px;
    border-radius: 10px;
}

nav ul li a:hover {
    background-color: #ddd;
}

</style>
<body>
    <header>
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
