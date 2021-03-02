<?php
spl_autoload_register(function($class) {
    $arquivo = $_SERVER["DOCUMENT_ROOT"]
    ."/estruturaDev2/src/".$class.".class.php";
 
    if (file_exists($arquivo)) {
        require $arquivo;
    }
});