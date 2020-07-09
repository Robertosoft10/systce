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
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-8">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1 id="logo"><a href="">SystCE</a></h1>
	              </div>
	           </div>
	           <div class="col-md-4">
	              <div class="row">
	                <div class="col-lg-12">
	                </div>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		  </div>
		  <div class="col-md-12">
		  	<div class="row">
  			   <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-university"></i> Cadastrar dados da Instituição</div>
					        </div>
			  				<div class="panel-body">
                                <?php if(isset($_SESSION['cadastroOK'])){?>
                              <div class="alert alert-success" role="alert">
                                <?= $_SESSION['cadastroOK'];?>
                                </div>
                               <?php unset($_SESSION['cadastroOK']); }?>
			  					<form class="form-horizontal" role="form" action="insert_instituicao_inicial.php" method="post" method="post" enctype="multipart/form-data">
								  <div class="form-group col-md-12">
								    <div class="col-sm-12">
                                       <small id="nome-inst"> Nome da Instituição: *</small>
								      <input type="text" name="nome_instituicao" class="form-control" id="inputEmail3" required="">
								    </div>
								  </div>
								  <div class="form-group col-md-4">
								    <div class="col-sm-12">
                                      <small id="nome-inst"> Contato : *</small>
								      <input type="text" name="fone1_instituicao" class="form-control" id="inputPassword3" placeholder="Apenas números" required="">
								    </div>
								  </div>
                                    <div class="form-group col-md-4">
								    <div class="col-sm-12">
                                      <small id="nome-inst"> Contato 2: </small>
								      <input type="text" name="fone2_instituicao" class="form-control" id="inputPassword3" placeholder="Apenas números">
								    </div>
								  </div>
                                    <div class="form-group col-md-5">
								    <div class="col-sm-12">
                                    <small id="nome-inst"> E-mail:</small>
								      <input type="email" name="email_instituicao" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                    <div class="form-group  col-md-12">
								    <div class="col-sm-12">
                                    <small id="nome-inst"> Endereço: *</small>
								      <input type="text" name="endereco_instituicao" class="form-control" id="inputPassword3" placeholder="Digite apenas números" required="">
								    </div>
								  </div>
                                    <div class="form-group  col-md-7">
								    <div class="col-sm-12">
                                    <small id="nome-inst"> Direção: *</small>
								      <input type="text" name="direcao_instituicao" class="form-control" id="inputPassword3" required="">
								    </div>
								  </div>
                                    <div class="form-group col-md-5">
								    <div class="col-sm-12">
                                    <small id="nome-inst"> Logomarca: </small>
								      <input type="file" name="logo_instituicao" class="form-control" id="inputPassword3" placeholder="Digite apenas números">
								    </div>
								  </div>
                                    <div class="form-group col-md-12">
								    <div class="col-sm-12">
                                          <small id="nome-inst"> Frase de destaque: </small>
								      <input type="text" name="frase_instituicao" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                     <div class="form-group col-md-12">
								    <div class="col-sm-12">
								       <button id="btn-cad" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar Cadastro</button>
								    </div>
								  </div>
								</form>
                                <a href="/../systce/index.php">
                                <button id="btn-cad" type="submit" class="btn btn-primary"> Cadastrar Depois</button></a>
			  				</div>
			  			</div>
	  				</div>
                </div>
                    <footer>
                         <div class="container">
                            <div class="copy text-center">
                               Copyright &copy; <?php $data = date('D/M/Y'); echo $data;?>
                               SystCE - Sistema Controle Escolar -
                                 Robertosoft10 Todos os direitos reservados
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
                  </body>
                </html>