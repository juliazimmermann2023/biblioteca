<?php
include_once("include/factory.php");
if (!Auth::isAuthenticated()) {
    header('Location: login.php');
    exit();
}
if(!isset($_GET['id'])){
    header("location: cliente_listagem.php?1");
    exit();
}
if($_GET["id"] == "" || $_GET["id"] == NULL){
    header("location: cliente_listagem.php?2");
    exit();
}
$cliente = ClienteRepository::get($_GET["id"]);
if(!$cliente){
    header("location: cliente_listagem.php?3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTE < EDITAR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/menu.css">
</head>
<style>
    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: pink;
        padding: 20px;
    }

    header h1 {
        text-align: center;
    }

    header a {
        text-align: start;
        color: white;
        text-decoration: none;
        font-size: 1.2em;
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
        text-align: center;
        color: #333;
        background-color: pink;
        padding: 10px 20px;
        border-radius: 10px;
    }

    nav ul li a:hover {
        background-color: #ddd;
    }

    ul {
        text-decoration: none;
        text-align: center;
        color: #333;
        background-color: pink;
        padding: 10px 20px;
        border-radius: 10px;

    }

 

    .container {
        max-width: 70vw;
    }

    .cliente {
        display: flex;
        align-items: center;

        margin: 30px 0px;
        padding-right: 100px;
    }

    .container {
        max-width: 70vw;
    }
</style>

<body>

    <?php include('include/menu.php'); ?>

  
    <div class="container">

        <h1>EDITAR CLIENTE</h1>
        <a type="button" class="btn btn-warning" href="cliente_listagem.php">VOLTAR</a>
        <a type="button" class="btn btn-warning" href="cliente_novo.php">NOVO</a>
        <div class="row mt-4">
            <div class="col-md-12">
                <form action="cliente_editar_post.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" name="nome" value="<?php echo $cliente->getNome()?>">

                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" name="telefone" value="<?php echo $cliente->getTelefone()?>">

                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="nome" class="form-control" name="email" value="<?php echo $cliente->getEmail()?>">

                        <label for="cpf" class="form-label">Cpf</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" name="cpf" value="<?php echo $cliente->getCpf()?>">
                        
                        <label for="rg" class="form-label">Rg</label>
                        <input type="text" name="rg" id="rg" class="form-control" name="rg" value="<?php echo $cliente->getRg()?>">

                        <label for="data_nascimento" class="form-label">Data de nascimento</label>
                        <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" name="data_nascimento" value="<?php echo $cliente->getDataNascimento()?>">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php echo $cliente->getId()?>">
                        <button type="submit" class="btn btn-info">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>