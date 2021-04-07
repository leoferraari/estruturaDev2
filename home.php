<?php
session_start();
require_once 'includes/estrutura.php';
require_once('autoload.php');

if (isset($_SESSION['usucodigo'])) {
    echo new Html(getHeadPage(), new Body([]));
} else {
    echo 'Você não tem permissão para acessar essa página! Realize o <a href="index.php">Login</a>!';
}



