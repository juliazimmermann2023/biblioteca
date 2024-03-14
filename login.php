<?php 
include_once("include/factory.php");
if(Auth::isAuthenticated()){
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://images4.alphacoders.com/132/1326368.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 300px;
        }

        .login-container h2 {
            text-align: center;
            color: #000;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #000000;
            color: white;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #000000;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Faça seu Login</h2>
        <form action="logar.php" class="login-form" method="post">
            <input type="text" name="cpf" placeholder="Cpf" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" class="btn"> Entrar</button>
        </form>
    </div>

</body>

</html>