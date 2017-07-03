<?php
    include "includes/db.php";
    include "includes/navbar.php";
    include "includes/logged_in.php";

    if (isset($_POST['postknop'])) {
        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $categorie = $_GET['categorie_id'];

        $prepare = $db->prepare("INSERT INTO posts (title, content, categorie_id) VALUES (?, ?, ?)");
        $prepare->execute(array($post_title, $post_content, $categorie));
        header("Location: topics.php");
    }
    ?>
<html>
<head>
    <title>nieuwe topic</title>
</head>
<body>
    <form style="text-align: center;" method="post">
    <input class="form" placeholder="post titel" name="post_title" type="text" />
    <br />
    <br />
    <TEXTAREA Name="post_content" ROWS=10 COLS=40></TEXTAREA>
    <br />
    <br />
    <input type="submit" id="topicbutton" name="postknop" value="topic plaatsen">
</form>
</body>
</html>

<?php
    include "includes/footer.php";
 ?>
