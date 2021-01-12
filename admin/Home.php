<?php 
	session_start();
	
	if(isset($_SESSION['loggedIn']))
	{
		if($_SESSION['loggedIn'] != 'yes')
		{
			header("location:../index_admin.php");
		}
		
		else
		{
			
		}
	}
	
	else
	{
		header("location:../index_admin.php");
	}
?>

<html>
	<head>
		<?php
			include("../php/includes/important_first_include.php");
		?>
		
		<script>
			$(document).ready(function(){
				
				$('body').animate({
					opacity: 1
				},600,'linear');
				
				$('#dataStudent').click(function(){
					window.location.replace("dataStudent.php");
				});
				
				$('#dataTeacher').click(function(){
					window.location.replace("dataTeacher.php");
				});
				
				$('#dataTrainings').click(function(){
					window.location.replace("dataTrainings.php");
				});
				
				$('#myInformations').click(function(){
					window.location.replace("dataAdmin.php");
				});
				
				$('#registerStudent').click(function(){
					window.location.replace("registerStudent.php");
				});
				
				$('#registerTeacher').click(function(){
					window.location.replace("registerTeacher.php");
				});
				
				$('#registerAdministrator').click(function(){
					window.location.replace("registerAdministrator.php");
				});
				
				$('#registerExercise').click(function(){
					window.location.replace("registerExercise.php");
				});
				<?php include('../php/includes/btn_exit2.php') ?>
				
			});
		</script>
		<style>
			body{
				opacity: 0;
			}
			
			.btn-big{
				border-style: solid;
				border-color: #02313;
				border-radius: 10px;
				cursor: pointer;
			}
			
			.row-margin{
				margin-top: 2%;
			}
		</style>
	</head>
	
	<body>
		<?php
			    include("../php/includes/connection.php");
			    
			    $codeAdmin = $_SESSION['code_admin'];
			    $dateNow = date("d/m/Y");
			   
			    $sql = "SELECT name_admin FROM admin
			    WHERE code_admin='$codeAdmin'";
			    
			    $result = $connection->query($sql);
			    
			    
			    while($line = $result->fetch_object())
			    {
			        echo 
					"
					
					<nav class=\"nav-extended yellow darken-4\">
						
						<div class=\"nav-wrapper yellow darken-4\">
							<a class=\"brand-logo center\"><img src=\"../images/icon.png\" style=\"width:75px; height:75px;\"></a>
						</div>
						
						<div>
							<h3 class=\"center-align\">Olá $line->name_admin! Hoje é $dateNow</h3>
							<p class=\"center-align\"><b>Clique para ser redirecionado para a página desejada!</b></p>
						</div>
						
					</nav>
					
					";
			    }
			?>
	
		<div class="container">
			
			<br><br>
			<div class="container-fluid btn-big" id="dataTeacher">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/search.png">
					<h4>Consultar Professores</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="dataStudent">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/search.png">
					<h4>Consultar Alunos</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="dataTrainings">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/search.png">
					<h4>Consultar Treinos</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="myInformations">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/folder.png">
					<h4>Ver Minhas Informações</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="registerStudent">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/clipboard.png">
					<h4>Cadastrar Alunos</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="registerTeacher">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/clipboard.png">
					<h4>Cadastrar Professores</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="registerExercise">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/clipboard.png">
					<h4>Cadastrar Exercícios</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="registerAdministrator">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/clipboard.png">
					<h4>Cadastrar Administrador</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="btn_exitSystem">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/shutdown.png">
					<h4>Sair do Painel do Administrador</h4>
				</div>
			</div>
			
		</div>
	</body>
</html>