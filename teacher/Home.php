<?php 
	session_start();
	
	if(isset($_SESSION['loggedIn']))
	{
		if($_SESSION['loggedIn'] != 'yes')
		{
			header("location:../index_teacher.php");
		}
		
		else
		{
			
		}
	}
	
	else
	{
		header("location:../index_teacher.php");
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
				
				$('#registerStudent').click(function(){
					window.location.replace("registerStudent.php");
				});
				
				$('#dataStudent').click(function(){
					window.location.replace("dataStudent.php");
				});
				
				$('#myInformations').click(function(){
					window.location.replace("myInformations.php");
				});
				
				$('#measureStudent').click(function(){
					window.location.replace("measureStudent.php");
				});
				
				$('#registerExercise').click(function(){
					window.location.replace("registerExercise.php");
				});
				
				<?php include('../php/includes/btn_exit.php') ?>
				
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
			
			#secret_admin{
				border-color: white;
			}
		</style>
	</head>
	
	<body>
		<?php
			    include("../php/includes/connection.php");
			    
			    $codeTeacher = $_SESSION['code_trainer'];
			    $dateNow = date("d/m/Y");
			   
			    $sql = "SELECT name_trainer FROM personal_trainer
			    WHERE code_trainer='$codeTeacher'";
			    
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
							<h3 class=\"center-align\">Olá $line->name_trainer! Hoje é $dateNow</h3>
							<p class=\"center-align\"><b>Clique para ser redirecionado para a página desejada!</b></p>
						</div>
						
					</nav>
					
					";
			    }
			?>
	
		<div class="container">
			
			<br><br>
			<div class="container-fluid btn-big" id="registerStudent">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/clipboard.png">
					<h4>Cadastrar um(a) Aluno(a)</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="dataStudent">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/search.png">
					<h4>Consultar Dados de um(a) Aluno(a)</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="myInformations">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/folder.png">
					<h4>Ver minhas Informações</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big" id="measureStudent">
				<div class="row center row-margin">
					<img class="responsive-img" src="../images/images_teacher/measuring-tape.png">
					<h4>Consultar Medidas de um(a) Aluno(a)</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big">
				<div class="row center row-margin" id="registerExercise">
					<img class="responsive-img" src="../images/images_teacher/weightlifting.png">
					<h4>Cadastrar um Exercício para um(a) Aluno(a)</h4>
				</div>
			</div>
			
			<br><br>
			<div class="container-fluid btn-big">
				<div class="row center row-margin" id="btn_exitSystem">
					<img class="responsive-img" src="../images/images_teacher/shutdown.png">
					<h4>Sair do Sistema</h4>
				</div>
			</div>
			
		</div>
	</body>
</html>