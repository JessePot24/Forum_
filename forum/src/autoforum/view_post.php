<?php
    include "includes/db.php";
    include "includes/navbar.php";
    $post_id = $_GET['post_id'];

    $post = $db->query("SELECT * FROM posts WHERE id = {$post_id}");
    $replies = $db->query("SELECT * FROM replies WHERE post_id = {$post_id}");

    if (isset($_POST['antwoord'])) {
        $reply_content = $_POST['reply_content'];

        $ins = $db->prepare("INSERT INTO replies (content, post_id) VALUES (?, ?)");
        $ins->execute(array($reply_content, $post_id));
        header("Refresh:0");
    }
?>
<html>
<head>
    <title>post bekijken</title>
</head>
<body>
    <h3 style="text-align: center; color: white">post:</h3>
    <br />
    <?php foreach ($post->fetchAll() as $posts): ?>
    <div id="view_post">
        <h2><?= $posts['title'] ?></h2>
        <p><?= $posts['content'] ?></p>
    </div>
    <?php endforeach; ?>
    <br />
    <?php if ($_SESSION['logged_in'] == true) {?>
        <h3 style="text-align: center; color: white">antwoord:</h3>
        <form style="text-align: center;" method="post">
            <TEXTAREA name="reply_content" ROWS=10 COLS=80></TEXTAREA>
            <br />
            <br />
            <input type="submit" name="antwoord" value="antwoord"/>
        </form>
    <?php } ?>
    <br />
    <h3 style="text-align: center; color: white">antwoorden:</h3>
    <br />
    <?php foreach ($replies->fetchAll() as $reply): ?>
    <div id="replies">
        <p><?= $reply['content'] ?></p>
    </div>
    <br />
<?php endforeach; ?>
</body>
</html>
<?php
    include "includes/footer.php";
 ?>
