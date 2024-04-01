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
    <title>NOVO FUNCIONÁRIO</title>
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
            <li><a href="emprestimo_listagem.php">Empréstimos</a></li>
        </ul>
    </nav>




    <div class="container">
        <div class="julia">
        <h2>FUNCIONÁRIOS > LISTAGEM</h2>
        <a id="julia" href="funcionario_novo.php" class="btn btn-info">Adicionar um novo funcionário</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Cpf</th>




                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (FuncionarioRepository::listAll() as $funcionario) {
                    ?>
                        <tr>
                            <td><?php echo $funcionario->getId(); ?></td>
                            <td><?php echo $funcionario->getNome(); ?></td>
                            <td><?php echo $funcionario->getTelefone(); ?></td>
                            <td><?php echo $funcionario->getEmail(); ?></td>
                            <td><?php echo $funcionario->getCpf(); ?></td>


                            <td>
                                <a href="funcionario_editar.php?id=<?php echo $funcionario->getId();?>"  class="btn btn-info">Editar</a>
                                <?php if (EmprestimoRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && EmprestimoRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0 && EmprestimoRepository::countByDevolucaoFuncionario($funcionario->getId()) == 0 && EmprestimoRepository::countByRenovacaoFuncionario($funcionario->getId()) == 0 && ClienteRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && ClienteRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0 && AutorRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && AutorRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0 && LivroRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && LivroRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0) { ?>
                                    <a href="funcionario_excluir.php?id=<?php echo $funcionario->getId(); ?>" class="btn btn-danger">Excluir</a>
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