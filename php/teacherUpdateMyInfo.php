<?php
	$name = 		$_POST['namePHP'];
	$user = 		$_POST['userPHP'];
	$email = 		$_POST['emailPHP'];
	$cpf = 			$_POST['cpfPHP'];
	$rg = 			$_POST['rgPHP'];
	$phone = 		$_POST['phonePHP'];
	$neighborhood = $_POST['neighborhoodPHP'];
	$city = 		$_POST['cityPHP'];
	$education = 	$_POST['educationPHP'];
	$id =			$_POST['idPHP'];
	
	include("includes/connection.php");
		
	$sql = "UPDATE personal_trainer
	SET name_trainer='$name', email_trainer='$email', rg_trainer='$rg', cpf_trainer='$cpf', phone_trainer='$phone', city_trainer='$city', neighborhood_trainer='$neighborhood', user_trainer='$user', education_trainer='$education'
	WHERE code_trainer='$id'";
	
	$result = $connection->query($sql);
	
	if($result == true)
	{
		echo "success";
	}
	
	else{
		echo "fail";
	}
?>