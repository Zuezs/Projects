<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<style>
		body{
			background-color: white;
			background-image:url('Music1.jpg');
			background-repeat:no-repeat;
			background-attachment:fixed;
			background-position:center; 
			
			}
	
		p{
			color: orange;
			text: center;
		}
	
		h1{
			color: orange;
			}
		
		#draggable{
			width: 400px; height: 550px;  
		}
		#show{
			width: 400px ;
			margin-left: auto ;
			margin-right: auto ;
			}

		#video1{
			position: absolute; 
		
			width: 50px;
			padding:0px;
			}
		#video2{
			position: relative;
			float: right; 
			height: 100px; 
			
			padding: 0px;
		}
	
	</style>
</head>
<body>
<h1>Our Local Bands</h1>
<div id = "video1">
	<iframe width="300" height="300" src="//www.youtube.com/embed/lTfp71UIcVw" frameborder="0" allowfullscreen></iframe>
</div>

<p>This is a page will contain local bands and all their info.</p>
<p>You must be logged in to view this page.</p>

<div id = "video2">
	<iframe width="300" height="300" src="//www.youtube.com/embed/Ut3RWuH2G_8" frameborder="0" allowfullscreen></iframe>
</div>

</body>
</html>