<?php

require("mysql.init.php");


if($_POST){
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
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
