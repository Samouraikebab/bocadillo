<?php
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    if ((empty($lastname) && empty($firstname)) || (empty($phone) && empty($email))) {
        die();
    }

    include("mysql.init.php");

    $stmt = $mysqli->stmt_init();
    $stmt->prepare("INSERT INTO contact (lastname, firstname, phone, email) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $lastname, $firstname, $phone, $email);

    $stmt->execute();

    $stmt->close();
    $mysqli->close();

    header("Location: index.php?route=list");
?>