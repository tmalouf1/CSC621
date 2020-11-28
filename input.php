<?php
	
	$first_name = $_POST['First-Name'];
	$last_name = $_POST['Last-Name'];
	$email = $_POST['Email'];
	$hs_grad_year = $_POST['Grad-Year'];
	$city = $_POST['City'];
	$state = $_POST['State'];
	$high_school = $_POST['High-School'];
	$height = $_POST['Height'];
	$weight = $_POST['Weight'];
	$experience = $_POST['Experience'];
	$position = $_POST['Position'];

	if(!empty($firstName) || !empty($lastName) || !empty($email) || !empty($hsGradYear) || !empty($height) 
		|| !empty($weight) || !empty($experience)) {

		$conn = new mysqli("3.89.186.66", "team3", "password_XZE_3", "team3_db");

		if(mysqli_connect_error()){

			die('Conection error('. mysqli_connect_errno().')'. mysql_connect_error());

		} else {

			$select = "SELECT email FROM Recruits WHERE email = ? LIMIT 1";

			$stmt = $conn->prepare($select);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if($rnum == 0){

				$stmt->close();

				$insert = "INSERT INTO Recruits (first_name,last_name,email,hs_grad_year,city,state,high_school) VALUES (?,?,?,?,?,?,?)";
		
				$stmt = $conn -> prepare($insert);
				$stmt -> bind_param("sssisss", $first_name,$last_name,$email,$hs_grad_year,$city,$state,$high_school);
				$stmt -> execute();
				echo "Submission successful!";


				$conn -> close();
			} else {

				echo "That email is already in use!";
				die();
			
			}
		}

	} else {
		echo "Please fill the required fields";
		die();
	}

?>