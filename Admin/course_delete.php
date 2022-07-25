<?php

require_once ('../includes/config.php'); // Using database connection file here
error_reporting(E_ALL ^ E_NOTICE);
$id = $_GET['courseID']; // get id through query string

$del = mysqli_query($conn,"delete from course where courseID =" .$id); // delete query

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
