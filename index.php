<?php
require_once('autoload.php');
require_once '../estruturaDev2/login.php';

$sHead = new Head(['<meta charset="windows-1252">', '<meta name="viewport" content="width=device-width, initial-scale=1.0">', '<title>Desenvolvimento Web II</title>']);
$sHtml = new Html($sHead, getPageLogin());

echo $sHtml;
?>