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

        <h1>Novo > empréstimo</h1>
    
        <div class="row mt-4">
            <div class="col-md-12">
            <form action="emprestimo_novo_post.php" method="POST">
                <div class="mb-3">
                <label for="livro" class="form-label">Livro:</label>
                <select name="livro_id" id="livro" required>
                                    <?php
                                        foreach(LivroRepository::listAll() as $livro){
                                            if(EmprestimoRepository::countByLivro($livro->getId()) == 0){
                                    ?>
                                        <option value="<?php echo $livro->getId();?>">
                                            <?php echo $livro->getTitulo(); ?>
                                        </option>
                                    <?php }} ?>
                                </select>
<br>
<br>
                    <label for="cliente" class="form-label">Clientes:</label>
                    <select name="cliente_id" id="cliente" required>
                                    <?php
                                        foreach(ClienteRepository::listAll() as $cliente){
                                            if(EmprestimoRepository::countByCliente($cliente->getId()) == 0){
                                    ?>
                                        <option value="<?php echo $cliente->getId();?>">
                                            <?php echo $cliente->getNome(); ?>
                                        </option>
                                    <?php }} ?>
                                </select>
                        <br>
                    <label for="vencimento" class="form-label" style="color: black;"> Nova Data Vencimento</label>
                    <input type="text" name="data_vencimento" class="form-control data_vencimento" id="vencimento" disabled value="<?php echo $emprestimo->showDataVencimento("d/m/Y"); ?>">

                </div>
                <div class="mb-3">  
                    <a href="emprestimo_listagem.php" class="btn btn-danger">Voltar</a>
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
$(document).ready(function(){
        $('.data_vencimento').mask('00/00/0000');
    })
</script>
</html>