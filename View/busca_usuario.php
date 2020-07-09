<?php
session_start();
include_once '../Persistence/conection.php';

$useremail = $_POST['useremail'];
$usernascimento = $_POST['usernascimento'];
if (empty($useremail) || empty($usernascimento ))
{
$_SESSION['userEncontradoVazio'] = "Informe os dados do usuário";
    header('location: recuperarsenha.php');
  exit;
}

$sql = "SELECT * FROM tb_usuarios WHERE useremail='$useremail' AND usernascimento='$usernascimento' LIMIT 1";
$consult = mysqli_query($conexao, $sql);
$num_rows = mysqli_num_rows($consult);
if($num_rows=='1'){
	while($Row_email = mysqli_fetch_array($consult)){
        $rowid    = $Row_email['id_user'];
        $rowenome = $Row_email['username'];
		$rowemail = $Row_email['useremail'];
        $rowusertipo    = $Row_email['usertipo'];
		$rowsenha = $Row_email['password'];
		}
		
//enviar um email para variavel email juntamente com a variável senha;
$mensage ="Você solicitou a recuperação de senha confira seu dados.";
@$mensage_id = $rowid;
@$mensage_nome = $rowenome;
@$mensage_email = $rowemail;
@$mensage_senha = $rowsenha;
$_SESSION['userEncontrado'] = "Usuário encontrado";

}else{
    $_SESSION['userEncontradoErro'] = "Usuário não encontrado no sistema";
    header('location: recuperarsenha.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SystCE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="shortcut icon"  href="../Images/icon/icon.png">
    <link rel="stylesheet" href="../Components/plugins/toastr/toastr.min.css">
    <link href="../Components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../Components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../Components/css/styles.css" rel="stylesheet">
    <link href="../Components/style.css" rel="stylesheet">
  </head>
  <body class="login-bg">
	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6><i class="fa fa-graduation-cap"></i><br>SystCE<br> <small>Sistema  Controle Escolar</small> </h6>
			                <div class="social">
                            <?php if($rowusertipo == 2){?>
                            <div class="alert alert-success" role="alert">
                                  <?= $mensage;?>
                            </div>
                            <div class="alert alert-danger" role="alert">
                                 ATENÇÃO!<br> Você não pode recuperar senha, pois não é usuário administrador, entre em contato com o adminidtrador
                            </div>
                            <input class="form-control" value="<?= $mensage_nome;?>" type="text" disabled type="text"><br>
                            <input class="form-control" value="<?= $mensage_email;?>" type="text" disabled><br>
                            <a href="/../systce/index.php">
                            <button class="btn btn-primary col-md-12">Ok</button></a><br>
                            <?php }elseif($rowusertipo == 1){?>
                          <form action="../Controller/new_senha.php?id_user=<?= $mensage_id;?>" method="post" class="text-left">
                            <input class="form-control" value="<?= $mensage_nome;?>" type="text" disabled type="text"><br>
                            <input class="form-control" value="<?= $mensage_email;?>" type="text" disabled><br>
                           Senha Criptografada:
			                <input class="form-control" type="text" value="<?= $mensage_senha;?>" type="text" disabled><br>
                               Digite sua nova senha:
			                <input class="form-control" name="password" type="password"><br>
                            <button class="btn btn-primary col-md-12">Salvar</button><br> 
                              </form>
			            </div>
                         <?php } ?>
                    </div>
			    </div>
			</div>
		</div>
	</div>
    <footer>
         <div class="container">
            <div class="copy text-center" id="foter-login">
              
            </div>
            
         </div>
      </footer>
        
    <script src="../Components/jquery/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="../Components/jquery/jquery-ui.js"></script>
      <link href="../Components/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="../Components/bootstrap/js/bootstrap.min.js"></script>

    <script src="../Components/vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="../Components/vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="../Components/js/custom.js"></script>
    <script src="../Components/js/tables.js"></script>
    <script src="../Components/plugins/jquery/jquery.min.js"></script>
    <script src="../Components/plugins/toastr/toastr.min.js"></script>
    <script src="../Components/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="../Components/javascript/jquery.js"></script>
    <script src="../Components/javascript/jquery2.js"></script>
    <script src="../Components/javascript/js/bootstrap.min.js"></script>
    <script src="../Components/javascript/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../Components/javascript/datatables/dataTables.bootstrap.js"></script>
     <link href="../Components/javascript/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="../Components/javascript/js/custom.js"></script>
    <script src="../Components/javascript/js/tables.js"></script>
     <!-- ===== alert insert =====-->
<?php if(isset($_SESSION['userEncontrado'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['userEncontrado'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userEncontrado']); }?>
  <!-- ===== fim alert insert =====-->
  </body>
</html>