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
				
				var LabelBtnDelete = $('#BtnDeleteExerciseLbl').val();
				
				$('#BtnDeleteExercise').html(LabelBtnDelete);
				
				$('#BtnDeleteExercise').click(function(){
					
					var Confirmation = confirm("Deseja realmente deletar o Exercício selecionado? \n Se sim clique em 'Ok' \n Se não clique em 'Cancelar'");
					
					var codeJS = <?php $code = $_GET['codeExercise']; echo "$code"; ?>
					
					if(Confirmation == true)
					{
						$.post('../php/AdminDeleteExercise.php',
						{
							codePHP:codeJS
						},
						
						function(result){
							
							window.location.replace('dataTrainings.php');
							
						});
					}
					
					else
					{
						alert("Foi cancelado a exclusão");
					}
					
				});
				
			});
		</script>
		
		<style>
			
			#btn_update{
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
		
		<div class="container">
			
			<h2 class="center">Atualizar Exercícios</h2>
				
				<div class="row">
					<button id="BtnDeleteExercise" class="btn right waves-effect waves-light green darken-2"></button>
				</div>
				
				<form method="post" action="uploadVideo.php" enctype="multipart/form-data" class="col 12">
					
					
					
					<div class="row">
						
						<?php
							
							include('../php/includes/connection.php');
							
							$CodeExercise = $_GET['codeExercise'];
							
							$sql = "SELECT * FROM exercise
							WHERE code_exercise='$CodeExercise'";
							
							$result = $connection->query($sql);
							
							while($line = $result->fetch_object())
							{
								echo 
								"
								<input type=\"text\" id=\"BtnDeleteExerciseLbl\" value=\"EXCLUIR O Exercício $line->name_exercise\" hidden>
								
								<div class=\"input-field col s6\">
									<input type=\"text\" id=\"txt_nameExercise\" value=\"$line->name_exercise\" name=\"nameExercise\">
									<label for=\"txt_nameExercise\">Nome Exercício</label>
								</div>
								
								";
							}
							
							
							
						?>
						
						<div class="input-field col s3">
							<select id="cmb_select_id_student" name="selectIdStudent">
							
								
								<option value="select_option" selected>Selecionar um aluno*</option>
								<?php 
									
									include("../php/includes/connection.php");
									
									$sql = "SELECT * FROM user";
									
									$result = $connection->query($sql);
									
									$NameStudent = $_GET['nameUser'];
									
									
									while($line = $result->fetch_object())
									{
									
										$nameUTF = utf8_encode($line->name_user);
										
										if($NameStudent == $nameUTF)
										{
											echo "<option value=\"$line->code_trainer\" selected>$nameUTF</option>";
										}
										
										else
										{
											echo "<option value=\"$line->code_trainer\">$nameUTF</option>";
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
										$varNameMuscle = $line->name_muscle;
										
										if($NameMuscle == $varNameMuscle)
										{
											echo "<option value=\"$line->code_muscle\" selected>$varNameMuscle</option>";
										}
										
										else
										{
											echo "<option value=\"$line->code_muscle\">$varNameMuscle</option>";
										}
										
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
								<?php
									
								include('../php/includes/connection.php');
								
								$sql = "SELECT * FROM personal_trainer";
								
								$result = $connection->query($sql);
								
								$NameTrainer = $_GET['nameTeacher'];
								
								while($line = $result->fetch_object())
								{
									
									$nameUTF = utf8_encode($line->name_trainer);
									
									if($NameTrainer == $nameUTF)
									{		
										echo "<option value=\"$line->code_trainer\" selected>$line->name_trainer</option>";
									}
									
									else
									{
										echo "<option value=\"$line->code_trainer\">$line->name_trainer</option>";
									}
								}
								
								?>
							</select>
							
							<label for="cmb_select_id_teacher">Cadastrar como</label>
							
						</div>
					
					</div>
					
					<div class="row">
						<?php
							include('../php/includes/connection.php');
							
							$CodeExercise = $_GET['codeExercise'];
							
							$sql = "SELECT * FROM exercise
							WHERE code_exercise='$CodeExercise'";
							
							$result = $connection->query($sql);
							
							while($line = $result->fetch_object())
							{
								echo 
								"
									<div class=\"input-field col s12\">
										<textarea id=\"txt_desc_exercise\" name=\"descriptionExercise\" class=\"materialize-textarea\">$line->description</textarea>
										<label for=\"txt_desc_exercise\">Descrição do Exercício</label>
									</div>
								";
							}
						?>
					
					</div>
					
					<button class="btn waves-effect center btn-large green darken-2" id="btn_update" type="submit">Atualizar dados do Exercício</button>
					
					<br><br>
					
					<div class="row">
						<div class="col s12 center">
						<a href="dataTrainings.php" class="center">Voltar para página anterior</a>
						</div>
					</div>
			
				</form>
		</div>
	</body>
	
</html>