<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0 );

include_once '../Persistence/conection.php';
$id_matric = $_GET['id_matric'];
$sql = "SELECT * FROM tb_matriculas M JOIN tb_estudantes E ON M.estud_cod = E.id_estud  WHERE id_matric='$id_matric'";
$consult = mysqli_query($conexao, $sql);
$line_mt = mysqli_fetch_assoc($consult);
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
                <?php if(!isset($_GET['id_matric'])){?>
  			   <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-edit"></i> Realizar nova matrícula</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/insert_matricula.php" method="post">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Estudante: *</label>
                                       <?php
                                        include_once  '../Persistence/estudante.Crud.php';
                                        $crudEstud = new CRUDEstud();
                                        $result = $crudEstud->listEstud();
                                        ?>
								    <div class="col-sm-10">
								      <select type="text" name="estud_cod" class="form-control" id="inputEmail3">
                                    <option></option>
                                    <?php while($line = array_shift($result)){?> 
                                    <option  value="<?= $line->getId_estud();?>"><?= $line->getNome_estud();?></option> 
                                    <?php } ?>   
                                    </select>
								    </div>
								  </div>
                                     <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Serie: *</label>
                                       <?php
                                         include_once  '../Persistence/serie.Crud.php  ';
                                        $crudSerie = new CRUDSerie();
                                        $result = $crudSerie->listSerie();
                                        ?>
								    <div class="col-sm-10">
								      <select type="text" name="serie_estud" class="form-control" id="inputEmail3">
                                    <option></option>
                                    <?php while($line = array_shift($result)){?> 
                                    <option><?= $line->getNome_serie();?></option> 
                                    <?php } ?>   
                                    </select>
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Turno: *</label>
								    <div class="col-sm-10">
								      <select type="text" name="turno_estud" class="form-control" id="inputEmail3">
                                        <option></option>
                                        <option>Manha</option>
                                        <option>Tarde</option>
                                        <option>Noite</option>
                                        <option>Integral</option>
                                    </select>
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Código de Acesso: </label>
								    <div class="col-sm-10">
								      <input type="password" name="codigo_estud" class="form-control" id="inputEmail3">
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
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-users"></i> Lista de Matrículas </div>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th id="foto-list-tabela">Foto</th>
								<th>Estudante</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                            $sql = "SELECT * FROM tb_matriculas M JOIN tb_estudantes E ON M.estud_cod = E.id_estud";
                            $consult = mysqli_query($conexao, $sql);
                            while($line = mysqli_fetch_array($consult)){?>
							<tr class="odd gradeX">
								<td>
                                <img id="img-list-tabela" src="<?= "../Images/estudante/".$line['foto_estud'];?>" alt="" class="img-circle img-fluid col-md-10 col-sm-10 col-xs-10">
                                </td>
								<td  id="nome-informacao">
                                Estudante: <?= $line['nome_estud'];?><br>
                                Série: <?= $line['serie_estud'];?><br>
                                Turno: <?= $line['turno_estud'];?><br>
                                </td>
								<td id="td-list-acao-estud" class="text-center">
                                    <br>
                                    <a  href="detalhe_matricula.php?id_matric=<?= $line['id_matric'];?>">
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
                   <?php }else{?>
                   <div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-edit"></i> Alterar dados da matrícula</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/update_matricula.php?id_matric=<?= $line_mt['id_matric'];?>" method="post">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Estudante: </label>
                                       <?php
                                        include_once  '../Persistence/estudante.Crud.php';
                                        $crudEstud = new CRUDEstud();
                                        $result = $crudEstud->listEstud();
                                        ?>
								    <div class="col-sm-10">
								      <select type="text" name="estud_cod" class="form-control" id="inputEmail3">
                                     <option value="<?= $line_mt['estud_cod'];?>">
                                    <?= $line_mt['nome_estud'];?></option>
                                    <?php while($line = array_shift($result)){?> 
                                    <option  value="<?= $line->getId_estud();?>"><?= $line->getNome_estud();?></option> 
                                    <?php } ?>   
                                    </select>
								    </div>
								  </div>
                                     <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Serie: </label>
                                       <?php
                                         include_once  '../Persistence/serie.Crud.php  ';
                                        $crudSerie = new CRUDSerie();
                                        $result = $crudSerie->listSerie();
                                        ?>
								    <div class="col-sm-10">
								      <select type="text" name="serie_estud" class="form-control" id="inputEmail3">
                                    <option><?= $line_mt['serie_estud'];?></option>
                                    <?php while($line = array_shift($result)){?> 
                                    <option><?= $line->getNome_serie();?></option> 
                                    <?php } ?>   
                                    </select>
								    </div>
								  </div>
                                       <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Turno: </label>
                                       
								    <div class="col-sm-10">
								      <select type="text" name="turno_estud" class="form-control" id="inputEmail3">
                                         <option><?= $line_mt['turno_estud'];?></option>
                                         <option>Manha</option>
                                         <option>Tarde</option>
                                         <option>Noite</option>
                                         <option>Integral</option>  
                                    </select>
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Código de Acesso: </label>
								    <div class="col-sm-10">
								      <input type="password" name="codigo_estud" class="form-control" id="inputEmail3"
                                        value="<?= $line_mt['codigo_estud'];?>">
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
                   
                   
                   
                   
                   
                   
                   
                   <?php }?>
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
<?php if(isset($_SESSION['matricSalva'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['matricSalva'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['matricSalva']); }?>
  <?php if(isset($_SESSION['matricSalvaErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['matricSalvaErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['matricSalvaErro']); }?>
  <!-- ===== fim alert insert =====-->
  <!-- ===== alert delete chamada =====-->
<?php if(isset($_SESSION['chamadaDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['chamadaDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['chamadaDelete']); }?>
  <?php if(isset($_SESSION['chamadaDeleteErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['chamadaDeleteErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['chamadaDeleteErro']); }?>
  <!-- ===== fim alert delete chamada =====-->
      <!-- ===== alert delete professor estudante =====-->
<?php if(isset($_SESSION['profEstuDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['profEstuDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profEstuDelete']); }?>
  <?php if(isset($_SESSION['profEstuDeleteErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['profEstuDeleteErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profEstuDeleteErro']); }?>
  <!-- ===== fim alert delete professor estudante =====-->
    <!-- ===== alert delete disciplina estudante =====-->
<?php if(isset($_SESSION['discipEstuDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['discipEstuDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipEstuDelete']); }?>
  <?php if(isset($_SESSION['discipEstuDeleteErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['discipEstuDeleteErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipEstuDeleteErro']); }?>
  <!-- ===== fim alert delete disciplina estudante =====-->
<!-- ===== alert update chamada =====-->
<?php if(isset($_SESSION['chamadaUpdate'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['chamadaUpdate'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['chamadaUpdate']); }?>
  <?php if(isset($_SESSION['chamdaUpdateErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['chamdaUpdateErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['chamdaUpdateErro']); }?>
  <!-- ===== fim alert update chamada  =====-->
      <!-- ===== alert update professor estudante =====-->
<?php if(isset($_SESSION['profEstudUpdate'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['profEstudUpdate'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profEstudUpdate']); }?>
  <?php if(isset($_SESSION['profEstudUpdateErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['profEstudUpdateErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profEstudUpdateErro']); }?>
  <!-- ===== fim alert update estudante  =====-->
       <!-- ===== alert update disciplina estudante =====-->
<?php if(isset($_SESSION['discipEstudUpdate'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['discipEstudUpdate'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipEstudUpdate']); }?>
  <?php if(isset($_SESSION['discipEstudUpdateErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['discipEstudUpdateErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['discipEstudUpdateErro']); }?>
  <!-- ===== fim alert disciplina estudante  =====-->
  <!-- ===== alert update nota =====-->
<?php if(isset($_SESSION['notaAtualizada'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['notaAtualizada'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['notaAtualizada']); }?>
  <?php if(isset($_SESSION['notaAtualizadaErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['notaAtualizadaErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['notaAtualizadaErro']); }?>
  <!-- ===== fim alert nota  =====-->
    <!-- ===== alert dele nota =====-->
<?php if(isset($_SESSION['notaDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['notaDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['notaDelete']); }?>
  <?php if(isset($_SESSION['notaDeleteErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['notaDeleteErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['notaDeleteErro']); }?>
  <!-- ===== fim alert nota  =====-->
<!-- ===== alert update matricula =====-->
<?php if(isset($_SESSION['matricAtualiza'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['matricAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['matricAtualiza']); }?>
  <?php if(isset($_SESSION['matricAtualizaErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['matricAtualizaErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['matricAtualizaErro']); }?>
  <!-- ===== fim update matricula  =====-->
<!-- ===== alert delete matricula =====-->
<?php if(isset($_SESSION['matricDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['matricDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['matricDelete']); }?>
  <?php if(isset($_SESSION['matricDeleteErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['matricDeleteErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['matricDeleteErro']); }?>
  <!-- ===== fim delete matricula  =====-->
<!-- ===== alert atualiza professor estudante =====-->
<?php if(isset($_SESSION['profEstudAtualiza'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['profEstudAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profEstudAtualiza']); }?>
  <?php if(isset($_SESSION['profEstudAtualizaErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['profEstudAtualizaErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profEstudAtualizaErro']); }?>
  <!-- ===== fim  =====-->
  </body>
</html>