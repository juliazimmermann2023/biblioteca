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
    <title> LIVRO > LISTAGEM</title>
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

<?php include('include/menu.php'); ?>


    <div class="container">
        <div class="julia">
        <h2>LIVROS > LISTAGEM</h2>
        <div class="botao">
            <a id="julia" href="livro_novo.php"  class="btn btn-info">Adicionar um novo livro</a>
        </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Ano de lançamento</th>
                        <th>Gênero</th>
                        <th>Isbn</th>
                        <th>Ações</th>




                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (LivroRepository::listAll() as $livro) {
                    ?>
                        <tr>
                            <td><?php echo $livro->getId(); ?></td>
                            <td><?php echo $livro->getTitulo(); ?></td>
                            <td><?php echo $livro->getAno(); ?></td>
                            <td><?php echo $livro->getGenero(); ?></td>
                            <td><?php echo $livro->getIsbn(); ?></td>


                            <td>
                                <a href="livro_editar.php?id=<?php echo $livro->getId();?>"  class="btn btn-info">Editar</a>
                                <?php if(EmprestimoRepository::countByLivro($livro->getId()) == 0) { ?>
                                <a href="livro_excluir.php?id=<?php echo $livro->getId(); ?>" class="btn btn-danger">Excluir</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>