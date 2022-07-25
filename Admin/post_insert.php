<?php


include_once ('../includes/config.php');
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Asia/Kuala_Lumpur'); // set time zone UTC+08:00

$title =mysqli_real_escape_string($conn,$_POST['title']);
$desc = mysqli_real_escape_string($conn,$_POST['desc']);
$post_date = $_POST['post_date'];
$post_time = $_POST['post_time'];
$date = date("Y-m-d h:i:s");
$bywho = $_SESSION['lectName'];


$sqla = "insert into announcement (title,description,post_date,bywho) 
values 
('$title','$desc','$date','$bywho')" ;

if (mysqli_query($conn, $sqla)){
	header('location:Admin.php?view=post');
}else {
	echo "Error:" . $sqla . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
