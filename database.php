<?php

	$servername="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="studentska_sluzba";

	$connection=mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

	if(!$connection){
		exit('Failed connection to database.');
	}

