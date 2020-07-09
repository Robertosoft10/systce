<?php
session_start();
include_once  '../Persistence/professor.Crud.php';
$crudProf = new CRUDProf();
$result = $crudProf->listProf();
if(isset($_GET['id_prof'])){
  $id_prof = $_GET['id_prof'];
  $line_prof = $crudProf->serchProf($id_prof);
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
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-8">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1 id="logo"><a href="">SystCE </a></h1>
	              </div>
	           </div>
	           <div class="col-md-4">
	              <div class="row">
	                <div class="col-lg-12">
                        <form action="pesquisa_professor.php" method="post">
	                  <div class="input-group form">
	                       <input type="text" name="nome_prof" class="form-control" placeholder="Pesquisar Professor">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary"><i class="fa fa-search"></i></button>
	                       </span>
	                  </div>
                      </form>
	                </div>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-3">
		  	<div class="sidebar content-box" style="display: block;">
                <div class="sidebar-nav navbar-collapse">
               <ul class="nav">
                    <!-- Main menu -->
                    <?php if($_SESSION['usertipo'] == 1){?>
                    <li>
                    <a  id="menu-link"  href="../Persistence/logout.php">
                  <?= $_SESSION['username'];?> <i class="fa fa-sign-out"></i> Sair</a>
                    </li>
                    <li>
                    <a id="menu-link" href="administrativo.php">
                    <i class="fa fa-dashboard"></i> Administrativo</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="estudante_list.php">
                    <i class="fa fa-users"></i> Estudantes</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="professor_list.php">
                    <i class="fa fa-male"></i>  
                      <i id="icon-painel" class="fa fa-desktop"></i>
                      <i class="fa fa-female"></i> Professores</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="matriculas.php">
                    <i class="fa fa-edit"></i> Matrículas</a>
                    </li>
                    <li>
                    <a id="menu-link"  href="disciplinas.php">
                    <i class="fa fa-book"></i> Disciplinas</a>
                    </li>
                    <li>
                    <a id="menu-link"  href="../Persistence/logout.php">
                    <i class="fa fa-database"></i> Backup</a>
                    </li>
                    <?php }elseif($_SESSION['usertipo'] == 2){?>
                    <li>
                    <!-- user comum -->
                    <a  id="menu-link"  href="../Persistence/logout.php">
                  <?= $_SESSION['nome_prof'];?> <i class="fa fa-sign-out"></i> Sair</a>
                    </li>
                    <li>
                    <a id="menu-link" href="administrativo.php">
                    <i class="fa fa-dashboard"></i> Administrativo</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="estudante_list.php?acesso=<?= $_SESSION['id_prof'];?>">
                    <i class="fa fa-users"></i> Estudantes</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="professor_list.php">
                    <i class="fa fa-male"></i>  
                      <i id="icon-painel" class="fa fa-desktop"></i>
                      <i class="fa fa-female"></i> Professores</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="matriculas.php?acesso=<?= $_SESSION['id_prof'];?>">
                    <i class="fa fa-edit"></i> Matrículas</a>
                    </li>
                    <li>
                    <a id="menu-link"  href="disciplinas.php">
                    <i class="fa fa-book"></i> Disciplinas</a>
                    </li>
                    <li>
                    <a id="menu-link"  href="../Persistence/logout.php">
                    <i class="fa fa-database"></i> Backup</a>
                    </li>
                    <?php } ?>
                </ul>
             </div>
            </div>
		  </div>
		  <div class="col-md-9">
		  	<div class="row">
                <?php if(!isset($_GET['id_prof'])){?>
  			   <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-user"></i> Cadastrar novo(a) professor(a)</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/insert_professor.php" method="post" enctype="multipart/form-data">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Professor: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="nome_prof" class="form-control" id="inputEmail3">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Telefone: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="fone_prof" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">E-mail: *</label>
								    <div class="col-sm-10">
								      <input type="email" name="email_prof" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Senha: *</label>
								    <div class="col-sm-10">
								      <input type="password" name="password" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Endereço: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="endereco_prof" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Foto: </label>
								    <div class="col-sm-10">
								      <input type="file" name="foto_prof" class="form-control" id="inputPassword3">
								      </div>
								   </div>
								   <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button id="btn-cad" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
                <?php } else{?>
                <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-user"></i> Alterar dados do(a) professor</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/update_professor.php?id_prof=<?= $line_prof->getId_prof();?>" method="post">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Estudante: </label>
								    <div class="col-sm-10">
								      <input type="text" name="nome_prof" class="form-control" id="inputEmail3"
                                             value="<?= $line_prof->getNome_prof();?>">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Telefone: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="fone_prof" class="form-control" id="inputPassword3"
                                              value="<?= $line_prof->getFone_prof();?>">
								    </div>
								  </div>
                                     <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">E-mail: </label>
								    <div class="col-sm-10">
								      <input type="email" name="email_prof" class="form-control" id="inputPassword3"
                                              value="<?= $line_prof->getEmail_prof();?>">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Senha atual ou nova: </label>
								    <div class="col-sm-10">
								      <input type="password" name="password" class="form-control" id="inputPassword3" required="">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Endereço: </label>
								    <div class="col-sm-10">
								      <input type="text" name="endereco_prof" class="form-control" id="inputPassword3"
                                            value="<?= $line_prof->getEndereco_prof();?>">
								    </div>
								   </div>
								   <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button id="btn-cad" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar Alterações</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
                <?php } ?>
              </div>
		</div>
    </div>
    <footer>
         <div class="container">
            <div class="copy text-center">
               Copyright &copy; <?php $data = date('D/M/Y'); echo $data;?>
                SysGTE - Sistema Gestão Escolar -
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
        
<!-- ===== alert insert =====-->
<?php if(isset($_SESSION['profCadastro'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['profCadastro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profCadastro']); }?>
  <?php if(isset($_SESSION['profErroCadastro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['profErroCadastro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profErroCadastro']); }?>
  <!-- ===== fim alert insert =====-->
  </body>
</html>