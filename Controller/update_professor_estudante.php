<?php
session_start();
$x = 'Cadastrou professor do(a) estudante';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_prof_estud = $_GET['id_prof_estud'];
$prof = $_POST['prof'];

$sql = "UPDATE tb_professor_estud SET prof='$prof' WHERE id_prof_estud='$id_prof_estud'";
$execute = mysqli_query($conexao, $sql);
if($execute == true) {
    $_SESSION['profEstudAtualiza'] = "Professor(a) do(a) estudante atualizado com sucesso!";
    header('location: ../View/matriculas.php');
}else{
    $_SESSION['profEstudAtualizaErro'] = "Falha pna atualização!";
    header('location: ../View/matriculas.php');
}
?>