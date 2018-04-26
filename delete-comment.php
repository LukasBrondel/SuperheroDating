<?php
// Include and initiate the database class (you only have to do this once)
include('classes/database.php');
$database = new Database;
$database->connect();


$sql = "DELETE FROM comments WHERE id = '" . htmlspecialchars($_GET["id"]) . "'";

	// function to execute the above
	$database->queryWithoutFetchAll($sql);

$database->prepared($sql, $values);

header("Location: index.php");