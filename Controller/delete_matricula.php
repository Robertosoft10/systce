
<?php
session_start();
$x = 'Deletou matrícula';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_matric = $_GET['id_matric'];
$sql = "DELETE FROM tb_matriculas, tb_frequencias, tb_notas_estudante
    USING tb_matriculas
    INNER JOIN tb_frequencias INNER JOIN tb_notas_estudante
    WHERE tb_matriculas.id_matric = tb_frequencias.matricula
    AND tb_matriculas.id_matric = tb_notas_estudante.matricula_nota
    AND tb_notas_estudante.matricula_nota = '$id_matric'";
$execute = mysqli_query($conexao, $sql);

if($execute){
    $_SESSION['matricDelete'] = "Matrícula excluida com sucesso!";
    header('location: ../View/matriculas.php');
}else{
    $_SESSION['matricDeleteErro'] = "Falha ao excluir matrícula!";
    header('location: ../View/matriculas.php');
}

?>