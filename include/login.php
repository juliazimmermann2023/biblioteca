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

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #000000;
            color: #fff;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #000000;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Faça seu Login</h2>
        <form action="#" class="login-form">
            <input type="text" name="cpf" placeholder="Cpf" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit" value="Entrar">
        </form>
    </div>
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let cpf = document.getElementById('cpf').value;
    let password = document.getElementById('password').value;
    
    if (cpf.length === 14 && password.length >= 10) {
        // Aqui você pode adicionar a lógica para verificar o CPF e a senha
        window.location.href = 'dashboard.html';
    } else {
        document.getElementById('error-message').innerText = 'CPF deve conter 14 dígitos e senha deve ter no mínimo 10 caracteres';
    }
});
    </script>
</body>

</html>