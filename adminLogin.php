<?php
	
	$idRecruiters = $_POST['Admin-ID'];

	if(!empty($idRecruiters)){

		$conn = new mysqli("3.89.186.66", "team3", "password_XZE_3", "team3_db");

		if(mysqli_connect_error()){

			die('Conection error('. mysqli_connect_errno().')'. mysql_connect_error());

		} else {

			$select = "SELECT idRecruiters FROM Recruiters WHERE idRecruiters = ?";

			
			$stmt = $conn->prepare($select);
			$stmt->bind_param("i", $idRecruiters);
			$stmt->execute();
			$stmt->bind_result($idRecruiters);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if($rnum == '0'){

				echo "Admin login unsuccessful!";
				$stmt->close();
				$conn->close();

			} else {

				header("Location: http://localhost/RugbyPortalStuff/results.php");
				die();
				echo "Admin login successful!";
				$stmt->close();

			}

		}
	}
?>