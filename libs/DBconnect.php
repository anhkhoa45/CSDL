<?php
	$servername = "localhost";
	$username = "anhkhoa";
	$password = "Test@123";

	try 
	{
    $conn = new PDO("pgsql:host=$servername;dbname=ITE", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  }
	catch(PDOException $e)
  {
  	echo "Connection failed: " . $e->getMessage();
  }

?>