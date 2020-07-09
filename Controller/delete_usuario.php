<?php
session_start();
$x = 'Excluiu usuário';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
if(isset($_GET['id_user'])){
$id_user = $_GET['id_user'];
$sql = "SELECT user_foto FROM tb_usuarios";
$consult = mysqli_query($conexao, $sql);
$result  = mysqli_fetch_assoc($consult);

    if(is_file('../Images/usuario/'.$result['user_foto'])){
      $sql_img = unlink('../Images/usuario/'.$result['user_foto']);
      if($sql_img){
        @$sql = "DELETE FROM tb_usuarios WHERE user_foto = '$foto_prof'";
        $execute = mysqli_query($conexao, $sql);
      }
    }

  include_once '../Persistence/usuario.Crud.php';
  $crud = new CRUDUser();
  $crud->deleteUser($_REQUEST['id_user']);

  $_SESSION['userDelete'] = "Usuário excluido com sucesso!";
  header('location: ../View/usuarios.php');
}else{
   $_SESSION['userDeleteErro'] = "Falha ao excluir usuário";
  header('location: ../View/usuarios.php');
}
?>