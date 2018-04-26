<!DOCTYPE html>
<html>
<head>
	<title>Superhero Dating</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        // Get all superheroes from the database
        include('classes/database.php');
        $database = new Database;
        $database->connect();

        $superheroes = $database->query("SELECT * FROM superheroes WHERE email='bruce_wayne@hotmail.com'");

        // Loop through all superheroes
        foreach ($superheroes as $superhero) { ?>
        <h1>Edit profile for <?php echo $superhero['alias'];?></h1>
        <?php 
        }
    ?>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="edit-profile.php">Edit Profile</a></li>
</ul>
    
  <form action="process.php" method="post">
  	
  	<label for="realName">Real name</label>
  	<input type="text" name="realName" value="<?php echo $superhero['realName'];?>" placeholder="e.g. John Doe">

  	<label for="alias">Alias / Superhero name</label>
  	<input type="text" name="alias" value="<?php echo $superhero['alias'];?>" placeholder="e.g. Awesome-man">
  	  	
  	<label for="placeOfBirth">Place of birth</label>
  	<input type="text" name="placeOfBirth" value="<?php echo $superhero['placeOfBirth'];?>" placeholder="e.g. New York, USA">

  	<label for="currentLocation">Current location</label>
  	<input type="text" name="currentLocation" value="<?php echo $superhero['currentLocation'];?>" placeholder="Copenhagen, Denmark">
      
    <label for="age">Age</label>
  	<input type="text" name="age" value="<?php echo $superhero['age'];?>" placeholder="e.g. 25">
      
    <label for="superpower">Superpower</label>
  	<input type="text" name="superpower" value="<?php echo $superhero['superpower'];?>" placeholder="e.g. Invisibility">
      
    <label for="profilePicture">Profile Picture</label>
  	<input type="text" name="profilePicture" value="<?php echo $superhero['profilePicture'];?>" placeholder="Absolute path to image file">
      
    <label for="bio">Bio</label>
  	<textarea name="bio" placeholder="Tell something about yourself."><?php echo $superhero['bio'];?></textarea>
      
    <label for="gender">Gender - Must be M or F</label>
  	<input type="text" name="gender" value="<?php echo $superhero['gender'];?>" placeholder="Type M or F">

  	<input type="submit" name="submit" value="Update profile">
  </form>
    
</body>
</html>