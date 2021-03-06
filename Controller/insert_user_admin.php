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
                                Cadastro de Usuário Administrador<hr>
	                        </div>
                          <form action="../Controller/insert_senha_user.php" method="post"><br>
                              ANOTE ESTE E-MAIL
                              <small id="nome-config">admin@hotmail.com.br</small><hr>
                              INSIRA UMA DATA, DE PREFERÊNCIA QUE SEJA A DE HOJE LEMBRE - SE DE ANOTAR
			                <input class="form-control" name="usernascimento" type="date" required=""><br>
                            CRIE UMA SENHA DE ACESSO NÃO ESQUEÇA DE ANOTAR
                            <input class="form-control" name="password" type="password" required=""><br>
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
    <script src="../Components/javascript/datatables/dataTables.bootstrap.js"></script>
     <link href="Components/javascript/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="Components/javascript/js/custom.js"></script>
    <script src="Components/javascript/js/tables.js"></script>
    
  </body>
</html>