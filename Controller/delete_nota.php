
<?php
session_start();
$x = 'Excluiu nota';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_nota = $_GET['id_nota'];
$sql = "DELETE FROM  tb_notas_estudante  WHERE id_nota='$id_nota'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['notaDelete'] = "Nota excluida sucesso!";
     header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['notaDeleteErro'] = "Falha ao excluir nota ";
     header('location: ../View/matriculas.php');
}

?>
