<?php
	
	$name 		= $_POST['namePHP'];
	$email 		= $_POST['emailPHP'];
	$user 		= $_POST['userPHP'];
	$rg 		= $_POST['rgPHP'];
	$cpf 		= $_POST['cpfPHP'];
	$phone 		= $_POST['phonePHP'];
	$city 		= $_POST['cityPHP'];
	$neighborhood = $_POST['neighborhoodPHP'];
	$education 	= $_POST['educationPHP'];
	$code		= $_POST['codePHP'];
		
	$educationUTF = utf8_decode($education);
	
	include("includes/connection.php");
	
	$sql = 
	"UPDATE personal_trainer
	SET name_trainer='$name', user_trainer='$user', email_trainer='$email', rg_trainer='$rg', cpf_trainer='$cpf', phone_trainer='$phone', city_trainer='$city', neighborhood_trainer='$neighborhood', education_trainer='$educationUTF'
	WHERE code_trainer='$code'";
	
	$result = $connection->query($sql);
	
	if($result == true)
	{
		echo "Deu certo";
	}
	
	else
	{
		echo "Erro";
	}
	
	
		
?>