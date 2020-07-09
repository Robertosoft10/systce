<?php
session_start();
$x = 'Excluiu disciplina do(a) professor(a)';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
$id_discip_pf = $_GET['id_discip_pf'];
$sql = "DELETE FROM tb_disciplina_prof  WHERE id_discip_pf='$id_discip_pf'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['discipProfDelete'] = "Disciplina do(a) professor(a) excluida com sucesso!";
     header('location: ../View/professor_list.php');
    
}else{
    $_SESSION['discipProfDeleteErro'] = "Falha ao excluir disciplina do(a) professor(a) ";
     header('location: ../View/professor_list.php');
}
?>
