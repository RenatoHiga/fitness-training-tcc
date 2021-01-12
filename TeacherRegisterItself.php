<html>
	<head>
		<meta charset="utf-8">
		
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="materialize/css/materialize.css">

		<!-- Compiled and minified JavaScript -->
		<script src="materialize/js/materialize.js"></script>
		
		<script src="js/jquery.js"></script>
		
		<!-- JQuery Mask -->
		<script src="js/jquery.mask.js"></script>
		
		<script>
			$(document).ready(function(){
				
				$('#title').animate({
					fontSize: '500%'
				},720,"swing");
				
				$('#btn_register').animate({
					width: '100%'
				},720,'linear');
				
				$('#form_teacher').animate({
					opacity: 1
				},730,'linear');
				
				$('#txt_rg').mask('00.000.000-0');
				
				$('#txt_cpf').mask('000.000.000-00');
				
				$('#txt_phone').mask('00 00000-0000');
				
				$('#btn_register').click(function(){
					
					var nameJS 		= $('#txt_name').val();
					var emailJS 	= $('#txt_email').val();
					var passwordJS 	= $('#txt_password').val();
					var userJS 		= $('#txt_user').val();
					var rgJS		= $('#txt_rg').val();
					var cpfJS		= $('#txt_cpf').val();
					var phoneJS 	= $('#txt_phone').val();
					var cityJS 		= $('#txt_city').val();
					var neighborhoodJS = $('#txt_neighborhood').val();
					var educationJS = $('#txt_education').val();
					
					if(nameJS == "")
					{
						M.toast({html: 'O Campo Nome está vazio!', display: 6000});
						$('#txt_name').focus();
					}
					
					else if(passwordJS == "")
					{
						M.toast({html: 'O Campo Senha está vazio!', display: 6000});
						$('#txt_password').focus();
					}
					
					else if(userJS == "")
					{
						M.toast({html: 'O Campo Usuário está vazio!', display: 6000});
						$('#txt_user').focus();
					}
					
					else if(rgJS == "")
					{
						M.toast({html: "O Campo RG está vazio!", display: 6000});
						$('#txt_rg').focus();
					}
					
					else if(rgJS < 12)
					{
						M.toast({html: "O Campo RG está incompleto!", display: 6000});
						$('#txt_rg').focus();
					}
					
					else if(cpfJS == "")
					{
						M.toast({html:'O Campo CPF está vazio!', display: 6000});
						$('#txt_cpf').focus();
					}
					
					else if(cpfJS < 14)
					{
						M.toast({html:'O Campo CPF está incompleto!', display: 6000});
						$('#txt_cpf').focus();
					}
					
					else if(phoneJS == "")
					{
						M.toast({html:'O Campo Telefone está vazio!', display: 6000});
						$('#txt_phone').focus();
					}
					
					else if(phoneJS < 13)
					{
						M.toast({html:'O Campo Telefone está incompleto!', display: 6000});
						$('#txt_phone').focus();
					}
					
					else if(cityJS == "")
					{
						M.toast({html:'O Campo Cidade está vazio!', display:6000});
						$('#txt_city').focus();
					}
					
					else if(neighborhoodJS == "")
					{
						M.toast({html:'O Campo Bairro está vazio!', display: 6000});
						$('#txt_neighborhood').focus();
					}
					
					else if(educationJS == "")
					{
						M.toast({html:'O Campo Formação está vazio!', display: 6000});
						$('#txt_education').focus();
					}
					
					else
					{
						$.post('php/teacherRegisterItself.php',
						{
							namePHP:nameJS,
							emailPHP:emailJS,
							passwordPHP:passwordJS,
							userPHP:userJS,
							rgPHP:rgJS,
							cpfPHP:cpfJS,
							phonePHP:phoneJS,
							cityPHP:cityJS,
							neighborhoodPHP:neighborhoodJS,
							educationPHP:educationJS
						},
						
						function(resultado){
							alert(resultado);
							
							window.location.reload();
							
						});
					}
				});
				
			});	
		</script>
		
		<style>
			#title{
				font-size: 0px;
			}
		
			#btn_register{
				width: 0;
			}
			
			#form_teacher{
				opacity: 0;
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
		   
		   #link_first_page{
			   color: #0d47a1;
		   }
		   
		</style>
	</head>
	
	<body class="yellow darken-4">
		<div class="container">
			
			<div class="row">
				<h1 class="center-align" id="title">Cadastro do Professor</h1>
			</div>
			
			<div class="col s12" id="form_teacher">
			
				<div class="row">
				
					<div class="input-field col s4">
						<input type="text" id="txt_name">
						<label for="txt_name">Nome do Professor</label>
					</div>
					
					<div class="input-field col s4">
						<input type="email" id="txt_email">
						<label for="txt_email">E-mail do Professor</label>
					</div>
					
					<div class="input-field col s2">
						<input type="password" id="txt_password">
						<label for="txt_password">Senha do Professor</label>
					</div>
					
					<div class="input-field col s2">
						<input type="text" id="txt_user">
						<label for="txt_user">Usuário do Professor</label>
					</div>
					
				</div>
				
				<div class="row">
					
					<div class="input-field col s2">
						<input type="text" id="txt_rg">
						<label for="txt_rg">RG do Professor</label>
					</div>
					
					<div class="input-field col s2">
						<input type="text" id="txt_cpf">
						<label for="txt_cpf">CPF do Professor</label>
					</div>
					
					<div class="input-field col s2">
						<input type="text" id="txt_phone">
						<label for="txt_phone">Nº de Telefone</label>
					</div>
					
					<div class="input-field col s3">
						<input type="text" id="txt_city">
						<label for="txt_city">Cidade</label>
					</div>
					
					<div class="input-field col s3">
						<input type="text" id="txt_neighborhood">
						<label for="txt_neighborhood">Bairro</label>
					</div>
					
				</div>
				
				<div class="row">
					<div class="input-field col s12">
						<textarea id="txt_education" class="materialize-textarea"></textarea>
						<label for="txt_education">Educação do Professor</label>
					</div>
				</div>
			
			</div>
			
			<div class="row">
				<div class="col s12">
					<button class="btn green darken-2 waves-effect" id="btn_register">CADASTRAR-SE</button>
				<div>
			</div>
			
			<div class="row center-align">
				<div class="col s12">
					<br>
					<a href="index_teacher.php" class="center-align" id="link_first_page">Voltar para Página Inicial</a>
				</div>
			<div>
			
		</div>
	</body>
</html>