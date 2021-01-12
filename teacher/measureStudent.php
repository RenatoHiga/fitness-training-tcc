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
				
				 $('.dropdown-trigger').dropdown();
				 
				 $('.btn_ChoicedStudent').click(function(){
					
					var Code = $(this).attr('id');
					$("#title_selectStudent").hide();
					
					$.post('../php/selectStudentDropdown.php',
					{
						codePHP: Code
					},
					
					function(resultado)
					{
						$('#t_measures').html(resultado);
					});
				 
				 });
				 
			});
		</script>
		
		<style>
			.font-blue{
				color: blue;
			}
			
			.font-red{
				color: red;
				font-weight: bold;
			}
		</style>
	</head>
	
	<body>
		<?php include("navbar.php");?>
	
		<div class="container">
		
			<h3 class="center">Consulta de Medidas do Aluno</h3>
			
			<br>
			
			<div class="center-align"><a class="dropdown-trigger btn" href="#" data-target="dropdown_ChoiceStudent">Escolher um Aluno</a></div>
			
			
			<ul id='dropdown_ChoiceStudent' class='dropdown-content'>
				
				<?php
				
				include("../php/includes/connection.php");
				
				$sql = "SELECT * FROM user
				ORDER BY name_user";
				
				$result = $connection->query($sql);
				
				while($line = $result->fetch_object())
				{
					echo "
					
					<li><a id=\"$line->code_user\" class=\"btn_ChoicedStudent\" href=\"#!\">$line->name_user</a></li>
					
					";
				}
				?>
			
			</ul>
			
			<br>
			<br>
			<table class="centered" id="t_measures">
				
				<h5 id="title_selectStudent" class="center">Selecione um Aluno!</h5>
			
			</table>
		
		</div>
	
	</body>
</html>