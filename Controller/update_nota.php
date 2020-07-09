
<?php
session_start();
$x = 'Atualizou nota';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
$id_nota = $_GET['id_nota'];
$disciplina_nota = $_POST['disciplina_nota'];
$bimestre_nota = $_POST['bimestre_nota'];
$nota = $_POST['nota'];
$anotacao = $_POST['anotacao'];

$sql = "UPDATE  tb_notas_estudante SET  disciplina_nota='$disciplina_nota', bimestre_nota='$bimestre_nota', nota='$nota', anotacao='$anotacao' WHERE id_nota='$id_nota'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['notaAtualizada'] = "Dados da nota atualizado com sucesso!";
     header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['notaAtualizadaErro'] = "Falha ao atualizar dos dados";
     header('location: ../View/matriculas.php');
}
?>