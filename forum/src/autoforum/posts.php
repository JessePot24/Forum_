<?php
    include "includes/db.php";
    include "includes/navbar.php";
    $topic_id = $_GET['categorie_id'];
    $query = $db->query("SELECT * FROM posts WHERE categorie_id = {$topic_id}");

?>
<html>
<head>
    <title>Posts</title>
</head>
<body>
    <?php
        if ($_SESSION['logged_in'] == true) {
    ?>
        <center>
            <button onclick="location.href='new_post.php?categorie_id=<?= $_GET['categorie_id']; ?>';" name="postknop" style='margin-bottom: 20px;' id='topicbutton'>Nieuwe post</button>
        </center>
    <?php
        }
    ?>
    <?php foreach ($query->fetchAll() as $post): ?>
    <div id="post">
        <form method="get">
            <input type="hidden" value="<?= $_SESSION['post_id'] = $post['id'] ?>" />
        </form>
        <a href="view_post.php?post_id=<?= $_SESSION['post_id']; ?>"><h3><?= $post['title'] ?></h3></a>
        <p><?= $post['content'] ?></p>
    </div>
    <?php
        endforeach;
    ?>
</body>
</html>
<?php
    include "includes/footer.php";
 ?>
