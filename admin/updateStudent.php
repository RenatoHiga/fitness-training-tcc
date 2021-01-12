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
				
				$("#txt_age").mask("00");
				$("#txt_cpf").mask("000.000.000-00");
				$("#txt_rg").mask("00.000.000-0");
				$("#txt_phone_number").mask("00 00000000");
				
				$('select').formSelect();
				
				var lbl_btnDelete = $('#BtnDeleteUserLbl').val();
				$('#BtnDeleteUser').html(lbl_btnDelete);
				
				$('#BtnDeleteUser').click(function(){
					
					var Confirmation = confirm("Deseja realmente deletar o Aluno(a) selecionado(a)? \n Se sim clique em 'Ok' \n Se não clique em 'Cancelar'");
					
					var code_student = <?php $code = $_GET['code_user']; echo "$code"; ?>
					
					if(Confirmation == true)
					{
						
						$.post('../php/AdminDeleteStudent.php',
						{
							codePHP:code_student
						},
						
						function(result){
							
							window.location.replace('dataStudent.php');
							
						});
						
					}
					
					else
					{
						alert("Foi cancelado a exclusão");
					}
				});
				
				
				$('#btn_updateStudent').click(function(){
					var nameJS = $("#txt_name").val();
					var emailJS = $("#txt_email").val();
					var ageJS = $("#txt_age").val();
					var neighborhoodJS = $("#txt_neighborhood").val();
					var phoneJS = $("#txt_phone_number").val();
					var rgJS = $("#txt_rg").val();
					var cpfJS = $("#txt_cpf").val();
					var cityJS = $("#txt_city").val();
					var healthDescriptionJS = $("#txt_healthDescription").val();
					var goalJS = $("#cmb_select_goal").val();
					var levelJS = $("#cmb_select_level").val();
					var stateJS = $("#txt_state").val();
					var passwordJS = $("#txt_password").val();
					
					var NumbCharactersCPF = $('#txt_cpf').val().length;
					var NumbCharactersRG = $('#txt_rg').val().length;
					
					var codeJS = <?php $code = $_GET['code_user']; echo "$code"; ?>
					
					if(nameJS == "")
					{
						M.toast({html: "Campo Nome vazio!", displayLength: 6000});
						$("#txt_name").focus();
					}
					
					else if(ageJS == "")
					{
						M.toast({html: "Campo Idade vazio!", displayLength: 6000});
						$("#txt_age").focus();
					}
					
					else if(neighborhoodJS == "")
					{
						M.toast({html: "Campo Endereço vazio!", displayLength: 6000});
						$("#txt_neighborhood").focus();
					}
					
					else if(phoneJS == "")
					{
						M.toast({html: "Campo Telefone vazio!", displayLength: 6000});
						$("#txt_phone_number").focus();
					}
					
					else if(rgJS == "")
					{
						M.toast({html: "Campo RG vazio!", displayLength: 6000});
						$("#txt_rg").focus();
					}
					
					else if(NumbCharactersRG < 12)
					{
						M.toast({html: "Campo RG incompleto!", displayLength: 6000});
						$("#txt_rg").focus();
					}
					
					else if(cpfJS == "")
					{
						M.toast({html: "Campo CPF vazio!", displayLength: 6000});
						$("#txt_cpf").focus();
					}
					
					else if(NumbCharactersCPF < 14)
					{
						M.toast({html: "Campo CPF incompleto!", displayLength: 6000});
						$("#txt_cpf").focus();
					}
					
					else if(cityJS == "")
					{
						M.toast({html: "Campo Cidade vazio!", displayLength: 6000});
						$("#txt_city").focus();
					}
					
					else if(passwordJS == "")
					{
						M.toast({html: "Campo Senha vazio!", displayLength: 6000});
						$("#txt_city").focus();
					}
					
					else if(stateJS == "")
					{
						M.toast({html: "Campo Estado vazio!", displayLength: 6000});
						$("#txt_city").focus();
					}
					
					else if(goalJS == "select_option")
					{
						M.toast({html: "Selecione um Objetivo!", displayLength: 6000});
						$("#cmb_select_goal").focus();
					}
					
					else if(levelJS == "select_option")
					{
						M.toast({html: "Selecione um Nível!", displayLength: 6000});
						$("#cmb_select_level").focus();
					}
					
					else
					{
						$.post('../php/AdminUpdateStudent.php',
						{
							namePHP:nameJS,
							emailPHP:emailJS,
							agePHP:ageJS,
							neighborhoodPHP:neighborhoodJS,
							phonePHP:phoneJS,
							rgPHP:rgJS,
							cpfPHP:cpfJS,
							cityPHP:cityJS,
							healthDescriptionPHP:healthDescriptionJS,
							goalPHP:goalJS,
							levelPHP:levelJS,
							statePHP:stateJS,
							passwordPHP:passwordJS,
							codePHP:codeJS
						},
						
						function(result){
							
							window.location.reload();
						});
					}
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
		   
		   /* SELECT */
		   
		   ul.dropdown-content.select-dropdown li span {
				color: #388e3c; 
			}
			
			#btn_updateStudent{
				width: 100%;
			}
		</style>
	</head>
	
	<body>
		<div class="container">
			<h2 class="center"> Mudar Informações do Aluno </h2>
			
			<div class="col s12">
				<button id="BtnDeleteUser" class="btn right waves-effect waves-light green darken-2"></button>
			</div>
			
			<br><br>
			
			<div class="col s12" id="form_student">
				
				<?php
				
				include('../php/includes/connection.php');
				
				$code = $_GET['code_user'];
				
				$sql = "SELECT * FROM user
				WHERE code_user='$code'";
				
				
				$result = $connection->query($sql);
				
				while($line = $result->fetch_object())
				{
					
					$nameUTF = utf8_encode($line->name_user);
					$descriptionUTF = utf8_encode($line->descriptionHealth_user);
					$neighborhoodUTF = utf8_encode($line->neighborhood_user);
					
					echo "<input type=\"text\" id=\"BtnDeleteUserLbl\" value=\"EXCLUIR O ALUNO(A) $nameUTF\" hidden>";					
					
					echo "
					<div class=\"row\">
						<div class=\"input-field col s6\">
							<input type=\"text\" value=\"$nameUTF\" id=\"txt_name\">
							<label for=\"txt_name\">Nome do(a) Aluno(a)*</label>
						</div>
						
						<div class=\"input-field col s5\">
							<input type=\"email\" value=\"$line->email_user\" id=\"txt_email\">
							<label for=\"txt_email\">E-mail do(a) Aluno(a)</label>
						</div>
						
						<div class=\"input-field col s1\">
							<input type=\"text\" value=\"$line->age_user\" id=\"txt_age\" maxlength=\"2\">
							<label for=\"txt_age\">Idade*</label>
						</div>
					</div>
						
					<div class=\"row\">
						<div class=\"input-field col s3\">
							<input type=\"text\" value=\"$neighborhoodUTF\" id=\"txt_neighborhood\">
							<label for=\"txt_neighborhood\">Endereço*</label>
						</div>
						
						<div class=\"input-field col s2\">
							<input type=\"text\" value=\"$line->phone_user\" id=\"txt_phone_number\">
							<label for=\"txt_phone_number\">Número de Telefone*</label>
						</div>
						
						<div class=\"input-field col s2\">
							<input type=\"text\" value=\"$line->rg_user\" id=\"txt_rg\">
							<label for=\"txt_rg\">RG*</label>
						</div>
						
						<div class=\"input-field col s2\">
							<input type=\"text\" value=\"$line->cpf_user\" id=\"txt_cpf\">
							<label for=\"txt_cpf\">CPF*</label>
						</div>
						
						<div class=\"input-field col s3\">
							<input type=\"text\" value=\"$line->city_user\" id=\"txt_city\">
							<label for=\"txt_city\">Cidade*</label>
						</div>
					</div>
					
					<div class=\"row\">
						<div class=\"input-field col s10\">
							<textarea id=\"txt_healthDescription\" class=\"materialize-textarea\">$descriptionUTF</textarea>
							<label for=\"txt_healthDescription\">Descrição Médica</label>
						</div>
						
						<div class=\"input-field col s2\">
							<input type=\"text\" value=\"$line->state_user\" id=\"txt_state\">
							<label for=\"txt_state\">Estado*</label>
						</div>
					</div>";
					
					$goal = $line->goal_user;
					$level = $line->level_user;
					
					if($goal == "Emagrecer")
					{
						echo "
						<div class=\"row\">
							<div class=\"input-field col s6\">
								<select id=\"cmb_select_goal\">
									<option value=\"select_option\">Selecionar um Objetivo*</option>
									<option value=\"Emagrecer\" selected>Emagrecer</option>
									<option value=\"Hipertrofia\">Ganhar massa muscular</option>
									<option value=\"Outro\">Outro</option>
								</select>
								<label for=\"cmb_select_goal\">Selecionar Objetivo</label>
							</div>
						";
					}
					
					else if($goal == "Hipertrofia")
					{
						echo "
						<div class=\"row\">
							<div class=\"input-field col s6\">
								<select id=\"cmb_select_goal\">
									<option value=\"select_option\">Selecionar um Objetivo*</option>
									<option value=\"Emagrecer\">Emagrecer</option>
									<option value=\"Hipertrofia\" selected>Ganhar massa muscular</option>
									<option value=\"Outro\">Outro</option>
								</select>
								<label for=\"cmb_select_goal\">Selecionar Objetivo</label>
							</div>
						";
					}
					
					else
					{
						echo "
						<div class=\"row\">
							<div class=\"input-field col s6\">
								<select id=\"cmb_select_goal\">
									<option value=\"select_option\">Selecionar um Objetivo*</option>
									<option value=\"Emagrecer\">Emagrecer</option>
									<option value=\"Hipertrofia\">Ganhar massa muscular</option>
									<option value=\"Outro\" selected>Outro</option>
								</select>
								<label for=\"cmb_select_goal\">Selecionar Objetivo</label>
							</div>
						";
					}
					
					if($level == "Iniciante")
					{
						echo "
						<div class=\"input-field col s6\">
							<select id=\"cmb_select_level\">
								<option value=\"select_option\">Selecionar um Nível*</option>
								<option value=\"Iniciante\" selected>Iniciante</option>
								<option value=\"Mediano\">Mediano</option>
								<option value=\"Avancado\">Avançado</option>
							</select>
							<label for=\"cmb_select_level\">Selecione um Nível</label>
						</div>
					</div>";
					}
					
					else if($level == "Mediano")
					{
						echo "
						<div class=\"input-field col s6\">
							<select id=\"cmb_select_level\">
								<option value=\"select_option\">Selecionar um Nível*</option>
								<option value=\"Iniciante\">Iniciante</option>
								<option value=\"Mediano\" selected>Mediano</option>
								<option value=\"Avancado\">Avançado</option>
							</select>
							<label for=\"cmb_select_level\">Selecione um Nível</label>
						</div>
					</div>";
					}
					
					else if($level == "Avancado")
					{
						echo "
						<div class=\"input-field col s6\">
							<select id=\"cmb_select_level\">
								<option value=\"select_option\">Selecionar um Nível*</option>
								<option value=\"Iniciante\">Iniciante</option>
								<option value=\"Mediano\">Mediano</option>
								<option value=\"Avancado\" selected>Avançado</option>
							</select>
							<label for=\"cmb_select_level\">Selecione um Nível</label>
						</div>
					</div>";
					}
				}
				?>
				
					
					
				
				<div class="row">
					<div class="col s12">
						<button class="btn btn-large waves-effect waves-light green darken-2" id="btn_updateStudent">Mudar Informações do(a) Aluno(a)</button>
					
						
					</div>
					
					
				</div>
				
				<div class="row">
					<div class="col s4 offset-s5">
						<a href="dataStudent.php" class="center">Voltar para página anterior</a>
					</div>
				</div>
				
			</div>
			
		</div>
	</body>
</html>