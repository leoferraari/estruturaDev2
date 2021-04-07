<!DOCTYPE html>
<html>
      <head>
            <title>Clínica Médica Ferrari</title>
            <meta charset="windows-1252">
            <link rel="icon" href="imagens/logo.jpg"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="estilo/css.css" rel="stylesheet" type="text/css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="script/newjavascript.js" type="text/javascript"></script>
            <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
      </head>
      <body>
            <div id="fundo" style="background-image: url(imagens/clinica_fundo.jpg); opacity: 0.3; height: 100%; width: 100%; z-index: -1; position: fixed;">              
            </div>
            <div id="topo">
                  <?php
                  require_once '../estruturaDev2/includes/estrutura.php';
                  echo getMenuPrincipal();
                  ?>
            </div>  

            <div id="corpo">
        
                  <div id="conteudo_pagina">
                 
                       <?php
                       if (isset($_GET['pg'])) { 
                             carregaPagina($_GET['pg']);
                       }
                       ?>
                  </div>      
            </div>


            <footer id="rodape">
            <?php
             echo '<h4 id="conteudoRodape">Leonardo da Rocha Ferrari - Desenolvimento Web II. <br> Logado como: '. $_SESSION['usunome'] . '</h4>';

            ?>
       
            </footer>
</body>
</html>
