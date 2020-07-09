
<?php
session_start();
$x = 'Excluiu frequência';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_freq = $_GET['id_freq'];
$sql = "DELETE FROM tb_frequencias  WHERE id_freq='$id_freq'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['chamadaDelete'] = "Chamada deletada sucesso!";
     header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['chamadaDeleteErro'] = "Falha ao excluir chamada ";
     header('location: ../View/matriculas.php');
}

?>
