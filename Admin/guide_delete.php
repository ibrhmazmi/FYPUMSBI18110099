<?php

include_once ('../includes/config.php'); // Using database connection file here
error_reporting(E_ALL ^ E_NOTICE);
$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from guide where id =" .$id); // delete query

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
