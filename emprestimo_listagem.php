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
    <title>NOVO EMPRESTIMO > LISTAGEM</title>
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
            <h2>EMPRESTIMO > LISTAGEM</h2>
            <a class="btn btn-info" href="emprestimo_novo.php">Adicionar um emprestimo</a>
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
              foreach(EmprestimoRepository::listAll() as $empres){
              ?>
              <tr>
                <td><?php echo $empres->getId(); ?></td>
                <td><?php 
                        $livro = LivroRepository::get($empres->getLivroId());
                        echo $empres->getLivroId()." - ". $livro->getTitulo(); 
                    ?>
                </td>
                <td>
                    <?php 
                        $cliente = ClienteRepository::get($empres->getClienteId());
                        echo $empres->getClienteId()." - ". $cliente->getNome(); 
                    ?>
                </td>
                <td><?php echo $empres->getDataVencimento(); ?></td>
                <td><?php echo $empres->showDataDevolucao("d/m/Y"); ?></td>
                <td>
                  <?php if(EmprestimoRepository::countByDataAlteracao($empres->getId()) == null && EmprestimoRepository::countByDataDevolucao($empres->getId()) == null && EmprestimoRepository::countByDataAlteracao($empres->getId()) == null){ ?>
                  <a href="emprestimo_excluir.php?id=<?php echo $empres->getId(); ?>" id="excluir">Excluir</a>
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
</body>

</html>