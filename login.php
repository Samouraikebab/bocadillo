<?php

require("mysql.init.php");


if($_POST){
	
	$password = $_POST["password"];
	$username = $_POST["username"];
	
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
	
	if (!$rencontreProbleme){
        $stmt = $mysqli->stmt_init();
        $stmt->prepare("SELECT * FROM user WHERE username = ? and password = ?");

        $stmt->bind_param("ss", $username, $password);

        $stmt->execute();

        $stmt->bind_result($id, $username, $password);
       
        $stmt->fetch();

        $_SESSION["username"] = $username;
        
        $stmt->close();
        $mysqli->close();

    }
    header("Location: index.php?route=list");   	
}

?>
