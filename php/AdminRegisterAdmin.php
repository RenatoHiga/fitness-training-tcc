<?php
	$name 		= $_POST['namePHP'];
	$password 	= md5($_POST['passwordPHP']);
	$email 		= $_POST['emailPHP'];
	$user 		= $_POST['userPHP'];
	
	include('includes/connection.php');
	
	$sql = "INSERT INTO admin(name_admin, password_admin, user_admin, email_admin)
	VALUES('$name','$password','$user','$email')";
	
	$result = $connection->query($sql);
	
	if($result == true)
	{
		echo "Cadastrado com sucesso!";
	}
	
	else
	{
		echo "Deu erro!";
	}
	

?>