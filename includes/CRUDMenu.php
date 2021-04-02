<?php

function getCadastrosMenu() {
    $oConexao = conexao(); 
    $sSelect = 'SELECT * FROM trabalhofinal.tbmenu';
    $oResultado = pg_query($oConexao, $sSelect);
    $aCadastro = [];
    while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
          array_push($aCadastro, $aResultado);
    }
    pg_close($oConexao);
    return $aCadastro;
}

function insertRegistroMenu() {
    $oConexao = conexao();

    $sInsert = 'INSERT INTO trabalhofinal.tbmenu(mennome)
                  VALUES (\'' . $_POST['menNome'] . '\')';
    
    return  @pg_query($oConexao, $sInsert);
    
    /*
      if (@pg_query($oConexao, $sInsert)) {
            return 'true';
      } else {
            return 'false';
    }*/
      pg_close($oConexao);
}


