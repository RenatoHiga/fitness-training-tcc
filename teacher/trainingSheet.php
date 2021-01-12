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
					include("../php/includes/btn_exit.php");
				?>
			});
		</script>
		
		<style>
			#table_training{
				display: block;
				
				height: 60%;
				overflow: scroll;
			}
		</style>
	</head>
	
	<body>
		<?php include("navbar.php")?>
		
		
			<h3 class="center">Ficha de Treino</h3>
			<div class="container">
			<table id="table_training">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>URL</th>
						<th>Cód. Aluno</th>
						<th>Cód. Músculo</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						include("../php/includes/connection.php");
						
						$sql = "SELECT * FROM exercise";
						
						$result = $connection->query($sql);
						
						while($line = $result->fetch_object())
						{
							echo"
								<tr>
									<td>$line->code_exercise</td>
									<td>$line->name_exercise</td>
									<td>$line->description</td>
									<td><video width=\"300\" height=\"200\" controls><source src=\"$line->url_exercise\" type=\"video/mp4\"></video></td>
									<td>$line->code_user</td>
								
									<td>$line->code_muscle</td>
								
								</tr>
							";
						}
					?>
				</tbody>
			</table>
			</div>
	</body>
</html>