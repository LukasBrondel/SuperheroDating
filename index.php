<?php

// ensure that php errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	// Include and initiate the database class (you only have to do this once)
	include('classes/database.php');
	$database = new Database;
	$database->connect();

$loggedInSuperhero = $database->query("SELECT * FROM superheroes WHERE email='bruce_wayne@hotmail.com'")[0];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Superhero Dating</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Date a Superhero</h1>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="edit-profile.php">Edit Profile</a></li>
</ul>
<?php

	// Get all the superheroes
	$superheroes = $database->query('SELECT * FROM superheroes');
	//var_dump($superheroes);?>
<section><?php
	// Loop through all superheroes
	foreach ($superheroes as $superhero) {
        $comments = $database->query("SELECT * FROM comments LEFT JOIN superheroes ON comments.superhero_from = superheroes.email WHERE superhero_to = '" . $superhero['email']."'");
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
            <hr/>
            <b>
            <?php echo $superhero['amountOfLikes'];?> superheroes liked this profile.</b>
            
            
<a href="./like-this-profile.php?email=<?php echo $superhero ['email']; ?>">Like</a>
            
            
            <hr/>
            
            <?php 
                foreach ($comments as $comment) {
                ?>
                <p>
                    <strong><?php echo $comment['alias']; ?>:</strong>
                    <?php echo $comment['text']; ?>
                </p>
                <?php 
                    }
            ?>
                
            <form action="send-comment.php" method="post">
                <input type="hidden" name="superhero_from" value="<?php echo $loggedInSuperhero['email']?>">
                <input type="hidden" name="superhero_to" value="<?php echo $superhero['email']?>">
                <textarea rows="4" cols="50" name="text" placeholder="Enter comment here."></textarea>
                <button type="submit">Post comment</button>
            </form>
            
		</article>
		<?php
	}
?>
    </section>
</body>
</html>