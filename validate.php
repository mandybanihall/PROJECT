<?php

include 'connection.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql ="SELECT * FROM adminlogin WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));
$num = mysqli_fetch_array($result);
	
if($num > 0) {
	header('Location: setup.php');
}
else {
	echo "Wrong User id or password";
}
?>