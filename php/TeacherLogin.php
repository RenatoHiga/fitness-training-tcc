<?php
	 sleep(3);//REMOVE THIS!
	
	$email = $_POST['emailPHP'];
	$password = md5($_POST['passwordPHP']);
	
	include("includes/connection.php");
	
	$sql = "SELECT * 
	FROM personal_trainer
	WHERE email_trainer='$email'";
	
	$result = $connection->query($sql);
	
	while($line = $result->fetch_object())
	{
		$passwordDB = $line->password_trainer;
		
		
		if($password == $passwordDB)
		{
			session_start();
			$_SESSION['loggedIn'] = 'yes';
			$_SESSION['code_trainer'] = $line->code_trainer;
			echo "Deu certo!";
		}
	}
?>