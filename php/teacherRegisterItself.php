<?php
	$name 		= $_POST['namePHP'];
	$email 		= $_POST['emailPHP'];
	$password   = $_POST['passwordPHP'];
	$user 		= $_POST['userPHP'];
	$rg 		= $_POST['rgPHP'];
	$cpf 		= $_POST['cpfPHP'];
	$phone 		= $_POST['phonePHP'];
	$city 		= $_POST['cityPHP'];
	$neighborhood = $_POST['neighborhoodPHP'];
	$education 	= $_POST['educationPHP'];
	
	$educationUTF = utf8_decode($education);
	
	include("includes/connection.php");
	
	$sql1 = "SELECT code_trainer FROM personal_trainer ORDER BY code_trainer DESC LIMIT 1";
	
	$result1 = $connection->query($sql1);
	
	while($line = $result1->fetch_object())
	{
		$code = $line->code_trainer;
		
		$final_code = $code + 1;
	}
	
	
	$sql2 = "INSERT INTO personal_trainer(code_trainer, name_trainer, password_trainer, email_trainer, rg_trainer, cpf_trainer, phone_trainer, city_trainer, neighborhood_trainer, user_trainer, education_trainer)
	VALUES ('$final_code', '$name', md5('$password'), '$email', '$rg', '$cpf', '$phone', '$city', '$neighborhood', '$user', '$educationUTF')";
	
	$result2 = $connection->query($sql2);
	
	if($result2 == true)
	{
		echo "Deu certo";
	}
	
	else
	{
		echo "De erro";
		echo "$sql2";
	}
?>