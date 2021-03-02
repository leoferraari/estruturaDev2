<?php
//require('autoload.php');
require('src/Link.class.php');
require('src/Title.class.php');
require('src/Head.class.php');
require('src/Td.class.php');
require('src/Tr.class.php');
require('src/Table.class.php');
require('src/Script.class.php');
require('src/Ul.class.php');
require('src/Li.class.php');
require('src/Paragrafo.class.php');
require('src/Html.class.php');
require('src/Th.class.php');
require('src/Body.class.php');

$aElementsLinkHead = [
    'href'        => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css', 
    'rel'         => 'stylesheet',
    'integrity'   => "sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl",
    'crossorigin' => 'anonymous'
];

$sLinkHead = new Link($aElementsLinkHead, false);

$sTitle = new Title('Hello, world', ['class' => 'title']);

$aElementsHead = [
    '<meta charset="utf-8">',
    '<meta name="viewport" content="width=device-width, initial-scale=1">',
    '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">'
];

$sHead = new Head($aElementsHead, $sTitle);

$aElementosScript = [
    'src'         => "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js",
    'integrity'   => "sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0",
    'crossorigin' => "anonymous"
];

$aAttrTd1 = [
    'colspan' => 1,
    'rowspan' => 1,
    'style'   => 'background-color: red'
];

$aAttrTd2 = [
    'colspan' => 1,
    'rowspan' => 1,
    'style'   => 'background-color: red'
];

$sAttrTr1 = [
    'style' => 'background-color: darkgray'
];

$sAttrTr2 = [
    'style' => 'background-color: green'
];

$sAttrTable = [
    'border-collapese' => 'separate',
   
];

$sTd1 = new Td($aAttrTd1, 'Leonardo');
$sTd2 = new Td($aAttrTd2, 'Ferrari');

$sTr1 = new Tr($sAttrTr1, [$sTd1, $sTd2]);
$sTr2 = new Tr($sAttrTr2, [$sTd2, $sTd1]);

$sTable = new Table($sAttrTable, [$sTr1, $sTr2]);

$aComponentesBody = [
    new Paragrafo('h1', 'Hello, world!', ['class' => 'paragraph', 
                                          'style'=> 'color: red']),
    new Script($aElementosScript),
    $sTable
    
];

$sBody = new Body($aComponentesBody);

echo new Html('en', $sHead, $sBody);

/*
    $li1 = new Li('item 1', 'azul');
    $li2 = new Li('item 2', 'azul');
    $ul->addLi($li1);
    $ul->addLi($li2);
*/

?>


