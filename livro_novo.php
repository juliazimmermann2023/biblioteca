<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Livro</title>
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
    <?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>LIVRO > NOVO</h2>
            <a href="livro_listagem.php" class="btn btn-warning">VOLTAR</a>
            <div class="row-mt-4">
                <div class="col-mt-5">
                    <form action="livro_novo_post.php" method="POST">
                        <div class="mt-3">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="ano" class="form-label">Ano</label>
                            <input type="text" name="ano" id="ano" class="form-control">
                        </div> 
                        <div class="mt-3">
                            <label for="genero" class="form-label">Gênero</label>
                            <input type="text" name="genero" id="genero" class="form-control">
                        </div> 
                        <div class="mt-3">
                            <label for="isbn" class="form-label">Isbn</label>
                            <input type="text" name="isbn" id="isbn" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="autor" class="form-label">Autor</label>
                            <select name="autor" id="autor" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                <?php
                                    foreach(AutorRepository::listAll() as $autor){
                                ?>
                                <option selected value="<?php echo $autor->getId();?>">
                                        <?php echo $autor->getNome() ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div> 
                        <div class="md-3">
                        <button type="submit" class="btn btn-info">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>