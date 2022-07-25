<?php

include_once ('../includes/config.php'); // Using database connection file here
error_reporting(E_ALL ^ E_NOTICE);

$id = $_GET['id'];
$d1 = $_GET['propoFile'];
$d2 = $_GET['fyp1PDF'];
$d3 = $_GET['fyp1Word'];
$d4 = $_GET['fyp2PDF'];
$d5 = $_GET['fyp2Word'];
$d6 =$_GET['poster'];
$d7 = $_GET['source_file'];
	// get id through query string

// delete query
$del1 = mysqli_query($conn,"
UPDATE project set proposalFileWord = null 
	WHERE proposalFileWord='$d1' AND stud1 = '$id' or stud2 = '$id' or stud3 = '$id'   "); 
$del2 = mysqli_query($conn,"
UPDATE project set fyp1FilePDF = null 
WHERE fyp1FilePDF='$d2' AND stud1 = '$id' or stud2 = '$id' or stud3 = '$id'   "); 
$del3 = mysqli_query($conn,"
UPDATE project set fyp1FileWord = null 
	WHERE fyp1FileWord='$d3' AND stud1 = '$id' or stud2 = '$id' or stud3 = '$id'   "); 
$del4 = mysqli_query($conn," 
UPDATE project set fyp2FilePDF = null 
	WHERE fyp2FilePDF='$d4' AND stud1 = '$id' or stud2 = '$id' or stud3 = '$id'  "); 
$del5 = mysqli_query($conn,"
UPDATE project set fyp2FileWord = null 
	WHERE fyp2FileWord='$d5' AND stud1 = '$id' or stud2 = '$id' or stud3 = '$id' "); 
$del6 = mysqli_query($conn,"
UPDATE project set poster = null 
	WHERE poster='$d6' AND stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ");
$del7 = mysqli_query($conn,"
UPDATE project set source_file = null 
	WHERE source_file='$d7' AND stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ");


if($del1)
{
    mysqli_close($conn); // Close connection
    header("location:Student.php?view=upload"); // redirects to admin page
    exit;	
}
else if($del2)
{
    mysqli_close($conn); // Close connection
    header("location:Student.php?view=upload"); // redirects to admin page
    exit;	
}
else if($del3)
{
    mysqli_close($conn); // Close connection
    header("location:Student.php?view=upload"); // redirects to admin page
    exit;	
}else if($del4)
{
    mysqli_close($conn); // Close connection
    header("location:Student.php?view=upload"); // redirects to admin page
    exit;	
}else if($del5)
{
    mysqli_close($conn); // Close connection
    header("location:Student.php?view=upload"); // redirects to admin page
    exit;	
}
else if($del6)
{
    mysqli_close($conn); // Close connection
    header("location:Student.php?view=upload"); // redirects to admin page
    exit;	
}
else if($del7)
{
    mysqli_close($conn); // Close connection
    header("location:Student.php?view=upload"); // redirects to admin page
    exit;	
}
else 
{
    $msg =  "Error deleting record";
	$_SESSION['msg'] = $msg;
	// display error message if not delete
}
?>
