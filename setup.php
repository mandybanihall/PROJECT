<!DOCTYPE html>
<html>
<head>
    <title> SETUP DATABASE </title>
</head>
<body>
  <link rel="stylesheet" href="Resources/button.css">
  
  <div class="button" align ="center" style="background-color:red; padding:19px;margin-bottom: 180px;border-radius:80px 80px 0px 0px">
    <button type="button" name="pentesting" onclick="location.href='index.html'">VULNERABLE WEBSITE TO PENTEST</button>
  </div>
  </link>

  <div align="center">

    <form method="POST">
      <label style="font-size:24px;font-family:'Comic Sans MS','Georgia'">Create Database:&ensp;</label>
      <input type="submit" name="submit" value="CREATE" style="padding:8px;padding-left,right:7px;margin-right:5px;font-family:'Georgia'"></form> <br>

    <form method="POST">
      <label style="font-size:24px;font-family:'Comic Sans MS','Georgia'">Restore Database:</label>
      <input type="submit" name="submit1" value="RESTORE" style="padding:8px;font-family:'Georgia'"></form>
  </div>


<?php

if (isset($_POST["submit"])) {

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

   if(! $conn ) {
      die('Could not connect: ' . mysqli_error( $conn));
   }
   else
   echo 'Connected successfully  </br>';
   create_database($conn);
   create_tables($conn, "1ccb8097d0e9ce9f154608be60224c7c");
   mysqli_close($conn);
}
if (isset($_POST["submit1"])) {
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

   if ($conn) {
   	echo "Connected successfully <br>";
   }
   else {
	die('Could not connect: ' . mysqli_error( $conn));
   }

   remove_database($conn);
   create_database($conn);
   create_tables($conn, "1ccb8097d0e9ce9f154608be60224c7c");
   mysqli_close($conn);
}



function create_database($conn){
   $sql = 'CREATE Database 1ccb8097d0e9ce9f154608be60224c7c';
   $retval = mysqli_query( $conn, $sql);

   if(! $retval ) {
      die('Could not create database: ' . mysqli_error( $conn));
   }

   echo "Database 1ccb8097d0e9ce9f154608be60224c7c created successfully </br>";
}

function create_tables($conn, $db_name){
   $sql = 'CREATE TABLE books( '.
      'number INT NOT NULL , '.
      'bookname VARCHAR(50) NOT NULL, '.
      'authorname VARCHAR(50) NOT NULL)';
   mysqli_select_db($conn,$db_name);
   $retval = mysqli_query( $conn , $sql);

   if(! $retval ) {
      die('Could not create table: ' . mysqli_error( $conn));
   }
    #-------------------------------------------------
   echo "Table books created successfully </br>";

   $sql = 'CREATE TABLE flags( '.
      'flag VARCHAR(50) NOT NULL)';
   mysqli_select_db($conn, $db_name);
   $retval = mysqli_query(  $conn , $sql );

   if(! $retval ) {
      die('Could not create table: ' . mysqli_error( $conn));
   }

   echo "Table flags created successfully </br>";
   #---------------------------------------------------
   $sql = 'CREATE TABLE secret( '.
      'username VARCHAR(56) NOT NULL , '.
      'password VARCHAR(56) NOT NULL)';
   mysqli_select_db($conn,$db_name);
   $retval = mysqli_query(   $conn, $sql );

   if(! $retval ) {
      die('Could not create table: ' . mysqli_error( $conn));
   }

   echo "Table secret created successfully </br>";
   #---------------------------------------------------
   $sql = 'CREATE TABLE users( '.
      'firstname VARCHAR(50) NOT NULL , '.
      'lastname VARCHAR(50) NOT NULL, '.
      'username  VARCHAR(50) NOT NULL, '.
      'password   VARCHAR(50) NOT NULL )';
   mysqli_select_db($conn, $db_name);
   $retval = mysqli_query( $conn , $sql);

   if(! $retval ) {
      die('Could not create table: ' . mysqli_error( $conn));
   }

   echo "Table users created successfully </br>";
   #---------------------------------------------------

   $sql = 'INSERT INTO books (number, bookname, authorname) VALUES (1, "Theory of computation", "B.M Moret")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO books (number, bookname, authorname) VALUES (2, "Cryptography and network security", "William Stallings")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO books (number, bookname, authorname) VALUES (3, "Artificial Intelligence", "Rich and Knight")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO books (number, bookname, authorname) VALUES (4, "Java programming", "James Edward Keogh")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO books (number, bookname, authorname) VALUES (5, "Algoritm analysis and design", "Knuth")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO books (number, bookname, authorname) VALUES (6, "Digital image processing", "Ramesh Jain")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO books (number, bookname, authorname) VALUES (7, "Ghost in the wires", "David Kevin Mitnick")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   #--------------------------------------------------------------------------------------------

   $sql = 'INSERT INTO flags (flag) VALUES ("You hacked me!")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO flags (flag) VALUES ("SQL Injection is easy?")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

   #----------------------------------------------------------------------------------------------

   $sql = 'INSERT INTO secret (username, password) VALUES ("admin", "password")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

   #--------------------------------------------------------------------------------------------------

   $sql = 'INSERT INTO users (firstname, lastname, username, password) VALUES ("John","Doe", "Admin", "password")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO users (firstname, lastname, username, password) VALUES ("Alice","Carrol", "Rabbit", "White")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO users (firstname, lastname, username, password) VALUES ("Bruce","Batman", "Alfred", "Batmobile")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   $sql = 'INSERT INTO users (firstname, lastname, username, password) VALUES ("Dare","Devil", "HackMe", "IfY0UC4N")';
   if (mysqli_query($conn, $sql)) {
   echo "New record created successfully </br>";
   }
   else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
}

function remove_database($conn){
   $sql = 'DROP DATABASE 1ccb8097d0e9ce9f154608be60224c7c';
   $retval = mysqli_query($conn, $sql);
   if($retval){
   echo "<br>The database deleted successfully.<br>";
   }
   else{
   echo "Error: ".$sql."<br>". mysqli_error($conn);
   }
}

?>
</div>
<div class="button" align ="center" style="background-color:red; padding:1px;margin-top:210px;border-radius:0px 0px 80px 80px">
<p> WEB APPLICATION SECURITY</P>
</div>
 

</body>
</html>
