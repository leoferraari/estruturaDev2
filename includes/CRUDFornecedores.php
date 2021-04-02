<?php

function getFornecedores() {
      $oConexao = conexao(); 
      $sSelect = 'SELECT * FROM trabalhofinal.tbfornecedores';
      $oResultado = pg_query($oConexao, $sSelect);
      $aFornecedores = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aFornecedores, $aResultado);
      }
      pg_close($oConexao);
      return $aFornecedores;
}

function getCabecalhoConsultaFornecedores() {
      return ['Código', 'Nome Companhia', 'Nome contato', 'Titúlo Contato',
              'Endereço', 'Cidade', 'Região', 'CEP', 'País', 'Telefone', 'Fax', 'Website',
              'Deletar', 'Alterar'];
}

function deleteFornecedor($iCodigo) {
      $oConexao = conexao();
      $sDelete = 'DELETE FROM trabalhofinal.tbfornecedores
                  WHERE forcodigo = (\'' . $iCodigo . '\')';
      if (@pg_query($oConexao, $sDelete)) {
            echo '<br>';
            echo 'Fornecedor deletado com sucesso!';
      } 
      pg_close($oConexao);
}

function insertFornecedor() {
      $oConexao = conexao();
      $sInsert = 'INSERT INTO trabalhofinal.tbfornecedores(fornomecompanhia, fornomecontato, fortitulocontato,
                                                           forendereco, forcidade, forregiao, forcep, forpais,
                                                           fortelefone, forfax, forwebsite)
                  VALUES (\'' . $_POST['forNomeCompanhia'] . '\', 
                          \'' . $_POST['forNomeContato'] . '\',
                          \'' . $_POST['forTituloContato'] . '\',
                          \'' . $_POST['forEndereco'] . '\',
                          \'' . $_POST['forCidade'] . '\',
                          \'' . $_POST['forRegiao'] . '\',
                          \'' . $_POST['forCep'] . '\',
                          \'' . $_POST['forPais'] . '\',
                          \'' . $_POST['forTelefone'] . '\',
                          \'' . $_POST['forFax'] . '\',
                          \'' . $_POST['forWebsite'] . '\')';
      if (@pg_query($oConexao, $sInsert)) {
            echo 'Fornecedor cadastrado com sucesso!'; 
      } else {
            echo 'Não foi possível inserir o fornecedor. Tente novamente!';
      }
      pg_close($oConexao);
}

function updateFornecedor($iCodigo) {
      $oConexao = conexao();
      $sUpdate = 'UPDATE trabalhofinal.tbfornecedores 
                     SET fornomecompanhia = \'' . $_POST['upForNomeCompanhia'] . '\''. ', 
                         fornomecontato = \'' . $_POST['upForNomeContato']. '\''. ', 
                         fortitulocontato = \'' . $_POST['upForTituloContato']. '\''. ', 
                         forendereco = \'' . $_POST['upForEndereco']. '\''. ', 
                         forcidade = \'' . $_POST['upForCidade']. '\''. ',      
                         forregiao = \'' . $_POST['upForRegiao']. '\''. ', 
                         forcep = \'' . $_POST['upForCep']. '\''. ', 
                         forpais = \'' . $_POST['upForPais']. '\''. ', 
                         fortelefone = \'' . $_POST['upForTelefone']. '\''. ', 
                         forfax = \'' . $_POST['upForFax']. '\''. ', 
                         forwebsite = \'' . $_POST['upForWebsite']
                         .'\' WHERE forcodigo = ' . $iCodigo . '';

      @pg_query($oConexao, $sUpdate);
      pg_close($oConexao);
      header("Location: fornecedores.php");
}

function selectUpdateFornecedor($iCodigo) {
      $oConexao = conexao();
      $sSelect = 'SELECT * FROM trabalhofinal.tbfornecedores WHERE forcodigo = \'' . $iCodigo . '\'';
      $oResultado = pg_query($oConexao, $sSelect);
      $aFornecedor = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aFornecedor, $aResultado);
      }
      pg_close($oConexao);
      return $aFornecedor;
}
