<?php
    include "includes/db.php";
    include "includes/navbar.php";
    include "includes/logged_in.php";

    if (isset($_POST['topicknop'])) {
        $topic = $_POST['topic2'];

        if ($topic == "") {
            echo "<h4 style='text-align:center; color: white;'>Voer aub een titel in</h4>";
        } else {
            $prepare = $db->prepare("INSERT INTO categories (title) VALUES (?)");
            $prepare->execute(array($topic));
            header("Location: topics.php");
        }
    }
    ?>
<html>
<head>
    <title>nieuwe topic</title>
</head>
<body>
    <form style="text-align: center;" method="post">
    <input class="form" placeholder="topic titel" name="topic2" type="text" />
    <br />
    <br />
    <input type="submit" id="topicbutton" name="topicknop" value="topic plaatsen">
</form>
</body>
</html>

<?php
    include "includes/footer.php";
 ?>
