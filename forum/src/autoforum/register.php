<?php
    include "includes/db.php";
    include "includes/navbar.php";
    try {

    if (isset($_POST['register'])) {
        $username = $_POST['usernamer'];
        $email = $_POST['email'];
        $real_name = $_POST['real_name'];
        $password = md5($_POST['passwordr']);

        $query = "INSERT INTO users (username, real_name, email, password) VALUES (?, ?, ?, ?)";
        $prepare = $db->prepare($query);
        $prepare->execute(array($username, $email, $real_name, $password));

        $_SESSION['registered'] = true;

        header("Location: login.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<html>
    <head>
        <title>Registreer</title>
    </head>
    <body>
        <div class="login">
            <h2>Registeren</h2>
            <form id="loginform" method="post">
                <input class="form" placeholder="Gebruikersnaam" type="text" name="usernamer" />
                <br />
                <br />
                <input class="form" placeholder="Email" type="email" name="email" />
                <br />
                <br />
                <input class="form" placeholder="Volledige naam" type="text" name="real_name" />
                <br />
                <br />
                <input class="form" placeholder="Wachtwoord" type="password" name="passwordr" />
                <br />
                <br />
                <input type="submit" id="loginbutton" name="register" value="registreren">
            </form>
        </div>
    </body>
</html>
<?php
    include "includes/footer.php";
 ?>
