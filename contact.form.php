<?php
    if (!empty($_POST["id"])) {
        include("contact.edit.php");
    } else {

        include("contact.add.php");
    }
?>