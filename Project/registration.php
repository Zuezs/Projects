
<html>
<head>
<title> Registration </title>
		
	<style>
	
		table#CourseTable td, table#CourseTable th, tr{
				padding: 5px;
				font-size: 16pt;
				border: 1px solid black;
				border-collaspe: collapse;
				border-spacing: 0px;
			}
			#CourseTable {
			border-collapse: collapse;
			text-align: center;
			}

	</style>
</head>
<body>
<form method='POST' action='registration.php'>
<table align="center" id= "CourseTable" >
	<th> Create Your Account </th>
	
	<tr><td>
	Username: <input type='text' name='username' > </input>
	</td></tr>
	
	<br> <br/>
	
	<tr><td>
	Password: <input type='password' name='password'> </input>
	</td></tr>
	
	<br> <br/>
	
	<tr><td>
	Confirm Password: <input type='password' name='confirm-password'> </input>
	</td></tr>
	
	<br> <br/>
	<tr><td>
	<input type='submit' name='submit' value='Register'> </input>
	</td></tr>

</table>	

<?php
    
	
	
	if( isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
        $password2 = $_POST['confirm-password'];
		
			if( $username == NULL)
			{
				die ("Username is required");
			}
			else if( $password == NULL)
			{
				die ("Password is required");
			}
            else if($password != $password2)
            {
                die ("Passwords are not the same!");
				
            }
	$conn = pg_connect("host=dbhost-pgsql.cs.missouri.edu user=tda3b4 password=hDE19Evb dbname=tda3b4");
	if(!conn)
	{
		die ("Connection cannot be made!");
	}
		//Salts and Hash
        $salt = mt_rand();
        $salt = sha1($salt);
        $hash_pass = sha1($password . $salt);
		//IP address
		$IP_addr = $_SERVER['REMOTE_ADDR'];
        
		//Fields clear add user to database
		//Setup Queries
		$query = "INSERT INTO lab8.user_info (username) VALUES ($1)"; 
		$query1 = "INSERT INTO lab8.authentication (username, password_hash, salt) VALUES($1, $2, $3)";
		$query2 = " INSERT INTO lab8.log(username, ip_address, action) VALUES($1, $2, $3)";
		
		//Run Queries
		$result = pg_prepare($conn, "user_info", $query);
		if(!$result)
		{
			die("Cannot connect prepare query " . pg_last_error());
		}
		
		$result = pg_execute($conn, "user_info", array($username));
		if(!$result)
		{
			die("Cannot connect execute query " . pg_last_error());
		}
		
		$result1 = pg_prepare($conn, "authentication", $query1);
		if(!$result1)
		{
			die("Cannot connect prepare query " . pg_last_error());
		}
		
		$result1 = pg_execute($conn, "authentication", array($username, $hash_pass, $salt));
		if(!$result1)
		{
			die("Cannot connect execute query " . pg_last_error());
		}
		$result2 = pg_prepare($conn, "log", $query2);
		if(!result2)
		{
			die("Cannot connect prepare query " . pg_last_error());
		}
		
		$result2 = pg_execute($conn, "log", array($username, $IP_addr, 'user_info '));
		if(!$result2)
		{
			die("Cannot connect execute query " . pg_last_error());
		}
		
		
		echo "Thank You For Registering Please Log In!";
		//Redirect Home
		header('Location: login.php');
	
	}
?>
<br>
<center><a href='login.php'>Return to Login Page</a></center>

</form>

</body>
</html>
