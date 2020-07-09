
<?php
session_start();
$x = 'Atualizou disciplina do(a) estudante';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
$id_discip_estud = $_GET['id_discip_estud'];
$disciplina_cod= $_POST['disciplina_cod'];

$sql = "UPDATE  tb_disciplina_estud SET disciplina_cod='$disciplina_cod' WHERE id_discip_estud='$id_discip_estud'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['discipEstudUpdate'] = "Disciplina do(a) estudante atualizda com sucesso!";
     header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['discipEstudUpdateErro'] = "Falha ao atualizar disciplina do(a) estudante";
     header('location: ../View/matriculas.php');
}
?>