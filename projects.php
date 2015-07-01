<!DOCTYPE html>
<html>
	<head>
		<?php include 'header.php'; ?>
		<script src="myscript.js"></script>
	</head>
	<style type="text/css">
		#tablePics{
			padding:2px; 
			border-left:1px 
		}
		/*classes*/
		.imageProperty{
			width: 100%;
		}
	</style>
	<body>
	    <div class="container">
          <div class="masthead">
            <h3 class="text-muted">Sargis Dudaklyan</h3>
            <div role="navigation">
              <ul class="nav nav-justified">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="projects.php">Projects</a></li>
                <li><a href="resume.php">Resume</a></li>
              </ul>
            </div>
          </div>

	    <div class="row">
	    	<div class="col-sm-6">
				<h4 style="text-align:center;">Toy Car Project!</h4> 
				<iframe width="100%" height="390" src="//www.youtube.com/embed/GVVAltBQ4Qk" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="col-sm-6">
				<h4 style="text-align:center;">Multitouch Using Webcam</h4> 
				<iframe width="100%" height="390" src="//www.youtube.com/embed/4mdCtuzVVFk" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="col-sm-6">
				<h4 style="text-align:center;">Simple Android Project</h4> 
				<iframe width="100%" height="390" src="//www.youtube.com/embed/Y04ZO_mBbTg" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="col-sm-6">
				<h4 style="text-align:center;">Invisible Bridge - Autism AppJam</h4> 
				<iframe width="100%" height="390" src="//www.youtube.com/embed/AR4oU85RhM4" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
			<!-- Tables -->

			<table class="table">
				<thead>
					<tr>
						<th colspan="3";>Embedded Systems Projects</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td id="tablePics"><img src="images/proj1.jpg" class="imageProperty" title="Blinking LED"/></td>
						<td id="tablePics"><img src="images/proj2.jpg" class="imageProperty" title="Digital Clock"/></td>
						<td id="tablePics"><img src="images/proj3.jpg" class="imageProperty" title="Music Player"/></td>
					</tr>
					<tr>
						<td id="tablePics"><img src="images/proj4.jpg" class="imageProperty" title="Digital Voltmeter"/></td>
						<td id="tablePics"><img src="images/proj4_1.jpg" class="imageProperty"class="imageProperty" title="Digital Voltmeter"/></td>
						<td id="tablePics"><img src = "images/hbridge.jpg"class="imageProperty" title="Transistor H-Bridge"/></td>
					</tr>
					<tr>
						<td id="tablePics"><img src="images/car2.jpg" class="imageProperty" title="Car Showcase"/></td>
						<td id="tablePics"><img src="images/car3.jpg" class="imageProperty" class="imageProperty" title="Car Showcase"/></td>
						<td id="tablePics"><img src="images/car4.jpg" class="imageProperty" title="Car Showcase"/></td>
					</tr>				
				</tbody>
			</table>

 


		    <div class="container-fluid">
		        <h1 style = "text-align:center;">Popular Instagram Photos (JSON)</h1>
	            <div class="well">
	              <p style="font-size:16px">
	                  Map: Loads Instagram photos with location from the top 20. </br>
	                  Function: By clicking on the photo, you will be taken to the map with the photo marker in the center. By hovering over the marker, you will see the photo's description. </br>
	                  Enhancement: When either clicked on the marker on the map or on the photo from the list, an info window will be displayed, showing the uploaded photo, name, and username. For each object loaded, the infowindows (obtained from Google API) will be pushed into an array that stores each infowindow, which contains the html to display the photo's info. Each infowindow is associated with each marker, which is opened upon the click. </br> In addition, each marker displays the profile picture of the user who posted the photo. This was accomplished by passing the user's profile picture url where it was resized to 32x32 in the image variable.
	              </p> 
	            </div> 
		        <p style="text-align:center;"><a class="btn btn-lg btn-success" onClick="myReadyFunction()" role="button">Load More Photos!</a></p>
		          <div class="col-xs-6">
		            <div id = "mapPanel" style="width:100%; height:900px;" class="well" >
		              <div>
		                <input id="address" type="textbox" value="Irvine, CA">
		                <input type="button" value="Encode" onclick="codeAddress()">
		              </div>
		              <div>
		                <button onClick="map.setCenter(centerPoint)">Recenter Map</button>
		              </div>
		              <div id="map_canvas" style="float:right;width:100%;height:700px;border:black">
		                <p>
		                  <a href="//flic.kr/p/3rcHKm">
		                  <img src="//geekwhisperin.files.wordpress.com/2009/09/bug-vs-feature.jpg" width="100%" alt="Bug VS Feature"></a>
		                </p>
		              </div> 
		            </div>
		          </div>

		          <div class="col-xs-6">
		            <div class="dataJSON1"></div>
		          </div>
		    </div>


		</div>
	   </body>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</html>


