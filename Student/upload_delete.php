<?php

include_once ('../includes/config.php');
error_reporting(E_ALL & ~E_NOTICE);

if (!isset($_SESSION['user']) || !isStudent()) {
	header('Location: Student.php?view=upload');
	exit;
}

$id = mysqli_real_escape_string($conn, (string) $_SESSION['user']);
$own = " (stud1 = '$id' OR stud2 = '$id' OR stud3 = '$id') ";

$q = null;
if (isset($_GET['propoFile']) && (string) $_GET['propoFile'] !== '') {
	$f = mysqli_real_escape_string($conn, (string) $_GET['propoFile']);
	$q = "UPDATE project SET proposalFileWord = NULL WHERE proposalFileWord = '$f' AND $own";
} elseif (isset($_GET['fyp1PDF']) && (string) $_GET['fyp1PDF'] !== '') {
	$f = mysqli_real_escape_string($conn, (string) $_GET['fyp1PDF']);
	$q = "UPDATE project SET fyp1FilePDF = NULL WHERE fyp1FilePDF = '$f' AND $own";
} elseif (isset($_GET['fyp1Word']) && (string) $_GET['fyp1Word'] !== '') {
	$f = mysqli_real_escape_string($conn, (string) $_GET['fyp1Word']);
	$q = "UPDATE project SET fyp1FileWord = NULL WHERE fyp1FileWord = '$f' AND $own";
} elseif (isset($_GET['fyp2PDF']) && (string) $_GET['fyp2PDF'] !== '') {
	$f = mysqli_real_escape_string($conn, (string) $_GET['fyp2PDF']);
	$q = "UPDATE project SET fyp2FilePDF = NULL WHERE fyp2FilePDF = '$f' AND $own";
} elseif (isset($_GET['fyp2Word']) && (string) $_GET['fyp2Word'] !== '') {
	$f = mysqli_real_escape_string($conn, (string) $_GET['fyp2Word']);
	$q = "UPDATE project SET fyp2FileWord = NULL WHERE fyp2FileWord = '$f' AND $own";
} elseif (isset($_GET['poster']) && (string) $_GET['poster'] !== '') {
	$f = mysqli_real_escape_string($conn, (string) $_GET['poster']);
	$q = "UPDATE project SET poster = NULL WHERE poster = '$f' AND $own";
} elseif (isset($_GET['source_file']) && (string) $_GET['source_file'] !== '') {
	$f = mysqli_real_escape_string($conn, (string) $_GET['source_file']);
	$q = "UPDATE project SET source_file = NULL WHERE source_file = '$f' AND $own";
}

if ($q === null) {
	$_SESSION['msg'] = 'Invalid delete request';
	header('Location: Student.php?view=upload');
	exit;
}

$del = mysqli_query($conn, $q);
if ($del) {
	header('Location: Student.php?view=upload');
	exit;
}

$_SESSION['msg'] = 'Error deleting record';
header('Location: Student.php?view=upload');
exit;
