<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_GET['id'])) {
    header("location: emprestimo_listagem.php?1");
    exit();
}
if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: emprestimo_listagem.php?2");
    exit();
}
$emprestimo = EmprestimoRepository::get($_GET["id"]);
if (!$emprestimo) {
    header("location: emprestimo_listagem.php?3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> EMPRÉSTIMO</title>
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
    <?php include("include/menu.php"); ?>
    <div class="container">

        <h1>Devolver > empréstimo</h1>

        <div class="row mt-4">
            <div class="col-md-12">
                <form action="emprestimo_devolver_post.php" method="POST">
                    <div class="mb-3">
                        <label for="livro" class="form-label">Livro:</label>
                        <select name="livro_id" id="livro" required>
                            <?php
                            echo $emprestimo->getLivroId();

                            $livro = LivroRepository::get($emprestimo->getLivroId());

                            ?>
                            <option value="<?php echo $livro->getId(); ?>" selected>
                                <?php echo $livro->getId() . "-" . $livro->getTitulo(); ?>
                            </option>

                        </select>
                        <br>
                        <br>
                        <label for="cliente" class="form-label">Clientes:</label>
                        <select name="cliente_id" id="cliente" required>
                            <?php
                            $cliente = ClienteRepository::get($emprestimo->getClienteId())

                            ?>
                            <option value="<?php echo $cliente->getId(); ?>" selected>
                                <?php echo $cliente->getNome(); ?>
                            </option>

                        </select>
                        <br>
                        <label for="data_devolucao" class="form-label" style="color: black;"> Data de Devolução</label>
                        <input type="text" name="data_devolucao" class="form-control data_devolucao" id="data_devolucao" readonly value="<?php echo date("d/m/Y"); ?>">
                        <label for="vencimento" class="form-label" style="color: black;"> Nova Data Vencimento</label>
                        <input type="text" name="data_vencimento" class="form-control data_vencimento" id="vencimento" readonly value="<?php echo $emprestimo->getDataVencimento("d/m/Y"); ?>">
                        <label for="multa" class="form-label" style="color: black;"> Multa (R$)</label>
                        <?php
                        $multa = 0;
                        if ($emprestimo->getDataVencimento() < date("Y-m-d")) {
                            $datetime_vencimento = DateTime::createFromFormat("Y-m-d H:i:s", $emprestimo->getDataVencimento() . "00:00:00");

                            $timestemp_vencimento = $datetime_vencimento->format("U");
                            $datetime = DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d") . "00:00:00");
                            $timestemp_hoje = $datetime->format("U");
                            $diff = $timestemp_hoje - $timestemp_vencimento;
                            $multa = intval($diff / (60 * 60 * 24)) * 1;
                        }
                        ?>

                        <input type="text" name="multa" class="form-control " id="multa" value="<?php echo number_format($multa, 2, ",", "."); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <a href="emprestimo_listagem.php" class="btn btn-danger">Voltar</a>
                        <input type="hidden" name="id" value="<?php echo $emprestimo->getId() ?>">
                        <button type="submit" class="btn btn-info">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('.data_vencimento').mask('00/00/0000');
    })
</script>

</html>