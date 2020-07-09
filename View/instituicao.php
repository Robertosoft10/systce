<?php
session_start();
include_once  '../Persistence/instituicao.Crud.php';
$crudInst = new CRUDInst();
$result = $crudInst->listInst();
if(isset($_GET['id_inst'])){
  $id_inst = $_GET['id_inst'];
  $line_inst = $crudInst->serchInst($id_inst);
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
                <?php if(!isset($_GET['id_inst'])){?>
  			   <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-university"></i> Cadastrar dados da Instituição</div>
                                <div class="pull-right">
                                <a href="outro_dados.php">
                                <button class="btn btn-primary btn-sm">   <i class="fa fa-send-o"></i> Cadastrar Séries</button></a>
                                </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/insert_instituicao.php" method="post" enctype="multipart/form-data">
								  <div class="form-group col-md-12">
								    <div class="col-sm-12">
                                       <small id="nome-inst"> Nome da Instituição: *</small>
								      <input type="text" name="nome_instituicao" class="form-control" id="inputEmail3">
								    </div>
								  </div>
								  <div class="form-group col-md-4">
								    <div class="col-sm-12">
                                      <small id="nome-inst"> Contato : *</small>
								      <input type="text" name="fone1_instituicao" class="form-control" id="inputPassword3" placeholder="Apenas números">
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
								      <input type="text" name="endereco_instituicao" class="form-control" id="inputPassword3" placeholder="Digite apenas números">
								    </div>
								  </div>
                                    <div class="form-group  col-md-7">
								    <div class="col-sm-12">
                                    <small id="nome-inst"> Direção: *</small>
								      <input type="text" name="direcao_instituicao" class="form-control" id="inputPassword3">
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
					            <div class="panel-title"><i class="fa fa-university"></i> Alterar dados da Instituição</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/update_instituicao.php?id_inst=<?= $line_inst->getId_inst();?>" method="post" method="post">
								  <div class="form-group col-md-12">
								    <div class="col-sm-12">
                                       <small id="nome-inst"> Nome da Instituição:</small>
								      <input type="text" name="nome_instituicao" class="form-control" id="inputEmail3"
                                             value="<?= $line_inst->getNome_instituicao();?>">
								    </div>
								  </div>
								  <div class="form-group col-md-4">
								    <div class="col-sm-12">
                                      <small id="nome-inst"> Contato 1: </small>
								      <input type="number" name="fone1_instituicao" class="form-control" id="inputPassword3"
                                        value="<?= $line_inst->getFone1_instituicao();?>">
								    </div>
								  </div>
                                    <div class="form-group col-md-4">
								    <div class="col-sm-12">
                                      <small id="nome-inst"> Contato 2: </small>
								      <input type="number" name="fone2_instituicao" class="form-control" id="inputPassword3" value="<?= $line_inst->getFone2_instituicao();?>">
								    </div>
								  </div>
                                    <div class="form-group col-md-5">
								    <div class="col-sm-12">
                                    <small id="nome-inst"> E-mail:</small>
								      <input type="email" name="email_instituicao" class="form-control" id="inputPassword3"
                                      value="<?= $line_inst->getEmail_instituicao();?>">
								    </div>
								  </div>
                                    <div class="form-group  col-md-12">
								    <div class="col-sm-12">
                                    <small id="nome-inst"> Endereço: </small>
								      <input type="text" name="endereco_instituicao" class="form-control" id="inputPassword3" value="<?= $line_inst->getEndereco_instituicao();?>">
								    </div>
								  </div>
                                    <div class="form-group  col-md-7">
								    <div class="col-sm-12">
                                    <small id="nome-inst"> Direção: </small>
								      <input type="text" name="direcao_instituicao" class="form-control" id="inputPassword3"
                                        value="<?= $line_inst->getDirecao_instituicao();?>">
								    </div>
								  </div>
                                    <div class="form-group col-md-12">
								    <div class="col-sm-12">
                                          <small id="nome-inst"> Frase de destaque: </small>
								      <input type="text" name="frase_instituicao" class="form-control" id="inputPassword3"
                                    value="<?= $line_inst->getFrase_instituicao();?>">
								    </div>
								  </div>
                                     <div class="form-group col-md-12">
								    <div class="col-sm-12">
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
				<div class="panel-title"><i class="fa fa-book"></i> Dados da Instituição </div>
				</div>
  				<div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
						<thead>
							<tr id="th-tabela">
								<th>Instituição</th>
								<th>Contato</th>
                                <th>Endereço</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
                            <?php while($line = array_shift($result)){?>
							<tr class="odd gradeX" id="nome-informacao">
								<td><?= $line->getNome_instituicao();?></td>
                                <td><?= $line->getFone1_instituicao();?></td>
                                <td><?= $line->getEndereco_instituicao();?></td>
								<td id="btn-acao-disc">
                                    <a  href="instituicao_detalhe.php?id_inst=<?= $line->getId_inst();?>">
                                    <i id="icon-list-tabela" class="fa fa-eye"></i></a>
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
  <?php if(isset($_SESSION['instErroCadastro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['instErroCadastro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['instErroCadastro']); }?>
  <!-- ===== fim alert insert =====-->
  <!-- ===== alert update =====-->
<?php if(isset($_SESSION['fotoInstAtualiza'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['fotoInstAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['fotoInstAtualiza']); }?>
  <?php if(isset($_SESSION['fotoInstErroAtualiza'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['fotoInstErroAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['fotoInstErroAtualiza']); }?>
  <!-- ===== fim alert update =====-->
      <!-- ===== alert delete =====-->
<?php if(isset($_SESSION['instaDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['instaDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['instaDelete']); }?>
  <?php if(isset($_SESSION['instaErroDelete'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['instaErroDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['instaErroDelete']); }?>
  <!-- ===== fim alert delete =====-->
  </body>
</html>