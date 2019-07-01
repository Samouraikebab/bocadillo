<?php

$route = "";
if (isset($_GET["route"])) {
    $route = $_GET["route"];
}

$routes = [
    "" => "log.php",
    "login" => "log.php",
    "regist" => "reg.php",
    "list" => "contact.list.php",
    "edit" => "edit.php",
    "list2" => "contact.list2.php"
];


include($routes[$route]);

?>