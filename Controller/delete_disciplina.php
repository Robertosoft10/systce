<?php
session_start();
$x = 'Excluiu disciplina';
include_once  '../Persistence/logs.php';
  include_once '../Persistence/disciplina.Crud.php';
  if(isset($_GET['id_discip'])){
  $crud = new CRUDDiscip();
  $crud->deleteDiscip($_REQUEST['id_discip']);

    $_SESSION['discipDelete'] = "Disciplina excluida com sucesso!";
    header('location: ../View/disciplinas.php');
}else{
     $_SESSION['discipErroDelete'] = "Falha ao excluir disciplina!";
    header('location: ../View/disciplinas.php');
}
?>