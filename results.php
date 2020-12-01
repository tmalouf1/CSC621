<!DOCTYPE html>
<html data-wf-page="5fb92b472425941ab1fd2790" data-wf-site="5fb92b47242594f9bdfd278f">

<head>
  <meta charset="utf-8">
  <title>Recruiting Board</title>
</head>

<body>
	<h1 align="center">Recruiting Board</h1>
	<?php
		$idRecruit;
		$first_name;
		$last_name;
		$email;
		$hs_grad_year;
		$city;
		$state;
		$high_school;
		$Recruits_idRecruit;
		$height;
		$weight;
		$experience;
		$position;


		$mysqli = new mysqli("3.89.186.66", "team3", "password_XZE_3", "team3_db");
	
		$query = "SELECT * FROM Recruits INNER JOIN Player_Attributes PA on Recruits.idRecruit = PA.Recruits_idRecruit";

		echo "
		<table align='center' border='1' cellspacing='2' cellpadding='10'>
			<tr>
				<th>Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Grad Year</th>
				<th>City</th>
				<th>State</th>
				<th>High School</th>
				<th>Height</th>
				<th>Weight</th>
				<th>Experience</th>
				<th>Position</th>
			</tr>";

		if ($result = $mysqli->query($query)) {
    		while ($row = $result->fetch_assoc()) {
        		$idRecruit = $row["idRecruit"];
        		$first_name = $row["first_name"];
        		$last_name = $row["last_name"];
        		$email = $row["email"];
        		$hs_grad_year = $row["hs_grad_year"]; 
        		$city = $row["city"];
        		$state = $row["state"];
        		$high_school = $row["high_school"];
        		$height = $row["height"];
        		$weight = $row["weight"];
        		$experience = $row["experience"];
        		$position = $row["position"];

  	      		echo '<tr> 
                  <td>'.$idRecruit.'</td> 
                  <td>'.$first_name.'</td> 
                  <td>'.$last_name.'</td> 
                  <td>'.$email.'</td> 
                  <td>'.$hs_grad_year.'</td> 
                  <td>'.$city.'</td> 
                  <td>'.$state.'</td> 
                  <td>'.$high_school.'</td> 
                  <td>'.$height.'"</td> 
                  <td>'.$weight.' lbs.</td> 
                  <td>'.$experience.'+</td> 
                  <td>'.$position.'</td> 
              </tr>';
    		}
    		$result->free();
		} 
	?>
		</table>
</body>