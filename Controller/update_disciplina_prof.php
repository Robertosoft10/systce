<?php
$x = 'Atualizou disciplina do(a) professor(a)';
include_once  '../Persistence/logs.php';
session_start();
include_once '../Persistence/conection.php';
$id_discip_pf = $_GET['id_discip_pf'];
$discip_id = $_POST['discip_id'];
$turno_prof = $_POST['turno_prof'];

$sql = "UPDATE tb_disciplina_prof SET discip_id='$discip_id', turno_prof='$turno_prof' WHERE id_discip_pf='$id_discip_pf'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['discipuUpdateOK'] = "Disciplina do(a) perofessor atualizada com sucesso!";
    header('location: ../View/professor_list.php');

}else{
     $_SESSION['discipUpadateErro'] = "Falha ao atualizar disciplina!";
    header('location: ../View/professor_list.php');
}
?>