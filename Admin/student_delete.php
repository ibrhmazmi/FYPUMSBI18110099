<?php

include_once ('../includes/config.php'); // Using database connection file here
error_reporting(E_ALL & ~E_NOTICE);
if (!isset($_GET['id'])) {
	header('Location: Admin.php?view=student');
	exit;
}
$uid = mysqli_real_escape_string($conn, (string) $_GET['id']);

$dell = mysqli_query($conn,"
	DELETE users ,student 
	FROM student 
	LEFT JOIN users 
	ON (users.iduser = student.studID) 
	WHERE  studID = '$uid' "); // delete query


if($dell)
{
    mysqli_close($conn); // Close connection
    header("location:Admin.php?view=student"); // redirects to admin page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
