<?php
session_start();

if(!isset($_POST['submit']) || !isset($_SESSION['uid'])){
	header("Location: ../");
	exit();
}

$conn = mysqli_connect("vergil.u.washington.edu", "root", "HuskySailingSiteAdmin!", "blog_data", 8800);

$title = mysqli_real_escape_string($conn, $_POST['article_title']);
$desc = mysqli_real_escape_string($conn, $_POST['article_desc']);
$text = mysqli_real_escape_string($conn, $_POST['article_text']);
$pic_name = mysqli_real_escape_string($conn, $_POST['pic_name']);
$author_id = $_SESSION['first']." ".$_SESSION['last'];
$date = date("d-m-y");
$sql = "INSERT INTO article_data (article_title, article_desc, article_text, article_pic_name, article_author_id, article_pub_date) VALUES ('$title', '$desc', '$text', '$pic_name', '$author_id', '$date');";
mysqli_query($conn, $sql);
header("Location: ../news.php");
exit();