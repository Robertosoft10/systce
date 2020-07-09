<?php
session_start();
$x = 'Recuperou senha de usuário';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

if(!empty($_POST['password'])){
$id_user = $_GET['id_user'];
$password = sha1($_POST['password']);
$sql = "UPDATE tb_usuarios SET password='$password' WHERE id_user='$id_user'";
$execute = mysqli_query($conexao, $sql);

    $_SESSION['novaSenha'] = "Senha atualizada com sucesso!";
    header('location: /../systce/index.php');
}else{
    $_SESSION['novaSenhaErro'] = "Falha da atualização da sua senha!";
    header('location: ../View/recuperarsenha.php');
}
?>