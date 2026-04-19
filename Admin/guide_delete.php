<?php

include_once ('../includes/config.php'); // Using database connection file here
error_reporting(E_ALL & ~E_NOTICE);
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
	header('Location: Admin.php?view=guideline');
	exit;
}

$del = mysqli_query($conn, 'DELETE FROM guide WHERE id = ' . $id); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:Admin.php?view=guideline"); // redirects to admin page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
