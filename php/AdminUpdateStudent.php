<?php
	
	$name = 		$_POST['namePHP'];
	$email = 		$_POST['emailPHP'];
	$age = 			$_POST['agePHP'];
	$neighborhood = $_POST['neighborhoodPHP'];
	$phone = 		$_POST['phonePHP'];
	$rg =			$_POST['rgPHP'];
	$cpf = 			$_POST['cpfPHP'];
	$city = 		$_POST['cityPHP'];
	$descriptionHealth = $_POST['healthDescriptionPHP'];
	$goal = 		$_POST['goalPHP'];
	$level = 		$_POST['levelPHP'];
	$state =        $_POST['statePHP'];
	$code = 		$_POST['codePHP'];
	
	$nameUTF = utf8_decode($name);
	$cityUTF = utf8_decode($city);
	$neighborhoodUTF = utf8_decode($neighborhood);
	$descriptionHealthUTF = utf8_decode($descriptionHealth);
	
	include('includes/connection.php');
	
	$sql = 
	"UPDATE user
	SET name_user='$nameUTF', email_user='$email', age_user='$age', descriptionHealth_user='$descriptionHealthUTF', goal_user='$goal', city_user='$city', neighborhood_user='$neighborhoodUTF', state_user='$state', phone_user='$phone', rg_user='$rg', cpf_user='$cpf', level_user='$level' 
	WHERE code_user='$code'";
	
	$result = $connection->query($sql);
	
	if($result == true)
	{
		echo "success";
	}
	
	else{
		echo "erro";
	}
?>