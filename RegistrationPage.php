<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>The Math Game Registration</title>
  <meta name="description" content="The Math Game Registration page">
  <meta name="author" content="Richard Horvath">
</head>

<body>
	<?php 
		require_once('Includes/DBQueries.php');		
		require_once('Includes/DBClasses.php');	
		$username="";
		$password="";
		$secretQ1="";
		$secretQ2="";
		$secretQ3="";
		$secretA1="";
		$secretA2="";
		$secretA3="";
		
	if($_SERVER['REQUEST_METHOD']==='POST'){
		// Assign post values if exist
		 if (isset($_POST["username"]))
		 $username=$_POST["username"];
	  if (isset($_POST["password"]))
		  $password=$_POST["password"];	  
		 if (isset($_POST["secretQ1"]))
		   $secretQ1=$_POST["secretQ1"];  
		 if (isset($_POST["secretQ2"]))
		   $secretQ2=$_POST["secretQ2"];  
	  if (isset($_POST["secretQ3"]))
		   $secretQ3=$_POST["secretQ3"];  
	   if (isset($_POST["secretA1"]))
		   $secretA1=$_POST["secretA1"];  
	   if (isset($_POST["secretA2"]))
		   $secretA2=$_POST["secretA2"]; 
	   if (isset($_POST["secretA3"]))
		   $secretA3=$_POST["secretA3"]; 
	    $user = new UserClass($username,$password,$secretQ1,$secretQ2,$secretQ3,$secretA1,$secretA2,$secretA3);
		validateAccount($user);
	}else {
		displayPage();
	}
	
		

		
		
		
		
	
		
		
		function displayPage(){
	?>
	<h1>The Math Game</h1>
	<h2>Please enter all required fields to create an account</h2>

	<form name="main" method="post" action=""> 
	<table>
		<tr> 
			<td>Username:</td> 
			<td><input name="username" type="text" size="50" required></td> 
		</tr> 
		<tr> 
			<td>Password:</td> 
			<td><input name="password" pattern = "((?=.*\d)(?=.*[A-Z])(?=.*\W).{8,30})" type="text" size="50" title = "password should be at least 8 characters in length and should include at least
one upper case letter, one number and one special character. " required></td> 
		</tr> 
		
	</table>
	<table>
		<tr>
			<td>Security Question 1</td>
			<td>
				<select name = "secretQ1">
					<option value = "Mother's maiden name."> Mother's maiden name.</option>
					<option value = "What was the name of your elementary / primary school?"> What was the name of your elementary / primary school?</option>
					<option value = "To what city did you go on your honeymoon?"> To what city did you go on your honeymoon? </option>
					<option value = "What is your grandmother's first name?"> What is your grandmother's first name?</option>
					<option value = "What month and day is your anniversary? (e.g., January 2)"> What month and day is your anniversary? (e.g., January 2)</option>
					<option value = "What is the name of the first school you attended?"> What is the name of the first school you attended?</option>
					<option value = "What is the first name of the boy or girl that you first kissed?"> What is the first name of the boy or girl that you first kissed?</option>
					<option value = "In what city or town was your first job?"> In what city or town was your first job?</option>
					<option value = "What was the name of your first stuffed animal?"> What was the name of your first stuffed animal?</option>
					<option value = "What school did you attend for sixth grade?"> What school did you attend for sixth grade?</option>
				</select>
			</td>
			<td>
			<input name="secretA1" type="text" size="50" required>
			</td>
		</tr>
		<tr>
			<td>Security Question 2</td>
			<td>
				<select name = "secretQ2">
					<option value = "Mother's maiden name."> Mother's maiden name.</option>
					<option value = "What was the name of your elementary / primary school?"> What was the name of your elementary / primary school?</option>
					<option value = "To what city did you go on your honeymoon?"> To what city did you go on your honeymoon? </option>
					<option value = "What is your grandmother's first name?"> What is your grandmother's first name?</option>
					<option value = "What month and day is your anniversary? (e.g., January 2)"> What month and day is your anniversary? (e.g., January 2)</option>
					<option value = "What is the name of the first school you attended?"> What is the name of the first school you attended?</option>
					<option value = "What is the first name of the boy or girl that you first kissed?"> What is the first name of the boy or girl that you first kissed?</option>
					<option value = "In what city or town was your first job?"> In what city or town was your first job?</option>
					<option value = "What was the name of your first stuffed animal?"> What was the name of your first stuffed animal?</option>
					<option value = "What school did you attend for sixth grade?"> What school did you attend for sixth grade?</option>
				</select>
			</td>
			<td>
			<input name="secretA2" type="text" size="50" required>
			</td>
		</tr>
		<tr>
			<td>Security Question 3</td>
			<td>
				<select name = "secretQ3">
					<option value = "Mother's maiden name."> Mother's maiden name.</option>
					<option value = "What was the name of your elementary / primary school?"> What was the name of your elementary / primary school?</option>
					<option value = "To what city did you go on your honeymoon?"> To what city did you go on your honeymoon? </option>
					<option value = "What is your grandmother's first name?"> What is your grandmother's first name?</option>
					<option value = "What month and day is your anniversary? (e.g., January 2)"> What month and day is your anniversary? (e.g., January 2)</option>
					<option value = "What is the name of the first school you attended?"> What is the name of the first school you attended?</option>
					<option value = "What is the first name of the boy or girl that you first kissed?"> What is the first name of the boy or girl that you first kissed?</option>
					<option value = "In what city or town was your first job?"> In what city or town was your first job?</option>
					<option value = "What was the name of your first stuffed animal?"> What was the name of your first stuffed animal?</option>
					<option value = "What school did you attend for sixth grade?"> What school did you attend for sixth grade?</option>
				</select>
			</td>
			<td>
			<input name="secretA3" type="text" size="50" required>
			</td>
		</tr>
		
		<tr> 
			<td colspan="2" align="center"><input name="btnsubmit" type="submit" value="CreateSubmit"></td> 
		</tr>
	</table>
	</form>
	
	

	<?php
		}//end of display page
	
	$messages = array();
  $redisplay = false;

	   function validateAccount($user){
	$count = countUser($user);  
	  	// Check for accounts that already exist and Do insert
  	 if ($count==0) {  		
			$res = insertNewUser($user);
  		if ($res) {
  		     echo "<h3>$username has been added as a user to Math Game!</h3> ";    
  		      echo "<p></p>"; 
  		        
  		      echo "<a href='LandingPage.php'> Return to login page.</a>";   
  		 }else {
  			echo "<h3>$username was not added. DB error!</h3> ";   
  			 echo "<p></p>"; 
  			 echo "<a href='RegistrationPage.php'> Return to user App.</a>";  
			 }
		} else {
				echo "<h3>A user account with that username already exists.</h3> ";  
				echo "<p></p>"; 	
				echo "<a href='RegistrationPage.php'> Return to user App.</a>";  	
			}  	
	   }
	   
	   

		  
  	
  

  	
 	?>


</body>
</html>