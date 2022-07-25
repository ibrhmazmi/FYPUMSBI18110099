<?php
include_once "../includes/config.php";
if (!isAdmin()) {
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
	<title>Coordinator Panel</title>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
     user-scalable=0'>
     <link rel="icon" href="../img/fci.png">
	<link rel="stylesheet" href="css/admin_panel.css">
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
			<a id="nav" href="?view=all" id="">DASHBOARD</a>
			<br>
			<hr>
			<img id="lefticon" src="img/announce.png">
			<a id="nav" href="?view=post" id="">ANNOUNCEMENT</a>
			<br>
			<hr>
			<img id="lefticon" src="img/student.png">
			<a id="nav" href="?view=student_search" id="">STUDENT</a>
			<br>
			<hr>
			<img id="lefticon" src="img/lect.png">
			<a id="nav" href="?view=lecturer" id="">LECTURER</a>
			<br>
			<hr>
			<img id="lefticon" src="img/project_list.png">
			<a id="nav" href="?view=projectList" id="">PROJECT LIST</a>
			<br>
			<hr>
			<img id="lefticon" src="img/svrequest.png">
			<a id="nav" href="?view=svproject" id="">SV PROJECT REQUEST</a>
			<br>
			<hr>
			<img id="lefticon" src="img/marking.png">
			<a id="nav" href="?view=mark" id="">MARKING</a>
			<br>
			<hr>
	<img id="lefticon" src="img/to_lect_panel.png">
			<a href="../Lecturer/lecturer.php">TO LECTURER PANEL</a>
			<hr>
			<div class="dropdown">
			<img id="lefticon" src="img/setting.png">
				<a>MANAGE</a>
				<div class="dropdown-content">
					<a id="nav" href="?view=guideline" id="">MANAGE GUIDELINES</a>
					<br>
					<hr>
					<a id="nav" href="?view=semester" id="">MANAGE Semester</a>
					<br>
					<hr>
					<a id="nav" href="?view=course" id="">MANAGE COURSE</a>
					<br>
					<hr>
					<a id="nav" href="?view=foot" id="">MANAGE FOOTER</a>
					<br>
				</div>
			</div>
			<hr>


		</div>

		<!--		left bar close-->
		<!--right bar -->
		<div class="right-bar" id="display">

			<?php 
			$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view']: '';

switch ($view){
		
		//announcement
		case 'post': include_once 'post_view.php';
		break;
		case 'newPost': include_once 'announcement.php';
		break;
		
		//student
		case 'student': include_once 'student_view.php';
		break;
		case 'student_search': include_once 'student_list.php';
		break;
		case 'student_add': include_once 'student_add.php';
		break;
		
		//lecturer
		case 'lecturer': include_once 'lecturer_view.php';
		break;	
		case 'lecturer_add': include_once 'lecturer_add.php';
		break;
		
		//marking
		case 'mark': include_once 'marking.php';
			break;
		case 'markEdit': include_once 'marking_edit.php';
		break;
		
		//guideline
		case 'guideline': include_once 'guide.php';
		break;
		case 'newGuide': include_once 'guide_add.php';
		break;
		
		//project
		case 'projectList': include_once 'project_list.php';
		break;
		case 'assign': include_once 'project_assign.php';
		break;
		case 'svproject': include_once 'sv_project.php';
		break;
		case 'Upsvproject': include_once 'update_svproject.php';
		break;
		
		//dashboard
		case 'all': include_once 'dashboard.php';
		break;
		
		//manage course
		case 'course': include_once 'course.php';
		break;
		case 'course_add': include_once 'course_add.php';
		break;	
		
		//manage footer
		case 'foot': include_once 'footer.php';
		break;
		case 'foot_edit': include_once 'footer_edit.php';
		break;
		
		//manage session
		case 'semester': include_once 'session.php';
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
