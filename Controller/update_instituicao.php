<?php
session_start();
include_once '../Persistence/instituicao.Crud.php';

if(isset($_GET['id_inst'])){

$objeto = new Inst();
$objeto->setId_inst($_REQUEST['id_inst']);
$objeto->setNome_instituicao($_REQUEST['nome_instituicao']);
$objeto->setFone1_instituicao($_REQUEST['fone1_instituicao']);
$objeto->setFone2_instituicao($_REQUEST['fone2_instituicao']);
$objeto->setEmail_instituicao($_REQUEST['email_instituicao']);
$objeto->setEndereco_instituicao($_REQUEST['endereco_instituicao']);
$objeto->setDirecao_instituicao($_REQUEST['direcao_instituicao']);
$objeto->setFrase_instituicao($_REQUEST['frase_instituicao']);

$crud = new CRUDInst();
$crud->updateInst($objeto);

    $_SESSION['instAtualiza'] = "Dados da instituição atualizado com sucesso!";
    header('location: ../View/instituicao.php');
}else{
     $_SESSION['instErroAtualiza'] = "Falha ao atualizar dados!";
    header('location: ../View/instituicao.php');
}
?>