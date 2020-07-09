<?php
session_start();
$x = 'Cadastrou disciplina';
include_once  '../Persistence/logs.php';
include_once '../Persistence/disciplina.Crud.php';

if(!empty($_REQUEST['nome_discip'])){

$objeto = new Discip();
$objeto->setNome_discip($_REQUEST['nome_discip']);
$objeto->setHora_discip($_REQUEST['hora_discip']);

$crud = new CRUDDiscip();
$crud->insertDiscip($objeto);

    $_SESSION['disciSalvo'] = "Disciplina cadastrada com sucesso!";
    header('location: ../View/disciplinas.php');
}else{
     $_SESSION['disciErro'] = "Falha! Preencha todos os campos obrigatórios!";
    header('location: ../View/disciplinas.php');
}
?>