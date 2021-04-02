<?php
require_once 'includes/estrutura.php';
require_once './includes/CRUDClientes.php';
session_start();
isIssetPage();
if (isset($_SESSION['usucodigo'])) {
      $sTeste = criaConsulta(getClientes(), getCabecalhoConsultaClientes(), false);
      echo new Html(getHeadPage(), new Body([getMenuPrincipal(), montaMenuCadastro(),  $sTeste , getFooter()]));
} else {
      echo 'Você não tem permissão para acessar essa página! Realize o <a href="index.php">Login</a>!';
}




