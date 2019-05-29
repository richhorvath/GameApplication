<?php  
require_once('Includes/DBConnect.php');		
require_once('Includes/DBClasses.php');		

function setScore($uname,$score){
	// Connect to the database
 $mysqli = connectdb();
 $Query = "UPDATE Users SET Highscore = '$score' WHERE Username = '$uname'";
 $result = $mysqli->query($Query);
 $conn->close();
 return true;
	
}
 function getHighScores (){
		
		// Connect to the database
 $mysqli = connectdb();
		
	 
		 // Add Prepared Statement
 $Query = "SELECT Username, Highscore from Users WHERE Highscore = (SELECT MAX(Highscore) FROM Users)";	         
	          
		$result = $mysqli->query($Query);
		  $user = array();
		  $userinfo = "";
 if ($result->num_rows > 0) {    
      while($row = $result->fetch_assoc()) {
    	//Assign values
    	  $username = $row["Username"];
    	 $highscore = $row["Highscore"];
      
     $userinfo = $username." : " .$highscore;
  
       }    
  } 
  $mysqli->close();	
  return $userinfo;	
  }
  
  
  function getUserScore ($uname){
		
		// Connect to the database
 $mysqli = connectdb();
		
	 
		 // Add Prepared Statement
 $Query = "SELECT Username, Highscore from Users WHERE Username = '$uname'";	         
	          
		$result = $mysqli->query($Query);
		  $user = array();
		  $userinfo = "";
 if ($result->num_rows > 0) {    
      while($row = $result->fetch_assoc()) {
    	//Assign values
    	  
    	 $highscore = $row["Highscore"];
      
     $userinfo = $highscore;
  
       }    
  } 
  $mysqli->close();	
  return $userinfo;	
  }


	function insertNewUser ($user){
		
		// Connect to the database
   $mysqli = connectdb();
		
	 $userName = $user->getUsername();
	 $password = $user->getPassword();
	 $question1 = $user->getQuestion1();
	 $question2 = $user->getQuestion2();
	 $question3 = $user->getQuestion3();
	 $answer1 = $user->getAnswer1();
	 $answer2 = $user->getAnswer2();
	 $answer3 = $user->getAnswer3();
	 $highScore= 0;
		
		// Add Prepared Statement
		$Query = "INSERT INTO users 
	          (Username, Password,Question1,Question2,Question3,Answer1,Answer2,Answer3,Highscore) 
	           VALUES (?,?,?,?,?,?,?,?,?)";
	           
		
		$stmt = $mysqli->prepare($Query);
				
$stmt->bind_param("ssssssssi", $userName,$password,$question1,$question2,$question3,$answer1,$answer2,$answer3,$highScore);
$stmt->execute();		
		
	
	$stmt->close();
	$mysqli->close();
		
		return true;
	}
	
	
	function validateUser($uname, $pword){
	$mysqli = connectdb();
	
	// Define the Query
	// For Windows MYSQL String is case insensitive
	 $Myquery = "SELECT count(*) as count from users
		   where UserName='$uname' AND Password = '$pword'";	 
		
	 if ($result = $mysqli->query($Myquery)) 
	 {
	    /* Fetch the results of the query */	     
	    while( $row = $result->fetch_assoc() )
	    {
	  	  $count=$row["count"];	    			   	     	  	     	  
	    }	 
	
 	    /* Destroy the result set and free the memory used for it */
	    $result->close();	      
   } 
   
	
	$mysqli->close();   
	    
	return $count;
  	  	
	  }
	



	
	function countUser ($user){  	  	 
  	// Connect to the database
	$mysqli = connectdb();
	
   $userName = $user->getUsername();
	 
   
			
	// Define the Query
	// For Windows MYSQL String is case insensitive
	 $Myquery = "SELECT count(*) as count from users
		   where UserName='$userName'";	 
		
	 if ($result = $mysqli->query($Myquery)) 
	 {
	    /* Fetch the results of the query */	     
	    while( $row = $result->fetch_assoc() )
	    {
	  	  $count=$row["count"];	    			   	     	  	     	  
	    }	 
	
 	    /* Destroy the result set and free the memory used for it */
	    $result->close();	      
   }
	
	$mysqli->close();   
	    
	return $count;
  	  	
  }
  	
	  	
	



	  	
?>