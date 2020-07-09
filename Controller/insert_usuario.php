<?php
session_start();
$x = 'Cadastrou usuário';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
$useremail = $_POST['useremail'];
$sql = "SELECT * FROM tb_usuarios WHERE useremail='$useremail'";
$consult = mysqli_query($conexao, $sql);
$result = mysqli_num_rows($consult);
if($result > 0){
    $_SESSION['userErro'] = "Ops! E-mail já se econtra cadastrado";
    header('location: ../View/usuarios.php');
}else{
include_once '../Persistence/usuario.Crud.php';
$objeto = new User();
$objeto->setUsername($_REQUEST['username']);
$objeto->setUsernascimento($_REQUEST['usernascimento']);
$objeto->setUseremail($_REQUEST['useremail']);
$objeto->setUsertipo($_REQUEST['usertipo']);
$objeto->setPassword(sha1($_REQUEST['password']));
$objeto->setUser_foto($_FILES['user_foto']);

$crud = new CRUDUser();
$crud->insertUser($objeto);

    $_SESSION['userSalvo'] = "Usuário cadastrado com sucesso!";
    header('location: ../View/usuarios.php');
}
?>