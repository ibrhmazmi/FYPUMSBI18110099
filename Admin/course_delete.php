<?php

require_once ('../includes/config.php'); // Using database connection file here
error_reporting(E_ALL & ~E_NOTICE);
$id = isset($_GET['courseID']) ? (int) $_GET['courseID'] : 0;
if ($id <= 0) {
	header('Location: Admin.php?view=course');
	exit;
}

$del = mysqli_query($conn, 'DELETE FROM course WHERE courseID = ' . $id); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:Admin.php?view=course"); // redirects 
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
