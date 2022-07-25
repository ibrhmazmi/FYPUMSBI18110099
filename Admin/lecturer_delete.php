<?php

include_once ('../includes/config.php'); // Using database connection file here
error_reporting(E_ALL ^ E_NOTICE);
$uid = $_GET['id']; // get id through query string

$dell = mysqli_query($conn,"
	DELETE users ,lecturer 
	FROM lecturer 
	LEFT JOIN users 
	ON (users.iduser = lecturer.lectID) 
	WHERE  lectID = '$uid'"); // delete query


if($dell)
{
    mysqli_close($conn); // Close connection
    header("location:Admin.php?view=lecturer"); // redirects to admin page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
