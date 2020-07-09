<?php
session_start();
$x = 'Excluiu serie';
include_once  '../Persistence/logs.php';
  include_once '../Persistence/serie.Crud.php';
  if(isset($_GET['id_serie'])){
  $crud = new CRUDSerie();
  $crud->deleteSerie($_REQUEST['id_serie']);

    $_SESSION['serieDelete'] = "Série excluida com sucesso!";
    header('location: ../View/outro_dados.php');
}else{
     $_SESSION['serieErroDelete'] = "Falha ao excluir série!";
    header('location: ../View/outro_dados.php');
}
?>