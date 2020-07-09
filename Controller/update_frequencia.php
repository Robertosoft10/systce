
<?php
session_start();
include_once '../Persistence/conection.php';
$id_freq = $_GET['id_freq'];
$dia_freq = $_POST['dia_freq'];
$data_freq = $_POST['data_freq'];
$status_freq = $_POST['status_freq'];

$sql = "UPDATE tb_frequencias SET  dia_freq='$dia_freq', data_freq='$data_freq', status_freq='$status_freq' WHERE id_freq='$id_freq'";
$execute = mysqli_query($conexao, $sql);

if($execute == true){
    $_SESSION['chamadaUpdate'] = "Dados da chamada atualizdos com sucesso!";
    header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['chamdaUpdateErro'] = "Falha ao atualizar chamada";
     header('location: ../View/matriculas.php');
}

?>
