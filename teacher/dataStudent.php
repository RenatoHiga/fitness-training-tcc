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
		<?php include('../php/includes/important_first_include.php');?>
		<script>
			$(document).ready(function(){
				<?php
					include("../php/includes/btn_exit.php");
				?>
				
				
				$('.modal').modal();
				
				$('#modal1').modal();
				
				$('#txt_nome').on("keyup", function(){
					var NameStudent = $(this).val().toLowerCase();
					
					$('.row_name').filter(function(){
						$(this).toggle($(this).text().toLowerCase().indexOf(NameStudent) > -1)
					});
				});
				
				$('.row_name').dblclick(function(){
					$('#modal1').modal('open');
					$('#loader').show();
					
					$('#result_data').hide();
					var codeStudent = $(this).attr('value');
					
					$.post('../php/getDataStudent.php',
					{
						codeStudentPHP:codeStudent
					},
					
					function(result){
						
						$('#loader').hide();
						$('#result_data').show();
						$('#result_data').html(result);
						
					});
				});
			});
		</script>
		
		<style>
			tbody{
				display: block;
				height:300px;
				
				overflow:auto;
			}
			
			td{
				width: 0.001%;
			}
			
			.row_name{
				cursor: pointer;
			}
			
			#loader{
				position: absolute;
				top: 25%;
				left: 0;
				right: 0;
				bottom: 0;
				margin: auto;
				
			}
			
			.modal { width: 75%; } 
		</style>
	</head>
	
	<body>
		<?php include('navbar.php');?>
		
		<div class="container">
			<h3 class="center">Consultar um Aluno</h3>
			<p class="center"><b>Clique duas vezes para ver os dados do(a) Aluno(a)!</b></p>
			
			<div class="row">
				<div class="input-field col s6 offset-s3">
					<input type="text" class="input" id="txt_nome">
					<label for="txt_nome">Nome do Aluno</label>
				</div>
			</div>
			
			<div class="container">
				<table id="table_students">
					<thead>
						<tr>
							<th class="center">Nomes</th>
						</tr>
					</thead>
					
					<tbody>
					
						<?php
						include('../php/includes/connection.php');
						
						$sql = "SELECT * FROM user";
						
						$result = $connection->query($sql);
						
						while($line = $result->fetch_object())
						{
							$nameUTF = utf8_encode($line->name_user);
							
							echo "
						<tr class=\"row_name\" value=\"$line->code_user\">
							<td class=\"center algo\">$nameUTF</td>
						</tr>
						";
						}
						?>
						
					</tbody>
				</table>
			</div>
			
			<div id="modal1" class="modal">
				
				<div class="modal-content">
					
					<h4 class="center">Dados do(a) Aluno(a)</h4>
					
					<div class="col s12">
						<br><br>
						
						<div class="preloader-wrapper big active col s12 " id="loader">
							<div class="spinner-layer spinner-green-only center">
							  <div class="circle-clipper left">
								<div class="circle"></div>
							  </div><div class="gap-patch">
								<div class="circle"></div>
							  </div><div class="circle-clipper right">
								<div class="circle"></div>
							  </div>
							</div> 
							
						</div>
						
						 
						<div id="result_data">
						
						</div>
						
						
					</div>	
					
					<div class="modal-footer">
					  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
					</div>
				</div>
			</div>
			
			
		</div>
	</body>
</html>