<?php
if(!isset($_POST['submit'])){
	header("Location: ../uwsails/SignUp.php");
	exit();
}

$conn = mysqli_connect("vergil.u.washington.edu", "root", "HuskySailingSiteAdmin!", "loginsystem", 8800);

if(!$conn){
	die("Connection with database failed!");
}

$first = mysqli_real_escape_string($conn, $_POST['firstname']);
$last = mysqli_real_escape_string($conn, $_POST['lastname']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

if(empty($first) || empty($last) || empty($email) || empty($pass)){
	header("Location: ../signUp.php?signUp=empty");
	exit();
}

if(!preg_match('/^[a-zA-Z]*$/', $first) || !preg_match('/^[a-zA-Z]*$/', $last)){
	header("Location: ../signUp.php?signUp=invalidname");
	exit();
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	header("Location: ../signUp.php?signUp=invalidemail");
	exit();
}

$sql = "SELECT * FROM USERS WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0){
	header("Location: ../signUp.php?signUp=emailtaken");
	exit();
}
$password = password_hash( $pass, PASSWORD_DEFAULT );
$sql = "INSERT INTO USERS (first_name, last_name, email, pwd) VALUES ('$first', '$last', '$email', '$password');";
mysqli_query($conn, $sql);
exit();
