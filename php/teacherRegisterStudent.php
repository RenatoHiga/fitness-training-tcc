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
	$password =		$_POST['passwordPHP'];
	
	$nameUTF = utf8_decode($name);
	$cityUTF = utf8_decode($city);
	$neighborhoodUTF = utf8_decode($neighborhood);
	$descriptionHealthUTF = utf8_decode($descriptionHealth);
	
	
	
	include("includes/connection.php");
	
	$sql = "INSERT INTO user(name_user, email_user, age_user, descriptionHealth_user, goal_user, city_user, neighborhood_user, phone_user, rg_user, cpf_user, level_user, state_user, password_user)
	VALUES ('$nameUTF','$email','$age','$descriptionHealthUTF','$goal','$cityUTF','$neighborhoodUTF','$phone','$rg','$cpf','$level', '$state', md5('$password'))";

	$result = $connection->query($sql);
	
	if($result == true)
	{
		echo "success";
	}
	
	else
	{
		echo "error sql:$sql";
	}
?>