<?php
session_start();
$x = 'Atualizou foto do(a) professor(a)';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_prof = $_GET['id_prof'];
$foto_prof = $_FILES['foto_prof'];
$sql = "SELECT * FROM tb_professores WHERE id_prof='$id_prof'";
$consult = mysqli_query($conexao, $sql);
while($result = mysqli_fetch_array($consult)){
	$arquivo_db = $result['foto_prof'];
}
unlink("../Images/professor/$arquivo_db");

if(isset($_FILES['foto_prof'])){
	$extensao = strtolower(substr($_FILES['foto_prof']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/professor/";
	move_uploaded_file($_FILES['foto_prof']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_professores SET foto_prof='$novo_nome' WHERE id_prof='$id_prof'";
	$update = mysqli_query($conexao, $sql);

if($update == true){
    $_SESSION['fotoProfAtualiza'] = "Foto atualizada com sucesso!";
   header('location: ../View/professor_list.php');
}else{
     $_SESSION['fotoProfErroAtualiza'] = "Falha na atuzalização da foto!";
   header('location: ../View/professor_list.php');
}
}
?>