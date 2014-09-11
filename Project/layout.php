<!DOCTYPE html>
<html>
<head>
	<title>Local Sound</title>
	<style>
		.error {
			color: red;
		}
		
		h1#title {
			background-color: white;
			color: blue;
			text-align: center;
		}
		
		div#footer {
			position: absolute;
			bottom:0;
			width:100%;
			height:60px;
			background:#6cf;
			border-top: 1px dotted black;
				
		}
			
		body#right{
			text-align: right;
			}
		
	</style>
</head>
<body id="right">
	<?php require "menu.php"; ?>
</body>
<body>
	<h1 id="title">Local Sound</h1>
	<div><center><?php require $contentURL; ?></center></div>
	
	<center><div id="footer">Copyright &copy; 2014 CS3380 Group</div></center>
</body>
</html>