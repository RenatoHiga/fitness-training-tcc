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
			});
		</script>
	</head>
	
	<body>
		<?php include("navbar.php");?>
		
			<div class="container">
			<h3 class="center">Consultar Professores</h3>
			<p class="center"><b>Clique no nome do professor para alterar os dados ou excluir o professor</b></p>
			
			<table>
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>RG</th>
						<th>CPF</th>
						<th>Telefone</th>
						<th>Cidade</th>
						<th>Bairro</th>
						<th>Usuário</th>
						<th>Formação</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						include("../php/includes/connection.php");
						
						$sql = "SELECT * FROM personal_trainer";
						
						$result = $connection->query($sql);
						
						while($line = $result->fetch_object())
						{
							$educationUTF = utf8_encode($line->education_trainer);
							echo"
								<tr>
									<td>$line->code_trainer</td>
									<td><a href=\"updateTeacher.php?code_teacher=$line->code_trainer\">$line->name_trainer</a></td>
									<td>$line->email_trainer</td>
									<td>$line->rg_trainer</td>
									<td>$line->cpf_trainer</td>
									<td>$line->phone_trainer</td>
									<td>$line->city_trainer</td>
									<td>$line->neighborhood_trainer</td>
									<td>$line->user_trainer</td>
									<td>$educationUTF</td>
								</tr>
							";
						}
					?>
				</tbody>
			</table>
			</div>
	</body>
</html>