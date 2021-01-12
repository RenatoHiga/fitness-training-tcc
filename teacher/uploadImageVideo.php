<?php
	session_start();

	$nameExercise = $_POST['nameExercise'];
	$description = $_POST['descriptionExercise'];
	$IdStudent = $_POST['selectIdStudent'];
	$IdMuscle = $_POST['selectIdMuscle'];
	$IdTrainer = $_SESSION['code_trainer'];
	
	
	echo "$nameExercise";
	$original_FileName = $_FILES['userfile']['name'];
	$exploded_parts = explode(".",$original_FileName);
	$extension = $exploded_parts[1];
	
	$new_FileName = md5(date("Y-m-d H:i:s"));
	
	if($extension == "mp4")
	{
		
		if(move_uploaded_file ($_FILES['userfile']['tmp_name'], "../images/$new_FileName.mp4"))
		{
			
			include("../php/includes/connection.php");
			
			$sql = "INSERT INTO exercise (name_exercise, description, url_exercise, code_user, code_trainer, code_muscle)
			VALUES ('$nameExercise','$description','../images/$new_FileName.mp4', '$IdStudent', '$IdTrainer', '$IdMuscle')";
			
			$result = $connection->query($sql);
			
			if($result == true)
			{
				header("location:registerExercise.php");
			}
			
			else
			{
				echo "Deu erro!";
				echo "Pode ser o SQL: $sql";
			}
			
		}
		
		else
		{
			echo "Deu erro!";
		}
	
	}
	
	else if($extension == "jpg")
	{
		
		if(move_uploaded_file ($_FILES['userfile']['tmp_name'], "../images/$new_FileName.jpg"))
		{
			echo "Deu certo!";
		}
		
		else
		{
			echo "Deu erro!";
		}
		
	}

	
?>