<?php
	include 'header.php';

		$name=mysqli_real_escape_string($connection, $_POST['name']);
		$comment=mysqli_real_escape_string($connection, $_POST['comment']);
		$clientIP = $_SERVER['REMOTE_ADDR'];
		$date = CURRENT_TIMESTAMP; 
		$nameNoTags=strip_tags($name);
		$commentNoTags=strip_tags($comment);
		$sql="INSERT INTO Wall (name, comment,date, Client_IP) VALUES ('$nameNoTags', '$commentNoTags',CURRENT_TIMESTAMP+INTERVAL'-7' hour,'$clientIP')";

		if (!mysqli_query($connection,$sql)) 
		{
	  		die('Error: ' . mysqli_error($connection));
		}
		echo "1 record added";
		header('Location: index.php');
?>