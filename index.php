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
    <title>Biblioteca Virtual - Página Inicial</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/menu.css">
</head>

<body>
<?php include('include/menu.php'); ?>

<img src="https://i.pinimg.com/originals/55/d1/40/55d14007f36dcb3a6d1f0947427b412b.gif" class="center-image">
</body>

</html>