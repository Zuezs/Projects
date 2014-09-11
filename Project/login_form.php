
<?php if ($error) {
	print "<p class=\"error\">$error</p>\n";
} ?>
<form action="login.php" method="POST">
	<input type="hidden" name="action" value="do_login">
	<p>
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" value="<?php print $username; ?>">
	</p>
	<p>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
	</p>
	<p>
		<input type="submit" name="submit" value="Login">
	</p>
	<center><a href = 'registration.php'> Click Here To Register </a></center>
</form>
