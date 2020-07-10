<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0 );
include_once  '../Persistence/disciplina.Crud.php';
$crudDiscip = new CRUDDiscip();
$result = $crudDiscip->listDiscip();
if(isset($_GET['id_discip'])){
  $id_discip = $_GET['id_discip'];
  $line_discip = $crudDiscip->serchDiscip($id_discip);
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
                <?php if($_SESSION['usertipo'] == 1){?>
                <?php if(!isset($_GET['id_discip'])){?>
  			       <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-book"></i> Cadastrar nova disciplina</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/insert_disciplina.php" method="post">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Disciplina: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="nome_discip" class="form-control" id="inputEmail3">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Carga Horária:  </label>
								    <div class="col-sm-10">
								      <input type="number" name="hora_discip" class="form-control" id="inputPassword3" placeholder="Digite apenas números">
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
					            <div class="panel-title"><i class="fa fa-user"></i> Alterar dados da disciplina</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/update_disciplina.php?id_discip=<?= $line_discip->getId_discip();?>" method="post">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Disciplina: </label>
								    <div class="col-sm-10">
								      <input type="text" name="nome_discip" class="form-control" id="inputEmail3"
                                        value="<?= $line_discip->getNome_discip();?>">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Carga Horária:  </label>
								    <div class="col-sm-10">
								      <input type="number" name="hora_discip" class="form-control" id="inputPassword3"
                                            value="<?= $line_discip->getHora_discip();?>">
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
        <div class="content-box-large">
  		    <div class="panel-heading">
				<div class="panel-title"><i class="fa fa-book"></i> Lista de Disciplinas </div>
                 <div class="pull-right" id="nome-pesq-pagina">
                  <i class="fa fa-search"></i> Pesquisar Disciplina
                </div>
				</div>
  				<div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th>Disciplina</th>
								<th>Carga Horária</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
                            <?php while($line = array_shift($result)){?>
							<tr class="odd gradeX" id="nome-informacao">
								<td><?= $line->getNome_discip();?></td>
                                <td><?= $line->getHora_discip()." Horas Aula";?></td>
								<td id="btn-acao-disc">
                                    <a  href="disciplinas.php?id_discip=<?= $line->getId_discip();?>">
                                    <i id="icon-list-tabela" class="fa fa-pencil"></i></a>
                                    <a  href="" data-toggle="modal" data-target="#modal-delete<?= $line->getId_discip();?>">
                                    <i id="icon-del-tabela" class="fa fa-trash"></i>
                                    </a>
                                <!-- ========== modal delete ========-->
                                <div class="modal fade" id="modal-delete<?= $line->getId_discip();?>">
                                <div class="modal-dialog"  id="posicao-modal">
                                  <div class="modal-content"  id="tamanho-modal">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                    <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                                    <a href="../Controller/delete_disciplina.php?id_discip=<?= $line->getId_discip();?>">
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
                            <?php } ?>
						</tbody>
					</table>
              </div>
		</div>
    </div>
 </div>
</div>
<?php }else { ?>
    <!-- user comum -->
      <div class="content-box-large">
  		    <div class="panel-heading">
				<div class="panel-title"><i class="fa fa-book"></i> Lista de Disciplinas </div>
                 <div class="pull-right" id="nome-pesq-pagina">
                  <i class="fa fa-search"></i> Pesquisar Disciplina
                </div>
				</div>
  				<div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th>Disciplina</th>
								<th>Carga Horária</th>
							</tr>
						</thead>
						<tbody>
                            <?php while($line = array_shift($result)){?>
							<tr class="odd gradeX" id="nome-informacao">
								<td><?= $line->getNome_discip();?></td>
                                <td><?= $line->getHora_discip()." Horas Aula";?></td>
							</tr>
                            <?php } ?>
						</tbody>
					</table>
              </div>
		</div>
    </div>
 </div>
</div>
<?php } ?>
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
<?php if(isset($_SESSION['disciSalvo'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['disciSalvo'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['disciSalvo']); }?>
  <?php if(isset($_SESSION['disciErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['disciErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['disciErro']); }?>
  <!-- ===== fim alert insert =====-->
  <!-- ===== alert update =====-->
<?php if(isset($_SESSION['discipAtualiza'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['discipAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipAtualiza']); }?>
  <?php if(isset($_SESSION['discipErroAtualiza'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['discipErroAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipErroAtualiza']); }?>
  <!-- ===== fim alert update =====-->
      <!-- ===== alert delete =====-->
<?php if(isset($_SESSION['discipDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['discipDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipDelete']); }?>
  <?php if(isset($_SESSION['discipErroDelete'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['discipErroDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipErroDelete']); }?>
  <!-- ===== fim alert delete =====-->
  </body>
</html>