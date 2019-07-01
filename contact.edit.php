<?php
    $id = $_POST["id"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    if (empty($id) || (empty($lastname) && empty($firstname)) || (empty($phone) && empty($email))) {
        echo "bonjour";
        die();
    }

    include("mysql.init.php");

    $stmt = $mysqli->stmt_init();
    $stmt->prepare("UPDATE contact SET lastname = ?, firstname = ?, phone = ?, email = ? WHERE id = ?");

    $stmt->bind_param("ssssi", $lastname, $firstname, $phone, $email, $id);

    $stmt->execute();

    $stmt->close();
    $mysqli->close();

    header("Location: index.php?route=list");
?>
