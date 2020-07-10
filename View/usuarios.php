<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0 );
include_once  '../Persistence/usuario.Crud.php';
$crudUser = new CRUDUser();
$result = $crudUser->listUser();
if(isset($_GET['id_user'])){
  $id_user = $_GET['id_user'];
  $line_user = $crudUser->serchUser($id_user);
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
                   <?php if(!isset($_GET['id_user'])){?>
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-user"></i> Cadastrar novo Usuário</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/insert_usuario.php" method="post" enctype="multipart/form-data">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Nome de Usuário: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="username" class="form-control" id="inputEmail3" required="">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Data Nascimento *</label>
								    <div class="col-sm-10">
								      <input type="date" name="usernascimento" class="form-control" id="inputEmail3" required="">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">E-mail de Usuário: *</label>
								    <div class="col-sm-10">
								      <input type="email" name="useremail" class="form-control" id="inputPassword3" required="">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Tipo de Usuário:</label>
								    <div class="col-sm-10">
								      <select type="text" name="usertipo" class="form-control" id="inputPassword3">
                                          <option value="1">Administrador</option>
                                          <option value="2">Usuário Comum</option>
                                        </select>
								    </div>
								  </div>
                                     <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Senha de Usuário: *</label>
								    <div class="col-sm-10">
								      <input type="password" name="password" class="form-control" id="inputPassword3" required="">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Foto: </label>
								    <div class="col-sm-10">
								      <input type="file" name="user_foto" class="form-control" id="inputPassword3">
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
                   <?php }else{?>
                   <div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-user"></i> Alterar dados do usuário</div>
                                
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/update_usuario.php?id_user=<?= $line_user->getId_user();?>" method="post">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Nome de Usuário: </label>
								    <div class="col-sm-10">
								      <input type="text" name="username" class="form-control" id="inputEmail3"
                                            value="<?= $line_user->getUsername();?>">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Data Nascimento </label>
								    <div class="col-sm-10">
								      <input type="date" name="usernascimento" class="form-control" id="inputEmail3" value="<?= $line_user->getUsernascimento();?>">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">E-mail de Usuário: </label>
								    <div class="col-sm-10">
								      <input type="email" name="useremail" class="form-control" id="inputPassword3"
                                             value="<?= $line_user->getUseremail();?>">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Tipo de Usuário:</label>
								    <div class="col-sm-10">
								      <select type="text" name="usertipo" class="form-control" id="inputPassword3">
                                        <?php if($line_user->getUsertipo() == 1){
                                          $usuario = "Usuário Comum";?>
                                          <option value="1"><?= $usuario;?></option>
                                          <?php }elseif($line_user->getUsertipo() == 2){
                                            $usuario = "Usuário Adminstrador";?>
                                            <option value="2"><?= $usuario;?></option>
                                          <?php } ?>
                                          <option value="1">Usuário Comum</option>
                                          <option value="2">Administrador</option>
                                        </select>
								    </div>
								  </div>
                                     <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Digite sua senha atual ou  nova senha: </label>
								    <div class="col-sm-10">
								      <input type="password" name="password" class="form-control" id="inputPassword3" required="">
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
                   <?php } ?>
	  				</div>
              </div>
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-users"></i> Lista de Usuários do Sistema </div>
                    <div class="pull-right">
                    <i class="fa fa-user"> </i> Pesquisar Usuário
                    </div>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th>Usuário</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
                            <?php while($line = array_shift($result)){?>
							<tr class="odd gradeX">
								<td  id="nome-informacao">
                                    <?= $line->getUsername();?>
                                </td>
								<td id="td-list-acao-estud" class="text-center">
                                    <br>
                                     <a id="icon-list-tabela" href="" data-toggle="modal" data-target="#modal-detalhe<?= $line->getId_user();?>"><i class="fa fa-eye"></i>
                                    </a>
                                    <!-- ========== modal de informações ========-->
                                   <div class="modal fade" id="modal-detalhe<?= $line->getId_user();?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header text-left">
                                      <h4 class="modal-title">Detalhe do Usuário</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body  text-left">
                                      <img id="img-detalhe-tabela" src="<?= "../Images/usuario/".$line->getUser_foto();?>" alt="" class="img-circle img-fluid col-md-12 col-sm-12 col-xs-12">
                                        <p id="dado-user"><br>
                                        ID: <?= $line->getId_user();?><br>
                                        Usuário: <?= $line->getUsername();?><br>
                                        E-mail: <?= $line->getUseremail();?><br>
                                        <?php if($line->getUsertipo() == 1){
                                        $usuario = "Usuário Comum";
                                            echo "Tipo: " .$usuario;
                                        }elseif($line->getUsertipo() == 2){
                                            $usuario = "Usuário Admnistrador";
                                            echo "Tipo: " .$usuario;
                                        }?>
                                        <br>
                                        </p>
                                        
                                        <form action="../Controller/udpate_foto_usuario.php?id_user=<?= $line->getId_user();?>" method="post" enctype="multipart/form-data" class="col-md-6">
                                  <div class="input-group form">
                                       <input type="file" name="user_foto" class="form-control" required="">
                                       <span class="input-group-btn">
                                         <button class="btn btn-primary"><i class="fa fa-save"></i> Alterar Foto</button>
                                       </span>
                                  </div>
                                  </form>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        
                                    <i id="btn-det-user" class="fa fa-eye-slash" data-dismiss="modal"></i>
                                    <a href="usuarios.php?id_user=<?= $line->getId_user();?>">
                                    <i id="btn-det-user-edit" class="fa fa-pencil"></i></a>
                                     <a href="../Controller/delete_usuario.php?id_user=<?= $line->getId_user();?>">
                                    <i id="btn-det-user-del" class="fa fa-trash"></i></a>
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
<?php if(isset($_SESSION['userSalvo'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['userSalvo'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userSalvo']); }?>
  <?php if(isset($_SESSION['userErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['userErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userErro']); }?>
  <!-- ===== fim alert insert =====-->
        
 <!-- ===== alert update usuario =====-->
<?php if(isset($_SESSION['userAtualiza'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['userAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userAtualiza']); }?>
  <?php if(isset($_SESSION['userAtualizaErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(userAtualizaErro() {
      toastr.error('<?= $_SESSION['profErroAtualiza'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userAtualizaErro']); }?>
  <!-- ===== fim alert upadate usuario =====-->
               
 <!-- ===== alert update foto ussuario =====-->
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
  <!-- ===== fim alert upadate foto usuario =====-->
                     
 <!-- ===== alert delete  usuario =====-->
<?php if(isset($_SESSION['userDelete'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['userDelete'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userDelete']); }?>
  <?php if(isset($_SESSION['userDeleteErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['userDeleteErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['userDeleteErro']); }?>
  <!-- ===== fim alert deleteo usuario =====-->
  </body>
</html>