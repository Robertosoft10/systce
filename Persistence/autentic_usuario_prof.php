<?php
session_start();
$x = 'Acessou o sistema';
include_once  'logs.php';
include_once 'conection.php';

$email_prof = $_POST['email_prof'];
$password = $_POST['password'];
$descrypt = sha1($password);

if (empty($email_prof) || empty($password))
{
  $_SESSION['loginProfVazio'] = "Informe o usuário e a senha";
  header('location: /../systce/professor_login.php');
  exit;
}

$sql = "SELECT * FROM tb_professores WHERE email_prof='$email_prof' AND password='$descrypt' LIMIT 1";
$executa = $conexao->query($sql);
$result = $executa->fetch_assoc();

if(empty($result)) {
  $_SESSION['loginProfIncorreto'] = "Usuário  ou senha invalidos!";
    header('location: /../systce/professor_login.php');
}else{

  $_SESSION['id_prof'] = $result['id_prof'];
  $_SESSION['nome_prof'] = $result['nome_prof'];
  $_SESSION['email_prof'] = $result['email_prof'];
  $_SESSION['password'] = $result['password'];
  $_SESSION['usertipo'] = $result['usertipo'];
  header('location: ../View/administrativo.php');
}
 ?>