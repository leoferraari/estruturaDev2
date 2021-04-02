<?php

function insertUsuarioLogin() {
      $oConexao = conexao();

      $sInsert = 'INSERT INTO sistemaconsultas.tbusuario(usunome, ususobrenome, usuemail, ususenha, usudatanasc)
                  VALUES (\'' . $_POST['nomeUsuario'] . '\',
                  \'' . $_POST['sobrenomeUsuario'] . '\',
                  \'' . $_POST['emailUsuario'] . '\',
                  \'' . md5($_POST['passwordUsuario']) . '\',
                  \'' . $_POST['datanascUsuario'] . '\')';

      if (@pg_query($oConexao, $sInsert)) {
            return 'true';
      } else {
            return 'false';
      }
      pg_close($oConexao);
}

function buscaUltimoUsuario() {
      $oConexao = conexao();
      $sSelect = 'select max(usucodigo) from sistemaconsultas.tbusuario';
      $oResultado = pg_query($oConexao, $sSelect);
      $aUltimoUsuario = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aUltimoUsuario, $aResultado);
      }
      pg_close($oConexao);
      return $aUltimoUsuario;
}

function insertTelefones($sFixo, $sCelular, $iCodigo) {
      $oConexao = conexao();

      $sInsert1 = 'INSERT INTO sistemaconsultas.tbusuariocontato(ctunumero, usucodigo, ctudescricao)
                  VALUES (\'' . $_POST['telefonefixoUsuario'] . '\',
                  \'' . $iCodigo . '\',
                  \'' . $sFixo . '\')';

      $sInsert2 = 'INSERT INTO sistemaconsultas.tbusuariocontato(ctunumero, usucodigo, ctudescricao)
                  VALUES (\'' . $_POST['telefonecelUsuario'] . '\',
                  \'' . $iCodigo . '\',
                  \'' . $sCelular . '\')';
      pg_close($oConexao);
}

function insertConvenioUsuarioCad($iCodigo, $value) {
      $oConexao = conexao();

      $sInsert = 'INSERT INTO sistemaconsultas.tbconveniousuario(cvncodigo, usucodigo)
                  VALUES (\'' . $value . '\',
                  \'' . $iCodigo . '\')';
      pg_query($oConexao, $sInsert);
      pg_close($oConexao);
}
