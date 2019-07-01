<?php

    $id = $_GET["id"];

    if (empty($id)) {
        die();
    }

    include("mysql.init.php");

    $stmt = $mysqli->stmt_init();
    $stmt->prepare("DELETE FROM contact WHERE id = $id");

    $stmt->execute(); 

    $stmt->close();
    $mysqli->close();

    header("Location: index.php?route=list");
?>