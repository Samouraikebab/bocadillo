<?php

require("mysql.init.php");
session_start();

if($_POST){
	
	$username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
	
	$rencontreProbleme = false;
	$message = '';
	
	if ($username == ""){
		$rencontreProbleme = true;
		$message .= "- username ne doit pas être vide<br/>";		
	}
	
	if ($password ==""){
		$rencontreProbleme = true;
		$message .= "- le password ne doit pas être vide<br/>";
    }
    
    if ($password != $password2){
		$rencontreProbleme = true;
		$message .= "- les deux mots de passe doivent être identiques<br/>";
	}
	
	if (!$rencontreProbleme){
        $stmt = $mysqli->stmt_init();
        $stmt->prepare("INSERT INTO user (username, password) VALUES ('$username','$password')");

        $stmt->bind_param($username, $password);

        $stmt->execute();

        $stmt->bind_result($id, $username, $password);
       
        $stmt->fetch();

        $_SESSION["username"] = $username;
        
        $stmt->close();
        $mysqli->close();

    }
    header("Location: index.php?route=login");   	
}
?>
