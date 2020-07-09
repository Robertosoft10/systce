<?php
session_start();
$x = 'Atualizou usuário';
include_once  '../Persistence/logs.php';
include_once '../persistence/usuario.Crud.php';

if(isset($_GET['id_user'])){

$objeto = new User();
$objeto->setId_user($_GET['id_user']);
$objeto->setUsername($_REQUEST['username']);
$objeto->setUsernascimento($_REQUEST['usernascimento']);
$objeto->setUseremail($_REQUEST['useremail']);
$objeto->setUsertipo($_REQUEST['usertipo']);
$objeto->setPassword(sha1($_REQUEST['password']));

$crud = new CRUDUser();
$crud->updateUser($objeto);

    $_SESSION['userAtualiza'] = "Dados atualizados com sucesso!";
    header('location: ../View/usuarios.php');
}else{
     $_SESSION['userAtualizaErro'] = "Falha na atualização";
    header('location: ../View/usuarios.php');
}

?>