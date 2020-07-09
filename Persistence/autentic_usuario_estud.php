<?php
session_start();
$x = 'Acessou o sistema';
include_once  'logs.php';
include_once 'conection.php';
$codigo_estud = sha1($_POST['codigo_estud']);

if (empty($codigo_estud))
{
  $_SESSION['loginEstudVazio'] = "Informe código de acesso";
  header('location: /../systce/estudante_login.php');
  exit;
}

$verifcar = "SELECT * FROM tb_matriculas WHERE codigo_estud='$codigo_estud' LIMIT 1";
$executa = $conexao->query($verifcar);
$resultado = $executa->fetch_assoc();

if(empty($resultado)) {
  $_SESSION['loginEstudIncorreto'] = "Código de acesso inválido!";
 header('location: /../systce/estudante_login.php');
}else{
    $_SESSION['id_matric'] = $resultado['id_matric'];
  header('location: ../View/estudante_page.php');
}
 ?>