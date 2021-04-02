<?php

function getProdutos() {
      $oConexao = conexao(); 
      $sSelect = 'SELECT * FROM trabalhofinal.tbprodutos';
      $oResultado = pg_query($oConexao, $sSelect);
      $aProdutos = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aProdutos, $aResultado);
      }
      pg_close($oConexao);
      return $aProdutos;
}

function getCabecalhoConsultaProdutos() {
      return ['Código', 'Nome',  'Quantidade UND' ,'Preço Unitário', 'Unidade em Estoque',
              'Unidade em Ordem', 'Nível Reposição', 'Descontinuado', 'Categoria', 'Fornecedor', 'Deletar', 'Alterar'];
}

function deleteProduto($iCodigo) {
      $oConexao = conexao();
      $sDelete = 'DELETE FROM trabalhofinal.tbprodutos
                  WHERE procodigo = (\'' . $iCodigo . '\')';
      if (@pg_query($oConexao, $sDelete)) {
            echo '<br>';
            echo 'Produto deletado com sucesso!';
      } 
      pg_close($oConexao);
}

function insertProduto() {
      $oConexao = conexao();
      $sInsert = 'INSERT INTO trabalhofinal.tbprodutos(pronome, proqtdunidade, proprecounitario,
                                                           proundestoque, proundemordem, pronivelreposicao, prodescontinuado, 
                                                           catcodigo, forcodigo)
                  VALUES (\'' . $_POST['proNomeProduto'] . '\', 
                          \'' . $_POST['proQtdUnidade'] . '\',
                          \'' . $_POST['proPrecoUnitario'] . '\',
                          \'' . $_POST['proUndEstoque'] . '\',
                          \'' . $_POST['proUndEmOrdem'] . '\',
                          \'' . $_POST['proNivelReposicao'] . '\',
                          \'' . ((bool)$_POST['proDescontinuado'] == 1 ?: 0) . '\',
                          \'' . $_POST['catCodigo'] . '\',
                          \'' . $_POST['forCodigo'] . '\')';
      if (@pg_query($oConexao, $sInsert)) {
            echo 'Produto cadastrado com sucesso!'; 
      } else {
            echo '<br>';
            echo $sInsert;
            echo 'Não foi possível inserir o produto. Tente novamente!';
      }
      pg_close($oConexao);
}

function updateProduto($iCodigo) {
      $oConexao = conexao();
      $sUpdate = 'UPDATE trabalhofinal.tbprodutos 
                     SET pronome = \'' . $_POST['upProNomeProduto'] . '\''. ', 
                         proqtdunidade = \'' . $_POST['upProQtdUnidade']. '\''. ', 
                         proprecounitario = \'' . $_POST['upProPrecoUnitario']. '\''. ', 
                         proundestoque = \'' . $_POST['upProUndEstoque']. '\''. ', 
                         proundemordem = \'' . $_POST['upProUndEmOrdem']. '\''. ',      
                         pronivelreposicao = \'' . $_POST['upProNivelReposicao']. '\''. ', 
                         prodescontinuado = \'' . ((bool)$_POST['upProDescontinuado'] == 1 ?: 0). '\''. ', 
                         catcodigo = \'' . $_POST['upCatCodigo']. '\''. ', 
                         forcodigo = \'' . $_POST['upForCodigo']
                         .'\' WHERE procodigo = ' . $iCodigo . '';

      @pg_query($oConexao, $sUpdate);
      pg_close($oConexao);
      header("Location: produtos.php");
}

function selectUpdateProduto($iCodigo) {
      $oConexao = conexao();
      $sSelect = 'SELECT * FROM trabalhofinal.tbprodutos WHERE procodigo = \'' . $iCodigo . '\'';
      $oResultado = pg_query($oConexao, $sSelect);
      $aProdutos = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aProdutos, $aResultado);
      }
      pg_close($oConexao);
      return $aProdutos;
}
