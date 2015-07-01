<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="myscript.js"></script>
</head>
<style type="text/css">
	textarea {
	    height: 3em;
	    width: 50%;
	    padding: 3px;
	    transition: all 0.5s ease;
	}
	textarea:focus {
	    height: 6em;
	}
</style>
<body role="document">
	<div class="container theme-showcase" role="main">
		<div class="well">
			<div class="jumbotron">
				<?php
					$query="SELECT * FROM Wall ORDER BY id DESC";
					$result=mysqli_query($connection,$query);
					echo "
					<form action='insert.php' method='post'>
					<h3>Comments / Questions ? </h3>
					<input type='text' name='name' style='color:#888;' value='Name (optional)' onfocus='inputFocus(this)' onblur='inputBlur(this)'></br>
					<textarea rows='1' cols='10' type='text' name='comment'>Leave a comment here :)</textarea>
					</br><input type='submit' class='btn btn-lg btn-primary' value='Submit'>
					</form>
			</div>
		</div>
		<div class='container'>
					<table class='table table-condensed' style='text-align: center;'>
					<thead>
	              	<tr>
	                	<th style='text-align: center;'>Name</th>
	                	<th style='text-align: center;'>Comment</th>
	                	<th style='text-align: center;'>Date</th>	
	             	</tr>
	            	</thead>
	            	";

					while($row = mysqli_fetch_array($result))
					{
						echo "<tr bgcolor='$bgcolor'>";
						echo "<td width='90px'>" . $row['name'] . "</td>";
						echo "<td width='500px'>" . $row['comment'] . "</td>";
						echo "<td width='100px'>" . $row['date'] . "</td>";
						echo "<tr>";
					}
					echo "</table></div>"
				?>
		
		</div>
	</div>
</body>
</html>