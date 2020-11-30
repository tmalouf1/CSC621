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


	$conn = new mysqli("3.89.186.66", "team3", "password_XZE_3", "team3_db");
	
	$select = "SELECT * FROM Recruits INNER JOIN Player_Attributes PA on Recruits.idRecruit = PA.Recruits_idRecruit";
	
	$stmt = $conn->prepare($select);
	$stmt->execute();
	$stmt->bind_result($idRecruit,$first_name,$last_name,$email,$hs_grad_year,$city,$state,$high_school,$Recruits_idRecruit,$height,$weight,$experience,$position);
	$dataRow = "";

	while($row2 = mysqli_fetch_array($stmt)) {
		$dataRow = $dataRow."<tr><td>$row2[0]</td><td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td></tr>";
	}
?>


<!DOCTYPE html>
<html data-wf-page="5fb92b472425941ab1fd2790" data-wf-site="5fb92b47242594f9bdfd278f">

<head>
  <meta charset="utf-8">
  <title>Recruiting Board</title>
</head>

<body>
	<h1 align="center">Recruiting Board</h1>
	<table align="center">
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
		</tr>
		<?php while($row1 = mysqli_fetch_array($result1)):;?>
            <tr>
                <td><?php echo $row1[0];?></td>
                <td><?php echo $row1[1];?></td>
                <td><?php echo $row1[2];?></td>
                <td><?php echo $row1[3];?></td>
                <td><?php echo $row1[4];?></td>
                <td><?php echo $row1[5];?></td>
                <td><?php echo $row1[6];?></td>
                <td><?php echo $row1[7];?></td>
                <td><?php echo $row1[8];?></td>
                <td><?php echo $row1[9];?></td>
                <td><?php echo $row1[10];?></td>
                <td><?php echo $row1[11];?></td>
            </tr>
            <?php endwhile;?>
	</table>
</body>