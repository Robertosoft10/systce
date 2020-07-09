<?php
session_start();
$x = 'Atualizou foto do(a) estudante';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_estud = $_GET['id_estud'];
$foto_estud = $_FILES['foto_estud'];
$sql = "SELECT * FROM tb_estudantes WHERE id_estud='$id_estud'";
$consult = mysqli_query($conexao, $sql);
while($result = mysqli_fetch_array($consult)){
	$arquivo_db = $result['foto_estud'];
}
unlink("../Images/estudante/$arquivo_db");

if(isset($_FILES['foto_estud'])){
	$extensao = strtolower(substr($_FILES['foto_estud']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/estudante/";
	move_uploaded_file($_FILES['foto_estud']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_estudantes SET foto_estud='$novo_nome' WHERE id_estud='$id_estud'";
	$update = mysqli_query($conexao, $sql);

if($update == true){
    $_SESSION['estudAtualiza'] = "Foto atualizada com sucesso!";
    header('location: ../View/estudante_list.php');
}else{
     $_SESSION['estudErroAtualiza'] = "Falha na atuzalização da foto!";
    header('location: ../View/estudante_list.php');
}
}
?>