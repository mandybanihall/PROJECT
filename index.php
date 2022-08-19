<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="login.css">


</head>

<body>

	<form action="validate.php" method="post">
		<div class="login-box">
			<h1>Login</h1>

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Username" name="username" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password" name="password" value="">
			</div>

			<input class="button" type="submit" name="login" value="Sign In">
		</div>
	</form>

	<form method="POST">
		<label style=" margin:2px ;font-size:15px;font-family:'Georgia'">Create Database:&ensp;</label>
		<input type="submit" name="submit" value="CREATE" style="margin:2px ;font-family:'Georgia'">


		<label style="margin:2px ; font-size:15px;font-family:'Georgia'">Restore Database:</label>
		<input type="submit" name="submit1" value="RESTORE" style="margin:2px ;font-family:'Georgia'">
	</form>
	</div>

	<?php

	if (isset($_POST["submit"])) {

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

		if (!$conn) {
			die('Could not connect: ' . mysqli_error($conn));
		} else
			echo 'Connected successfully  </br>';
		create_database($conn);
		create_tables($conn, "admin");
		mysqli_close($conn);
	}
	if (isset($_POST["submit1"])) {
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

		if ($conn) {
			echo "Connected successfully <br>";
		} else {
			die('Could not connect: ' . mysqli_error($conn));
		}

		remove_database($conn);
		create_database($conn);
		create_tables($conn, "admin");
		mysqli_close($conn);
	}



	function create_database($conn)
	{
		$sql = 'CREATE Database admin';
		$retval = mysqli_query($conn, $sql);

		if (!$retval) {
			die('Could not create database: ' . mysqli_error($conn));
		}

		echo "Database admin created successfully </br>";
	}

	function create_tables($conn, $db_name)
	{
		$sql = 'CREATE TABLE adminlogin( ' .
			'username VARCHAR(50) NOT NULL, ' .
			'password VARCHAR(50) NOT NULL)';
		mysqli_select_db($conn, $db_name);
		$retval = mysqli_query($conn, $sql);

		if (!$retval) {
			die('Could not create table: ' . mysqli_error($conn));
		}
		#-------------------------------------------------
		echo "Table books created successfully </br>";

		$sql = 'INSERT INTO adminlogin (username,password) VALUES ("admin", "test")';
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully </br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	function remove_database($conn)
	{
		$sql = 'DROP DATABASE admin';
		$retval = mysqli_query($conn, $sql);
		if ($retval) {
			echo "<br>The database deleted successfully.<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	?>
</body>

</html>