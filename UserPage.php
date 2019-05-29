<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>The Math Game </title>
  <meta name="description" content="The Math Game">
  <meta name="author" content="Richard Horvath">
</head>

<body>
<?php
session_start();
$username = $_SESSION['username'];
require_once('Includes/DBQueries.php');

	 
echo "<h1>Welcome " .$username. "<h1>";
 

?>

	
	<h3>The current highest score belongs to  </h3>
	<h4> <?php echo getHighScores();?></h4>
	<br>
	
	<h3>Your current best score is <?php echo getUserScore($username); ?><h3>
	<br>
	
	<h3> What would you like to do</h3>
	<form method="get" action="GamePage.php">
    <button type="submit">Play</button>
	</form>
	<form method="get" action="LogOut.php">
    <button type="submit">Log Out</button>
	</form>
	
	

	


</body>
</html>