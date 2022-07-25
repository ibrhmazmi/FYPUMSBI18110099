<?php
include_once "../includes/config.php";
if (!isLecturer()) {
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
	<title>Lecturer Panel</title>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
     user-scalable=0'>
	<link rel="icon" href="../img/fci.png">
	<link rel="stylesheet" href="css/lect_panel.css">
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
			<img id="lefticon" src="img/dashboard.png">
			<a href="?view=dashboard" id="">DASHBOARD</a>
			<hr>
			<img id="lefticon" src="img/profile.png">
			<a href="?view=profile" id="">PROFILE</a>
			<hr>
			<img id="lefticon" src="img/assigned.png">
			<a href="?view=student" id="">STUDENT ASSIGNED</a>
			<hr>
			<img id="lefticon" src="img/submission.png">
			<a href="?view=submission" id="">STUDENT's SUBMISSiON</a>
			<hr>
			<img id="lefticon" src="img/svproject.png">
			<a href="?view=svproject" id="">Project</a>
			<hr>
			<img id="lefticon" src="img/logbook.png">
			<a href="?view=logbook" id="">STUDENT'S LOGBOOK</a>
			<?php if($_SESSION['role'] == "admin"){
			?>
			<hr>
			<img id="lefticon" src="img/to_admin_panel.png">
			<a href="../Admin/Admin.php">TO ADMIN PANEL</a>
			<?php
}else{
	
}?>
			<hr>






		</div>

		<!--		left bar close-->
		<!--right bar -->
		<div class="right-bar">

			<?php 
			$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view']: '';

switch ($view){
		
		//dashboard
		case 'dashboard':include_once 'dashboard.php';
		break;
		
		//profile
		case 'profile':include_once 'profile.php';
		break;
		case 'profile_edit':include_once 'profile_edit.php';
		break;
		case 'profile_pass':include_once 'profile_pass.php';
		break;
		//student
		case 'student': include_once 'student.php';
		break;
		case 'submission': include_once 'submission.php';
		break;
	
		//logbook
		case 'logbook':include_once 'logbook.php';
		break;
		case 'logbookView':include_once 'logbook_view.php';
		break;
		case 'logbookEdit':include_once 'logbook_edit.php';
		break;
		
		//request project
		case 'svproject':include_once 'project_by_sv.php';
		break;
		case 'add_svproject':include_once 'addproject_by_sv.php';
		break;
		case 'view_svproject':include_once 'project_view.php';
		break;
		case 'edit_svproject':include_once 'project_edit.php';
		break;
		
		//marking
		case 'markingSV':include_once 'marking_SV.php';
		break;
		case 'markingEX':include_once 'marking_EX.php';
		break;
		
		//default page 
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
