<?php
	$code = $_POST['codePHP'];
	
	include('includes/connection.php');
	
	$sql = "SELECT measures.*, user.name_user 
	FROM measures 
	INNER JOIN user ON measures.code_user=user.code_user 
	WHERE user.code_user='$code'";
	
	$result = $connection->query($sql);
	
	while($line = $result->fetch_object()){
		
	echo "
			<tbody>
				
				<thead>
					
					<tr>
					
						<th>Nome Aluno</th>
						<th>Peito</th>
						<th>Pescoço</th>
						<th>Braço Direito</th>
						<th>Braço Esquerdo</th>
						<th>Antebraço Direito</th>
						<th>Antebraço Esquerdo</th>
						<th>Altura</th>
							
					</tr>
				
				</thead>
				
				<tr>
				
					<td>$line->name_user</td>
					<td class='font-blue'>$line->chest</td>
					<td class='font-blue'>$line->neck</td>
			";		
					if($line->rightArm > $line->leftArm || $line->leftArm > $line->rightArm)
					{
						echo "<td class='font-red'>$line->rightArm</td>
							  <td class='font-red'>$line->leftArm</td>";
					}
					
					else
					{
						echo "<td class='font-blue'>$line->rightArm</td>
							  <td class='font-blue'>$line->leftArm</td>";
					}
					
					if($line->rightForearm > $line->leftForearm || $line->leftForearm > $line->rightForearm)
					{
						echo "<td class='font-red'>$line->rightForearm</td>
							  <td class='font-red'>$line->leftForearm</td>";
					}
					
					else
					{
						echo "<td class='font-blue'>$line->rightForearm</td>
							  <td class='font-blue'>$line->leftForearm</td>";
					}
					echo "
					<td>$line->heightMeasures</td>
				
				</tr>
				
				<thead>
					
					<tr>
						<th>Peso</th>
						<th>Cintura</th>
						<th>Abdomen</th>
						<th>Quadriceps</th>
						<th>Coxa Direita</th>
						<th>Coxa Esquerda</th>
						<th>Panturrilha Direita</th>
						<th>Panturrilha Esquerda</th>
					</tr>
				
				</thead>
				
				<tr>
					<td class='font-blue'>$line->weightMeasures</td>
					<td class='font-blue'>$line->waist</td>
					<td class='font-blue'>$line->abdomen</td>
					<td class='font-blue'>$line->quadriceps</td>
				";
				
					if($line->rightThigh > $line->leftThigh || $line->leftThigh > $line->rightThigh)
					{
						echo "<td class='font-red'>$line->rightThigh</td>
							  <td class='font-red'>$line->leftThigh</td>";
					}
					
					else
					{
						echo "<td class='font-blue'>$line->rightThigh</td>
							  <td class='font-blue'>$line->leftThigh</td>";
					}
					
					if($line->rightCalf > $line->leftCalf || $line->leftCalf > $line->rightCalf)
					{
						echo "<td class='font-red'>$line->rightCalf</td>
							  <td class='font-red'>$line->leftCalf</td>";
					}
					
					else
					{
						echo "<td class='font-blue'>$line->rightCalf</td>
							  <td class='font-blue'>$line->leftCalf</td>";
					}
				echo "	
				</tr>
			
			</tbody>
		";
	}
	
	
	
	

	
?>