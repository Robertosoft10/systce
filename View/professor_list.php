<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0 );
include_once  '../Persistence/professor.Crud.php';
$crudProf = new CRUDProf();
$result = $crudProf->listProf();
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
            <?php if($_SESSION['usertipo'] == 1){?>
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-users"></i> Lista de Professores </div>
                    <a href="professor_cad.php">
                    <button id="btn-novo-registro" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i> Novo Professor</button></a>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th id="foto-list-tabela">Foto</th>
								<th>Informações</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
                            <?php while($line = array_shift($result)){?>
							<tr class="odd gradeX">
								<td>
                                  <img id="img-list-tabela" src="<?= "../Images/professor/".$line->getFoto_prof();?>" alt="" class="img-circle img-fluid col-md-10 col-sm-10 col-xs-10">
                                </td>
								<td  id="nome-informacao">
                                Estudante: <?= $line->getNome_prof();?><br>
                                Telefone: <?= $line->getFone_prof();?><br>
                                Endereço: <?= $line->getEndereco_prof();?><br>
                                </td>
								<td id="td-list-acao-estud" class="text-center">
                                    <br>
                                    <a  href="professor_detalhe.php?id_prof=<?= $line->getId_prof();?>">
                                    <i id="icon-list-tabela" class="fa fa-folder-open"></i>
                                    </a>
                                </td>
							</tr>
                            <?php } ?>
						</tbody>
					</table>
  				</div>
  			</div>
		  </div>
		</div>
    </div>
        <?php }elseif($_SESSION['usertipo'] == 2){?>
        <!-- user comum -->
       <div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-users"></i> Lista de Professores </div>
                     <a href="professor_cad.php">
                    <button id="btn-novo-registro" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i> Novo Professor</button></a>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th id="foto-list-tabela">Foto</th>
								<th>Informações</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
                            <?php while($line = array_shift($result)){?>
							<tr class="odd gradeX">
								<td>
                                  <img id="img-list-tabela" src="<?= "../Images/professor/".$line->getFoto_prof();?>" alt="" class="img-circle img-fluid col-md-10 col-sm-10 col-xs-10">
                                </td>
								<td  id="nome-informacao">
                                Estudante: <?= $line->getNome_prof();?><br>
                                Telefone: <?= $line->getFone_prof();?><br>
                                Endereço: <?= $line->getEndereco_prof();?><br>
                                </td>
								<td id="td-list-acao-estud" class="text-center">
                                    <br>
                                    <a  href="professor_detalhe.php?id_prof=<?= $line->getId_prof();?>">
                                    <i id="icon-list-tabela" class="fa fa-folder-open"></i>
                                    </a>
                                </td>
							</tr>
                            <?php } ?>
						</tbody>
					</table>
  				</div>
  			</div>
		  </div>
		</div>
    </div>
        <?php }?>
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
    <script src="../Components/javascript/jquery.js"></script>
    <script src="../Components/javascript/jquery2.js"></script>
    <script src="../Components/javascript/js/bootstrap.min.js"></script>
    <script src="../Components/javascript/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../Components/javascript/datatables/dataTables.bootstrap.js"></script>
     <link href="../Components/javascript/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="../Components/javascript/js/custom.js"></script>
    <script src="../Components/javascript/js/tables.js"></script>
        
<!-- ===== alert insert =====-->
<?php if(isset($_SESSION['estudSalvo'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['estudSalvo'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['estudSalvo']); }?>
  <?php if(isset($_SESSION['estudErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['estudErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['estudErro']); }?>
  <!-- ===== fim alert insert =====-->
        
 <!-- ===== alert update professor =====-->
<?php if(isset($_SESSION['profAtualiza'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['profAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profAtualiza']); }?>
  <?php if(isset($_SESSION['profErroAtualiza'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['profErroAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profErroAtualiza']); }?>
  <!-- ===== fim alert upadate professor =====-->
               
 <!-- ===== alert update foto professor =====-->
<?php if(isset($_SESSION['fotoProfAtualiza'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['fotoProfAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['fotoProfAtualiza']); }?>
  <?php if(isset($_SESSION['fotoProfErroAtualiza'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['fotoProfErroAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['fotoProfErroAtualiza']); }?>
  <!-- ===== fim alert upadate foto professor =====-->
                     
 <!-- ===== alert delete  professor =====-->
<?php if(isset($_SESSION['profDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['profDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profDelete']); }?>
  <?php if(isset($_SESSION['profErroDelete'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['profErroDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profErroDelete']); }?>
  <!-- ===== fim alert deleteo profesors =====-->
        
                       
 <!-- ===== alert update disciplina professor =====-->
<?php if(isset($_SESSION['discipuUpdateOK'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['discipuUpdateOK'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipuUpdateOK']); }?>
  <?php if(isset($_SESSION['discipUpadateErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['discipUpadateErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipUpadateErro']); }?>
  <!-- ===== fim alert upadate foto professor =====-->
        
         <!-- ===== alert delete disciplina professor =====-->
<?php if(isset($_SESSION['discipProfDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['discipProfDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipProfDelete']); }?>
  <?php if(isset($_SESSION['discipProfDeleteErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['discipProfDeleteErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipProfDeleteErro']); }?>
  <!-- ===== fim alert delete foto professor =====-->
  </body>
</html>