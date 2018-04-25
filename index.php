<!DOCTYPE html>
<html>
<head>
	<title>Superhero Dating</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Date a Superhero</h1>

<?php

// ensure that php errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	// Include and initiate the database class (you only have to do this once)
	include('classes/database.php');
	$database = new Database;
	$database->connect();



	// Get all t titles
	$superheroes = $database->query('SELECT * FROM superheroes');
	//var_dump($superheroes);?>
<section><?php
	// Loop through all superheroes
	foreach ($superheroes as $superhero) {
		?>
		<article class="profiles">
            <img src="<?php echo $superhero['profilePicture'];?>">
			<h2><?php echo $superhero['alias'];?>, <?php echo $superhero['age'];?></h2>
            <hr/>
			<h3><?php echo $superhero['realName'];?></h3>
			<p>
                <strong>Place of birth:</strong> <?php echo $superhero['placeOfBirth'];?>
                <br/><br/>
                <strong>Location:</strong> <?php echo $superhero['currentLocation'];?>
                <br/><br/>
                <strong>Superpower:</strong>
                <?php echo $superhero['superpower'];?>
                <br/><br/>
                <strong>Bio:</strong>
				<?php echo $superhero['bio'];?>
			</p>
		</article>
		<?php
	}
?>
    </section>
</body>
</html>