<?php
header("Cache-Control: max-age=31536000");
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "fyp"; /* Database name */
$message = "";

/** Sender address used by password reset and other app mail (forgot.php). */
$mail_from = "qalphag96@gmail.com";

$conn = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$pdo = null;
try {
  $pdo = new PDO(
    sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $host, $dbname),
    $user,
    $password,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
  );
} catch (PDOException $e) {
  $pdo = null;
}

$sql = mysqli_query($conn, 'SELECT * FROM session');
$row = ($sql) ? mysqli_fetch_assoc($sql) : null;
if (is_array($row)) {
	$_SESSION['type'] = $row['type'];
	$_SESSION['year'] = $row['year'];
} else {
	$_SESSION['type'] = isset($_SESSION['type']) ? $_SESSION['type'] : 'FYP 1';
	$_SESSION['year'] = isset($_SESSION['year']) ? $_SESSION['year'] : (string) date('Y');
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

