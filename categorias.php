<?php
require_once 'includes/estrutura.php';
require_once './includes/CRUDCategorias.php';
session_start();

//carregaPagina('categorias');
if (isset($_SESSION['usucodigo'])) {
      $sConsulta = criaConsulta(getCategorias(), cabecalhoConsultaCategorias(), 'categorias');
      echo new Html(getHeadPage(), new Body([montaMenuCadastro(),  $sConsulta ]));
} else {
      echo 'Você não tem permissão para acessar essa página! Realize o <a href="index.php">Login</a>!';
}

if (!empty($_GET['delete'])) {
      deleteCategoria($_GET['delete']);
}






