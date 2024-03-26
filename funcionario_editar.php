<?php
include_once("include/factory.php");
if (!Auth::isAuthenticated()) {
    header('Location: login.php');
    exit();
}
if(!isset($_GET['id'])){
    header("location: funcionario_listagem.php?1");
    exit();
}
if($_GET["id"] == "" || $_GET["id"] == NULL){
    header("location: funcionario_listagem.php?2");
    exit();
}
$funcionario = FuncionarioRepository::get($_GET["id"]);
if(!$funcionario){
    header("location: funcionario_listagem.php?3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVO CLIENTE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    .autor {
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
    <?php include("include/menu.php"); ?>
    <div class="container">
    <h1>EDITAR FUNCIONARIO</h1>
        <a type="button" class="btn btn-warning" href="funcionario_listagem.php">VOLTAR</a>
        <a type="button" class="btn btn-warning" href="funcionario_novo.php">NOVO</a>
        <div class="row mt-4">
            <div class="col-md-12">
                <form action="funcionario_editar_post.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" name="id" value="<?php echo $funcionario->getNome()?>">

                        <label for="nome" class="form-label">Telefone</label>
                        <input type="text" name="telefone" id="nome" class="form-control" name="id" value="<?php echo $funcionario->getTelefone()?>">
                        
                        <label for="nome" class="form-label">Cpf</label>
                        <input type="text" name="cpf" id="nome" class="form-control" name="id" value="<?php echo $funcionario->getCpf()?>">

                        <label for="nome" class="form-label">Email</label>
                        <input type="text" name="email" id="nome" class="form-control" name="id" value="<?php echo $funcionario->getEmail()?>">

                       
                    
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php echo $funcionario->getId()?>">
                        <button type="submit" class="btn btn-info">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
