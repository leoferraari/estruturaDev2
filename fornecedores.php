<?php
require_once 'includes/estrutura.php';
require_once './includes/CRUDFornecedores.php';
session_start();

if (isset($_SESSION['usucodigo'])) {
      $sConsulta = criaConsulta(getFornecedores(), getCabecalhoConsultaFornecedores(), false);
      echo new Html(getHeadPage(), new Body([montaMenuCadastro(),  $sConsulta]));
} else {
      echo 'Você não tem permissão para acessar essa página! Realize o <a href="index.php">Login</a>!';
}




