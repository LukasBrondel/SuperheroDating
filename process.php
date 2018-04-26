<!DOCTYPE html>
<html>
<head>
	<title>processing</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	
	// check what is received through POST
	// var_dump($_POST); die();
	include('classes/database.php');
	$database = new Database;
	$database->connect();


	//- - - Add new movie - - - 
	// First, prepare the SQL
	$sql = "UPDATE superheroes SET 
                            realName = '" . $_POST['realName'] . 
                            "', alias = '" . $_POST['alias'] .
                            "', placeOfBirth = '" . $_POST['placeOfBirth'] .
                            "', currentLocation = '" . $_POST['currentLocation'] .
                            "', age = '" . $_POST['age'] .
                            "', superpower = '" . $_POST['superpower'] .
                            "', profilePicture = '" . $_POST['profilePicture'] .
                            "', bio = '" . $_POST['bio'] .
                            "', gender = '" . $_POST['gender'] .
			"' WHERE email='bruce_wayne@hotmail.com'";
    
	// Call prepared function to execute the above
	$database->queryWithoutFetchAll($sql);

?>
<p class="notice success">Your profile has been updated.
	<a href="edit-profile.php" class="notice">Back</a>
</p>
</body>
</html>