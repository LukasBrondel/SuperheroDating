<?php 
    include('classes/database.php');
   $database = new Database;
   $database->connect();
   //- - - Add new movie - - -
   // First, prepare the SQL
   $sql = "UPDATE superheroes SET amountOfLikes = :new_like_amount WHERE email = :email";
   // $sql->bindParam(':profile_id', $_POST['superhero_id']);
   // Secondly, add values
   $new_like_amount = $_POST['amountOfLikes'] + 1 ;
   $values = array(
       ':new_like_amount' => $new_like_amount,
       ':superhero_id' => $_POST['email']
   );
   // Call prepared function to execute the above
   $database->prepared($sql,$values);

?>