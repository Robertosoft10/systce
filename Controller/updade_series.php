<?php
session_start();
$x = 'Atualizou disciplina';
include_once  '../Persistence/logs.php';
include_once '../Persistence/serie.Crud.php';

if(isset($_GET['id_serie'])){
$objeto = new Serie();
$objeto->setId_serie($_GET['id_serie']);
$objeto->setNome_serie($_REQUEST['nome_serie']);

$crud = new CRUDSerie();
$crud->updateSerie($objeto);
    $_SESSION['serieAtualiza'] = "Série atualizada com sucesso!";
    header('location: ../View/outro_dados.php');
}else{
     $_SESSION['serieAtualizaErro'] = "Falha! ao atualizar disciplina!";
    header('location: ../View/outro_dados.php');
}

?>