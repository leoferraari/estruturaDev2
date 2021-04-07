<?php

function getCategorias() {
      $oConexao = conexao(); 
      $sSelect = 'SELECT * FROM trabalhofinal.tbcategoria';
      $oResultado = pg_query($oConexao, $sSelect);
      $aCategorias = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aCategorias, $aResultado);
      }
      pg_close($oConexao);
      return $aCategorias;
}

function cabecalhoConsultaCategorias() {
      return ['Código', 'Nome', 'Descrição', 'Deletar', 'Alterar'];
}

function deleteCategoria($iCodigo) {
      $oConexao = conexao();
      $sDelete = 'DELETE FROM trabalhofinal.tbcategoria
                  WHERE catcodigo = (\'' . $iCodigo . '\')';
      if (@pg_query($oConexao, $sDelete)) {
            echo '<br>';
            echo 'Categoria deletada com sucesso!';
            header("Location: index.php?pg=categorias");
      } 

      pg_close($oConexao);
}

function insertCategoria() {
      $oConexao = conexao();
      $sInsert = 'INSERT INTO trabalhofinal.tbcategoria(catnome, catdescricao)
                  VALUES (\'' . $_POST['catNome'] . '\', \'' . $_POST['catDescricao'] . '\')';
      if (@pg_query($oConexao, $sInsert)) {
            echo 'Categoria cadastrada com sucesso!'; 
      } else {
            echo 'Categoria já cadastrada! <br> Tente novamente!';
      }
      pg_close($oConexao);
}

function updateCategoria($iCodigo) {
      $oConexao = conexao();
      $sUpdate = 'UPDATE trabalhofinal.tbcategoria SET catnome = \'' . $_POST['upCatNome'] . '\''
              .  ', catdescricao = \'' . $_POST['upCatDescricao'] . '\' WHERE catcodigo = ' . $iCodigo . '';

      @pg_query($oConexao, $sUpdate);
      pg_close($oConexao);
      header("Location: categorias.php");
}

function selectUpdateCategoria($iCodigo) {
      $oConexao = conexao();
      $sSelect = 'SELECT * FROM trabalhofinal.tbcategoria WHERE catcodigo = \'' . $iCodigo . '\'';
      $oResultado = pg_query($oConexao, $sSelect);
      $aCategorias = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {

            array_push($aCategorias, $aResultado);
      }
      pg_close($oConexao);
      return $aCategorias;
}
