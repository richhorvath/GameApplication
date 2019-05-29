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


require_once('Includes/DBConnect.php');
require_once('Includes/DBQueries.php');		
require_once('Includes/DBClasses.php');	

$username="";
$password="";

if($_SERVER['REQUEST_METHOD']==='POST'){
	if (isset($_POST["username"]))
		  $username=$_POST["username"];
 if (isset($_POST["password"]))
		   $password=$_POST["password"];
	  $count = validateUser($_POST["username"], $_POST["password"]);
	  if($count==1){
		  session_start();
		  $_SESSION['username'] = $_POST["username"];
		  header('Location: UserPage.php');
		  exit();
		  }
	  else{
		  $message = "invalid User name or password";
		  displayPage($message);
	  }

}else{
	$message = "";
	displayPage($message);
}



	function displayPage($message){
?>
	<h1>The Math Game</h1>
	<h2>A simple math game to challenge yourself</h2>
	<form name="main" method="post" action="UserPage.php"> 
	<table>
		<tr> 
			<td>Username:</td> 
			<td><input name="username" type="text" size="50" required></td> 
		</tr>  
		<tr> 
			<td>Password:</td> 
			<td><input name="password" type="text" size="50" required></td> 
		</tr> 
		<tr> 
			<td colspan="2" align="center"><input name="btnsubmit" type="submit" value="Login"></td> 
		</tr>
	</table>
	</form>
	 <a href='RegistrationPage.php'> Register </a>
	 <p></p>
	
<?php
echo $message;

	
	}
 ?>

</body>
</html>