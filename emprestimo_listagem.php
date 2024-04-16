<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}
$emprestimo = Factory::emprestimo();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPRÉSTIMO > LISTAGEM</title>
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
            <h2>EMPRÉSTIMOS</h2>
            <a class="btn" href="emprestimos_ativos.php">Ativo</a>
            <a class="btn" href="emprestimos_devolvidos.php">Devolvidos</a>
            <a class="btn " href="emprestimos_nao_renovados.php">Não renovados</a>
            <a class="btn " href="emprestimos_renovados.php">Renovados</a>
            <a class="btn " href="emprestimos_vencidos.php">Vencidos</a>
            <a class="btn btn-info" href="emprestimo_novo.php">Adicionar um empréstimo</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>

                    <th>ID</th>
                    <th>Livro</th>
                    <th>Cliente</th>
                    <th>Data Vencimento</th>
                    <th>Data Devolução</th>
                    <th>Ações</th>

                </thead>
                <tbody>
              <?php
              foreach(EmprestimoRepository::listAll() as $emprestimo){
              ?>
              <tr>
                <td><?php echo $emprestimo->getId(); ?></td>
                <td><?php 
                        $livro = LivroRepository::get($emprestimo->getLivroId());
                        echo $emprestimo->getLivroId()." - ". $livro->getTitulo(); 
                    ?>
                </td>
                <td>
                    <?php 
                        $cliente = ClienteRepository::get($emprestimo->getClienteId());
                        echo $emprestimo->getClienteId()." - ". $cliente->getNome(); 
                    ?>
                </td>
                <td><?php echo $emprestimo->getDataVencimento("d/m/Y");?></td>
                <td><?php echo $emprestimo->getDataDevolucao("d/m/Y H:i:s "); ?></td>
                <td>
                                <?php 
                                if(
                                $emprestimo->getDataRenovacao() == null &&
                                $emprestimo->getDataRenovacao() == null &&
                                $emprestimo->getDataAlteracao() == null
                                ){?>
                                  <a href="emprestimo_excluir.php?id=<?php echo $emprestimo->getId(); ?>" class="btn btn-danger">Excluir</a>
                                <?php } ?>

                                <?php 
                                if(
                                $emprestimo->getDataVencimento("Y-m-d") >= date("Y-m-d") &&
                                $emprestimo->getDataRenovacao() == null &&
                                $emprestimo->getDataAlteracao() == null
                                ){?>
                                  <a href="emprestimo_renovar.php?id=<?php echo $emprestimo->getId(); ?>" class="btn btn-warning">Renovar</a>
                                <?php } ?>
                                <?php 
                                if(
                               $emprestimo->getDataDevolucao()==null
                                ){?>
                                  <a href="emprestimo_devolver.php?id=<?php echo $emprestimo->getId(); ?>" class="btn btn-warning">Devolver</a>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.data_vencimento').mask('00/00/0000');
        })
    </script>
</body>

</html>