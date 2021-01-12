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
		<meta charset="utf-8">
		<?php
			include("../php/includes/important_first_include.php");
		?>
		
		<script>
			$(document).ready(function(){
				<?php
					include("../php/includes/btn_exit.php");
				?>
				
				$("#txt_age").mask("00");
				$("#txt_cpf").mask("000.000.000-00");
				$("#txt_rg").mask("00.000.000-0");
				$("#txt_phone_number").mask("00 00000000");
				
				$('.modal').modal();
				
				$('select').formSelect();
				
				$("#btn_registerStudent").click(function(){
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
						$.post('../php/teacherRegisterStudent.php',
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
							passwordPHP:passwordJS
						},
						
						function(result){
							if(result == "success")
							{
								
									location.reload(true);
								
							}
							
							else
							{
								var mensagem = "Deu erro no sistema ao cadastrar!";
								$("#alert_message").text(mensagem);
							}

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
				color: #388e3c; /* no need for !important :) */
			}
			
			#btn_registerStudent{
				width: 100%;
			}
		</style>
	</head>
	
	<body>
		 <!-- Modal Structure -->
		  <div id="modal_alert" class="modal">
			<div class="modal-content">
			  <h4>ALERTA!</h4>
			  <p id="alert_message"></p>
			</div>
			
			<div class="modal-footer">
			  <button id="btn_fecha_modal" class="modal-close waves-effect waves-green btn-flat">Fechar</button>
			</div>
		</div>
	
		<?php include("navbar.php");?>
		
		<div class="container" id="RegisterStudent">
			<h3 class="center">Cadastro de Alunos</h3>
			<h6 class="center">*Obrigatório!</h3>
			
				<div class="col 12">
					<div class="row">
						<div class="input-field col s6">
							<input type="text" id="txt_name">
							<label for="txt_name">Nome do(a) Aluno(a)*</label>
						</div>
						
						<div class="input-field col s5">
							<input type="email" id="txt_email">
							<label for="txt_email">E-mail do(a) Aluno(a)</label>
						</div>
						
						<div class="input-field col s1">
							<input type="text" id="txt_age" maxlength="2">
							<label for="txt_age">Idade*</label>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col s3">
							<input type="text" id="txt_neighborhood">
							<label for="txt_neighborhood">Endereço*</label>
						</div>
						
						<div class="input-field col s2">
							<input type="text" id="txt_phone_number">
							<label for="txt_phone_number">Número de Telefone*</label>
						</div>
						
						<div class="input-field col s2">
							<input type="text" id="txt_rg">
							<label for="txt_rg">RG*</label>
						</div>
						
						<div class="input-field col s2">
							<input type="text" id="txt_cpf">
							<label for="txt_cpf">CPF*</label>
						</div>
						
						<div class="input-field col s3">
							<input type="text" id="txt_city">
							<label for="txt_city">Cidade*</label>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col s7">
							<textarea id="txt_healthDescription" class="materialize-textarea"></textarea>
							<label for="txt_healthDescription">Descrição Médica</label>
						</div>
						
						<div class="input-field col s3">
							<input type="password" id="txt_password">
							<label for="txt_password">Senha*</label>
						</div>
						
						<div class="input-field col s2">
							<input type="text" id="txt_state">
							<label for="txt_state">Estado*</label>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col s6">
							<select id="cmb_select_goal">
								<option value="select_option" selected>Selecionar um Objetivo*</option>
								<option value="Emagrecer">Emagrecer</option>
								<option value="Hipertrofia">Ganhar massa muscular</option>
								<option value="Outro">Outro</option>
							</select>
							<label for="cmb_select_goal">Selecionar Objetivo</label>
						</div>
						
						<div class="input-field col s6">
							<select id="cmb_select_level">
								<option value="select_option" selected>Selecionar um Nível*</option>
								<option value="Iniciante">Iniciante</option>
								<option value="Mediano">Mediano</option>
								<option value="Avancado">Avançado</option>
							</select>
							<label for="cmb_select_level">Selecione um Nível</label>
						</div>
					</div>
					
					<div class="row">
						<div class="col s12">
							<button class="btn btn-large waves-effect waves-light green darken-2" id="btn_registerStudent">Cadastrar o(a) Aluno(a)</button>
						</div>
					</div>
					
				</div>
				
			
		</div>
	</body>
</html>