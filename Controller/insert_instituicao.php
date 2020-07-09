<?php
session_start();
$x = 'Cadastrou instituição';
include_once  '../Persistence/logs.php';
include_once '../Persistence/instituicao.Crud.php';

if(!empty($_REQUEST['nome_instituicao']) && !empty($_REQUEST['fone1_instituicao']) && !empty($_REQUEST['endereco_instituicao']) && !empty($_REQUEST['direcao_instituicao'])){

$objeto = new Inst();
$objeto->setNome_instituicao($_REQUEST['nome_instituicao']);
$objeto->setFone1_instituicao($_REQUEST['fone1_instituicao']);
$objeto->setFone2_instituicao($_REQUEST['fone2_instituicao']);
$objeto->setEmail_instituicao($_REQUEST['email_instituicao']);
$objeto->setEndereco_instituicao($_REQUEST['endereco_instituicao']);
$objeto->setDirecao_instituicao($_REQUEST['direcao_instituicao']);
$objeto->setLogo_instituicao($_FILES['logo_instituicao']);
$objeto->setFrase_instituicao($_REQUEST['frase_instituicao']);

$crud = new CRUDInst();
$crud->insertInst($objeto);

    $_SESSION['instCadastro'] = "Instituição cadastrada com sucesso!";
    header('location: ../View/instituicao.php');
}else{
     $_SESSION['instErroCadastro'] = "Falha! Preencha todos os campos obrigatórios!";
    header('location: ../View/instituicao.php');
}
?>