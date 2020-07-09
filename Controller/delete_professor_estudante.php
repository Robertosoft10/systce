
<?php
session_start();
$x = 'Excluiu professor do(a) estudante';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
$id_prof_estud = $_GET['id_prof_estud'];
$sql = "DELETE FROM tb_professor_estud  WHERE id_prof_estud='$id_prof_estud'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['profEstuDelete'] = "Professor do(a) estudante excluido(a) com sucesso!";
     header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['profEstuDeleteErro'] = "Falha ao excluir professor do(a) estudante ";
     header('location: ../View/matriculas.php');
}
?>
