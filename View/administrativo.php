<?php
session_start();
include_once  '../Persistence/instituicao.Crud.php';
$crudInst = new CRUDInst();
$result = $crudInst->listInst();
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
	  				<div class="col-md-7">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-dashboard"></i> Dashboard Administrativo</div>
					        </div>
			  				<div class="panel-body">
			  			  <?php while($line = array_shift($result)){?>
                            <img id="img-admin" src="<?= "../Images/instituicao/".$line->getLogo_instituicao();?>" alt="" class="img-circle img-fluid col-md-12 col-sm-12 col-xs-12">
			  				</div>
                            <div class=" text-center">
                             <small id="nome-isntituicao"> <?= $line->getNome_instituicao(); ?></small><br>
                            <small id="frese-isntituicao"> <?= $line->getFrase_instituicao(); ?></small>
                            <?php } ?>
                            </div>
			  				</div>
			  			</div>
	  				<div class="col-md-5">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
                                <div class="panel-title"><i class="fa fa-dashboard"></i> Dashboard Menu</div>
					        </div>
                            <?php if($_SESSION['usertipo'] == 1){?>
			  				<div class="panel-body text-center">
			  			    <a href="estudante_list.php">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-users"></i> <br>Estudantes</button></a>
                            <a href="professor_list.php">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-male"></i>  
                            <i id="icon-painel" class="fa fa-desktop"></i>
                            <i class="fa fa-female"></i> <br>Professores</button></a><hr>
                            <a href="disciplinas.php">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-book"></i> <br>Disciplinas</button></a>
                                <a href="matriculas.php">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-edit"></i> <br>Matrículas</button></a><hr>
                            <a href="usuarios.php">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-user"></i> <br> Usuários</button></a>
                            <a href="instituicao.php">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-university"></i> <br> Instituição</button></a>
			  				</div>
                            <?php }elseif($_SESSION['usertipo'] == 2){?>
                            <div class="panel-body text-center">
			  			    <a href="estudante_list.php?acesso=<?= $_SESSION['id_prof'];?>">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-users"></i> <br>Estudantes</button></a>
                            <a href="professor_list.php">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-male"></i>  
                            <i id="icon-painel" class="fa fa-desktop"></i>
                            <i class="fa fa-female"></i> <br>Professores</button></a><hr>
                            <a href="disciplinas.php">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-book"></i> <br>Disciplinas</button></a>
                                <a href="matriculas.php?acesso=<?= $_SESSION['id_prof'];?>">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-edit"></i> <br>Matrículas</button></a><hr>
                            <?php } ?>
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
