<?php
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
include_once '../Persistence/conection.php';
$id_matric = $_SESSION['id_matric'];
$sql = "SELECT * FROM tb_matriculas M JOIN tb_estudantes E ON M.estud_cod = E.id_estud  WHERE id_matric='$id_matric'";
$consult_m = mysqli_query($conexao, $sql);
$line_m = mysqli_fetch_assoc($consult_m);
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
            <!-- ========== modal alterar foto estudante ========-->
         <div class="modal fade" id="modal-alterar-foto<?= $line_m['id_estud'];?>">
            <div class="modal-dialog" id="posicao-modal">
            <div class="modal-content" id="tamanho-modal">
            <div class="modal-header">
              <h4 class="modal-title">Alterar  fonto</h4>
            </div>
            <div class="modal-body">
                <form action="../Controller/update_foto_estudante_page.php?id_estud=<?= $line_m['id_estud'];?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                      <td id="infor-form-det-mat">Foto:</td>
                      <td id="inputs-det-matri">
                        <input type="file" name="foto_estud" class="form-control" id="inut-cad"  required="">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>  Cancelar</button>
              <button  class="btn btn-primary"><i class="fa fa-save"></i>   Salvar Alterações</button>
            </form>
            </div>
          </div>
      </div>
      </div>
    <!-- fim -->
            <div class="col-md-4">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title text-center">
                            <img id="img-estudante-page" src="<?= "../Images/estudante/".$line_m['foto_estud'];?>" alt="" class="img-circle img-fluid col-md-10 col-sm-10 col-xs-10"><br>
                            <a id="alt-foto-page"href="" data-toggle="modal" data-target="#modal-alterar-foto<?= $line_m['id_estud'];?>">Alterar foto</a>
                            <hr>
                            </div>
							<div class="panel-options">
								<a id="sair-estudante-page" href="../Persistence/logout.php" data-rel="collapse"><i class="fa fa-sign-out"></i> Sair</a>
							</div>
						</div>
		  				<div class="panel-body" id="info-estud-page">
                        <?= $line_m['nome_estud'];?><br>
                         Fone: <?= $line_m['fone_estud'];?><br>
                         Endereço: <?= $line_m['endereco_estud'];?><br>
                         Série: <?= $line_m['serie_estud'];?><br>
                         Turno: <?= $line_m['turno_estud'];?><br>
		  			     Cidade: <?= $line_m['cidade_estud'];?><br>   
                         Respsável: <?= $line_m['respo_estud'];?><br>
                         Fone Resp: <?= $line_m['fone_resp'];?><br>
							<br /><br />
		  				</div>
		  			</div>
		  		</div>
            <div class="col-md-8">
                <?php
                include_once 'Persistence/conection.php';
                $sql = "SELECT * FROM tb_instituicao";
                $consult = mysqli_query($conexao, $sql);
                $line = mysqli_fetch_assoc($consult);
                ?>
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title text-center">
                            <img id="img-instituicao-page" src="<?= "../Images/instituicao/".$line['logo_instituicao'];?>" alt="" class="img-circle img-fluid col-md-10 col-sm-10 col-xs-10">
                                <?= $line['nome_instituicao'];?><br>
                                <?= $line['frase_instituicao'];?>
                            </div>
						</div>
		  			</div>
		  		</div>
            <div class="col-md-8">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title"><i class="fa fa-plus"></i> Mais Informações</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
					  			<div>
                                <div>
                                <div>
                                    <ul class="nav nav-pills">
                                        <li class="active"><a href="#tab6" data-toggle="tab"><i class="fa fa-tag"></i> Frequência</a></li>
                                        <li><a href="#tab7" data-toggle="tab"><i class="fa fa-tag"></i> Professores</a></li>
                                        <li><a href="#tab8" data-toggle="tab"><i class="fa fa-tag"></i> Disciplinas</a></li>
                                        </ul>
                                        </div>
                                       </div>
                                    </div>
                                <div class="tab-content">
                                   <!--====== b1 ====--> 
                                 <div class="tab-pane active" id="tab6">
                            <strong>Lista de Frequência</strong><hr>
                            <table cellpadding="0" cellspacing="0" class="col-md-12" id="example">
                                <thead>
                                 <tr id="tabela-pag-estud">
                                    <th>Dia</th>
                                    <th>Data</th>
                                    <th>Status</th>
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
                                 <td><b><?= $line_fq['status_freq'];?></b></td>
                                    </tr>
                                    <?php } ?>
                                        </tbody>
                                     </table>
                                </div>
                                  <!--====== listar professor ====-->
                                <div class="tab-pane" id="tab7">
                                <strong>Lista de professores</strong><hr>
                            <table cellpadding="0" cellspacing="0" class="col-md-12">
                                <tbody>
                                  <?php
                                $sql = "SELECT * FROM tb_professor_estud PE JOIN tb_professores P ON PE.prof = P.id_prof JOIN tb_matriculas M ON PE.matric = M.id_matric WHERE  id_matric = '$id_matric'";
                                $consult = mysqli_query($conexao, $sql);
                                while($line = mysqli_fetch_array($consult)){
                                ?>
                                <tr>
                                    <td><?= $line['nome_prof'];?></td>
                                </tr>
                                    <?php } ?>
                                        </tbody>
                                     </table>
                                </div>
                                <!--==== listar disciplinas===--->
                                <div class="tab-pane" id="tab8">
                                <strong>Lista de Disciplinas</strong><hr>
                                <table cellpadding="0" cellspacing="0" class="col-md-12">
                                <tbody>
                            <?php
                           $sql = "SELECT * FROM tb_disciplina_estud DE JOIN tb_matriculas M ON DE.matric_estud_cod = M.id_matric JOIN tb_disciplinas D ON DE.disciplina_cod = D.id_discip WHERE id_matric='$id_matric'";
                            $consult_de = mysqli_query($conexao, $sql);
                            while($line_de = mysqli_fetch_array($consult_de)){?>
                                <tr>
                                    <td><?= $line_de['nome_discip'];?></td>
                                </tr>
                                    <?php } ?>
                                        </tbody>
                                     </table>
                                </div>
								<br /><br />
							</div>
		  				</div>
		  			</div>
                    </div>
            </div>
            <div class="col-md-8">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title"><i class="glyphicon glyphicon-cog"></i> Minhas notas</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
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
                         <tr  id="tabela-pag-estud">
                           <th>Professor</th>
                           <th>Disciplina</th>
                           <th>Nota</th>
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
                   </tr>
                <?php } ?>            
                </tbody>
               </table>
                </div>
                <!--==== b2 ===-->
		          <div class="tab-pane" id="tab2">
                  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <thead>
                         <tr  id="tabela-pag-estud">
                           <th>Professor</th>
                           <th>Disciplina</th>
                           <th>Nota</th>
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
                   </tr>
                <?php } ?>            
                </tbody>
               </table>
				</div>
                <!--==== b3 ====--->
				<div class="tab-pane" id="tab3">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <thead>
                         <tr  id="tabela-pag-estud">
                           <th>Professor</th>
                           <th>Disciplina</th>
                           <th>Nota</th>
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
                   </tr>
                <?php } ?>            
                </tbody>
               </table>
                </div>
                <!--==== b4 ====--->
				<div class="tab-pane" id="tab4">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <thead>
                         <tr  id="tabela-pag-estud">
                           <th>Professor</th>
                           <th>Disciplina</th>
                           <th>Nota</th>
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
                   </tr>
                <?php } ?>            
                </tbody>
               </table>
                </div>
              <!--==== b5 ====--->
            <div class="tab-pane" id="tab5">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
            <thead>
                 <tr  id="tabela-pag-estud">
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
								<br /><br />
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
        
<!-- ===== alert =====-->
<?php if(isset($_SESSION['estudAtualiza_page'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['estudAtualiza_page'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['estudAtualiza_page']); }?>
  <?php if(isset($_SESSION['estudErroAtualiza_page'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['estudErroAtualiza_page'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['estudErroAtualiza_page']); }?>
  <!-- ===== fim alert =====-->
  </body>
</html>