<?php
session_start();

include "db.php";

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    if (isset($_POST['login']) && $_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM tbl_auth WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $fetchData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fetchData) {
            if (password_verify($password, $fetchData['password'])) {

                $_SESSION['login'] = true;
                header('Location: index.php');
            } else {
                echo "<h3>Gagal login!</h3>";
            }
        } else {
            echo "<h3>Gagal login!</h3>";
        }
    }
    ?>

    <h3>Login Admin!</h3>

    <form method="post">
        <ul>
            <li><label for="username">Username :</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </li>

            <br />

            <li><label for="password">Password :</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </li>

            <br />

            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>