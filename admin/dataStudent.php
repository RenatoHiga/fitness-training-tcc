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
				
				$('.modal').modal();
				
				$('.modal').modal({ dismissible: false });
				
				$('.OneRow').dblclick(function(){
					
					var code_user = $(this).attr('id');
					
					
					$.post('updateStudent.php',{
						codePHP:code_user
					});
					window.location.replace('updateStudent.php');
					
					
					
				});
				
			});
		</script>
		
		<style>
			#table_students{
				display: block;
				
				height: 60%;
				overflow: scroll;
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
		   
		   /* SELECT */
		   
		   ul.dropdown-content.select-dropdown li span {
				color: #388e3c; /* no need for !important :) */
			}
			
		</style>
	</head>
	
	<body>
		<?php include("navbar.php")?>

			<h3 class="center">Consultar Alunos</h3>
			<p class="center"><b>Clique no nome do aluno para alterar os dados ou excluir o aluno</b></p>
			
			<div class="container">
				<table id="table_students">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Idade</th>
							<th>Prob. Saúde</th>
							<th>Objetivo</th>
							<th>Cidade</th>
							<th>Endereço</th>
							<th>Estado</th>
							<th>Telefone</th>
							<th>RG</th>
							<th>CPF</th>
							<th>Nível</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							include("../php/includes/connection.php");
							
							$sql = "SELECT * FROM user";
							
							
							$result = $connection->query($sql);
							
							while($line = $result->fetch_object())
							{
								$nameUTF = utf8_encode($line->name_user);
								$descriptionUTF = utf8_encode($line->descriptionHealth_user);
								$neighborhoodUTF = utf8_encode($line->neighborhood_user);
								
								
								echo"
									<tr id=\"$line->code_user\" class=\"OneRow\">
										
										<td>$line->code_user</td>
										<td id=\"nameUser\" value=\"$nameUTF\"><a href=\"updateStudent.php?code_user=$line->code_user\">$nameUTF</td>
										<td id=\"emailUser\">$line->email_user</td>
										<td id=\"ageUser\">$line->age_user</td>
										<td id=\"descriptionUser\">$descriptionUTF</td>
										<td	id=\"goalUser\">$line->goal_user</td>
										<td	id=\"cityUser\">$line->city_user</td>
										<td	id=\"neighborhoodUser\">$neighborhoodUTF</td>
										<td	id=\"stateUser\">$line->state_user</td>
										<td	id=\"\">$line->phone_user</td>
										<td	id=\"rgUser\">$line->rg_user</td>
										<td	id=\"cpfUser\">$line->cpf_user</td>
										<td	id=\"levelUser\">$line->level_user</td>
										
									</tr>
								";
							}
						?>
					</tbody>
				</table>
			</div>
	</body>
</html>