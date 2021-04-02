<?php
require_once('autoload.php');
require_once 'includes/estrutura.php';
require_once 'includes/CRUDUsuarios.php';

function getPageLogin() {
      return new Body([getFormulario()]);
}

function getFormulario() {
      $aFields = [
            getInputEmail(),
            getInputPassword(),
            getSubmit()
      ];

      return  new Form(['method' => 'POST', 'name' => 'login'],  $aFields);
}

function getInputEmail() {
      return new Input([
            'type'=> 'email', 
            'maxlength' => '60', '
            placeholder' => 'Digite seu e-mail', 
            'name' => 'useremail', 
            'id' => 'useremail'
      ]);
}

function getInputPassword() {
      return new Input([
            'type' => 'password',
            'maxlength' => '20',
            'placeholder' => 'Digite sua senha',
            'name' => 'password',
            'id' => 'password'
      ]);
}

function getSubmit() {
      return new Input([
            'type' => 'submit',
            'value' => 'Entrar'      
      ]);
}

if (isset($_POST['useremail']) && !empty($_POST['useremail']) && isset($_POST['password']) && !empty($_POST['password'])) {
      $sEmail = $_POST['useremail'];
      $sSenha = $_POST['password'];

      $aUsuarios = usuarioLogin($sEmail, $sSenha);
      
     if (!empty($aUsuarios)) {
            if ($aUsuarios[0][1] === $sEmail && $aUsuarios[0][2] === md5($sSenha)) {                         
                  session_start();
                  $_SESSION['usucodigo'] = $aUsuarios[0][0];
                  $_SESSION['usunome'] = $aUsuarios[0][1];
                  header("Location: home.php");
            }
      } else {
            echo '<br>';
            echo 'Usuário não encontrado';
      }
} 
       
?>


