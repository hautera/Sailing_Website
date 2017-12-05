<?php

if(!isset($_POST['submit'])){
	header("Location: ../signIn.php?");
	exit();
}
session_start();

$conn = mysqli_connect("vergil.u.washington.edu", "root", "HuskySailingSiteAdmin!", "loginsystem", 8800);
if(!$conn){
	die();
}
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

$sql = "SELECT * FROM USERS WHERE email='$email';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
	$result = mysqli_fetch_array($result);
	$pwd_act = $result['pwd'];
	if( password_verify($pwd, $pwd_act) ){
		$_SESSION['uid'] = $result['user_id'];
		$_SESSION['first'] = $result['first_name'];
		$_SESSION['last'] = $result['last_name'];
		$_SESSION['email'] = $result['email'];
		header("Location: ../articleForm.php");
		exit();
	} 
}
header("Location: ../signIn.php?login=error");
exit();
