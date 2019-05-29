<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>The Math Game</title>
  <meta name="description" content="The Math Game">
  <meta name="author" content="Richard Horvath">
</head>

<body>
<?php
session_start();
$username = $_SESSION['username'];
require_once('Includes/DBQueries.php');


$answer = $_POST['answer'];
$hidden = $_POST['storeRandVal'];
$currentScore = $_POST['storeScore'];

$highestScore = getUserScore($username);
$message = "";
$num1 = rand(1,10);
$num2 = rand(1,10);
$solution = $num1+$num2;


if($answer == $hidden)
	$currentScore ++;
if($answer!=$hidden)
	$currentScore = 1;
if($currentScore>$highestScore)
	setScore($username,$currentScore);

	





?>
	<h1>The Math Game</h1>
	<form name="main" method="post" action="GamePage.php"> 
	<?php echo "<input type='hidden' name='storeRandVal' value='$solution'/>";?>
	<?php echo "<input type='hidden' name='storeScore' value='$currentScore'/>";?>
	<table>
		<tr> 
			<td>Current Score:<?php echo $currentScore; ?> </td> 
			<td>Highest Score:<?php echo $highestScore; ?> </td> 
		</tr>  
		<tr> 
			<td>The Problem:</td> 
			<td><?php echo $num1. '+' .$num2 ?> </td> 
			
		</tr> 
		<tr> 
			<td>Your answer?</td> 
			<td><input name="answer" type="text" size="50" required></td> 
		</tr> 
		<tr> 
			<td colspan="2" align="center"><input name="btnsubmit" type="submit" value="Submit"></td> 
		</tr>
	</table>
	</form>
	
	
	
<form method="get" action="UserPage.php">
    <button type="submit">Quit</button>
	</form>
<form method="get" action="LogOut.php">
    <button type="submit">Log Out</button>
	</form>
	
<?php 
echo "The Solution: \n";
echo $hidden;
echo " Your Answer: ";
echo $answer;


?>

</body>
</html>