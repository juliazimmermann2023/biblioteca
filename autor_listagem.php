<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

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
        <h2>AUTORES > LISTAGEM</h2>
        <a id="julia" href="autor_novo.php" class="btn btn-info">Adicionar um novo autor</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (AutorRepository::listAll() as $autor) {
                    ?>
                        <tr>
                            <td><?php echo $autor->getId(); ?></td>
                            <td><?php echo $autor->getNome(); ?></td>
                            <td>
                                <a href="autor_editar.php?id=<?php echo $autor->getId();?>" class="btn btn-info">Editar</a>
                                <a href="#" class="btn btn-danger">Deletar</a>
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