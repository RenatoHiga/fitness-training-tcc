<?php
	
	$code = $_POST['codePHP'];
	
	include('includes/connection.php');
	
	$sql1 = "SET GLOBAL foreign_key_checks = 0;";
	
	$sql2 = "DELETE FROM exercise WHERE code_exercise='$code';";
	
	$sql3 = "SET GLOBAL foreign_key_checks = 1;"; 
	
	$result = $connection->query($sql1);
	
	if($result)
	{
		$result2 = $connection->query($sql2);
		
		if($result2 == true)
		{
			echo "Excluído(a) com sucesso!";
			
			$result3 = $connection->query($sql3);
			
			if($result3)
			{
				echo "Você será redirecionado!";
			}
			
			else
			{
				echo "Erro no servidor 3";
			}
		}
		
		else
		{
			echo "Erro no servidor 2 ";
		}
	}
	
	else
	{
		echo "Erro no servidor 1";
	}
	
?>