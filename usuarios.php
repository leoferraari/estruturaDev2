<?php
require_once 'includes/estrutura.php';
require_once './includes/CRUDUsuarios.php';
session_start();

if (isset($_SESSION['usucodigo'])) {
      $sConsulta = criaConsulta(getUsuarios(), cabecalhoConsultaUsuarios(), false);
      echo new Html(getHeadPage(), new Body([montaMenuCadastro(), $sConsulta]));
} else {
      echo 'Você não tem permissão para acessar essa página! Realize o <a href="index.php">Login</a>!';
}

/*
if (isset($_GET['alterar'])) {
      $iCodigo = $_GET['alterar'];
      $aUsuario = selectUpdate($iCodigo);


      echo'     <div id="tamanhoDivTabela">
      <form action="?pg=usuarios&alterar=' . $iCodigo . '" method="POST">
                  <table class="tbGeral">
                        <tr>
                              <td class="titulonomeTab" colspan="2">Alterar Usuário</td>
                        </tr> 
                        <tr>
                              <th class="tituloTab">
                                    <label for="nomeUsuario">Nome: </label>
                              </th>
                              <td class="colunaTab">
                                    <input type="text" name="upnomeUsuario" id="nome" maxlength="50" placeholder="Digite o nome do usuário" value="' . $aUsuario[0][1] . '">';
                              imagemErroSucesso('erroNome', 'sucessoNome');                                              
      echo'                   </td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="sobrenomeUsuario">Sobrenome: </label>
                              </th>
                              <td class="colunaTab">
                                    <input type="text" name="upsobrenomeUsuario" id="sobrenome" maxlength="50" placeholder="Digite o sobrenome do usuário" value="' . $aUsuario[0][2] . '">';
                                    imagemErroSucesso('erroSobrenome', 'sucessoSobrenome');                                                                          
      echo'                   </td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="emailUsuario">E-mail: </label>
                              </th>
                              <td class="colunaTab">
                                    <input type="email" name="upemailUsuario" id="useremail" maxlength="35" placeholder="Informe o e-mail do usuário" value="' . $aUsuario[0][3] . '">';
                                    imagemErroSucesso('erroEmail', 'sucessoEmail');
      echo'                   </td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="passwordUsuario">Senha: </label>
                              </th>
                              <td class="colunaTab">
                                    <input type="password" name="uppasswordUsuario" id="password" maxlength="32" placeholder="Cadastre uma senha">';
                                    imagemErroSucesso('erroSenha', 'sucessoSenha');
      echo'                    </td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="datanascUsuario">Data de Nascimento: </label>
                              </th>
                              <td class="colunaTab"> 
                                    <input type="date" name="updatanascUsuario" id="data" value="' . $aUsuario[0][5] . '">';
                                    imagemErroSucesso('erroData', 'sucessoData');
      echo'                   </td>
                        </tr>
                        <tr>
                              <td colspan="2"><input type="submit" class="buttonSubmit"  value="Alterar"></td>
                        </tr>
                        <tr>
                              <td colspan="2"><input type="reset" class="buttonReset" value="Limpar"></td>
                        </tr>
                  </table>
             
            </form>
      </div>
   ';
     
      if (!empty($_POST['upnomeUsuario']) && isset($_POST['upnomeUsuario']) && !empty($_POST['upsobrenomeUsuario']) && isset($_POST['upsobrenomeUsuario']) && !empty($_POST['upemailUsuario']) && isset($_POST['upemailUsuario']) && !empty($_POST['uppasswordUsuario']) && isset($_POST['uppasswordUsuario']) && !empty($_POST['updatanascUsuario']) && isset($_POST['updatanascUsuario'])) {
            updateUsuario($iCodigo);
      } 
} else {
      echo '
      <div id="tamanhoDivTabela">
            <form action="?pg=usuarios" method="POST">
                  <table class="tbGeral">
                        <tr>
                              <td class="titulonomeTab" colspan="2">Cadastrar Usuários</td>
                        </tr>              
                        <tr>
                              <th class="tituloTab">
                                    <label for="nomeUsuario">Nome: </label>
                              </th>
                              <td class="colunaTab">
                                    <input type="text" name="nomeUsuario" id="nome" maxlength="50" placeholder="Digite o nome do usuário">';
                                    imagemErroSucesso('erroNome', 'sucessoNome');                
      echo'                   </td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="sobrenomeUsuario">Sobrenome: </label>
                              </th>
                              <td class="colunaTab">
                                    <input type="text" name="sobrenomeUsuario" id="sobrenome" maxlength="50" placeholder="Digite o sobrenome do usuário">';
                                    imagemErroSucesso('erroSobrenome', 'sucessoSobrenome');                                    
echo'                         </td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="emailUsuario">E-mail: </label>
                              </th>
                              <td class="colunaTab">
                                    <input type="email" name="emailUsuario" id="useremail" maxlength="35" placeholder="Informe o e-mail do usuário">';
                                    imagemErroSucesso('erroEmail', 'sucessoEmail');                                  
echo'                        </td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="passwordUsuario">Senha: </label>
                              </th>
                              <td class="colunaTab">
                                    <input type="password" name="passwordUsuario" id="password" maxlength="32" placeholder="Cadastre uma senha">';
                                    imagemErroSucesso('erroSenha', 'sucessoSenha');                             
echo'                         </td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="datanascUsuario">Data de Nascimento: </label>
                              </th>
                              <td class="colunaTab"> 
                                    <input type="date" name="datanascUsuario" id="data">';
                                    imagemErroSucesso('erroData', 'sucessoData');                  
echo'                         </td>
                        </tr>';
                              menuTabela();
echo'             </table>
             
            </form>
            <br>
                  <form action="?pg=usuarios" method="POST">
             <table id="tbGeralFiltro">
                        <tr>
                              <td class="titulonomeTab" colspan="3">Filtrar usuário</td>
                        </tr>
                        <tr>
                              <th class="tituloTab">
                                    <label for="filtroNome">Opção de filtro: </label>
                              </th>
                              <td class="colunaTab">';
                                    montaSelectFiltro(colunasUsu(), 'optionSelecionada');                                   
echo'                         </td>
                              <tr>
                              <th class="tituloTab">
                                    
                              </th> 
                              <td class="colunaTab">
                                    <input type="text" name="valor" id="valorFiltro" placeholder="Digite o que você deseja pesquisar">';
                                    imagemErroSucesso('erroFiltro', 'sucessoFiltro');
echo'                         </td>
                              </tr>
                        </tr>
                        <tr>
                              <td colspan="3"><input type="submit" class="buttonSubmit" value="Filtrar"></td>
                        </tr>
                  </table>   
                  </form>
      </div>
   ';   
}

if (!empty($_POST['nomeUsuario']) && isset($_POST['nomeUsuario']) && !empty($_POST['sobrenomeUsuario']) && isset($_POST['sobrenomeUsuario']) && !empty($_POST['emailUsuario']) && isset($_POST['emailUsuario']) && !empty($_POST['passwordUsuario']) && isset($_POST['passwordUsuario']) && !empty($_POST['datanascUsuario']) && isset($_POST['datanascUsuario'])) {
      insertUsuario();
}

if (!empty($_GET['delete'])) {
      deleteUsuarios($_GET['delete']);
}

if (!empty($_POST['valor']) && isset($_POST['valor']) && !empty($_POST['optionSelecionada']) && isset($_POST['optionSelecionada'])){
      $oColuna = $_POST['optionSelecionada'];
      $oValor = $_POST['valor'];
      criaConsulta(usuarioFiltro($oColuna, $oValor), cabecalhoConsultaUsuario(), false);
} else {
      criaConsulta(usuario(), cabecalhoConsultaUsuario(), false); 
}
*/




