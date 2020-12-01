<!DOCTYPE html>
<html data-wf-page="5fb92b472425941ab1fd2790" data-wf-site="5fb92b47242594f9bdfd278f">

<head>
  <meta charset="utf-8">
  <title>Recruiting Board</title>
</head>

<body>
	<h1 align="center">Recruiting Board</h1>

	<form align = "center" action="results.php" method="POST">
		<label for="Procedure">Search By:</label>
		<select id="Procedure" name="Procedure">
			<option value="">Select one...</option>
			<option value="Exp">Experience</option>
			<option value="Grad">Grad Year</option>
			<option value="School">School</option>
			<option value="State">State</option>
			<option value="Pos">Position</option>
			<option value="Cont">Contacted</option> 
			<option value="Rec">Recruited</option>
		</select>
		<input type="text" name="input" placeholder="Search">
		<input type="submit" name="Search" value="Go">
	</form>

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

		$procedure = $_POST['Procedure'];

		if ($procedure == "Exp") {

			$search = $_POST['input'];
			$refinedSearch = (integer)$search;

			$query = "CALL groupByExp(".$refinedSearch.")";

			echo "
			<table align='center' border='1' cellspacing='2' cellpadding='10'>
			<tr>
				<th>Experience</th>
				<th>Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Grad Year</th>
				<th>State</th>
			</tr>";

			if ($result = $mysqli->query($query)) {
    			while ($row = $result->fetch_assoc()) {
        			$idRecruit = $row["idRecruit"];
        			$first_name = $row["first_name"];
        			$last_name = $row["last_name"];
        			$email = $row["email"];
        			$hs_grad_year = $row["hs_grad_year"]; 
        			$state = $row["state"];
        			$experience = $row["experience"];

  	      			echo '<tr> 
  	      				<td>'.$experience.'</td> 
                		<td>'.$idRecruit.'</td> 
                		<td>'.$first_name.'</td> 
                		<td>'.$last_name.'</td> 
                		<td>'.$email.'</td> 
                  		<td>'.$hs_grad_year.'</td> 
                  		<td>'.$state.'</td> 
            	  	</tr>';
            	}
            	$result->free();
            }
		}

		else if ($procedure == "Grad") {

			$search = $_POST['input'];
			$refinedSearch = (int)$search;

			$query = "CALL groupByGradYear(".$refinedSearch.")";
;

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

  	      			echo '<tr> 
                		<td>'.$idRecruit.'</td> 
                		<td>'.$first_name.'</td> 
                		<td>'.$last_name.'</td> 
                		<td>'.$email.'</td> 
                  		<td>'.$hs_grad_year.'</td> 
                  		<td>'.$city.'</td>
                  		<td>'.$state.'</td> 
            	  	</tr>';
            	}
            	$result->free();
            }
		}

		else if ($procedure == "School") {

			$search = $_POST['input'];
			$refinedSearch = (string)$search;

			$query = "CALL groupBySchool('".$refinedSearch."');";

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

  	      			echo '<tr> 
                		<td>'.$idRecruit.'</td> 
                		<td>'.$first_name.'</td> 
                		<td>'.$last_name.'</td> 
                		<td>'.$email.'</td> 
                  		<td>'.$hs_grad_year.'</td> 
                  		<td>'.$city.'</td>
                  		<td>'.$state.'</td> 
            	  	</tr>';
            	}
            	$result->free();
            }
		}

		else if ($procedure == "State") {

			$search = $_POST['input'];
			$refinedSearch = (string)$search;

			$query = "CALL groupByState('".$refinedSearch."')";

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

  	      			echo '<tr> 
                		<td>'.$idRecruit.'</td> 
                		<td>'.$first_name.'</td> 
                		<td>'.$last_name.'</td> 
                		<td>'.$email.'</td> 
                  		<td>'.$hs_grad_year.'</td> 
                  		<td>'.$city.'</td>
                  		<td>'.$state.'</td> 
            	  	</tr>';
            	}
            	$result->free();
            }
		}

		else if ($procedure == "Pos") {

			$search = $_POST['input'];
			$refinedSearch = (string)$search;

			$query = "CALL groupByPosition('".$refinedSearch."')";

			echo "
			<table align='center' border='1' cellspacing='2' cellpadding='10'>
			<tr>
				<th>Position</th>
				<th>Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Grad Year</th>
				<th>State</th>
			</tr>";

			if ($result = $mysqli->query($query)) {
    			while ($row = $result->fetch_assoc()) {
        			$idRecruit = $row["idRecruit"];
        			$first_name = $row["first_name"];
        			$last_name = $row["last_name"];
        			$email = $row["email"];
        			$hs_grad_year = $row["hs_grad_year"]; 
        			$position = $row["position"];
        			$state = $row["state"];

  	      			echo '<tr> 
  	      			    <td>'.$position.'</td>
                		<td>'.$idRecruit.'</td> 
                		<td>'.$first_name.'</td> 
                		<td>'.$last_name.'</td> 
                		<td>'.$email.'</td> 
                  		<td>'.$hs_grad_year.'</td> 
                  		<td>'.$state.'</td> 
            	  	</tr>';
            	}
            	$result->free();
            }
		}

		else if ($procedure == "Cont") {

			$search = $_POST['input'];
			$refinedSearch = (int)$search;

			$query = "CALL pullRecruitContact(".$refinedSearch.")";

			echo "
			<table align='center' border='1' cellspacing='2' cellpadding='10'>
			<tr>
				<th>Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Recruiter Id</th>
				<th>Recruiter First Name</th>
				<th>Recruiter Last Name</th>
			</tr>";

			if ($result = $mysqli->query($query)) {
    			while ($row = $result->fetch_assoc()) {
        			$idRecruit = $row["Recruit_id"];
        			$first_name = $row["Recruit_first_name"];
        			$last_name = $row["Recruit_last_name"];
        			$idRecruiter = $row["Recuiter_id"];
        			$first_name1 = $row["Recruiter_first_name"]; 
        			$last_name1 = $row["Recruiter_last_name"];

  	      			echo '<tr> 
                		<td>'.$idRecruit.'</td> 
                		<td>'.$first_name.'</td> 
                		<td>'.$last_name.'</td> 
                		<td>'.$idRecruiter.'</td> 
                  		<td>'.$first_name1.'</td> 
                  		<td>'.$last_name1.'</td>
            	  	</tr>';
            	}
            	$result->free();
            }
		}

		else if ($procedure == "Rec") {

			$search = $_POST['input'];
			$refinedSearch = (int)$search;

			$query = "CALL pullRecruitRecruited(".$refinedSearch.")";

			echo "
			<table align='center' border='1' cellspacing='2' cellpadding='10'>
			<tr>
				<th>Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Recruiter Id</th>
				<th>Recruiter First Name</th>
				<th>Recruiter Last Name</th>
			</tr>";

			if ($result = $mysqli->query($query)) {
    			while ($row = $result->fetch_assoc()) {
        			$idRecruit = $row["Recruit_id"];
        			$first_name = $row["Recruit_first_name"];
        			$last_name = $row["Recruit_last_name"];
        			$idRecruiter = $row["Recuiter_id"];
        			$first_name1 = $row["Recruiter_first_name"]; 
        			$last_name1 = $row["Recruiter_last_name"];

  	      			echo '<tr> 
                		<td>'.$idRecruit.'</td> 
                		<td>'.$first_name.'</td> 
                		<td>'.$last_name.'</td> 
                		<td>'.$idRecruiter.'</td> 
                  		<td>'.$first_name1.'</td> 
                  		<td>'.$last_name1.'</td>
            	  	</tr>';
            	}
            	$result->free();
            }
		}

		else {
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
                  	<td>'.$experience.'</td> 
                  	<td>'.$position.'</td> 
            	  </tr>';
    			}
    			$result->free();
			}
		} 
	?>
		</table>
</body>