<?php
    $db = new PDO("mysql:host=localhost;dbname=login", "root", "");

    if (isset($_POST['login'])) {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $prepare = $db->prepare($sql);
        $prepare->execute(array($username, $password));

        if ($prepare->fetch()) {
            $_SESSION['logged_in'] = true;
            header("Location: logged_in.php");
        } else {
            echo "wrong username or password";
        }
    }

    if(isset($_POST['register'])) {
        $usernamer = $_POST['usernamer'];
        $passwordr = $_POST['passwordr'];

        $sqlr = "INSERT INTO users (username, password) VALUES (?, ?)";
        $preparer = $db->prepare($sqlr);
        $preparer->execute(array($usernamer, $passwordr));

        echo "you succesfully registered";
    }
 ?>

<html>
    <form method="post">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <input type="submit" name="login" value="login">
    </form>

    <form method="post">
        <input type="text" placeholder="username" name="usernamer">
        <input type="password" placeholder="password" name="passwordr">
        <input type="submit" name="register" value="register">
    </form>
</html>
