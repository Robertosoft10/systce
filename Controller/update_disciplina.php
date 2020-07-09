<?php
session_start();
$x = 'Atualizou disciplina';
include_once  '../Persistence/logs.php';
include_once '../Persistence/disciplina.Crud.php';

if(isset($_GET['id_discip'])){

$objeto = new Discip();
$objeto->setId_discip($_GET['id_discip']);
$objeto->setNome_discip($_REQUEST['nome_discip']);
$objeto->setHora_discip($_REQUEST['hora_discip']);

$crud = new CRUDDiscip();
$crud->updateDiscip($objeto);

    $_SESSION['discipAtualiza'] = "Dados atualizados com sucesso!";
    header('location: ../View/disciplinas.php');
}else{
     $_SESSION['discipErroAtualiza'] = "Falha na atualização dos dados";
    header('location: ../View/disciplinas.php');
}
?>