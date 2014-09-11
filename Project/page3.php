<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<style>
		body{	
			background-color: white;
			background-image:url('Music2.jpg');
			background-repeat:no-repeat;
			background-attachment:fixed;
			background-position:center; 
			
			}
	
		p{
			color: white;
		}
	
		h1{
			color: white;
			}
		

		#video1{
			position: absolute; 
			height: 100px; 
			padding: 50px;
			}
		#video2{
			float: right; 
			height: 100px; 
			padding: 50px;
		}
		#text{
			color: white;
			}
	
	</style>
		
</head>
<body>
<h1>Whats Hot</h1>

<p>This is a page that will contain hot music on the daily</p>
<p>You must be logged in to view this page.</p>

<p> Click the button to display the current day, date, and time. <p>
<p id="demo"></p>
<button type="button" onclick="myFunction()">Try it</button>

<script>
function myFunction()
{
document.getElementById("demo").innerHTML = Date();
}
</script>
</body>
</html>