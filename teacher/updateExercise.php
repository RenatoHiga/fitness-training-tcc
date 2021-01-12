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
				<?php
					include("../php/includes/btn_exit.php");
				?>
				
				$('select').formSelect();
			});
		</script>
		
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
			 
			 ul.dropdown-content.select-dropdown li span {
				color: #388e3c; /* no need for !important :) */
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
			
			 #btn_update{
				 
				 width:100%;
			 }
		</style>
		
	</head>
	
	<body>
		<div class="container">
			
			<h2 class="center">Editar meu Exercício</h2>
				
				<form method="post" action="uploadImageVideo.php" enctype="multipart/form-data" class="col 12">
						
						
						<div class="row">
							
							<div class="input-field col s6">
							
								<?php
									
									include('../php/includes/connection.php');
									
									$CodeExercise = $_GET['codeExercise'];
									
									$sql = "SELECT * FROM exercise
									WHERE code_exercise='$CodeExercise'";
									
									$result = $connection->query($sql);
									
									while($line = $result->fetch_object())
									{
										echo "
										<input type=\"text\" value=\"$line->name_exercise\" id=\"txt_nameExercise\" name=\"nameExercise\">
										<label for=\"txt_nameExercise\">Nome Exercício</label>
										";
									}
								
								?>
							</div>
							
							
							<div class="input-field col s3">
								
								<select id="cmb_select_id_student" name="selectIdStudent">
								
									<option value="select_option" selected>Selecionar um aluno*</option>
									<?php 
										include("../php/includes/connection.php");
										
										$sql = "SELECT * FROM user";
										
										$result = $connection->query($sql);
										
										$NameUser = $_GET['nameUser'];
										
										while($line = $result->fetch_object())
										{
										
											$nameUTF = utf8_encode($line->name_user);
											
											if($nameUTF == $NameUser)
											{
												echo "<option value=\"$line->code_user\" selected>$nameUTF</option>";
											}
											
											else
											{
												echo "<option value=\"$line->code_user\">$nameUTF</option>";
											}
										
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
										
										$NameMuscle = $_GET['nameMuscle'];
										
										while($line = $result->fetch_object())
										{
											$MuscleDatabase = $line->name_muscle;
											
											if($NameMuscle == $MuscleDatabase)
											{
												echo "<option value=\"$line->code_muscle\" selected>$line->name_muscle</option>";
											}
											
											else
											{
												echo "<option value=\"$line->code_muscle\">$line->name_muscle</option>";
											}
											
										}
										
									?>
									
									
								</select>
								<label for="cmb_select_id_muscle">Selecione um Músculo</label>
							</div>
								
							
						</div>
							
						<div class="row">
							<div class = "file-field input-field col s5 offset-s3">
								<div class = "btn blue">
									<span>Escolher Vídeo</span>
									<input name="userfile" type="file">
								</div>
							  
								<div class = "file-path-wrapper">
									<input class = "file-path validate" type = "text" placeholder = "Procure por um vídeo para enviar!">
								</div>
							</div>	
						</div>
						
						<div class="row">
							<div class="input-field col s12">
								
								<?php
									
									include('../php/includes/connection.php');
									
									$CodeExercise = $_GET['codeExercise'];
									
									$sql = "SELECT * FROM exercise
									WHERE code_exercise='$CodeExercise'";
									
									$result = $connection->query($sql);
									
									while($line = $result->fetch_object())
									{
										echo "
										<textarea id=\"txt_desc_exercise\" name=\"descriptionExercise\" class=\"materialize-textarea\">$line->description</textarea>
										<label for=\"txt_desc_exercise\">Descrição do Exercício</label>
										";
									}
								
								?>
								
							</div>
						</div>
						
						
						<button class="btn waves-effect center btn-large green darken-2" id="btn_update" type="submit">Atualizar Exercício</button>
						
				
				</form>
				
				<div class="row">
					<div class="col s12 center">
						<a href="registerExercise.php" class="center">Voltar para página anterior</a>
					</div>
				</div>
				
		</div>
	</body>
</html>