<?php 

spl_autoload_register(function($class) {

    //unidavi
    $arquivo = $_SERVER["DOCUMENT_ROOT"]."./estruturaDev2/src/".$class.".class.php"; 
    //casa
    //$arquivo = $_SERVER["DOCUMENT_ROOT"]."./src/".$class.".class.php"; 

    if (file_exists($arquivo)) {
        require $arquivo;
    }
});