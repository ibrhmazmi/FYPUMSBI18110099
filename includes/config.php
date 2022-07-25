<?php
header("Cache-Control: max-age=31536000");
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "fyp"; /* Database name */
$message = "";


$conn = mysqli_connect($host, $user, $password,$dbname);

$sql = mysqli_query($conn,"select * from session");
$row = mysqli_fetch_array($sql);
$_SESSION['type'] = $row['type'];
$_SESSION['year'] = $row['year'];

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
//check if is it admin or not
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
function isLecturer()
{
	if (isset($_SESSION['user']) && $_SESSION['role'] == 'lecturer' ) {
		return true;
	}else if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin' ) {
		return true;
	}
	else {
		return false;
	}
}
function isStudent()
{
	if (isset($_SESSION['user']) && $_SESSION['role'] == 'student' ) {
		return true;
	}else{
		return false;
	}
}

?>

