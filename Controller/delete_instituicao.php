<?php
session_start();
$x = 'Excluiu instituição';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
if(isset($_GET['id_inst'])){
$id_inst = $_GET['id_inst'];
$sql = "SELECT logo_instituicao FROM tb_instituicao";
$consult = mysqli_query($conexao, $sql);
$result  = mysqli_fetch_assoc($consult);

    if(is_file('../Images/instituicao/'.$result['logo_instituicao'])){
      $sql_img = unlink('../Images/instituicao/'.$result['logo_instituicao']);
      if($sql_img){
        @$sql = "DELETE FROM tb_instituicao WHERE logo_instituicao = '$logo_instituicao'";
        $execute = mysqli_query($conexao, $sql);
      }
    }

  include_once '../Persistence/instituicao.Crud.php';
  $crud = new CRUDInst();
  $crud->deleteInst($_REQUEST['id_inst']);

    $_SESSION['instaDelete'] = "instituição excluida com sucesso!";
    header('location: ../View/instituicao.php');
}else{
     $_SESSION['instaErroDelete'] = "Falha ao excluir dados da instituição!";
    header('location: ../View/instituicao.php');
}
?>