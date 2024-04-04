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

<img src="https://media0.giphy.com/media/xLpr05o0hieufKfQI6/giphy.gif?cid=6c09b952izrkst2x6vwo1b9retjvs8pxs9f2i0o5uefpijs6&ep=v1_internal_gif_by_id&rid=giphy.gif&ct=s">
</body>

</html>