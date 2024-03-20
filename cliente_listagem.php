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

    #julia {

        align-items: center;
        justify-content: space-between;
    }
</style>

<body>

    <header>
        <a href="logout.php">Sair</a>
        <h1>Bem-vindo à Biblioteca Virtual</h1>
    </header>

    <nav>
        <ul>
            <li><a href="autor_listagem.php">Autor</a></li>
            <li><a href="funcionario_listagem.php">Funcionários</a></li>
            <li><a href="cliente_listagem.php">Clientes</a></li>
            <li><a href="livro_listagem.php">Livros</a></li>
            <li><a href="">Empréstimos</a></li>
        </ul>
    </nav>



    <div class="container">
        <h2>CLIENTES</h2>
        <a id="julia" class="btn btn-info">Adicionar um novo cliente</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Cpf</th>
                        <th>Rg</th>
                        <th>Data Nascimento</th>




                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (ClienteRepository::listAll() as $cliente) {
                    ?>
                        <tr>
                            <td><?php echo $cliente->getId(); ?></td>
                            <td><?php echo $cliente->getNome(); ?></td>
                            <td><?php echo $cliente->getTelefone(); ?></td>
                            <td><?php echo $cliente->getEmail(); ?></td>
                            <td><?php echo $cliente->getCpf(); ?></td>
                            <td><?php echo $cliente->getRg(); ?></td>
                            <td><?php echo $cliente->getDataNascimento(); ?></td>


                            <td>
                                <a href="#" class="btn btn-info">Editar</a>
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