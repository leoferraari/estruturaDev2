<?php
require_once('autoload.php');
require_once 'includes/CRUDMenu.php';

function conexao() {
      $sHost = 'localhost';
      $sPort = '5432';
      $sDbName = 'postgres';
      $sUser = 'postgres';
      $sPassword = 'postgres';

      $sConexao = 'host =' . $sHost . ' port=' . $sPort . ' dbname=' . $sDbName . ' user=' . $sUser . ' password=' . $sPassword;

      return $oConexao = pg_connect($sConexao);
}

function isIssetPage() {
      if (isset($_GET['pg'])) { 
            header('Location: '. $_GET['pg'].'.php');
      }
}
  

function getHeadPage() {
      return new Head(['<meta charset="windows-1252">', '<meta name="viewport" content="width=device-width, initial-scale=1.0">', '<title>Desenvolvimento Web II</title>',
                       '<link rel="stylesheet" type="text/css" href="css/css.css" />']);
}

function getMenuPrincipal() {
      $sHrefHome = new Href('home.php', 'Home');
      $sItemHome = new Li([], $sHrefHome);

      $sHrefCadastro = new Href('usuarios.php', 'Cadastros e Consultas');
      $sItemCadastro = new Li([], $sHrefCadastro);

      $sHrefQuemSomos = new Href('#', 'Quem somos');
      $sItemQuemSomos = new Li([], $sHrefQuemSomos);

      $sHrefContato = new Href('#', 'Contato');
      $sItemContato = new Li([], $sHrefContato);

      $sHrefLogout = new Href('#', 'Logout');
      $sItemLogout = new Li([], $sHrefLogout);

      $aCamposMenuPrincipal = [$sItemHome, $sItemCadastro, $sItemQuemSomos, $sItemContato, $sItemLogout];

      $sUl   = new Ul($aCamposMenuPrincipal);
      $sDiv  = new Div(['id' => 'menu'], [$sUl]);
      return $sDiv;
}

function getFooter() {
      $sTitulo = new Titulo('h3', 'Login realizado com sucesso! Bem vindo, ' . $_SESSION['usunome'] .'!', ['style' => 'color: white;']);
      return new Footer(['id' => 'rodape'], [$sTitulo]);
}

function montaMenuCadastro() {
      $sParagrafo = '<p id="tituloMenu"> ÁREA DE CADASTROS </p>';
      $sImg  = new Img(['src' => 'imagens/menu.png', 'alt' => 'Fundo', 'id' => 'logoMenu']);
      $sDiv  = new Div(['id' => 'topoMenu'], [$sImg, $sParagrafo]);


      $aCamposMenuPrincipal = [];
              
      foreach (getCadastrosMenu() as $value) {
          $sHref= new Href('?pg=' . strtolower($value[2]),  $value[1]);
          $aCamposMenuPrincipal[] = new Li([], $sHref);
      }

      $sHref= new Href('?pg=' . strtolower($value[2]),  $value[1]);
      $sUl   = new Ul($aCamposMenuPrincipal);
      $sDivNavMenu = new Div(['id' => 'navMenu'], [$sUl]);

      return $sDiv.$sDivNavMenu;
  }

function criaConsulta($aArrayPopulado, $aCabecalho, $sPage) {
      $steste = '';
      if (!empty($aArrayPopulado)) {
            $steste = '<div id="consulta">';
            $steste .= '<table class="tableconsulta">';   
            $steste .= '<tr>';
            foreach ($aCabecalho as $value) {
                  $steste .= '<th>' . $value . '</th>';
            }
            $steste .= '</tr>';
            foreach ($aArrayPopulado as $i) { 
                  $iIndiceDelete = $i[0]; 
                  $iIndiceAlterar = $i[0]; 
                  $steste .= '<tr>'; 
                  foreach ($i as $j) {
                        $steste .= '<td>' . $j . '</td>';
                  }
        
                  $steste .= '<td><a href="'.$sPage.'.php?pg=&delete=' . $iIndiceDelete . '">Deletar</a></td>';
                  $steste .= '<td><a href="'.$sPage.'.php?pg=&alterar=' . $iIndiceAlterar . '">Alterar</a></td>';    
                  $steste .= '</tr>'; 
            }
            $steste .= '</table>';
            $steste .= '</div>';
      } 

      return $steste;
}

function validaCampos($aCampos) {
      $bCamposValidos = true;
      
      foreach ($aCampos as $sCampo) {
            if(!isset($_POST[$sCampo]) || empty($_POST[$sCampo])) {
                  $bCamposValidos = false;
            }
      }
      return $bCamposValidos;
}


function montaSelect($aValoresLista, $sName) {
      echo '<select name="' . $sName . '">';
      echo '<option value="selecione" disabled readonly selected>Selecione</option>';
      foreach ($aValoresLista as $i) {
            echo '<option value="' . $i[0] . '">' . $i[1] . '</option>';
      }
      echo '</select>';
}

?>