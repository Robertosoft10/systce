<?php
session_start();
$x = 'Acessou o sistema';
include_once  'logs.php';
include_once 'conection.php';

$useremail = $_POST['useremail'];
$password = $_POST['password'];
$descrypt = sha1($password);

if (empty($useremail) || empty($password))
{
  $_SESSION['loginVazio'] = "Informe o usuário e a senha";
  header('location: /../systce/index.php');
  exit;
}

$sql = "SELECT * FROM tb_usuarios WHERE useremail='$useremail' AND password='$descrypt' LIMIT 1";
$executa = $conexao->query($sql);
$result = $executa->fetch_assoc();
if(empty($result)) {
  $_SESSION['loginIncorreto'] = "Usuário  ou senha invalidos!";
  header('location: /../systce/index.php');
}else{

  $_SESSION['id_user'] = $result['id_user'];
  $_SESSION['username'] = $result['username'];
  $_SESSION['useremail'] = $result['useremail'];
  $_SESSION['password'] = $result['password'];
  $_SESSION['usertipo'] = $result['usertipo'];
  header('location: ../View/administrativo.php');
}
 ?>