<?php
	$code = $_POST['codePHP'];
	
	include('includes/connection.php');
	
	$sql = "DELETE FROM exercise
	WHERE code_exercise='$code'";
	
	$result = $connection->query($sql);
	
	if($result == true)
	{
		echo "Deu certo!";
	}
	
	else
	{
		echo "Deu erro";
	}
?>