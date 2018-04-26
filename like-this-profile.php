<?php
	// Put this inside a php called like.php
	// check what is received through POST
	// var_dump($_POST); die();
	include('classes/database.php');
	$database = new Database;
	$database->connect();

	
	
	$sql = "UPDATE superheroes SET amountOfLikes = amountOfLikes + 1 WHERE email = '" . htmlspecialchars($_GET["email"]) . "'";

	// function to execute the above
	$database->queryWithoutFetchAll($sql);

	header("Location: index.php");

?>