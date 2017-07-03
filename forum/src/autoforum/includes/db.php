<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=autoforum", "root", "");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
