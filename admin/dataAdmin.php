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
				
				$('#btn_update').click(function(){
					$('.modal').modal();
					
					$('#modal_update_information').modal('open');
					
				});
				
				
				$('#btn_confirm_update').click(function(){
					var nameJS = $('#txt_name').val();
					var emailJS = $('#txt_email').val();
					var userJS = $('#txt_user').val();
					var codeJS = <?php echo $_SESSION['code_admin']?>
					
				
					$.post('../php/AdminUpdateAdminInfo.php',
					{
						namePHP:nameJS,
						emailPHP:emailJS,
						userPHP:userJS,
						codePHP:codeJS
					},
					
					function(resultado){

						if(resultado = "Dados atualizados com sucesso!")
						{
							location.reload(true);
							alert(resultado);
							
						}
						
						else{
							alert(resultado);
							
						}
					})
				});
			});
		</script>
		
		<style>
			#btn_update{
				width: 100%;
			}
		</style>
	</head>
	
	<body>
		<?php include('navbar.php'); ?>
		
		<div id="modal_update_information" class="modal">
		
			<div class="modal-content">
			
				<h4>Mudar minhas Informações</h4>
				
				<?php
					include("../php/includes/connection.php");
					
					$varCode = $_SESSION['code_admin'];
					
					$sql = "SELECT * FROM admin
					WHERE code_admin='$varCode'";
					
					$result = $connection->query($sql);
					
					while($line = $result->fetch_object())
					{
						echo "
							<div class=\"col 12\">
								<div class=\"row\">
									<div class=\"input-field col s6\"> 
										<input type=\"text\" id=\"txt_name\" value=\"$line->name_admin\">
										<label for=\"txt_name\">Nome</label>
									</div>
									
									<div class=\"input-field col s3\"> 
										<input type=\"text\" id=\"txt_user\" value=\"$line->user_admin\">
										<label for=\"txt_name\">Nome de Usuário</label>
									</div>
									
									<div class=\"input-field col s3\"> 
										<input type=\"text\" id=\"txt_email\" value=\"$line->email_admin\">
										<label for=\"txt_name\">E-mail</label>
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
		
			<h3 class="center">Meus Dados</h3>
		
			<?php
				include("../php/includes/connection.php");
					
				$varCode = $_SESSION['code_admin'];
				
				$sql = "SELECT * FROM admin
				WHERE code_admin='$varCode'";
				
				$result = $connection->query($sql);
				
				while($line = $result->fetch_object())
				{
					echo "
						<div class=\"col 12\">
							
							<div class=\"row\">
							
								<div class=\"col s12\">
									
									<h5 class=\"center-align\">Nome</h5>
										
									<h6 class=\"center-align\">$line->name_admin</h6>
									
								</div>
								
								<div class=\"col s12\">
									<h5 class=\"center-align\">E-mail</h5>
										
									<h6 class=\"center-align\">$line->email_admin</h6>
								</div>
								
								<div class=\"col s12\">
									<h5 class=\"center-align\">Nome de Usuário</h5>
										
									<h6 class=\"center-align\">$line->user_admin</h6>
								</div>
								
								<br><br>
								<div class=\"col s12 mt-2\">
									<btn class=\"btn btn-waves center-align green darken-2\" value=\"Alter minhas informações\" id=\"btn_update\">Alterar minhas informações</btn>
								</div>
							</div>
						
						</div>
					";
				}	
				
			?>
		</div>
	</body>
</html>