<?php
    include "includes/db.php";
    include "includes/navbar.php";

    if($_SESSION['registered'] == true) {
        echo "<center><h3 style='color: yellow'>je hebt successvol geregistreert log nu in aub</h3></center>";
    }

    if ($_SESSION['logged_in'] == true) {
        header("Location: logout.php");
    }

    $_SESSION['logged_in'] = false;

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $prepare = $db->prepare($query);
        $prepare->execute(array($username, $password));

        if ($prepare->fetch()) {
            $_SESSION['logged_in'] = true;
            $_SESSION['registered'] = false;
            header("Location: index.php");
        } else {
            echo "<center><h3 style='color: yellow'>de ingevoerde gebruikersnaam of wachtwoord is onjuist</h3></center>";

        }
    }



    $_SESSION['registered'] = false;
?>


<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div class="login">
            <h2>Log in om verder te gaan!</h2>
            <form id="loginform" method="post">
                <input class="form" placeholder="Gebruikersnaam" type="text" name="username" />
                <br />
                <br />
                <input class="form" placeholder="Wachtwoord" type="password" name="password" />
                <br />
                <input type="submit" id="loginbutton" name="login" value="login">
            </form>
            <h4 id="register">Heb je geen account? klik dan <a href="register.php">hier</a> om te registreren</h4>
        </div>
    </body>
</html>
<?php
    include "includes/footer.php";
 ?>
