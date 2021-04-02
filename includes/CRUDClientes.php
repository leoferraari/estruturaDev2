<?php

function getClientes() {
      $oConexao = conexao(); 
      $sSelect = 'SELECT * FROM trabalhofinal.tbclientes';
      $oResultado = pg_query($oConexao, $sSelect);
      $aClientes = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aClientes, $aResultado);
      }
      pg_close($oConexao);
      return $aClientes;
}

function getCabecalhoConsultaClientes() {
      return ['Código', 'Nome Companhia', 'Nome contato', 'Titúlo Contato',
              'Endereço', 'Cidade', 'Região', 'CEP', 'País', 'Telefone', 'Fax',
              'Deletar', 'Alterar'];
}

function deleteCliente($iCodigo) {
      $oConexao = conexao();
      $sDelete = 'DELETE FROM trabalhofinal.tbclientes
                  WHERE clicodigo = (\'' . $iCodigo . '\')';
      if (@pg_query($oConexao, $sDelete)) {
            echo '<br>';
            echo 'Cliente deletado com sucesso!';
      } 
      pg_close($oConexao);
}

function insertCliente() {
      $oConexao = conexao();
      $sInsert = 'INSERT INTO trabalhofinal.tbclientes(clinomecompanhia, clinomecontato, clititulocontato,
                                                           cliendereco, clicidade, cliregiao, clicep, clipais,
                                                           clitelefone, clifax)
                  VALUES (\'' . $_POST['cliNomeCompanhia'] . '\', 
                          \'' . $_POST['cliNomeContato'] . '\',
                          \'' . $_POST['cliTituloContato'] . '\',
                          \'' . $_POST['cliEndereco'] . '\',
                          \'' . $_POST['cliCidade'] . '\',
                          \'' . $_POST['cliRegiao'] . '\',
                          \'' . $_POST['cliCep'] . '\',
                          \'' . $_POST['cliPais'] . '\',
                          \'' . $_POST['cliTelefone'] . '\',
                          \'' . $_POST['cliFax'] . '\')';
      if (@pg_query($oConexao, $sInsert)) {
            echo 'Cliente cadastrado com sucesso!'; 
      } else {
            echo 'Não foi possível inserir o cliente. Tente novamente!';
      }
      pg_close($oConexao);
}

function updateCliente($iCodigo) {
      $oConexao = conexao();
      $sUpdate = 'UPDATE trabalhofinal.tbclientes 
                     SET clinomecompanhia = \'' . $_POST['upCliNomeCompanhia'] . '\''. ', 
                         clinomecontato = \'' . $_POST['upCliNomeContato']. '\''. ', 
                         clititulocontato = \'' . $_POST['upCliTituloContato']. '\''. ', 
                         cliendereco = \'' . $_POST['upCliEndereco']. '\''. ', 
                         clicidade = \'' . $_POST['upCliCidade']. '\''. ',      
                         cliregiao = \'' . $_POST['upCliRegiao']. '\''. ', 
                         clicep = \'' . $_POST['upCliCep']. '\''. ', 
                         clipais = \'' . $_POST['upCliPais']. '\''. ', 
                         clitelefone = \'' . $_POST['upCliTelefone']. '\''. ', 
                         clifax = \'' . $_POST['upCliFax']
                         .'\' WHERE clicodigo = ' . $iCodigo . '';

      @pg_query($oConexao, $sUpdate);
      pg_close($oConexao);
      header("Location: clientes.php");
}

function selectUpdateCliente($iCodigo) {
      $oConexao = conexao();
      $sSelect = 'SELECT * FROM trabalhofinal.tbclientes WHERE clicodigo = \'' . $iCodigo . '\'';
      $oResultado = pg_query($oConexao, $sSelect);
      $aClientes = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aClientes, $aResultado);
      }
      pg_close($oConexao);
      return $aClientes;
}
