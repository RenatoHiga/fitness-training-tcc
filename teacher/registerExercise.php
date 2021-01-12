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
				
				$('.modal').modal();
				$('#modal2').modal({ dismissible: false });
				
				$('#myExercises').click(function(){
					$('#modal1').modal('open');
				});
				
				$('.deleteExercise').click(function(){
					
					var NameExercise = $(this).attr('value');
					var CodeExercise = $(this).attr('id');
					
					var confirmMessage = 'Deseja REALMENTE EXCLUIR o exercício ' + NameExercise + '?\nCódigo do Exercício: ' + CodeExercise;
					
					if(confirm(confirmMessage) == true)
					{
						$.post('../php/teacherDeleteExercise.php',
						{
							codePHP:CodeExercise
						},
						
						function(result){
							alert(result);
							window.location.reload();
						});
					}
					
					else
					{
						
					}
					
				});
				
				$('#btn_edit_exercise').click(function(){
					
					$('#modal2').modal('open');
					
					
				});
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
			
			 #btn_register{
				 
				 width:100%;
			 }
			 
		</style>
	</head>
	
	<body>
		<?php include("navbar.php");?>
		
		<div class="container">
			<h3 class="center">Cadastro de Exercícios</h3>
				
				<div id="modal1" class="modal">
					
					<div class="modal-content">
						<h4 class="center">Meus Exercícios</h4>
						<table>
							<thead>
								<tr>
									<th>Cód. Exercício</th>
									<th>Cód. Aluno</th>
									<th>Cód. Músculo</th>
									<th>Nome</th>
									<th>Descrição</th>
									<th>Vídeo</th>
									<th>Ações</th>
								</tr>
							</thead>
							
							<tbody>
								
								
									<?php
										include("../php/includes/connection.php");
										
										$codeTrainer = $_SESSION['code_trainer'];
										
										$sql = "
										SELECT * FROM exercise
										INNER JOIN user ON user.code_user = exercise.code_user
										INNER JOIN personal_trainer ON personal_trainer.code_trainer = exercise.code_trainer
										INNER JOIN muscle ON muscle.code_muscle = exercise.code_muscle
										WHERE exercise.code_trainer = '$codeTrainer'
										";
										
										$result = $connection->query($sql);
										
										while($line = $result->fetch_object())
										{
											
											echo "
											<tr>
												<td id=\"exerciseCode\" value=\"$line->code_exercise\">$line->code_exercise</td>
												<td class=\"codeUser\" value=\"$line->code_user\">$line->code_user</td>
												<td id=\"codeMuscle\" value=\"$line->code_muscle\">$line->code_muscle</td>
												<td id=\"exerciseName\" value=\"$line->name_exercise\">$line->name_exercise</td>
												<td>$line->description</td>
												<td><video width=\"300\" height=\"200\" controls><source src=\"$line->url_exercise\" type=\"video/mp4\"></video></td>
												<td><a id=\"btn_edit_exercise\" href=\"updateExercise.php?codeExercise=$line->code_exercise&nameUser=$line->name_user&nameMuscle=$line->name_muscle\">Editar</a> <a href=\"#\" value=\"$line->name_exercise\" id=\"$line->code_exercise\" class=\"deleteExercise\">Excluir</a></td>
											</tr>
											";
										}
									?>
									
									
									
								
							</tbody>
						</table>
					</div>
					
					<div class="modal-footer">
					  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
					</div>
				
				</div>
				
				<div id="modal2" class="modal">
					
					<div class="modal-content">
						<h4 class="center">Editar Exercício</h4>
						
						<div class="col s12">
							
							<div class="row">
							
								<?php
									include('../php/includes/connection.php');
									
									$codeTeacher = $_SESSION['code_trainer'];
									
									$sql = "SELECT muscle.name_muscle, name_exercise
									FROM exercise
									INNER JOIN muscle ON muscle.code_muscle = exercise.code_muscle
									WHERE code_trainer='$codeTrainer'";
									
									$result = $connection->query($sql);
									
									while($line = $result->fetch_object())
									{
										echo "
											<div class=\"input-field col s6\">
												<input type=\"text\" value=\"$line->name_exercise\" id=\"edit_nameExercise\">
												<label for=\"edit_nameExercise\">Nome Exercício</label>
											</div>
											
											<div class=\"input-field col s2\">
												<select id=\"edit_muscle\">
													<option value=\"$line->name_muscle\">$line->name_muscle</option>
												</select>
											</div>
										";
									}
								?>
							
								
								
							</div>
							
							
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
					</div>
					
				</div>
			
				<form method="post" action="uploadImageVideo.php" enctype="multipart/form-data" class="col 12">
					<div class="row">
						<div><a href="#" class="btn right" id="myExercises">meus exercícios cadastrados</a></div>
					</div>
					
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
							<textarea id="txt_desc_exercise" name="descriptionExercise" class="materialize-textarea"></textarea>
							<label for="txt_desc_exercise">Descrição do Exercício</label>
						</div>
					</div>
					
					
					<button class="btn waves-effect center btn-large green darken-2" id="btn_register" type="submit">Cadastrar Exercício</button>
					
			
				</form>
		</div>
	</body>
</html>