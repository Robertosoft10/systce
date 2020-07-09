
<?php
session_start();
$x = 'Cadastrou nota';
include_once  '../Persistence/logs.php';
include_once '../Persistence/conection.php';
$id_matric = $_GET['id_matric'];
$sql = "SELECT * FROM tb_matriculas MT JOIN tb_estudantes ET ON MT.estud_cod = ET.id_estud WHERE id_matric='$id_matric'";
$consult = mysqli_query($conexao, $sql);
$line_mt = mysqli_fetch_assoc($consult);

$matricula_nota = $_GET['id_matric'];
$prof = $_POST['prof'];
$disciplina_nota = $_POST['disciplina_nota'];
$bimestre_nota = $_POST['bimestre_nota'];
$nota = $_POST['nota'];
$anotacao = $_POST['anotacao'];

$sql = "INSERT INTO tb_notas_estudante(prof, matricula_nota, disciplina_nota, bimestre_nota, nota, anotacao)
VALUES('$prof', '$matricula_nota', '$disciplina_nota', '$bimestre_nota', '$nota', '$anotacao')";
$execute = mysqli_query($conexao, $sql);

if($execute == true){
    $_SESSION['notaAdd'] = "Nota inserida com sucesso!";
    
}else{
    $_SESSION['notaAddErro'] = "Falha tente novamente";
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
					            <div class="panel-title"><i class="fa fa-edit"></i> Detalhe da Matrícula</div>
                                <a href="estudante_nota.php?id_matric=<?= $line_mt['id_matric'];?>">
                                <button class="btn btn-primary btn-sm pull-right"><i class="fa fa-list"></i> Notas</button></a>
					        </div>
			  				<div class="panel-body">
			  					<table class="table table-striped">
				              <thead>
				                <tr  id="th-tabela">
				                  <th>Estudante</th>
				                  <th>Série</th>
				                  <th>Turno</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td><?= $line_mt['nome_estud'];?></td>
				                  <td><?= $line_mt['serie_estud'];?></td>
				                  <td><?= $line_mt['turno_estud'];?></td>
				                </tr>
				                <tr>
				                  <th colspan="2">Endereço</th>
				                  <th>Telefone</th>
				                </tr>
                                <tr>
				                  <td  colspan="2"><?= $line_mt['endereco_estud'];?></td>
				                  <td><?= $line_mt['fone_estud'];?></td>
				                </tr>
				              </tbody>
				            </table>
			  				</div>
			  			</div>
	  				</div>
              </div>
            <div class="content-box-large">
  		    <div class="panel-heading">
        <div class="panel-title"><i class="fa fa-plus"></i> Informações</div>
	</div>
  	<div class="panel-body">
    <div>
        <div>
            <div>
                <ul class="nav nav-pills">
                    <li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-calendar"></i> Frequência</a></li>
				    <li><a href="#tab2" data-toggle="tab"><i class="fa fa-male"></i> <i class="fa fa-desktop"></i> <i class="fa fa-female"></i> Professores</a></li>
				    <li><a href="#tab3" data-toggle="tab"><i class="fa fa-book"></i> Disciplinas</a></li>
                </ul>
		  </div>
        </div>
	</div>
	<div class="tab-content">
    <!--====== frequencia ====--> 
    <div class="tab-pane active" id="tab1">
        <button  id="btn-add-det-mat" data-toggle="modal" data-target="#modal-chamada<?= $line_mt['id_matric'];?>" class="btn btn-primary btn-sm pull-right">
         <i class="fa fa-calendar"></i> Fazer Chamada</button><br>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr  id="th-tabela">
                <th>Dia</th>
                <th>Data</th>
                <th>Status</th>
                <th>Ação</th>
          </tr>
        </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tb_frequencias F JOIN tb_matriculas M ON F.matricula = M.id_matric WHERE id_matric='$id_matric'";
            $consult = mysqli_query($conexao, $sql);
            while($line_fq = mysqli_fetch_array($consult)){
            ?>
           <tr id="infor-freq">
             <td><?= $line_fq['dia_freq'];?></td>
             <td><?= date("d/m/Y", strtotime($line_fq['data_freq']));?></td>
             <td><?= $line_fq['status_freq'];?></td>
             <td>
            <a  href=""  data-toggle="modal" data-target="#modal-alterar-chamada<?= $line_fq['id_freq'];?>"><i id="icon-list-freq" class="fa fa-pencil"></i></a>
            <!-- ========== modal alterar chamada ========-->
            <div class="modal fade" id="modal-alterar-chamada<?= $line_fq['id_freq'];?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Alterar dados da chamada</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/update_frequencia.php?id_freq=<?= $line_fq['id_freq'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Dia:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="dia_freq" class="form-control" id="inut-cad">
                         <option><?= $line_fq['dia_freq'];?></option>
                        <option>Segunda Feira</option>
                        <option>Terça Feira</option>
                        <option>Quarta Feira</option>
                        <option>Quinta Feira</option>
                        <option>Sexta Feira</option>
                        <option>Sábado</option>
                        <option>Domingo</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Data:</td>
                      <td id="inputs-det-matri">
                        <input type="date" name="data_freq" class="form-control" id="exampleInputEmail1" value="<?= $line_fq['data_freq'];?>">
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Status:</td>
                      <td id="inputs-det-matri">
                        <select  type="text" name="status_freq" class="form-control" id="inut-cad">
                        <option><?= $line_fq['status_freq'];?></option>
                        <option>Presença</option>
                        <option>Falta</option>
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
    <a  href="" data-toggle="modal" data-target="#modal-delete-freq<?= $line_fq['id_freq'];?>">
        <i id="icon-del-freq" class="fa fa-trash"></i></a>
            <!-- ========== modal delete frequencia ========-->
            <div class="modal fade" id="modal-delete-freq<?= $line_fq['id_freq'];?>">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                         <a href="../Controller/delete_frequencia.php?id_freq=<?= $line_fq['id_freq'];?>">
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
        <!--==== professores ===-->
		<div class="tab-pane" id="tab2">
         <button  id="btn-add-det-mat" data-toggle="modal" data-target="#modal-professor<?= $line_mt['id_matric'];?>" class="btn btn-primary btn-sm pull-right">
         <i class="fa fa-plus"></i> Professor</button><br>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr  id="th-tabela">
                <th>Prefessor</th>
                <th>Ação</th>
          </tr>
        </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tb_professor_estud PE JOIN tb_matriculas M ON PE.estudante_matric = M.id_matric JOIN tb_professores P ON PE.prof = P.id_prof WHERE id_matric='$id_matric'";
            $consult_pfet = mysqli_query($conexao, $sql);
            while($line_pf_estd = mysqli_fetch_array($consult_pfet)){
            ?>
           <tr id="infor-freq">
             <td><?= $line_pf_estd['nome_prof'];?></td>
               <td id="td-detalhe-matric">
               <a  href=""  data-toggle="modal" data-target="#modal-alterar-prof<?= $line_pf_estd['id_prof_estud'];?>"><i id="icon-list-freq" class="fa fa-pencil"></i></a>
            <!-- ========== modal alterar professor estudante ========-->
            <div class="modal fade" id="modal-alterar-prof<?= $line_pf_estd['id_prof_estud'];?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Alterar professor(a) do(a) estudante</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/update_professor_estudante.php?id_prof_estud=<?= $line_pf_estd['id_prof_estud'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Professor(a):</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="prof" class="form-control" id="inut-cad"  >
                            <option value="<?= $line_pf_estd['id_prof'];?>">
                            <?= $line_pf_estd['nome_prof'];?></option>
                        <?php
                        include_once  '../Persistence/professor.Crud.php';
                        $crudProf = new CRUDProf();
                        $result = $crudProf->listProf();
                        while($line_pf = array_shift($result)){
                        ?>
                        <option value="<?= $line_pf->getId_prof();?>">
                        <?= $line_pf->getNome_prof();?></option>
                           <?php } ?>
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
    <a  href="" data-toggle="modal" data-target="#modal-delete-freq<?= $line_pf_estd['id_prof_estud'];?>">
        <i id="icon-del-freq" class="fa fa-trash"></i></a>
            <!-- ========== modal delete professor estudante ========-->
            <div class="modal fade" id="modal-delete-freq<?= $line_pf_estd['id_prof_estud'];?>">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                         <a href="../Controller/delete_professor_estudante.php?id_prof_estud=<?= $line_pf_estd['id_prof_estud'];?>">
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
    <!--==== disciplinas ====--->
    <div class="tab-pane" id="tab3">
     <button  id="btn-add-det-mat" data-toggle="modal" data-target="#modal-disip<?= $line_mt['id_matric'];?>" class="btn btn-primary btn-sm pull-right">
         <i class="fa fa-plus"></i> Disciplina</button><br>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr  id="th-tabela">
                <th>Disciplinas</th>
                <th>Ação</th>
          </tr>
        </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tb_disciplina_estud DE JOIN tb_matriculas M ON DE.matric_estud_cod = M.id_matric JOIN tb_disciplinas D ON DE.disciplina_cod = D.id_discip WHERE id_matric='$id_matric'";
            $consult_dcet = mysqli_query($conexao, $sql);
            while($line_de_estd = mysqli_fetch_array($consult_dcet)){
            ?>
           <tr id="infor-freq">
             <td><?= $line_de_estd['nome_discip'];?></td>
               <td id="td-detalhe-matric">
               <a  href=""  data-toggle="modal" data-target="#modal-alterar-discip<?= $line_de_estd['id_discip_estud'];?>"><i id="icon-list-freq" class="fa fa-pencil"></i></a>
            <!-- ========== modal alterar disciplina estudante ========-->
            <div class="modal fade" id="modal-alterar-discip<?= $line_de_estd['id_discip_estud'];?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Alterar disciplina do(a) estudante</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/update_disciplina_estudante.php?id_discip_estud=<?= $line_de_estd['id_discip_estud'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Disciplina:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="disciplina_cod" class="form-control" id="inut-cad"  >
                        <option value="<?= $line_de_estd['disciplina_cod'];?>">
                        <?= $line_de_estd['nome_discip'];?></option>
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
    <a  href="" data-toggle="modal" data-target="#modal-delete-discip<?= $line_de_estd['id_discip_estud'];?>">
        <i id="icon-del-freq" class="fa fa-trash"></i></a>
            <!-- ========== modal delete disciplina estudante ========-->
            <div class="modal fade" id="modal-delete-discip<?= $line_de_estd['id_discip_estud'];?>">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                         <a href="../Controller/delete_disciplina_estudante.php?id_discip_estud=<?= $line_de_estd['id_discip_estud'];?>">
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
        </div>
        </div>
        </div>
      </div>
    </div>
      <!-- ========== modal chamada ========-->
         <div class="modal fade" id="modal-chamada<?= $line_mt['id_matric'];?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Fazer chamada</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/insert_frequencia.php?id_matric=<?= $line_mt['id_matric'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Dia:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="dia_freq" class="form-control" id="inut-cad"  required="">
                         <option></option>
                        <option>Segunda Feira</option>
                        <option>Terça Feira</option>
                        <option>Quarta Feira</option>
                        <option>Quinta Feira</option>
                        <option>Sexta Feira</option>
                        <option>Sábado</option>
                        <option>Domingo</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Data:</td>
                      <td id="inputs-det-matri">
                        <input type="date" name="data_freq" class="form-control" id="exampleInputEmail1" required="">
                        </td>
                    </tr>
                    <tr>
                      <td id="infor-form-det-mat">Status:</td>
                      <td id="inputs-det-matri">
                        <select  type="text" name="status_freq" class="form-control" id="inut-cad"  required="">
                        <option></option>
                        <option>Presença</option>
                        <option>Falta</option>
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
        <!-- ========== modal add professor estudante ========-->
         <div class="modal fade" id="modal-professor<?= $line_mt['id_matric'];?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Professor(a) do(a) estudante</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/insert_professor_estudante.php?id_matric=<?= $line_mt['id_matric'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Professor(a):</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="prof" class="form-control" id="inut-cad"  >
                            <option></option>
                        <?php
                        include_once  '../Persistence/professor.Crud.php';
                        $crudProf = new CRUDProf();
                        $result = $crudProf->listProf();
                        while($line_pf = array_shift($result)){
                        ?>
                        <option value="<?= $line_pf->getId_prof();?>">
                        <?= $line_pf->getNome_prof();?></option>
                           <?php } ?>
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
        <!-- ========== modal add disciplina estudante ========-->
         <div class="modal fade" id="modal-disip<?= $line_mt['id_matric'];?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Disciplina do(a) estudante</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/insert_disciplina_estudante.php?id_matric=<?= $line_mt['id_matric'];?>" method="post">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Disciplina:</td>
                      <td id="inputs-det-matri">
                        <select type="text" name="disciplina_cod" class="form-control" id="inut-cad"  >
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
        <!-- ========== modal cadastro frequencia ========-->
            <div class="modal fade" id="modalAcerto">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> <?= $_SESSION['notaAdd'];?></small><br><br>
                         <a href="../View/estudante_nota.php?id_matric=<?= $id_matric;?>">
                         <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Ok</button></a>
                         </div>
                        </div>
                    </div>
                    </div>
        <!-- ========== modal erro cadastro frequencia ========-->
            <div class="modal fade" id="myModalErro">
              <div class="modal-dialog"  id="posicao-modal">
                <div class="modal-content"  id="tamanho-modal">
                    <div class="modal-header">
                       </div>
                        <div class="modal-body text-center">
                        <small id="pergunta-modal"> <?= $_SESSION['notaAddErro'];?></small><br><br>
                         <a href="../View/estudante_nota.php?id_matric=<?= $id_matric;?>">
                         <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Ok</button></a>
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
    <script src="../Components/jquery_modal.js"></script>
    <script src="../Components/jquery_modell.js"></script>  
<?php 
if($_SESSION['notaAdd'] == true){
  ?>
<script type="text/javascript">
$(document).ready(function(){
  $('#modalAcerto').modal('show');
});
</script>
<?php
}else{
?>
  <script type="text/javascript">
$(document).ready(function(){
  $('#myModalErro').modal('show');
});
</script>
<?php
}
?>
  </body>
</html>