<?php
	
	//Checks if the user already logged in			
	if((!isset($_SESSION["loggedin"])) && (!$_SESSION["loggedin"]) && (!$_SESSION["inLogin"])){
				
		header("Location: index.php");
		
	}
	
?>