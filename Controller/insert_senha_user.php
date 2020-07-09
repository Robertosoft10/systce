<?php
session_start();
$x = 'Cadastrou usuário inícial';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
$usernascimento = $_POST['usernascimento'];
$password = sha1($_POST['password']);

$sql = "INSERT INTO tb_usuarios(usernascimento, useremail, usertipo, password)VALUES('$usernascimento', 'admin@hotmail.com.br', 1, '$password')";
$insert = mysqli_query($conexao, $sql);
if(insert == true){
    $_SESSION['cadastroOK'] = "SENHA CADASTRADA! CASO NÃO QUEIRA CADASTRAR A INSTITUIÇÃO AGORA VOCÊ FAZER APÓS ACESSAR O SISTEMA ";
    header('location: instituicao.php');
}
?>