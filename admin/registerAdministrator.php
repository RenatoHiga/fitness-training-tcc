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
				<?php
					include("../php/includes/btn_exit2.php");
				?>
				
				$('#btn_cad').click(function(){
					
					var nameJS = $('#txt_name').val();
					var userJS = $('#txt_user').val();
					var emailJS = $('#txt_email').val();
					var passwordJS = $('#txt_password').val();
					
					$.post('../php/AdminRegisterAdmin.php',				
					{
						namePHP:nameJS,
						userPHP:userJS,
						emailPHP:emailJS,
						passwordPHP:passwordJS
					},
					
					function(result)
					{
						if(result == "Cadastrado com sucesso!")
						{
							alert(result);
							window.location.reload();
						}
						
						
					});
					
				});
			});
		</script>
		
		<style>
			.btn{
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
		</style>
		
	</head>
	
	<body>
		<?php include('navbar.php') ?>
		<div class="container">
			<h3 class="center">Cadastrar Administrador</h3>
			
			<div class="col s12">
				
				<div class="row">
					<div class="input-field col s8">
						<input type="text" id="txt_name">
						<label for="txt_name">Nome do Administrador</label>
					</div>
					
					<div class="input-field col s4">
						<input type="text" id="txt_user">
						<label for="txt_user">Nome Usuário</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s9">
						<input type="text" id="txt_email">
						<label for="txt_email">E-mail</label>
					</div>
					
					<div class="input-field col s3">
						<input type="password" id="txt_password">
						<label for="txt_password">Senha</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12">
						<button class="btn waves-effect center green darken-2" id="btn_cad" type="submit">Cadastrar Administrador</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>