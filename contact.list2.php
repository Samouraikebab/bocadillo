<?php
    include("mysql.init.php");
    

    $stmt = $mysqli->stmt_init();
    $stmt->prepare("SELECT id, lastname, firstname, phone, email FROM contact ORDER BY id desc");
    $stmt->execute();
    $stmt->bind_result($id, $lastname, $firstname, $phone, $email);

    $contacts = [];
    while ($stmt->fetch()) {
        $contacts[] = ['id' => $id, 'lastname' => $lastname, 'firstname' => $firstname, 'phone' => $phone, 'email' => $email];
    }
    echo $twig->render("contact.list2.html", ['contacts' => $contacts]);

    $stmt->close();
    $mysqli->close();

?>

<a href="logout.php" onclick="return window.confirm('se deconnecter?')">logout</a>
<br/>
<a href="index.php?route=list">List1</a>

