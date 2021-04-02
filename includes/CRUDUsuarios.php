<?php

function getUsuarios() {
      $oConexao = conexao(); 
      $sSelect = 'SELECT*FROM trabalhofinal.tbusuarios';
      $oResultado = pg_query($oConexao, $sSelect);
      $aUsuarios = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {                          
            array_push($aUsuarios, $aResultado);
      }
      pg_close($oConexao);
      return $aUsuarios;
}

function usuarioLogin($sEmail, $sSenha) {
      $oConexao = conexao();
      $sSelect = 'select * from trabalhofinal.tbusuarios where usuemail = \''. $sEmail . '\' and ususenha = \''. md5($sSenha) . '\'';
      $oResultado = pg_query($oConexao, $sSelect);
      $aUsuario = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {                     
            array_push($aUsuario, $aResultado);
      }
      pg_close($oConexao);
      return $aUsuario;
}

function cabecalhoConsultaUsuarios() {
      return ['Código', 'E-mail', 'Senha', 'Nome completo', 'Deletar', 'Alterar'];
}



