<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php
    if (isset($_POST['register']) && $_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO tbl_auth (username, password) VALUES (:username, :password)");

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashPassword);

        $stmt->execute();

        echo "Registrasi berhasil! Username: $username, Password: $hashPassword";
    }
    ?>

    <form method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </li>
            <br />
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </li>
            <br />
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>

</html>
