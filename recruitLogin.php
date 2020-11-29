<?php
	
	$idRecruit = $_POST['Recruit-ID'];

	if(!empty($idRecruit)){

		$conn = new mysqli("3.89.186.66", "team3", "password_XZE_3", "team3_db");

		if(mysqli_connect_error()){

			die('Conection error('. mysqli_connect_errno().')'. mysql_connect_error());

		} else {

			$select = "SELECT idRecruit FROM Recruits WHERE idRecruit = ?";

			
			$stmt = $conn->prepare($select);
			$stmt->bind_param("i", $idRecruit);
			$stmt->execute();
			$stmt->bind_result($idRecruit);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if($rnum == '0'){

				echo "Recruit login unsuccessful!";
				$stmt->close();
				$conn->close();

			} else {

				echo "Recruit login successful!";
				$stmt->close();

			}

		}
	}
?>