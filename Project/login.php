<?php
	// Make sure the form is served using HTTPS
	if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
	
	// Attempt to start/resume the session
	if(!session_start()) {
		$errorMessage = "Unable to start session.";
		$contentURL = "error_info.php";
		require "layout.php";
		exit;
	}
	
	// If the user is logged in, redirect them home
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if ($loggedIn) {
	header("Location: page.php?page=page1");
		exit;
	}
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}
	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
		
		//Query Stuff
		$conn = pg_connect(" user= password= dbname=");
		pg_query("SET search_path=lab8;");
	
		if( !conn)
		{
			echo "Couldnt connect";
		}
        //Collect Salt From table and Get Sha1
        $query = "SELECT (username), (password_hash), (salt) FROM authentication WHERE (username) = $1 LIMIT 1;";
        $result = pg_prepare($conn, "Collect", $query);
        if(!result)
        {
            die ("Could not prepare" . pg_last_error());
        }
        $result = pg_execute($conn, "Collect", array($username));
        if(!result)
        {
            die("Could not execute" . pg_last_error());
        }

        $dbarray= pg_fetch_assoc($result);
        $salt = $dbarray['salt'];
		$dbuser = $dbarray['username'];
		$dbhashpass = $dbarray['password_hash'];
		
        $hash_password = sha1($password . $salt);
		
		
		if ($dbhashpass == $hash_password && $dbuser == $username) {
			// Instead of setting a cookie, we'll set a key/value pair in $_SESSION
			$_SESSION['loggedin'] = $username;
			header("Location: page.php?page=page1");
			exit;
		 }else {
			$error = 'Login failed.  Please enter the correct username and password.';
			$contentURL = "login_form.php";
			require "layout.php";
		}		
	}
	
	function login_form() {
		$username = "";
		$error = "";
		$contentURL = "login_form.php";
		require "layout.php";
	}
	
?>
