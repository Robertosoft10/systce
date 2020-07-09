<?php
session_start();
$x = 'Atualizou  professor(a)';
include_once  '../Persistence/logs.php';
include_once '../Persistence/professor.Crud.php';

if(isset($_GET['id_prof'])){

$objeto = new Prof();
$objeto->setId_prof($_GET['id_prof']);
$objeto->setNome_prof($_REQUEST['nome_prof']);
$objeto->setFone_prof($_REQUEST['fone_prof']);
$objeto->setEmail_prof($_REQUEST['email_prof']);
$objeto->setPassword(sha1($_REQUEST['password']));
$objeto->setEndereco_prof($_REQUEST['endereco_prof']);

$crud = new CRUDProf();
$crud->updateProf($objeto);

    $_SESSION['profAtualiza'] = "Dados atualizados com sucesso!";
    header('location: ../View/professor_list.php');
}else{
     $_SESSION['profErroAtualiza'] = "Falha na atualização dos dados";
    header('location: ../View/professor_list.php');
}
?>