<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<style>
			
		div#menu {
			background-color: orange;
			color: yellow;
			}
		
		a#menu {
			background-color: black;
			color: yellow;
			}
	
	
	
	</style>
</head>
<body>
<div id="menu">
<a href="index.php">Home</a>
</div>
<?php
if ($loggedIn) {
?>
<div id="menu">
<a href="page.php?page=page1">Our Local Bands</a>
<a href="page.php?page=page2">Music</a>
<a href="page.php?page=page3">Whats Hot</a>

</div>
<div id="menu">
<a href="logout.php">Logout</a> 
</div>
<?php
} else {
?>
<a href="login.php">Login</a>
<?php
}
?>

</body>
</html>
