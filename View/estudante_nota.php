<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0 );
include_once '../Persistence/conection.php';
$id_matric = $_GET['id_matric'];
$sql = "SELECT * FROM tb_matriculas MT JOIN tb_estudantes ET ON MT.estud_cod = ET.id_estud WHERE id_matric='$id_matric'";
$consult = mysqli_query($conexao, $sql);
$line_mt = mysqli_fetch_assoc($consult)
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
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-list"></i> Notas do Estudante</div>
					        </div>
			  				<div class="panel-body">
			  					<table class="table table-striped">
				              <thead>
				                <tr  id="th-tabela">
				                  <th>Estudante: <?= $line_mt['nome_estud'];?><br> Série: <?= $line_mt['serie_estud'];?></th>
                                  </tr>
                              </thead>
				            </table>
			  				</div>
			  			</div>
	  				</div>
              </div>
            <div class="content-box-large">
  		    <div class="panel-heading">
				<div class="panel-title"><i class="fa fa-plus"></i> Informações</div>
                <div class="pull-right">
                 <button  id="btn-add-det-mat" data-toggle="modal" data-target="#modal-nota<?= $line_mt['id_matric'];?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Adicionar Nota</button>
                </div>
				</div>
  				<div class="panel-body">
                <div>
                    <div>
                        <div>
				            <ul class="nav nav-pills">
								  	<li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-tag"></i> 1º Bimestre</a></li>
									<li><a href="#tab2" data-toggle="tab"><i class="fa fa-tag"></i> 2º Bimestre</a></li>
									<li><a href="#tab3" data-toggle="tab"><i class="fa fa-tag"></i> 3º Bimestre</a></li>
                                    <li><a href="#tab4" data-toggle="tab"><i class="fa fa-tag"></i> 4º Bimestre</a></li>
                                    <li><a href="#tab5" data-toggle="tab"><i class="fa fa-tag"></i> Média</a></li>
								</ul>
								</div>
				               </div>
				            </div>
				        <div class="tab-content">
                           <!--====== b1 ====--> 
				         <div class="tab-pane active" id="tab1">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <thead>
                         <tr  id="th-tabela">
                           <th>Professor</th>
                           <th>Disciplina</th>
                           <th>Nota</th>
                           <th>Ação</th>
                         </tr>
                       </thead>
                       <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_notas_estudante NE JOIN tb_matriculas M ON  NE.matricula_nota = M.id_matric JOIN tb_disciplinas D ON NE.disciplina_nota = D.id_discip JOIN tb_professores P ON NE.prof = P.id_prof WHERE id_matric = '$id_matric' AND bimestre_nota=1";
                        $consult = mysqli_query($conexao, $sql);
                        while($line_nota = mysqli_fetch_array($consult)){
                    ?>
                 <tr id="infor-freq">
                    <td><?= $line_nota['nome_prof']?></td>
                    <td><?= $line_nota['nome_discip']?></td>
                    <td><?= $line_nota['nota']?>
                    <i id="icon-del-freq" class="fa fa-comment" data-toggle="modal" data-target="#modal-anotacao-nota<?= $line_nota['id_nota'];?>"></i>
                     <!-- ========== modal anotação nota ========-->
                    <div class="modal fade" id="modal-anotacao-nota<?= $line_nota['id_nota'];?>">
                      <div class="modal-dialog"  id="posicao-modal">
                        <div class="modal-content"  id="tamanho-modal">
                            <div class="modal-header">
                                <h4 class="modal-title">Anotações sobre a nota</h4>
                               </div>
                                <div class="modal-body text-left">
                                <small id="pergunta-modal"> 
                                    <?= $line_nota['anotacao'];?>
                                    </small><br><br>
                                 </div>
                             <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>  Fechar</button>
                                </div>
                                </div>
                            </div>
                         </div> 
                     </td>
                    <td>
               <i id="icon-list-freq" class="fa fa-pencil"  data-toggle="modal" data-target="#modal-alterar-nota<?= $line_nota['id_nota'];?>"></i>
                <!-- ========== modal alterar nota ========-->
                <div class="modal fade" id="modal-alterar-nota<?= $line_nota['id_nota'];?>">
                <div class="modal-dialog" id="posicao-modal">
                <div class="modal-content" id="tamanho-modal">
                <div class="modal-header">
                  <h4 class="modal-title">Alterar dados da nota do(a) estudante</h4>
                </div>
                <div class="modal-body">
                <form action="../Controller/update_nota.php?id_nota=<?= $line_nota['id_nota'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Disciplina:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="disciplina_nota" class="form-control" id="inut-cad">
                         <option value="<?= $line_nota['disciplina_nota'];?>">
                             <?= $line_nota['nome_discip'];?></option>
                       <?php
                        include_once  '../Persistence/disciplina.Crud.php';
                        $crudDiscip = new CRUDDiscip();
                        $result = $crudDiscip->listDiscip();
                        while($line_de = array_shift($result)){
                        ?>
                        <option value="<?= $line_de->getId_discip();?>">
                        <?= $line_de->getNome_discip();?></option>
                           <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Bimestre:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="bimestre_nota" class="form-control" id="inut-cad">
                         <option value="<?= $line_nota['bimestre_nota'];?>">
                        <?php if($line_nota['bimestre_nota'] == 1){
                            $b1 = "1º Bimestre"; }?>
                          <?= $b1;?></option>
                        <option value="1">1º Bimestre</option>
                        <option value="2">2º Bimestre</option>
                        <option value="3">3º Bimestre</option>
                        <option value="4">4º Bimestre</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Nota:</td>
                      <td id="inputs-det-matri">
                        <input type="text" name="nota" value="<?= $line_nota['nota'];?>" class="form-control" id="exampleInputEmail1">
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Anotações:</td>
                      <td id="inputs-det-matri">
                          <textarea id="anotacao-nota" type="text" name="anotacao" class="form-control" id="exampleInputEmail1"><?= $line_nota['anotacao'];?></textarea>
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
    <i id="icon-del-freq" class="fa fa-trash"  data-toggle="modal" data-target="#modal-delete-nota<?= $line_nota['id_nota'];?>"></i>
       <!-- ========== modal delete nota ========-->
            <div class="modal fade" id="modal-delete-nota<?= $line_nota['id_nota'];?>">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                         <a href="../Controller/delete_nota.php?id_nota=<?= $line_nota['id_nota'];?>">
                         <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                        <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
                         </div>
                        </div>
                    </div>
                    </div>             
                    </td>
                   </tr>
                <?php } ?>            
                </tbody>
               </table>
                </div>
                <!--==== b2 ===-->
		          <div class="tab-pane" id="tab2">
                  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <thead>
                         <tr  id="th-tabela">
                           <th>Professor</th>
                           <th>Disciplina</th>
                           <th>Nota</th>
                           <th>Ação</th>
                         </tr>
                       </thead>
                       <tbody>
                        <?php
                       $sql = "SELECT * FROM tb_notas_estudante NE JOIN tb_matriculas M ON  NE.matricula_nota = M.id_matric JOIN tb_disciplinas D ON NE.disciplina_nota = D.id_discip JOIN tb_professores P ON NE.prof = P.id_prof WHERE id_matric = '$id_matric' AND bimestre_nota=2";
                        $consult = mysqli_query($conexao, $sql);
                        while($line_nota = mysqli_fetch_array($consult)){
                    ?>
                 <tr id="infor-freq">
                    <td><?= $line_nota['nome_prof']?></td>
                    <td><?= $line_nota['nome_discip']?></td>
                    <td><?= $line_nota['nota']?>
                    <i id="icon-del-freq" class="fa fa-comment" data-toggle="modal" data-target="#modal-anotacao-nota<?= $line_nota['id_nota'];?>"></i>
                     <!-- ========== modal anotação nota ========-->
                    <div class="modal fade" id="modal-anotacao-nota<?= $line_nota['id_nota'];?>">
                      <div class="modal-dialog"  id="posicao-modal">
                        <div class="modal-content"  id="tamanho-modal">
                            <div class="modal-header">
                                <h4 class="modal-title">Anotações sobre a nota</h4>
                               </div>
                                <div class="modal-body text-left">
                                <small id="pergunta-modal"> 
                                    <?= $line_nota['anotacao'];?>
                                    </small><br><br>
                                 </div>
                             <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>  Fechar</button>
                                </div>
                                </div>
                            </div>
                         </div> 
                     </td>
                    <td>
               <i id="icon-list-freq" class="fa fa-pencil"  data-toggle="modal" data-target="#modal-alterar-nota<?= $line_nota['id_nota'];?>"></i>
                <!-- ========== modal alterar nota ========-->
                <div class="modal fade" id="modal-alterar-nota<?= $line_nota['id_nota'];?>">
                <div class="modal-dialog" id="posicao-modal">
                <div class="modal-content" id="tamanho-modal">
                <div class="modal-header">
                  <h4 class="modal-title">Alterar dados da nota do(a) estudante</h4>
                </div>
                <div class="modal-body">
                <form action="../Controller/update_nota.php?id_nota=<?= $line_nota['id_nota'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Disciplina:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="disciplina_nota" class="form-control" id="inut-cad">
                         <option value="<?= $line_nota['disciplina_nota'];?>">
                             <?= $line_nota['nome_discip'];?></option>
                       <?php
                        include_once  '../Persistence/disciplina.Crud.php';
                        $crudDiscip = new CRUDDiscip();
                        $result = $crudDiscip->listDiscip();
                        while($line_de = array_shift($result)){
                        ?>
                        <option value="<?= $line_de->getId_discip();?>">
                        <?= $line_de->getNome_discip();?></option>
                           <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Bimestre:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="bimestre_nota" class="form-control" id="inut-cad">
                         <option value="<?= $line_nota['bimestre_nota'];?>">
                        <?php if($line_nota['bimestre_nota'] == 1){
                            $b1 = "1º Bimestre"; }?>
                          <?= $b1;?></option>
                        <option value="1">1º Bimestre</option>
                        <option value="2">2º Bimestre</option>
                        <option value="3">3º Bimestre</option>
                        <option value="4">4º Bimestre</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Nota:</td>
                      <td id="inputs-det-matri">
                        <input type="text" name="nota" value="<?= $line_nota['nota'];?>" class="form-control" id="exampleInputEmail1">
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Anotações:</td>
                      <td id="inputs-det-matri">
                          <textarea id="anotacao-nota" type="text" name="anotacao" class="form-control" id="exampleInputEmail1"><?= $line_nota['anotacao'];?></textarea>
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
    <i id="icon-del-freq" class="fa fa-trash"  data-toggle="modal" data-target="#modal-delete-nota<?= $line_nota['id_nota'];?>"></i>
       <!-- ========== modal delete nota ========-->
            <div class="modal fade" id="modal-delete-nota<?= $line_nota['id_nota'];?>">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                         <a href="../Controller/delete_nota.php?id_nota=<?= $line_nota['id_nota'];?>">
                         <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                        <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
                         </div>
                        </div>
                    </div>
                    </div>             
                    </td>
                   </tr>
                <?php } ?>            
                </tbody>
               </table>
				</div>
                <!--==== b3 ====--->
				<div class="tab-pane" id="tab3">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <thead>
                         <tr  id="th-tabela">
                           <th>Professor</th>
                           <th>Disciplina</th>
                           <th>Nota</th>
                           <th>Ação</th>
                         </tr>
                       </thead>
                       <tbody>
                        <?php
                         $sql = "SELECT * FROM tb_notas_estudante NE JOIN tb_matriculas M ON  NE.matricula_nota = M.id_matric JOIN tb_disciplinas D ON NE.disciplina_nota = D.id_discip JOIN tb_professores P ON NE.prof = P.id_prof WHERE id_matric = '$id_matric' AND bimestre_nota=3";
                        $consult = mysqli_query($conexao, $sql);
                        while($line_nota = mysqli_fetch_array($consult)){
                    ?>
                 <tr id="infor-freq">
                    <td><?= $line_nota['nome_prof']?></td>
                    <td><?= $line_nota['nome_discip']?></td>
                    <td><?= $line_nota['nota']?>
                    <i id="icon-del-freq" class="fa fa-comment" data-toggle="modal" data-target="#modal-anotacao-nota<?= $line_nota['id_nota'];?>"></i>
                     <!-- ========== modal anotação nota ========-->
                    <div class="modal fade" id="modal-anotacao-nota<?= $line_nota['id_nota'];?>">
                      <div class="modal-dialog"  id="posicao-modal">
                        <div class="modal-content"  id="tamanho-modal">
                            <div class="modal-header">
                                <h4 class="modal-title">Anotações sobre a nota</h4>
                               </div>
                                <div class="modal-body text-left">
                                <small id="pergunta-modal"> 
                                    <?= $line_nota['anotacao'];?>
                                    </small><br><br>
                                 </div>
                             <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>  Fechar</button>
                                </div>
                                </div>
                            </div>
                         </div> 
                     </td>
                    <td>
               <i id="icon-list-freq" class="fa fa-pencil"  data-toggle="modal" data-target="#modal-alterar-nota<?= $line_nota['id_nota'];?>"></i>
                <!-- ========== modal alterar nota ========-->
                <div class="modal fade" id="modal-alterar-nota<?= $line_nota['id_nota'];?>">
                <div class="modal-dialog" id="posicao-modal">
                <div class="modal-content" id="tamanho-modal">
                <div class="modal-header">
                  <h4 class="modal-title">Alterar dados da nota do(a) estudante</h4>
                </div>
                <div class="modal-body">
                <form action="../Controller/update_nota.php?id_nota=<?= $line_nota['id_nota'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Disciplina:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="disciplina_nota" class="form-control" id="inut-cad">
                         <option value="<?= $line_nota['disciplina_nota'];?>">
                             <?= $line_nota['nome_discip'];?></option>
                       <?php
                        include_once  '../Persistence/disciplina.Crud.php';
                        $crudDiscip = new CRUDDiscip();
                        $result = $crudDiscip->listDiscip();
                        while($line_de = array_shift($result)){
                        ?>
                        <option value="<?= $line_de->getId_discip();?>">
                        <?= $line_de->getNome_discip();?></option>
                           <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Bimestre:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="bimestre_nota" class="form-control" id="inut-cad">
                         <option value="<?= $line_nota['bimestre_nota'];?>">
                        <?php if($line_nota['bimestre_nota'] == 1){
                            $b1 = "1º Bimestre"; }?>
                          <?= $b1;?></option>
                        <option value="1">1º Bimestre</option>
                        <option value="2">2º Bimestre</option>
                        <option value="3">3º Bimestre</option>
                        <option value="4">4º Bimestre</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Nota:</td>
                      <td id="inputs-det-matri">
                        <input type="text" name="nota" value="<?= $line_nota['nota'];?>" class="form-control" id="exampleInputEmail1">
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Anotações:</td>
                      <td id="inputs-det-matri">
                          <textarea id="anotacao-nota" type="text" name="anotacao" class="form-control" id="exampleInputEmail1"><?= $line_nota['anotacao'];?></textarea>
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
    <i id="icon-del-freq" class="fa fa-trash"  data-toggle="modal" data-target="#modal-delete-nota<?= $line_nota['id_nota'];?>"></i>
       <!-- ========== modal delete nota ========-->
            <div class="modal fade" id="modal-delete-nota<?= $line_nota['id_nota'];?>">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                         <a href="../Controller/delete_nota.php?id_nota=<?= $line_nota['id_nota'];?>">
                         <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                        <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
                         </div>
                        </div>
                    </div>
                    </div>             
                    </td>
                   </tr>
                <?php } ?>            
                </tbody>
               </table>
                </div>
                <!--==== b4 ====--->
				<div class="tab-pane" id="tab4">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <thead>
                         <tr  id="th-tabela">
                           <th>Professor</th>
                           <th>Disciplina</th>
                           <th>Nota</th>
                           <th>Ação</th>
                         </tr>
                       </thead>
                       <tbody>
                        <?php
                         $sql = "SELECT * FROM tb_notas_estudante NE JOIN tb_matriculas M ON  NE.matricula_nota = M.id_matric JOIN tb_disciplinas D ON NE.disciplina_nota = D.id_discip JOIN tb_professores P ON NE.prof = P.id_prof WHERE id_matric = '$id_matric' AND bimestre_nota=4";
                        $consult = mysqli_query($conexao, $sql);
                        while($line_nota = mysqli_fetch_array($consult)){
                    ?>
                 <tr id="infor-freq">
                    <td><?= $line_nota['nome_prof']?></td>
                    <td><?= $line_nota['nome_discip']?></td>
                    <td><?= $line_nota['nota']?>
                    <i id="icon-del-freq" class="fa fa-comment" data-toggle="modal" data-target="#modal-anotacao-nota<?= $line_nota['id_nota'];?>"></i>
                     <!-- ========== modal anotação nota ========-->
                    <div class="modal fade" id="modal-anotacao-nota<?= $line_nota['id_nota'];?>">
                      <div class="modal-dialog"  id="posicao-modal">
                        <div class="modal-content"  id="tamanho-modal">
                            <div class="modal-header">
                                <h4 class="modal-title">Anotações sobre a nota</h4>
                               </div>
                                <div class="modal-body text-left">
                                <small id="pergunta-modal"> 
                                    <?= $line_nota['anotacao'];?>
                                    </small><br><br>
                                 </div>
                             <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>  Fechar</button>
                                </div>
                                </div>
                            </div>
                         </div> 
                     </td>
                    <td>
               <i id="icon-list-freq" class="fa fa-pencil"  data-toggle="modal" data-target="#modal-alterar-nota<?= $line_nota['id_nota'];?>"></i>
                <!-- ========== modal alterar nota ========-->
                <div class="modal fade" id="modal-alterar-nota<?= $line_nota['id_nota'];?>">
                <div class="modal-dialog" id="posicao-modal">
                <div class="modal-content" id="tamanho-modal">
                <div class="modal-header">
                  <h4 class="modal-title">Alterar dados da nota do(a) estudante</h4>
                </div>
                <div class="modal-body">
                <form action="../Controller/update_nota.php?id_nota=<?= $line_nota['id_nota'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Disciplina:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="disciplina_nota" class="form-control" id="inut-cad">
                         <option value="<?= $line_nota['disciplina_nota'];?>">
                             <?= $line_nota['nome_discip'];?></option>
                       <?php
                        include_once  '../Persistence/disciplina.Crud.php';
                        $crudDiscip = new CRUDDiscip();
                        $result = $crudDiscip->listDiscip();
                        while($line_de = array_shift($result)){
                        ?>
                        <option value="<?= $line_de->getId_discip();?>">
                        <?= $line_de->getNome_discip();?></option>
                           <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Bimestre:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="bimestre_nota" class="form-control" id="inut-cad">
                         <option value="<?= $line_nota['bimestre_nota'];?>">
                        <?php if($line_nota['bimestre_nota'] == 1){
                            $b1 = "1º Bimestre"; }?>
                          <?= $b1;?></option>
                        <option value="1">1º Bimestre</option>
                        <option value="2">2º Bimestre</option>
                        <option value="3">3º Bimestre</option>
                        <option value="4">4º Bimestre</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Nota:</td>
                      <td id="inputs-det-matri">
                        <input type="text" name="nota" value="<?= $line_nota['nota'];?>" class="form-control" id="exampleInputEmail1">
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Anotações:</td>
                      <td id="inputs-det-matri">
                          <textarea id="anotacao-nota" type="text" name="anotacao" class="form-control" id="exampleInputEmail1"><?= $line_nota['anotacao'];?></textarea>
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
    <i id="icon-del-freq" class="fa fa-trash"  data-toggle="modal" data-target="#modal-delete-nota<?= $line_nota['id_nota'];?>"></i>
       <!-- ========== modal delete nota ========-->
            <div class="modal fade" id="modal-delete-nota<?= $line_nota['id_nota'];?>">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                         <a href="../Controller/delete_nota.php?id_nota=<?= $line_nota['id_nota'];?>">
                         <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                        <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
                         </div>
                        </div>
                    </div>
                    </div>             
                    </td>
                   </tr>
                <?php } ?>            
                </tbody>
               </table>
                </div>
              <!--==== b5 ====--->
            <div class="tab-pane" id="tab5">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
            <thead>
                 <tr  id="th-tabela">
                   <th>Disciplina</th>
                   <th>Professor(a)</th>
                   <th></th>
                 </tr>
               </thead>
               <tbody>
            <?php
            // listar as diciplinas por ordem
           $sql = "SELECT * FROM tb_notas_estudante NE JOIN tb_matriculas M ON  NE.matricula_nota = M.id_matric JOIN tb_disciplinas D ON NE.disciplina_nota = D.id_discip JOIN tb_professores P ON NE.prof = P.id_prof WHERE id_matric = '$id_matric' GROUP BY disciplina_nota ";
            $consult = mysqli_query($conexao, $sql);
             while($line_nota = mysqli_fetch_array($consult)){
                    ?>
                <tr id="infor-freq">
                <td><?= $line_nota['nome_discip'];?></td>
                <td><?= $line_nota['nome_prof'];?></td>
                <td class="text-center" >
                <i id="icon-list-tabela" class="fa fa-folder-open"  data-toggle="modal" data-target="#modal-media<?= $line_nota['disciplina_nota'];?>"></i>
            <!-- ========== modal media ========-->
            <div class="modal fade" id="modal-media<?= $line_nota['disciplina_nota'];?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header text-left">
                  <h4 class="modal-title">Disciplina: <?= $line_nota['nome_discip'];?> - Professor(a):  <?= $line_nota['nome_prof'];?></h4>
                </div>
                <div class="modal-body text-left" id="texto-nota">
                 <?php
                   // listar bimestre e notas
                $disciplina = $line_nota['disciplina_nota'];
                $sql = "SELECT * FROM tb_notas_estudante NE JOIN tb_matriculas M ON  NE.matricula_nota = M.id_matric JOIN tb_disciplinas D ON NE.disciplina_nota = D.id_discip JOIN tb_professores P ON NE.prof = P.id_prof WHERE id_matric = '$id_matric' AND disciplina_nota='$disciplina'";
                $consult_nota = mysqli_query($conexao, $sql);
                while($line_media = mysqli_fetch_array($consult_nota)){
                if($line_media['bimestre_nota'] == 1){
                    $bm = "1º Bimestre";
                    $nota1 =  $line_media['nota'];?>
                    <p><?= $bm;?> Nota: <?= $nota1;?></p>
                    <?php }elseif($line_media['bimestre_nota'] == 2){
                     $bm = "2º Bimestre";
                       $nota2 =  $line_media['nota'];?>
                    <p><?= $bm;?> Nota: <?= $nota2;?></p>
                   
                    <?php }elseif($line_media['bimestre_nota'] == 3){
                     $bm = "3º Bimestre";
                        $nota3 =  $line_media['nota'];?>
                    <p><?= $bm;?> Nota: <?= $nota3;?></p>
                    <?php }elseif($line_media['bimestre_nota'] == 4){
                     $bm = "4º Bimestre";
                        $nota4 =  $line_media['nota'];?>
                     <p><?= $bm;?> Nota: <?= $nota4;?></p>
                   <?php  }?>
                 <?php } ?>
                    =============================<br>
                    <?php
                    $media1 = ($nota1 + $nota2) / 2;
                    echo "Média do 1º Semestre: $media1 <br>";
                     if($media1 >= 6){
                         echo "Situação: Aprovado";
                     }elseif($media1 < 6 && $media1 >= 4){
                          echo "Situação: Recuperação";
                     }elseif($media1 < 4){
                           echo "Situação: Reprovado";
                     }
                     ?>
                   <br>=============================<br>
                     <?php
                    $media2 = ($nota3 + $nota4) / 2;
                    echo "Média do 2º Semestre: $media2 <br>";
                     if($media2 >= 6){
                         echo "Situação: Aprovado";
                     }elseif($media2 < 6 && $media2 >= 4){
                          echo "Situação: Recuperação";
                     }elseif($media2 < 4){
                           echo "Situação: Reprovado";
                     }
                     ?>
                      <br>=============================<br>
                     <?php
                   $pontos = ($nota1 + $nota2 + $nota3 + $nota4);
                   echo "Pontos: $pontos <br>";
                    $media_final = ($media1 + $media2) / 2;
                    echo "Média Final: $media_final <br>";
                     if($media_final >= 6){
                         echo "Situação: Aprovado";
                     }elseif($media_final < 6 && $media_final >= 4 ){
                          echo "Situação: Recuperação";
                     }elseif($media_final < 4 ){
                        echo "Situação: Reprovado";
                     }
                     ?>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal"> Fechar</button>
                </div>
              </div>
            </div> 
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
      </div>
    </div>
      
     <!-- ========== modal adicionar nota ========-->
         <div class="modal fade" id="modal-nota<?= $line_mt['id_matric'];?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Inserir nota do(a) estudante</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/insert_nota.php?id_matric=<?= $line_mt['id_matric'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Professor(a):</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="prof" class="form-control" id="inut-cad"  required="">
                         <option></option>
                       <?php
                        include_once  '../Persistence/professor.Crud.php';
                        $crudProf = new CRUDProf();
                        $result = $crudProf->listProf();
                        while($line_pe = array_shift($result)){
                        ?>
                        <option value="<?= $line_pe->getId_prof();?>">
                        <?= $line_pe->getNome_prof();?></option>
                           <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Disciplina:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="disciplina_nota" class="form-control" id="inut-cad"  required="">
                         <option></option>
                       <?php
                        include_once  '../Persistence/disciplina.Crud.php';
                        $crudDiscip = new CRUDDiscip();
                        $result = $crudDiscip->listDiscip();
                        while($line_de = array_shift($result)){
                        ?>
                        <option value="<?= $line_de->getId_discip();?>">
                        <?= $line_de->getNome_discip();?></option>
                           <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Bimestre:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="bimestre_nota" class="form-control" id="inut-cad"  required="">
                         <option></option>
                        <option value="1">1º Bimestre</option>
                        <option value="2">2º Bimestre</option>
                        <option value="3">3º Bimestre</option>
                        <option value="4">4º Bimestre</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Nota:</td>
                      <td id="inputs-det-matri">
                        <input type="text" name="nota" class="form-control" id="exampleInputEmail1"  required="">
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Anotações:</td>
                      <td id="inputs-det-matri">
                          <textarea  id="anotacao-nota"  type="text" name="anotacao" class="form-control" id="exampleInputEmail1"></textarea>
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