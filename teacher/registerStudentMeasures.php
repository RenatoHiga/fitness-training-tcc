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
		<!--JQuery Mask by Igor Escobar!-->
		<script src="../js/jquery.mask.js"></script>
		
		<style>
			/* label color */
		   .input-field label {
			 color: #000;
		   }
		   
		    /* label underline focus color */
		   .row .input-field input {
			 border-bottom: 1px solid #000;
			 box-shadow: 0 1px 0 0 #000;
		   }
	 
			.input-field input:focus + label {
			  color: #388e3c !important;
			}
			 
			/* label underline focus color */
			 .row .input-field input:focus {
			   border-bottom: 1px solid #388e3c !important;
			   box-shadow: 0 1px 0 0 #388e3c !important
			 }
		</style>
	</head>
	
	<body>
		<nav class="nav-extended yellow darken-4">
			<div class="nav-wrapper yellow darken-4">
				<a class="brand-logo center">Nome da Academia</a>
			</div>
			
			<div class="nav-content yellow darken-4" id="tabs-bar">
				
				<ul class="tabs tabs-transparent">
					<li class="tab"><a href="registerStudent.php">Cadastrar um Aluno</a></li>
					<li class="tab"><a>Ficha de Treino do Aluno</a></li>
					<li class="tab"><a href="myInformations.php">Minhas Informações</a></li>
					<li class="tab" id="btn_exitSystem"><a>Sair do Sistema</a></li>
				</ul>
				
				
			</div>
			
		</nav>
		
		<div class="container">
			<h4 class="center">Cadastro de Medidas</h4>
			
			<div class="col s12">
				<div class="row">
					<div class="input-field col s2 offset-s4">
						<input type="text" class="" id="txt_height">
						<label for="txt_height">Altura</label>
					</div>
					<div class="input-field col s2">
						<input type="text" class="" id="txt_weigth">
						<label for="txt_weigth">Peso</label>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>