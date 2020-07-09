<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SystCE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="shortcut icon"  href="Images/icon/icon.png">
    <link rel="stylesheet" href="Components/plugins/toastr/toastr.min.css">
    <link href="Components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="Components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="Components/css/styles.css" rel="stylesheet">
    <link href="Components/style.css" rel="stylesheet">
  </head>
  <body class="login-bg">
	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6><i class="fa fa-graduation-cap"></i><br>SystCE<br> <small>Sistema  Controle Escolar</small> </h6>
			                <div class="social">
                                Cadastro de Usuário Administrador<hr>
                                TERMOS DE USO
	                        </div>
                            <div id="texto-termo">
                         Por este Termo de Uso o USUÁRIO compromete-se a não fornecer informações falsas, sendo conferido à EMPRESA o direito de checar a veracidade de todas as informações, evitando assim eventuais fraudes;
                       Todas as informações de licenciamento, direcionados à empresas, não poderão ser repassadas a terceiros;
                       Somente garantimos aos clientes que tenham adquirido o ‘Serviço de Seguro a Licença’;
                       Considerando a aquisição de produtos importados sujeitos às regras fiscais e aduaneiras, O LICENCIADOR informa que eventuais atrasos na entrega dos produtos podem ocorrer em decorrência de questões burocráticas das autoridades Alfandegárias, sem que haja culpa por parte do LICENCIAOR;
                       Nenhuma informação de cotação,compra ou dados de empresas e funcionários poderão ser divulgados ou usados para fins indevidos;
                       Não será fornecido o serviço de Upgrade ou Manutenção de licenças aos clientes que não adquirirem tal serviço;
                       Todo o conteúdo exposto no Sistema Gerenciar  Frequência, de propriedade da EMPRESA, (incluindo, mas não se limitando a, textos, programas de computador disponíveis) são protegidas pela legislação de propriedade intelectual aplicável e não infringem qualquer lei ou norma a que estejam subordinadas, contratos, documentos, acordos dos quais faz parte, bem como não infringe direitos de terceiros, sendo que a violação de tais direitos, ensejará a respectiva indenização aos prejudicados, seja a EMPRESA, seus USUÁRIOS e/ou terceiros, sem prejuízo de eventuais perdas e danos;
                       Os preços poderão sofrer alterações, sem prévio aviso;
                       O USUÁRIO QUE preencher qualquer formulário do Sistema Gerenciar  Frequência terá seu e-mail automaticamente cadastrado na base de dados da EMPRESA para envio de e-mail Marketing, podendo o USUÁRIO descadastrar-se desta base de dados a qualquer tempo, através de link contido ao final do email de contato inicial;
                       Os dados dos USUÁRIOS são confidenciais e não serão divulgados a terceiros;
                       O USUÁRIO realize backup das informações para que não as percas e pois  são essenciais em casos de eventual necessidade formatação do equipamento do USUÁRIO;
                       Os software adquirido são intransferíveis e somente poderão ser revendidos com autorização por escrito da EMPRESA Desenvolvedor, não sendo possível a troca ou devolução de produto já utilizado.
                       Ao entrar em contato com a equipe de suporte técnico do LICENCIAOR, tenha sempre em mãos o número da Nota Fiscal de aquisição do produto facilitando, assim, o atendimento;
                       As partes elegem o foro da Comarca de Quipapá, Estado de Pernambuco, como competente para conferir quaisquer controvérsias decorrentes deste TERMO DE USO, independentemente de qualquer outro, por mais privilegiado que seja ou venha a ser.<br>
                       Ao concordar você aceita todos os requistos posto neste temo de uso.<br>
                            </div>
                            <a href="Controller/insert_user_admin.php">
                            <button class="btn btn-primary col-md-12">Concordo</button><br> </a>
			            </div>
                    </div>
			    </div>
			</div>
		</div>
	</div>
    
    <footer>
         <div class="container">
            <div class="copy text-center" id="foter-login">
              
            </div>
            
         </div>
      </footer>
        
    <script src="Components/jquery/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="Components/jquery/jquery-ui.js"></script>
      <link href="Components/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="Components/bootstrap/js/bootstrap.min.js"></script>

    <script src="Components/vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="Components/vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="Components/js/custom.js"></script>
    <script src="Components/js/tables.js"></script>
    <script src="Components/plugins/jquery/jquery.min.js"></script>
    <script src="Components/plugins/toastr/toastr.min.js"></script>
    <script src="Components/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="Components/javascript/jquery.js"></script>
    <script src="Components/javascript/jquery2.js"></script>
    <script src="Components/javascript/js/bootstrap.min.js"></script>
    <script src="Components/javascript/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../Components/javascript/datatables/dataTables.bootstrap.js"></script>
     <link href="Components/javascript/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="Components/javascript/js/custom.js"></script>
    <script src="Components/javascript/js/tables.js"></script>
    
  </body>
</html>