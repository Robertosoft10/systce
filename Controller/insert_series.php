<?php
session_start();
$x = 'Cadastrou disciplina';
include_once  '../Persistence/logs.php';
include_once '../Persistence/serie.Crud.php';

if(!empty($_REQUEST['nome_serie'])){

$objeto = new Serie();
$objeto->setNome_Serie($_REQUEST['nome_serie']);

$crud = new CRUDSerie();
$crud->insertSerie($objeto);

    $_SESSION['serieSalvo'] = "Série cadastrada com sucesso!";
    header('location: ../View/outro_dados.php');
}else{
     $_SESSION['serieErro'] = "Falha! Preencha todo o campo obrigatórios!";
    header('location: ../View/outro_dados.php');
}
?>