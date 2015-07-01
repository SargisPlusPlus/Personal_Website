<?php
	$dbhost = "db4free.net";
	$dbuser = "sargis93";
	$dbpass = "db4free123";
	$db = "sargissam";

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
	if (mysqli_connect_errno())  //if ($connection==false)
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//mysqli_select_db($db);
?>