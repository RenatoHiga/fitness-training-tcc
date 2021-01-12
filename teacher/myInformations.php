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
				
				$('#txt_cpf').mask('000.000.000-00');
				$('#txt_rg').mask('00.000.000-0');
				$('#txt_phone').mask('00 00000-0000');
				
				$('.fixed-action-btn').floatingActionButton();
				
				$("#btn_update1").click(function(){
					$('.modal').modal({ dismissible: false });
					
					$("#modal_update_information").modal('open');
				});
				
				$("#btn_confirm_update").click(function(){
					var nameJS = 			$("#txt_name").val();
					var userJS = 			$("#txt_user").val();
					var emailJS = 			$("#txt_email").val();
					var cpfJS = 			$("#txt_cpf").val();
					var rgJS = 				$("#txt_rg").val();
					var phoneJS = 	   		$("#txt_phone").val();
					var neighborhoodJS = 	$("#txt_neighborhood").val();
					var cityJS = 			$("#txt_city").val();
					var educationJS = 		$("#txt_education").val();
					var idJS = 				"<?php echo $_SESSION['code_trainer']?>"
					
					var NumCharCPF = $('#txt_cpf').val().length;
					var NumCharRG = $('#txt_rg').val().length;
					var NumNumbPhone = $('#txt_phone').val().length;
					
					if(nameJS == "")
					{
						M.toast({html: 'Campo Nome Vazio!', displayLength: 6000});
						$('#txt_name').focus();
					}
					
					else if(userJS == "")
					{
						M.toast({html: 'Campo Usuário Vazio!', displayLength: 6000});
						$('#txt_user').focus();
					}
					
					else if(emailJS == "")
					{
						M.toast({html: 'Campo E-mail Vazio!', displayLength: 6000});
						$('#txt_email').focus();
					}
					
					else if(cpfJS == "")
					{
						M.toast({html: 'Campo CPF Vazio!', displayLength: 6000});
						$('#txt_cpf').focus();
					}
					
					else if(NumCharCPF < 14)
					{
						M.toast({html: 'Campo CPF Incompleto!', displayLength: 6000});
						$('#txt_cpf').focus();
					}
					
					else if(rgJS == "")
					{
						M.toast({html: 'Campo RG Vazio!', displayLength: 6000});
						$('#txt_rg').focus();
					}
					
					else if(NumCharRG < 12)
					{
						M.toast({html: 'Campo RG Incompleto!', displayLength: 6000});
						$('#txt_rg').focus();
					}
					
					else if(phoneJS == "")
					{
						M.toast({html: 'Campo Telefone Vazio!', displayLength: 6000});
						$('#txt_phone').focus();
					}
					
					else if(NumNumbPhone < 12)
					{
						M.toast({html: 'Campo Telefone Incompleto!', displayLength: 6000});
						$('#txt_phone').focus();
					}
					
					else if(neighborhoodJS == "")
					{
						M.toast({html: 'Campo Bairro Vazio!', displayLength: 6000});
						$('#txt_neighborhood').focus();
					}
					
					else if(cityJS == "")
					{
						M.toast({html: 'Campo Cidade Vazio!', displayLength: 6000});
						$('#txt_city').focus();
					}
					
					else if(educationJS == "")
					{
						M.toast({html: 'Campo Formação Vazio!', displayLength: 6000});
						$('#txt_education').focus();
					}
					
					else
					{
						$.post('../php/teacherUpdateMyInfo.php',
						{
							namePHP:nameJS,
							userPHP:userJS,
							emailPHP:emailJS,
							cpfPHP:cpfJS,
							rgPHP:rgJS,
							phonePHP:phoneJS,
							neighborhoodPHP:neighborhoodJS,
							cityPHP:cityJS,
							educationPHP:educationJS,
							idPHP:idJS
						},
						
						function(result){
							if(result == "success")
							{
								$('.modal').modal('close');
								alert("A atualização de dados foi feita com sucesso!");
								location.reload(true);
							}
						});
					}
				});
			});
		</script>
		
		<style>
			#btn_update1{
				width: 100%;
			}
		</style>
	</head>
	
	<body>
		<?php include("navbar.php");?>
			
		
		 <div id="modal_update_information" class="modal">
			<div class="modal-content">
			  <h4>Mudar minhas Informações:</h4>
				<?php
					include("../php/includes/connection.php");
					
					$varCode = $_SESSION['code_trainer'];
					
					$sql = "SELECT * FROM personal_trainer
					WHERE code_trainer='$varCode'";
					
					$result = $connection->query($sql);
					
					while($line = $result->fetch_object())
					{
						$educationUTF = utf8_encode($line->education_trainer);
						
						echo "
							<div class=\"col 12\">
								<div class=\"row\">
									<div class=\"input-field col s6\"> 
										<input type=\"text\" id=\"txt_name\" value=\"$line->name_trainer\">
										<label for=\"txt_name\">Nome</label>
									</div>
									
									<div class=\"input-field col s3\"> 
										<input type=\"text\" id=\"txt_user\" value=\"$line->user_trainer\">
										<label for=\"txt_name\">Nome de Usuário</label>
									</div>
									
									<div class=\"input-field col s3\"> 
										<input type=\"text\" id=\"txt_email\" value=\"$line->email_trainer\">
										<label for=\"txt_name\">Nome</label>
									</div>
								</div>
								
								<div class=\"row\">
									<div class=\"input-field col s4\"> 
										<input type=\"text\" id=\"txt_cpf\" value=\"$line->cpf_trainer\">
										<label for=\"txt_name\">CPF</label>
									</div>
									
									<div class=\"input-field col s4\"> 
										<input type=\"text\" id=\"txt_rg\" value=\"$line->rg_trainer\">
										<label for=\"txt_name\">RG</label>
									</div>
									
									<div class=\"input-field col s4\"> 
										<input type=\"text\" id=\"txt_phone\" value=\"$line->phone_trainer\">
										<label for=\"txt_name\">Número de Telefone</label>
									</div>
								</div>
								
								<div class=\"row\">
									<div class=\"input-field col s4\"> 
										<input type=\"text\" id=\"txt_neighborhood\" value=\"$line->neighborhood_trainer\">
										<label for=\"txt_name\">Bairro</label>
									</div>
									
									<div class=\"input-field col s4\"> 
										<input type=\"text\" id=\"txt_city\" value=\"$line->city_trainer\">
										<label for=\"txt_name\">Cidade</label>
									</div>
									
									<div class=\"input-field col s4\"> 
										<input type=\"text\" id=\"txt_education\" value=\"$educationUTF\">
										<label for=\"txt_name\">Formação</label>
									</div>
								</div>
							</div>
						";
					}
				?>
			 
			
			</div>
			
			<div class="modal-footer">
			   <button id="btn_confirm_update" class="waves-effect waves-green btn-flat">Alterar os Dados</button>
			  <button id="btn_close_modal" class="modal-close waves-effect waves-green btn-flat">Fechar</button>
			</div>
		</div>
		
		<div class="container">
				<h3 class="center">Minhas Informações</h3>
				
				<?php
					include("../php/includes/connection.php");
					
					$varCode = $_SESSION['code_trainer'];
					
					$sql = "SELECT * FROM personal_trainer
					WHERE code_trainer='$varCode'";
					
					$result = $connection->query($sql);
					
					while($line = $result->fetch_object())
					{
						$educationUTF = utf8_encode($line->education_trainer);
						
						echo "
							<div class=\"col 12\">
							
								<div class=\"row\">
								
									<div class=\"col s4\">
									
										<h5 class=\"center-align\">Nome</h5>
										
										<h6 class=\"center-align\">$line->name_trainer</h6>
										
										<h5 class=\"center-align\">E-mail</h5>
										
										<h6 class=\"center-align\">$line->email_trainer</h6>
										
										<h5 class=\"center-align\">Nome de Usuário</h5>
										
										<h6 class=\"center-align\">$line->user_trainer</h6>	
										
									</div>
									
									<div class=\"col s4\">
										<h5 class=\"center-align\">CPF</h5>
										
										<h6 class=\"center-align\">$line->cpf_trainer</h6>
										
										<h5 class=\"center-align\">RG</h5>
										
										<h6 class=\"center-align\">$line->rg_trainer</h6>
										
										<h5 class=\"center-align\">Meu Telefone</h5>
										
										<h6 class=\"center-align\">$line->phone_trainer</h6>
									</div>
									
									<div class=\"col s4\">
										<h5 class=\"center-align\">Bairro</h5>
										
										<h6 class=\"center-align\">$line->neighborhood_trainer</h6>
										
										<h5 class=\"center-align\">Cidade</h5>
										
										<h6 class=\"center-align\">$line->city_trainer</h6>
										
										<h5 class=\"center-align\">Formação</h5>
										
										<h6 class=\"center-align\">$educationUTF</h6>
									</div>
									
								</div>
								
								<div class=\"row\">
									<div class=\"col s12\">
									
									<button class=\"btn-large waves-effect waves-light green darken-2\" id=\"btn_update1\">Desejo alterar os dados</button>
								</div>
							</div>
						";
					}
					
				?>

		</div>
	</body>
</html>