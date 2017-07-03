<link rel="stylesheet" href="styles/stylehoofdpagina.css">
<h1 id="navbartext">autoforum</h1>
<nav>
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="topics.php">Topics</a></li>
        <li><a href="login.php"><?php
            session_start();
            if($_SESSION['logged_in'] == true) {
                echo "Logout";
            } else {
                echo "Login";
            }
        ?></a></li>
    </ul>
</nav>
