<?php

$firstname = $_POST['First-Name'];
$lastname = $_POST['Last-Name'];
$email = $_POST['Email'];
$hsgradyear = $_POST['Grad-Year'];
$city = $_POST['City'];
$state = $_POST['State'];
$highschool = $_POST['High-School'];
$height = $_POST['Height'];
$weight = $_POST['Weight'];
$experience = $_POST['Experience'];
$position =$_POST['Position'];

if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($hsgradyear) 
	&& !empty($height) && !empty($weight) && !empty($experience)){

    $host = "3.89.186.66";
	$dbUsername = "team3";
	$dbPassword = "password_XZE_3";
	$dbName = "team3_db";

	//create connection
    $conn = mysqli_connect($host,$dbUsername,$dbPassword,$dbName);

    if(mysqli_connect_error()){
        die('Connection Error( '.mysqli_connect_errno().')'.mysqli_connect_error());
    } else {
        $insertRecruit = "INSERT INTO Recruits (first_name,last_name,email,hs_grad_year,city,state,high_school) VALUES(?,?,?,?,?,?,?)";

        $stmt = $conn -> prepare($insertRecruit);
        $stmt -> bind_param("sssisss", $firstname,$lastname,$email,$hsgradyear,$city,$state,$highschool);
        $stmt -> execute();
        echo "Submission successful";
        $stmt->close();
        $conn->close();
    }

} else {
	echo "Some required fields are missing";
	die();
}
?>