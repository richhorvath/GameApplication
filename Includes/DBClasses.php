<?php   
// Class to construct Students with getters/setter
class UserClass
{
    // property declaration
    private $username="";
    private $password="";
	private $question1 = "";
	private $question2 = "";
	private $question3 = "";
	private $answer1 = "";
	private $answer2 = "";
	private $answer3 = "";
	private $highScore= 0;
   
    // Constructor
    public function __construct($username,$password,$question1,$question2,$question3,$answer1,$answer2,$answer3)
    {
      $this->username = $username;
      $this->password = $password;
      $this->question1 = $question1;
	  $this->question2 = $question2;
	  $this->question3 = $question3;
      $this->answer1 = $answer1;
	  $this->answer2 = $answer2;
      $this->answer3 = $answer3;      
    }
    
    // Get methods 
	  public function getUsername(){
    	return $this->username;
    } 
	  public function getPassword() {
		  return $this->password;
	  }
	  public function getQuestion1(){
		  return $this->question1;
	  }
	  public function getQuestion2(){
		  return $this->question2;
	  }
	  public function getQuestion3(){
		  return $this->question3;
	  }
	  public function getAnswer1(){
		  return $this->answer1;
	  }
	  public function getAnswer2(){
		  return $this->answer2;
	  }
	  public function getAnswer3(){
		  return $this->answer3;
	  }
	  public function getHighscore(){
		  return $this->highScore;
	  }
    // Set methods 
	public function setHighScore($value){
		$this->highScore = $value;
	}
	
	public function toString(){
		echo $username;
		echo "<br>";
		echo $password;
		echo "<br>";
		echo $question1;
		echo "<br>";
		echo $question2;
		echo "<br>";
		echo $question3;
		echo "<br>";
		echo $answer1;
		echo "<br>";
		echo $answer2;
		echo "<br>";
		echo $answer3;
	}
} // End userclass

 class DBparmsClass
	{
	    // property declaration  
	    private $username="";
	    private $password="";
	    private $host="";
	    private $db="";
	   
	    // Constructor
	    public function __construct($myusername,$mypassword,$myhost,$mydb)
	    {
	      $this->username = $myusername;
	      $this->password = $mypassword;
			  $this->host = $myhost;
				$this->db = $mydb;
	    }
	    
	    // Get methods 
		  public function getUsername ()
	    {
	    	return $this->username;
	    } 
		  public function getPassword ()
	    {
	    	return $this->password;
	    } 
		  public function getHost ()
	    {
	    	return $this->host;
	    } 
		  public function getDb ()
	    {
	    	return $this->db;
	    } 	 
	
	    // Set methods 
	    public function setUsername ($myusername)
	    {
	    	$this->username = $myusername;    	
	    }
	    public function setPassword ($mypassword)
	    {
	    	$this->password = $mypassword;    	
	    }
	    public function setHost ($myhost)
	    {
	    	$this->host = $myhost;    	
	    }
	    public function setDb ($mydb)
	    {
	    	$this->db = $mydb;    	
	    }    
	    
	} // End DBparms class
	


?>