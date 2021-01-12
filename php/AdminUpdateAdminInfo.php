<?php
	
	$name = $_POST['namePHP'];
	$email = $_POST['emailPHP'];
	$user = $_POST['userPHP'];
	$code = $_POST['codePHP'];
	
	
	include('includes/connection.php');
	
	$sql = "UPDATE admin
	SET name_admin='$name', email_admin='$email', user_admin='$user'
	WHERE code_admin='$code'";
	
	$result = $connection->query($sql);
	
	if($result == true)
	{
		echo "Deu certo!";
	}
	
	else
	{
		echo "$sql";
	}	
	
	
	
?>