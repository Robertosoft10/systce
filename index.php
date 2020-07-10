<?php
session_start();
include_once 'Persistence/conection.php';
$sql = "SELECT * FROM tb_instituicao";
$consult = mysqli_query($conexao, $sql);
$line = mysqli_fetch_assoc($consult);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SystCE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="shortcut icon"  href="Images/icon/icon.png">
    <link rel="stylesheet" href="Components/plugins/toastr/toastr.min.css">
    <link href="Components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="Components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="Components/css/styles.css" rel="stylesheet">
    <link href="Components/style.css" rel="stylesheet">
  </head>
    <?php
  unset($_SESSION['useremail'],
        $_SESSION['password']);
  ?>
  <body class="login-bg">
	<div class="page-content container">
		<div class="row">
            <div class="conteudo-left">
            <br>
            <small id="logo-index"><i class="fa fa-graduation-cap"></i>SystCE</small><br>
            <small id="nome-logo-index">Sistema Controler Escolar</small>
            <hr>
            <img id="img-index" src="<?= "Images/instituicao/".$line['logo_instituicao'];?>" alt="" class="img-circle img-fluid"><br><br>
            <small id="frase-inst-index"><?= $line['frase_instituicao'];?></small>
            </div>
            <div class="login-form text-center">
            <div class="btn-loign-opcao">
            <br>
               <small id="tipo-user">Que tipo de usuário você é?</small>
            <br>
            <a href="index.php">
           <button class="btn btn-primary btn-sm">Admin</button></a>
            <a href="professor_login.php">
            <button class="btn btn-primary btn-sm">Professor</button></a>
            <a href="estudante_login.php">
            <button class="btn btn-primary btn-sm">Estudante</button></a>
            </div>
            <br>
              <fieldset>
                  <legend>Login Admin</legend>
                  <form action="Persistence/autentic_usuario.php" method="post">
                  <div class="form-group col-md-12 text-left">
                  <div class="col-sm-12">
                      <input type="email" name="useremail" class="form-control" id="inputEmail3" placeholder="E-mail">
				    </div>
				     </div>
                    <div class="form-group col-md-12 text-left">
				    <div class="col-sm-12">
				    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Senha">
				   </div>
                  </div>
                     <div class="form-group col-md-12">
                  <div class="col-sm-12">
                       <button class="btn btn-primary col-md-12">
                        <i class="fa fa-sign-in"></i> Entrar</button>
				    </div>
				     </div>
                  </form>    
                
              </fieldset>  
             <div class="col-sm-12" id="infor-index">Copyright &copy; <?php $data = date('D/M/Y'); echo $data;?>
                SystCE - Sistema Controle Escolar -
                Robertosoft10 Todos os direitos reservados
                </div>
            </div>
		</div>
	</div>
    <script src="Components/jquery/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="Components/jquery/jquery-ui.js"></script>
      <link href="Components/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="Components/bootstrap/js/bootstrap.min.js"></script>

    <script src="Components/vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="Components/vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="Components/js/custom.js"></script>
    <script src="Components/js/tables.js"></script>
    <script src="Components/plugins/jquery/jquery.min.js"></script>
    <script src="Components/plugins/toastr/toastr.min.js"></script>
    <script src="Components/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="Components/javascript/jquery.js"></script>
    <script src="Components/javascript/jquery2.js"></script>
    <script src="Components/javascript/js/bootstrap.min.js"></script>
    <script src="Components/javascript/datatables/js/jquery.dataTables.min.js"></script>
    <script src="Components/javascript/datatables/dataTables.bootstrap.js"></script>
     <link href="Components/javascript/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="Components/javascript/js/custom.js"></script>
    <script src="Components/javascript/js/tables.js"></script>
        
<!-- ===== alert erro =====-->
  <?php if(isset($_SESSION['loginVazio'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['loginVazio'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['loginVazio']); }?>
  <!-- ===== fim alert erro =====-->
             
<!-- ===== alert erro =====-->
  <?php if(isset($_SESSION['loginIncorreto'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['loginIncorreto'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['loginIncorreto']); }?>
  <!-- ===== fim alert erro =====-->
         
<!-- ===== alert erro =====-->
  <?php if(isset($_SESSION['secury'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['secury'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['secury']); }?>
  <!-- ===== fim alert erro =====-->
   <!-- ===== alert insert =====-->
<?php if(isset($_SESSION['novaSenha'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['novaSenha'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['novaSenha']); }?>
  <!-- ===== fim alert insert =====-->
<!-- ===== alert insert =====-->
<?php if(isset($_SESSION['instCadastro'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['instCadastro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['instCadastro']); }?>
  <!-- ===== fim alert insert =====-->
      <!-- ===== alert backup =====-->
<?php if(isset($_SESSION['backupSalvo'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['backupSalvo'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['backupSalvo']); }?>
  <!-- ===== fim alert backup =====-->
           
<!-- ===== alert backup erro =====-->
  <?php if(isset($_SESSION['backupFalhou'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['backupFalhou'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['backupFalhou']); }?>
  <!-- ===== fim alert backup erro =====-->
     
  </body>
</html>