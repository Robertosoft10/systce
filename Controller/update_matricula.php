
<?php
session_start();
$x = 'Atualizou professor do(a) estudante';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_matric= $_GET['id_matric'];
$estud_cod = $_POST['estud_cod'];
$serie_estud = $_POST['serie_estud'];
$turno_estud = $_POST['turno_estud'];
$codigo_estud = sha1($_POST['codigo_estud']);

$sql = "UPDATE tb_matriculas SET estud_cod='$estud_cod', serie_estud='$serie_estud', turno_estud='$turno_estud', codigo_estud='$codigo_estud' WHERE id_matric='$id_matric'";
$execute = mysqli_query($conexao, $sql);
if($execute){
    $_SESSION['matricAtualiza'] = "Dados da matrícula atualizada com sucesso!";
    header('location: ../View/matriculas.php');
}else{
    $_SESSION['matricAtualizaErro'] = "Falha ao atualizar dados da matricula!";
    header('location: ../View/matriculas.php');
}
?>