<?php
session_start();
include_once  '../Persistence/conection.php';
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
                      <form action="pesquisa_estudante.php" method="post">
	                  <div class="input-group form">
	                       <input type="text" name="nome_estud" class="form-control" placeholder="Pesquisar Estudante">
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
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-users"></i> Lista de Estudantes </div>
                <?php if($_SESSION['usertipo'] == 1){?>
                     <a href="estudante_cad.php">
                    <button id="btn-novo-registro" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i> Novo Estudante</button></a>
                    <?php }?>
				</div>
  				<div class="panel-body">
                <!--==== pesquisa de estudante =====-->
                    <?php
                    $result = 0;
                    
                    @$nome_estud = $_POST['nome_estud'];
                    if(!empty($_POST['nome_estud'])){
                    $sql = "SELECT * FROM tb_estudantes WHERE nome_estud LIKE '%$nome_estud%'";
                    $consult = mysqli_query($conexao, $sql);
                    $result = mysqli_num_rows($consult);
                    $_SESSION['encontrado'] = "Estudante pesquisado encontrado com sucesso!";
                    }
                    ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th id="foto-list-tabela">Foto</th>
								<th>Informações</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                        if($result > 0){
                        while($line = mysqli_fetch_array($consult)){?>
							<tr class="odd gradeX">
								<td>
                                <img id="img-list-tabela" src="<?= "../Images/estudante/".$line['foto_estud'];?>" alt="" class="img-circle img-fluid col-md-10 col-sm-10 col-xs-10">
                                </td>
								<td id="nome-informacao">
                                 Código: <?= $line['id_estud'];?><br>
                                 Estudante: <?= $line['nome_estud'];?><br>
                                 Telefone: <?= $line['fone_estud'];?><br>
                                 Endereço: <?= $line['endereco_estud'];?><br>
                                </td>
								<td id="td-list-acao-estud" class="text-center">
                                    <br>
                                    <a  href="estudante_detalhe.php?id_estud=<?= $line['id_estud'];?>">
                                    <i id="icon-list-tabela" class="fa fa-folder-open"></i>
                                    </a>
                                </td>
							</tr>
                        <?php
                            }
                            }else{
                             $_SESSION['encontradoErro'] = "Estudante pesquisado não foi encontrado";
                            }
                            ?>
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

<!-- ===== alert pesquisa =====-->
<?php if(isset($_SESSION['encontrado'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['encontrado'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['encontrado']); }?>
  <?php if(isset($_SESSION['encontradoErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['encontradoErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['encontradoErro']); }?>
  <!-- ===== fim alert pesquisa =====-->
        
  </body>
</html>