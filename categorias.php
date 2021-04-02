<?php
require_once 'includes/estrutura.php';
require_once './includes/CRUDCategorias.php';
session_start();


if (isset($_SESSION['usucodigo'])) {
      $sTeste = criaConsulta(getCategorias(), cabecalhoConsultaCategorias(), 'categorias');
      echo new Html(getHeadPage(), new Body([getMenuPrincipal(), montaMenuCadastro(),  $sTeste , getFooter()]));
} else {
      echo 'Você não tem permissão para acessar essa página! Realize o <a href="index.php">Login</a>!';
}

//isIssetPage();
if (!empty($_GET['delete'])) {
      deleteCategoria($_GET['delete']);
}






