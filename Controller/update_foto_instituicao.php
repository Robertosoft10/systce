<?php
session_start();
$x = 'Atualizou foto da instoituição';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_inst = $_GET['id_inst'];
$logo_instituicao = $_FILES['logo_instituicao'];
$sql = "SELECT * FROM tb_instituicao WHERE id_inst='$id_inst'";
$consult = mysqli_query($conexao, $sql);
while($result = mysqli_fetch_array($consult)){
	$arquivo_db = $result['logo_instituicao'];
}
unlink("../Images/instituicao/$arquivo_db");

if(isset($_FILES['logo_instituicao'])){
	$extensao = strtolower(substr($_FILES['logo_instituicao']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/instituicao/";
	move_uploaded_file($_FILES['logo_instituicao']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_instituicao SET logo_instituicao='$novo_nome' WHERE id_inst='$id_inst'";
	$update = mysqli_query($conexao, $sql);

if($update == true){
    $_SESSION['fotoInstAtualiza'] = "Logo atualizada com sucesso!";
   header('location: ../View/instituicao.php');
}else{
     $_SESSION['fotoInstErroAtualiza'] = "Falha na atuzalização da logo!";
   header('location: ../View/instituicao.php');
}
}
?>