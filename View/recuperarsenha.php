<?php
session_start();
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
                                recuperar senha
	                        </div>
                          <form action="busca_usuario.php" method="post" class="text-left">
			                Usuário:
                            <input class="form-control" name="nome" type="text"><br>
                            E-mail:
                            <input class="form-control" name="useremail" type="text"><br>
                            Nascimento:
			                <input class="form-control" name="usernascimento" type="date"><br>
                            <button class="btn btn-primary col-md-12">Próximo</button><br> 
                              </form>
			            </div>
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
        
<!-- ===== alert erro =====-->
  <?php if(isset($_SESSION['userEncontradoVazio'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['userEncontradoVazio'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userEncontradoVazio']); }?>
  <!-- ===== fim alert erro =====-->
             
<!-- ===== alert erro =====-->
  <?php if(isset($_SESSION['userEncontradoErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['userEncontradoErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userEncontradoErro']); }?>
  <!-- ===== fim alert erro =====-->
                 
<!-- ===== alert erro =====-->
  <?php if(isset($_SESSION['novaSenhaErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['novaSenhaErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['novaSenhaErro']); }?>
  <!-- ===== fim alert erro =====-->
    
  </body>
</html>