<?php
session_start();
error_reporting(0);
ini_set(“display_errors”, 0 );

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
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-user"></i> Detalhe do Professor 
                    </div>
                    <a href="professor_cad.php">
                    <button id="btn-novo-registro" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i> Novo Professor</button></a>
				</div>
  				<div class="panel-body">
                    <?php if($_SESSION['id_prof'] == $line_prof->getId_prof()
                             AND $_SESSION['usertipo'] == 2){?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
						<thead>
							<tr id="th-tabela">
								<th id="foto-list-tabela-detalhe">Foto</th>
								<th>Informações</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td>
                                  <img id="img-detalhe-tabela" src="<?= "../Images/professor/".$line_prof->getFoto_prof();?>" alt="" class="img-circle img-fluid col-md-12 col-sm-12 col-xs-12">
                                </td>
								<td id="nome-informacao">
                                  Professor: <?= $line_prof->getNome_prof();?><br>
                                  Telefone: <?= $line_prof->getFone_prof();?><br>
                                  Email: <?= $line_prof->getEmail_prof();?><br>
                                  Endereço: <?= $line_prof->getEndereco_prof();?><br>
                                    <div id="btn-acao-detalhe">
                                        <hr>
                                    <a  href="professor_cad.php?id_prof=<?= $line_prof->getId_prof();?>">
                                    <i id="icon-list-tabela" class="fa fa-pencil"></i></a>
                                    <a  href="" data-toggle="modal" data-target="#modal-delete<?= $line_prof->getId_prof();?>">
                                    <i id="icon-delt-tabela" class="fa fa-trash"></i>
                                    </a>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <td colspan="2">
                                   <small id="nome-img-detalhe"> Alterar foto</small>
                                <form action="../Controller/udpate_foto_professor.php?id_prof=<?= $line_prof->getId_prof();?>" method="post" enctype="multipart/form-data">
                                  <div class="input-group form col-md-5">
                                       <input  type="file" name="foto_prof" class="form-control " required="">
                                       <span class="input-group-btn">
                                         <button class="btn btn-primary"><i class="fa fa-save"></i></button>
                                       </span>
                                  </div>
                                  </form>
                                </td>
							</tr>
						</tbody>
					</table>
  				</div>
                
  			</div>
                <div class="content-box-large">
  		    <div class="panel-heading">
				<div class="panel-title"><i class="fa fa-book"></i> Lista de Disciplinas Lecionadas</div>
                <div class="pull-right">
                <button data-toggle="modal" data-target="#modal-add-discip<?= $line_prof->getId_prof();?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Disciplina </button>
                </div>
				</div>
  				<div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th>Disciplina</th>
                                <th>Turno</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            include_once '../Persistence/conection.php';
                            $id_prof = $_GET['id_prof'];
                            $sql = "SELECT * FROM tb_disciplina_prof DF JOIN tb_professores P ON DF.prof_id = P.id_prof JOIN tb_disciplinas D ON DF.discip_id = D.id_discip WHERE id_prof='$id_prof'";
                            $consult = mysqli_query($conexao, $sql);
                            while($line_ds_pf = mysqli_fetch_array($consult)){
                            ?>
							<tr class="odd gradeX" id="nome-informacao">
								<td><?= $line_ds_pf['nome_discip'];?></td>
                                <td><?= $line_ds_pf['turno_prof'];?></td>
								<td id="btn-acao-disc">
                                <a  href="" data-toggle="modal" data-target="#modal-aterar-discip<?= $line_ds_pf['id_discip_pf'];?>">    
                                <i id="icon-list-tabela" class="fa fa-pencil"></i></a>
                                    <!-- ========== modal add disciplina ========-->
                            <div class="modal fade" id="modal-aterar-discip<?= $line_ds_pf['id_discip_pf'];?>">
                            <div class="modal-dialog" id="posicao-modal">
                            <div class="modal-content" id="tamanho-modal">
                            <div class="modal-header">
                              <h4 class="modal-title">Alterar disciplinas lecionadas</h4>
                            </div>
                            <div class="modal-body">
                                <form action="../Controller/update_disciplina_prof.php?id_discip_pf=<?= $line_ds_pf['id_discip_pf'];?>" method="post">
                                <table>
                                    <tr>
                                      <td id="infor-form-det-mat">Disciplina:</td>
                                      <td id="inputs-det-matri">
                                        <select type="text" name="discip_id" class="form-control" id="inut-cad">
                                            <option value="<?= $line_ds_pf['id_discip'];?>"><?= $line_ds_pf['nome_discip'];?></option>
                                           <?php
                                           include_once  '../Persistence/disciplina.Crud.php';
                                            $crudDiscip = new CRUDDiscip();
                                            $result = $crudDiscip->listDiscip();
                                           while($line = array_shift($result)){?>
                                           <option value="<?= $line->getId_discip();?>"><?= $line->getNome_discip();?></option>
                                           <?php } ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                      <td id="infor-form-det-mat">Turno:</td>
                                      <td id="inputs-det-matri">
                                        <select  type="text" name="turno_prof" class="form-control" id="inut-cad">
                                            <option><?= $line_ds_pf['turno_prof'];?></option>
                                            <option>Manhã</option>
                                            <option>Tarde</option>
                                            <option>Manhã / Tarde</option>
                                            <option>Tarde / Noite</option>
                                            <option>Noite</option>
                                            </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>  Cancelar</button>
                                  <button  class="btn btn-primary"><i class="fa fa-save"></i>   Salvar </button>
                                </form>
                                </div>
                              </div>
                          </div>
                        </div>
                        <!-- fim --> 
                        <a  href="" data-toggle="modal" data-target="#modal-delete-discip<?= $line_ds_pf['id_discip_pf'];?>">
                        <i id="icon-del-tabela" class="fa fa-trash"></i>
                         </a>
                                <!-- ========== modal delete discip ========-->
                                <div class="modal fade" id="modal-delete-discip<?= $line_ds_pf['id_discip_pf'];?>">
                                <div class="modal-dialog"  id="posicao-modal">
                                  <div class="modal-content"  id="tamanho-modal">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                    <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                                    <a href="../Controller/delete_disciplina_professor.php?id_discip_pf=<?= $line_ds_pf['id_discip_pf'];?>">
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
                <?php }elseif($_SESSION['id_prof'] != $line_prof->getId_prof()
                 AND $_SESSION['usertipo'] == 2){?>
            <!-- se não for o usuario -->
        <div class="alert alert-danger" role="alert">
        <i class="fa fa-warning"></i> Apenas o próprio usuário pode ver essas informações
        </div>
         <?php }elseif($_SESSION['id_prof'] != $line_prof->getId_prof()
                             AND $_SESSION['usertipo'] == 1){?>
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
						<thead>
							<tr id="th-tabela">
								<th id="foto-list-tabela-detalhe">Foto</th>
								<th>Informações</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td>
                                  <img id="img-detalhe-tabela" src="<?= "../Images/professor/".$line_prof->getFoto_prof();?>" alt="" class="img-circle img-fluid col-md-12 col-sm-12 col-xs-12">
                                </td>
								<td id="nome-informacao">
                                  Professor: <?= $line_prof->getNome_prof();?><br>
                                  Telefone: <?= $line_prof->getFone_prof();?><br>
                                  Email: <?= $line_prof->getEmail_prof();?><br>
                                  Endereço: <?= $line_prof->getEndereco_prof();?><br>
                                    <div id="btn-acao-detalhe">
                                        <hr>
                                    <a  href="professor_cad.php?id_prof=<?= $line_prof->getId_prof();?>">
                                    <i id="icon-list-tabela" class="fa fa-pencil"></i></a>
                                    <a  href="" data-toggle="modal" data-target="#modal-delete<?= $line_prof->getId_prof();?>">
                                    <i id="icon-delt-tabela" class="fa fa-trash"></i>
                                    </a>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <td colspan="2">
                                   <small id="nome-img-detalhe"> Alterar foto</small>
                                <form action="../Controller/insert_disciplia_prof.php?id_prof=<?= $line_prof->getId_prof();?>" method="post" enctype="multipart/form-data">
                                  <div class="input-group form col-md-5">
                                       <input  type="file" name="foto_prof" class="form-control " required="">
                                       <span class="input-group-btn">
                                         <button class="btn btn-primary"><i class="fa fa-save"></i></button>
                                       </span>
                                  </div>
                                  </form>
                                </td>
							</tr>
						</tbody>
					</table>
  				</div>
                
  			</div>
                <div class="content-box-large">
  		    <div class="panel-heading">
				<div class="panel-title"><i class="fa fa-book"></i> Lista de Disciplinas Lecionadas</div>
                <div class="pull-right">
                <button data-toggle="modal" data-target="#modal-add-discip<?= $line_prof->getId_prof();?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Disciplina </button>
                </div>
				</div>
  				<div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th>Disciplina</th>
                                <th>Turno</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            include_once '../Persistence/conection.php';
                            $id_prof = $_GET['id_prof'];
                            $sql = "SELECT * FROM tb_disciplina_prof DF JOIN tb_professores P ON DF.prof_id = P.id_prof JOIN tb_disciplinas D ON DF.discip_id = D.id_discip WHERE id_prof='$id_prof'";
                            $consult = mysqli_query($conexao, $sql);
                            while($line_ds_pf = mysqli_fetch_array($consult)){
                            ?>
							<tr class="odd gradeX" id="nome-informacao">
								<td><?= $line_ds_pf['nome_discip'];?></td>
                                <td><?= $line_ds_pf['turno_prof'];?></td>
								<td id="btn-acao-disc">
                                <a  href="" data-toggle="modal" data-target="#modal-aterar-discip<?= $line_ds_pf['id_discip_pf'];?>">    
                                <i id="icon-list-tabela" class="fa fa-pencil"></i></a>
                                    <!-- ========== modal add disciplina ========-->
                            <div class="modal fade" id="modal-aterar-discip<?= $line_ds_pf['id_discip_pf'];?>">
                            <div class="modal-dialog" id="posicao-modal">
                            <div class="modal-content" id="tamanho-modal">
                            <div class="modal-header">
                              <h4 class="modal-title">Alterar disciplinas lecionadas</h4>
                            </div>
                            <div class="modal-body">
                                <form action="../Controller/update_disciplina_prof.php?id_discip_pf=<?= $line_ds_pf['id_discip_pf'];?>" method="post">
                                <table>
                                    <tr>
                                      <td id="infor-form-det-mat">Disciplina:</td>
                                      <td id="inputs-det-matri">
                                        <select type="text" name="discip_id" class="form-control" id="inut-cad">
                                            <option value="<?= $line_ds_pf['id_discip'];?>"><?= $line_ds_pf['nome_discip'];?></option>
                                           <?php
                                           include_once  '../Persistence/disciplina.Crud.php';
                                            $crudDiscip = new CRUDDiscip();
                                            $result = $crudDiscip->listDiscip();
                                           while($line = array_shift($result)){?>
                                           <option value="<?= $line->getId_discip();?>"><?= $line->getNome_discip();?></option>
                                           <?php } ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                      <td id="infor-form-det-mat">Turno:</td>
                                      <td id="inputs-det-matri">
                                        <select  type="text" name="turno_prof" class="form-control" id="inut-cad">
                                            <option><?= $line_ds_pf['turno_prof'];?></option>
                                            <option>Manhã</option>
                                            <option>Tarde</option>
                                            <option>Manhã / Tarde</option>
                                            <option>Tarde / Noite</option>
                                            <option>Noite</option>
                                            </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>  Cancelar</button>
                                  <button  class="btn btn-primary"><i class="fa fa-save"></i>   Salvar </button>
                                </form>
                                </div>
                              </div>
                          </div>
                        </div>
                        <!-- fim --> 
                        <a  href="" data-toggle="modal" data-target="#modal-delete-discip<?= $line_ds_pf['id_discip_pf'];?>">
                        <i id="icon-del-tabela" class="fa fa-trash"></i>
                         </a>
                                <!-- ========== modal delete discip ========-->
                                <div class="modal fade" id="modal-delete-discip<?= $line_ds_pf['id_discip_pf'];?>">
                                <div class="modal-dialog"  id="posicao-modal">
                                  <div class="modal-content"  id="tamanho-modal">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                    <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                                    <a href="../Controller/delete_disciplina_professor.php?id_discip_pf=<?= $line_ds_pf['id_discip_pf'];?>">
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
                <?php }?> 
              </div>
                
		</div>
		  </div>
		</div>
      </div>

        <!-- ========== modal delete ========-->
        <div class="modal fade" id="modal-delete<?= $line_prof->getId_prof();?>">
        <div class="modal-dialog"  id="posicao-modal">
          <div class="modal-content"  id="tamanho-modal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
            <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
            <a href="../Controller/delete_professor.php?id_prof=<?= $line_prof->getId_prof();?>">
            <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
            <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <!-- ========== modal add disciplina ========-->
            <div class="modal fade" id="modal-add-discip<?= $line_prof->getId_prof();?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar disciplinas lecionadas</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/insert_disciplina_prof.php?id_prof=<?= $line_prof->getId_prof();?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Disciplina:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="discip_id" class="form-control" id="inut-cad" required="">
                            <option></option>
                           <?php
                           include_once  '../Persistence/disciplina.Crud.php';
                            $crudDiscip = new CRUDDiscip();
                            $result = $crudDiscip->listDiscip();
                           while($line = array_shift($result)){?>
                           <option value="<?= $line->getId_discip();?>"><?= $line->getNome_discip();?></option>
                           <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Turno:</td>
                      <td id="inputs-det-matri">
                        <select  type="text" name="turno_prof" class="form-control" id="inut-cad" required="">
                            <option></option>
                            <option>Manhã</option>
                            <option>Tarde</option>
                            <option>Manhã / Tarde</option>
                            <option>Tarde / Noite</option>
                            <option>Noite</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>  Cancelar</button>
              <button  class="btn btn-primary"><i class="fa fa-save"></i>   Salvar </button>
            </form>
            </div>
          </div>
      </div>
    </div>
    <!-- fim --> 

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
  </body>
</html>