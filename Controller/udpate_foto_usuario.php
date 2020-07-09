<?php
session_start();
$x = 'Atualizou foto do usuário';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';

$id_user = $_GET['id_user'];
$user_foto = $_FILES['user_foto'];
$sql = "SELECT * FROM tb_usuarios WHERE id_user='$id_user'";
$consult = mysqli_query($conexao, $sql);
while($result = mysqli_fetch_array($consult)){
	$arquivo_db = $result['user_foto'];
}
unlink("../Images/usuario/$arquivo_db");

if(isset($_FILES['user_foto'])){
	$extensao = strtolower(substr($_FILES['user_foto']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/usuario/";
	move_uploaded_file($_FILES['user_foto']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_usuarios SET user_foto='$novo_nome' WHERE id_user='$id_user'";
	$update = mysqli_query($conexao, $sql);

if($update == true){
    $_SESSION['fotoInstAtualiza'] = "Foto atualizada com sucesso!";
   header('location: ../View/usuarios.php');
}else{
     $_SESSION['fotoInstErroAtualiza'] = "Falha na atuzalização da foto!";
   header('location: ../View/usuarios.php');
}
}
?>