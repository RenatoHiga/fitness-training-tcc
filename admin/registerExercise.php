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
				$('select').formSelect();
			});
		</script>
	
		<style>
			.offset_3{
				margin-left: 10%;
			}
			
			#btn_register{
				width: 100%;
			}
			
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
			 
			  /* TEXTAREA */
			 
			 /* label focus color */
			.input-field input[type=text]:focus + label, .materialize-textarea:focus:not([readonly]) + label {
			 color: #388e3c !important;
			}

			/* label underline focus color */
			.input-field input[type=text]:focus, .materialize-textarea:focus:not([readonly]) {
			 border-bottom: 1px solid #388e3c !important;
			 box-shadow: 0 1px 0 0 #388e3c !important;
			}
		   
		    /* label underline focus color */
		   .row .input-field .materialize-textarea{
			 border-bottom: 1px solid #000;
			 box-shadow: 0 1px 0 0 #000;
		   }
		   
		    ul.dropdown-content.select-dropdown li span {
				color: #388e3c; 
			}
		</style>
	</head>
	
	<body>
		<?php include("navbar.php")?>
		
		<div class="container">
			
			<h3 class="center">Cadastro de Exercícios</h3>
			
				<form method="post" action="uploadVideo.php" enctype="multipart/form-data" class="col 12">
					
					<div class="row">
						
						<div class="input-field col s6">
							<input type="text" id="txt_nameExercise" name="nameExercise">
							<label for="txt_nameExercise">Nome Exercício</label>
						</div>
						
						
						<div class="input-field col s3">
							<select id="cmb_select_id_student" name="selectIdStudent">
							
								
								<option value="select_option" selected>Selecionar um aluno*</option>
								<?php 
									include("../php/includes/connection.php");
									
									$sql = "SELECT * FROM user";
									
									$result = $connection->query($sql);
									
									while($line = $result->fetch_object())
									{
									
									$nameUTF = utf8_encode($line->name_user);
									
									echo "
									
									
									
									<option value=\"$line->code_user\">$nameUTF</option>
									
									";
									}
									
								?>
								
								
								
							</select>
							<label for="cmb_select_id_student">Selecione um Aluno</label>
						</div>
						
						<div class="input-field col s3">
							<select id="cmb_select_id_muscle" name="selectIdMuscle">
							
								
								<option value="select_option" selected>Selecionar um músculo*</option>
								<?php 
									include("../php/includes/connection.php");
									
									$sql = "SELECT * FROM muscle";
									
									$result = $connection->query($sql);
									
									while($line = $result->fetch_object())
									{
										
									echo "
									<option value=\"$line->code_muscle\">$line->name_muscle</option>
									
									";
									}
									
								?>
								
								
							</select>
							<label for="cmb_select_id_muscle">Selecione um Músculo</label>
						</div>
							
						
					</div>
						
					<div class="row">
						
						<div class = "file-field input-field col s7 center">
							<div class = "btn blue">
								<span>Escolher Vídeo</span>
								<input name="userfile" type="file">
							</div>
						  
							<div class = "file-path-wrapper">
								<input class = "file-path validate" type = "text" placeholder = "Procure por um vídeo para enviar!">
							</div>
						
						</div>

						<div class="input-field col s5 offset-5">
								
							<select id="cmb_select_id_teacher" name="selectIdTrainer">
								
								<option value="select_option" selected>Selecione um professor*</option>
								
								<?php
									
								include('../php/includes/connection.php');
								
								$sql = "SELECT * FROM personal_trainer";
								
								$result = $connection->query($sql);
								
								while($line = $result->fetch_object())
								{
									echo "<option value=\"$line->code_trainer\">$line->name_trainer</option>";
								}
								
								?>
							</select>
							
							<label for="cmb_select_id_teacher">Cadastrar como</label>
							
						</div>
					
					</div>
					
					<div class="row">
						<div class="input-field col s12">
							<textarea id="txt_desc_exercise" name="descriptionExercise" class="materialize-textarea"></textarea>
							<label for="txt_desc_exercise">Descrição do Exercício</label>
						</div>
					</div>
					
					
						<button class="btn waves-effect center btn-large green darken-2" id="btn_register" type="submit">Cadastrar Exercício</button>
					
			
				</form>
		</div>
	</body>
</html>