<?php
	sleep(3);
	
	$codeStudent = $_POST['codeStudentPHP'];
	
	include('includes/connection.php');
	
	$sql = "SELECT * FROM user
	where code_user='$codeStudent'";
	
	$result = $connection->query($sql);
	
	while($line = $result->fetch_object())
	{
		$nameUTF = utf8_encode($line->name_user);
		$descHealth = utf8_encode($line->descriptionHealth_user);
		
		echo "
			<div class=\"row\">
				<div class=\"col s5\"><p>Nome: <b>$nameUTF</b></p></div>
				
				<div class=\"col s5\"><p>E-mail: <b>$line->email_user</b></p></div>
							
				<div class=\"col s2\"><p>Idade: <b>$line->age_user</b></p></div>
			</div>
						
			<div class=\"row\">
				<div class=\"col s3\"><p>Endereço: <b>$line->neighborhood_user</b></p></div>
				<div class=\"col s2\"><p>Nº Tel.: <b>$line->phone_user</b></p></div>
				<div class=\"col s2\"><p>RG: <b>$line->rg_user</b></p></div>
				<div class=\"col s2\"><p>CPF: <b>$line->cpf_user</b></p></div>
				<div class=\"col s3\"><p>Cidade: <b>$line->city_user</b></p></div>
			</div>
						
			<div class=\"row\">
				<div class=\"col s6\"><p>Desc. Méd.: <b>$descHealth</b></p></div>
				<div class=\"col s2\"><p>Estado: <b>$line->state_user</b></p></div>
				<div class=\"col s2\"><p>Objetivo: <b>$line->goal_user</b></p></div>
				<div class=\"col s2\"><p>Nível: <b>$line->level_user</b></p></div>
			</div>
		
		";
	}
	
?>