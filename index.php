<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>

<body>
    <h3>Selamat datang!</h3>
    <a href="logout.php">logout</a>
</body>

</html>