<?php
    include "includes/db.php";
    include "includes/navbar.php";

    $sql = "SELECT * FROM categories";
    $exe = $db->query($sql);


?>
<html>

<body>
<?php
    if ($_SESSION['logged_in'] == true) {
?>
    <center>
        <button onclick="location.href='new_topic.php';" name="topicknop2" style='margin-bottom: 20px;' id='topicbutton'>Nieuwe topic</button>
    </center>
<?php
    }
?>
<?php foreach ($exe->fetchAll() as $topic): ?>
<div id="topic">
    <form method="get">
        <input type="hidden" value="<?= $_SESSION['topic_id'] = $topic['id'] ?>" >
        <a href="posts.php?categorie_id=<?= $_SESSION['topic_id'] ?>"><h3><?= $topic['title']; ?></h3></a>
    </form>

</div>
<?php endforeach; ?>
</body>
</html>

<?php
    include "includes/footer.php";
?>
