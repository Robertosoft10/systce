<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0 );
include_once  '../Persistence/serie.Crud.php';
$crudSerie = new CRUDSerie();
$result = $crudSerie->listSerie();
if(isset($_GET['id_serie'])){
$id_serie = $_GET['id_serie'];
$line_serie = $crudSerie->serchSerie($id_serie);
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
                <div class="col-md-12">
                    <?php if(!isset($_GET['id_serie'])){?>
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title"><i class="fa  fa-send-o"></i> Cadastrar Séries ofertadas</div>
						</div>
		  				<div class="panel-body">
		  					<form class="form-horizontal" role="form" action="../Controller/insert_series.php" method="post">
								  <div class="form-group col-md-12">
								    <div class="col-sm-12">
                                       <small id="nome-inst">Séries: *</small>
								      <input type="text" name="nome_serie" class="form-control" id="inputEmail3">
								    </div>
								  </div>
                                     <div class="form-group col-md-12">
								    <div class="col-sm-12">
								       <button id="btn-cad" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
								    </div>
								  </div>
								</form>
                            <?php }else{?>
                        <div class="content-box-large">
                            <div class="panel-heading">
                                <div class="panel-title"><i class="fa  fa-send-o"></i> Alterar dados ou séries ofertadas</div>
                            </div>
		  				<div class="panel-body">
		  					<form class="form-horizontal" role="form" action="../Controller/updade_series.php?id_serie=<?= $line_serie->getId_serie();?>" method="post">
								  <div class="form-group col-md-12">
								    <div class="col-sm-12">
                                       <small id="nome-inst">Séries:</small>
								      <input type="text" name="nome_serie" class="form-control" id="inputEmail3" value="<?= $line_serie->getNome_serie();?>">
								    </div>
								  </div>
                                     <div class="form-group col-md-12">
								    <div class="col-sm-12">
								       <button id="btn-cad" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar alterações</button>
								    </div>
								  </div>
								</form>
                            <?php } ?>
		  				</div>
		  			</div>
  				</div>
  			<div class="row">
  				<div class="col-md-12">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Lista de séries</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-hover" id="example">
				              <thead>
				                <tr id="th-tabela">
                                <th>ID</th>
				                <th>Série</th>
				                <th>Ação</th>
				                </tr>
				              </thead>
				              <tbody>
                                  <?php while($line_sr = array_shift($result)){?>
				                <tr>
				                  <td  id="id-outro-dado"><?= $line_sr->getId_serie();?></td>
				                  <td  id="serie-outro-dado"><?= $line_sr->getNome_serie();?></td>
				                  <td  id="acao-outro-dado">
                                   <a  href="outro_dados.php?id_serie=<?= $line_sr->getId_serie();?>">
                                    <i id="icon-list-tabela" class="fa fa-pencil"></i></a>
                                    <a  href="" data-toggle="modal" data-target="#modal-delete<?= $line_sr->getId_serie();?>">
                                    <i id="icon-list-tabela" class="fa fa-trash"></i>
                                    </a>
                                      <!--====== MODAL DELETE =====-->
                                      <div class="modal fade" id="modal-delete<?= $line_sr->getId_serie();?>">
                                   <div class="modal-dialog"  id="posicao-modal">
                                  <div class="modal-content"  id="tamanho-modal">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                    <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                                    <a href="../Controller/delete_serie.php?id_serie=<?= $line_sr->getId_serie();?>">
                                    <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                                    <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div> 
                                      
                                      
                                      
                                      
                                      
                                </td>
				                </tr>
                                <?php }?>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
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
        
<!-- ===== alert insert =====-->
<?php if(isset($_SESSION['serieSalvo'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['serieSalvo'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['serieSalvo']); }?>
  <?php if(isset($_SESSION['serieErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['serieErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['serieErro']); }?>
  <!-- ===== fim alert insert =====-->
  <!-- ===== alert update =====-->
<?php if(isset($_SESSION['serieAtualiza'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['serieAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['serieAtualiza']); }?>
  <?php if(isset($_SESSION['serieAtualizaErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['serieAtualizaErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['serieAtualizaErro']); }?>
  <!-- ===== fim alert update  =====-->
      <!-- ===== alert delete =====-->
<?php if(isset($_SESSION['serieDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['serieDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['serieDelete']); }?>
  <?php if(isset($_SESSION['serieErroDelete'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['serieErroDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['serieErroDelete']); }?>
  <!-- ===== fim alert delete =====-->
  </body>
</html>