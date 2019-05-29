<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Math Game Logout</title>
  <meta name="description" content="The Math Game">
  <meta name="author" content="Richard Horvath">
</head>

<body>
<?php
	session_unset();
	session_destroy();
?>
<p> You've been logged out</p>
<p> Click below to log back in</p>
<a href='LandingPage.php'> Login </a>


	


</body>
</html>