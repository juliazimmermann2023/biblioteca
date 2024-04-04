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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/menu.css">
</head>


<body>
<?php include('include/menu.php'); ?>



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