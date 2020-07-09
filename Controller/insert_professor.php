<?php
session_start();
$x = 'Cadastrou professor(a)';
include_once  '../Persistence/logs.php';
include_once '../Persistence/professor.Crud.php';

if(!empty($_REQUEST['nome_prof']) && !empty($_REQUEST['fone_prof']) && !empty($_REQUEST['email_prof']) && !empty($_REQUEST['password']) && !empty($_REQUEST['endereco_prof'])){

$objeto = new Prof();
$objeto->setNome_prof($_REQUEST['nome_prof']);
$objeto->setFone_prof($_REQUEST['fone_prof']);
$objeto->setEmail_prof($_REQUEST['email_prof']);
$objeto->setPassword(sha1($_REQUEST['password']));
$objeto->setEndereco_prof($_REQUEST['endereco_prof']);
$objeto->setFoto_prof($_FILES['foto_prof']);

$crud = new CRUDProf();
$crud->insertProf($objeto);

    $_SESSION['profCadastro'] = "Professor cadastrado com sucesso!";
    header('location: ../View/professor_cad.php');
}else{
     $_SESSION['profErroCadastro'] = "Falha! Preencha todos os campos obrigatórios!";
    header('location: ../View/professor_cad.php');
}
?>