<?php
 if ($_SESSION['logged_in'] == true) {
     return true;
 } else {
     header("Location: topics.php");
 }
 ?>
