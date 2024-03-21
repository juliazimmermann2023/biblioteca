<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}
if(!isset($_GET["id"])){
    header("location:autor_listagem.php");
    exit();
}
if($_GET["id"]==""|| $_GET["id"]==null){
    header("location:autor_listagem.php");
    exit();
}
$autor = AutorRepository::get($_GET["id"]);
if(!$autor){
    header("location:autor_listagem.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVO AUTOR</title>
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

    .julia {
        display: flex;
        align-items: center;

        margin: 30px 0px;
        padding-right: 100px;
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

    <?php include('include/menu.php'); ?>




    <div class="container">
        <div class="autor">
            <h2>AUTOR > EDITAR</h2>
        </div>
        <div class="julia">
            <a id="julia" href="autor_listagem.php" class="btn btn-info">voltar</a>
            <a href="#" class="btn btn-info">Editar</a>
        </div>
        <form action="autor_editar_post.php" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name = "nome" id="nome" value="<?php echo $autor->getNome();?>"> 
               
                
            </div>
            <input type="hidden"name="id" value="<?php echo $autor->getId()?>">
        
            <button type="submit" id="julia" class="btn btn-info">Adicionar</button>
        </form>

</body>

</html>