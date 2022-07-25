<?php
include_once "../includes/config.php";

if (!isStudent()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../index.php');
}

if (!isLoggedIn()){
	header('location: ../index.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Student Panel</title>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
     user-scalable=0'>
     <link rel="icon" href="../img/fci.png">
	<link rel="stylesheet" href="css/student_panel.css">
	<link rel="stylesheet" href="css/left-p.css">
	<link rel="stylesheet" href="css/right-p.css">



</head>

<body>

	<!--include header.php-->
	<?php include_once 'includes/head.php';?>
	<!--start main content-->
	<div class="main">
		<!--		left panel		-->
		<div class="left-nav">
			<img id="navicon" src="img/dashboard.png">
			<a href="?view=dashboard" id="">DASHBOARD</a>
			<hr>
			<img id="navicon" src="img/profile.png">
			<a href="?view=profile" id="">PROFILE </a>
			<hr>
			<img id="navicon" src="img/project_details.png">
			<a href="?view=project" id=""> PROJECT DETAILS</a>
			<hr>
			<img id="navicon" src="img/submission.png">
			<a href="?view=upload" id="">SUBMISSION</a>
			<hr>
			<img id="navicon" src="img/logbook.png">
			<a href="?view=logbook" id="">LOGBOOK </a>
			<hr>
		</div>

		<!--		left bar close-->
		<!--right bar -->
		<div class="right-bar" id="display">
			<?php 
			$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view']: '';

switch ($view)
{
		//dashboard
		case 'dashboard': include_once 'dashboard.php';
		break;
		
		//profile
		case 'edit': include_once 'student_profile_edit.php';
		break;
		case 'profile': include_once 'student_profile.php';
		break;
		case 'password': include_once 'student_profile_password.php';
		break;
		
		//project
		case 'project': include_once 'project.php';
		break;
		case 'projectADD': include_once 'project_add.php';
		break;
		
		//logbook
		case 'logbook': include_once 'logbook.php';
		break;
		case 'logadd': include_once 'logbook_add.php';
		break;
		case 'logview': include_once 'logbook_view.php';
		break;
		case 'logedit': include_once 'logbook_edit.php';
		break;
		
		//upload
		case 'upload': include_once 'upload.php';
		break;
		
		//project by SVs
		case 'svProject': include_once 'sv_project.php';
		break;
		
		default : include_once 'dashboard.php';
}
			?>

		</div>

	</div>
</body>

</html>
<!--
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>-->
