<?php
    require_once 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
    $twig = new Twig_Environment($loader);
?>