<?php
include_once("include/factory.php");
if (!Auth::isAuthenticated()) {
    header('Location: login.php');
    exit();
}
if (!isset($_GET['id'])) {
    header("location: livro_listagem.php?1");
    exit();
}
if ($_GET["id"] == "" || $_GET["id"] == NULL) {
    header("location: livro_listagem.php?2");
    exit();
}
$livro = LivroRepository::get($_GET["id"]);
if (!$livro) {
    header("location: livro_listagem.php?3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/menu.css">
    <title>NOVO LIVRO</title>
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
        justify-content: space-between;
        margin: 20px 0px;
        padding-right: 100px;
    }
    .container{
        max-width: 70vw;
    }
</style>

<body>
    <?php include("include/menu.php"); ?>
    <div class="container">

        <h1>EDITAR LIVRO</h1>
        <a type="button" class="btn btn-warning" href="livro_listagem.php">VOLTAR</a>
        <a type="button" class="btn btn-warning" href="livro_novo.php">NOVO</a>
        <div class="row mt-4">
            <div class="col-md-12">
                <form action="livro_editar_post.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Titulo</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo $livro->getTitulo() ?>">

                        <label for="nome" class="form-label">Ano de lançamento</label>
                        <input type="text" name="ano" id="nome" class="form-control" value="<?php echo $livro->getAno() ?>">

                        <label for="nome" class="form-label">Gênero</label>
                        <input type="text" name="genero" id="genero" class="form-control" value="<?php echo $livro->getGenero() ?>">

                        <br>

                        <label for="autor" class="form-label">id autor</label>
                        <select name="autor_id" id="autor_id" class="form-select form-select-lg mb-3" aria-label="Large select example">
                            <?php $autor = AutorRepository::listAll() ?>
                            <?php
                            foreach (AutorRepository::listAll() as $autor) {
                            ?>
                                <option value="<?php echo $autor->getId(); ?>" <?php if ($livro->getAutorId() == $autor->getId()) {echo 'selected';} ?>>
                                    <?php echo $autor->getNome() ?>
                                </option>
                            <?php } ?>
                        </select>

                        <br>

                        <label for="nome" class="form-label">Isbn</label>
                        <input type="text" name="isbn" id="isbn" class="form-control" value="<?php echo $livro->getIsbn() ?>">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php echo $livro->getId() ?>">
                        <button type="submit" class="btn btn-info">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</livro