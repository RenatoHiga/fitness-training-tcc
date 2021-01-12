<?php
	 sleep(3);//REMOVE THIS!
	
	$user = $_POST['userPHP'];
	$password = md5($_POST['passwordPHP']);
	
	include("includes/connection.php");
	
	$sql = "SELECT * 
	FROM admin
	WHERE user_admin='$user'";
	
	$result = $connection->query($sql);
	
	while($line = $result->fetch_object())
	{
		$passwordDB = $line->password_admin;
		
		
		if($password == $passwordDB)
		{
			session_start();
			$_SESSION['loggedIn'] = 'yes';
			$_SESSION['code_admin'] = $line->code_admin;
			echo "Deu certo!";
		}
	}
?>
