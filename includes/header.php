<?php 
header("Cache-Control: max-age=31536000");

?>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/style.css">
	<!--import css-->
	<title>FCI FYP Management System</title>
	<!--title-->

</head>

<body>
	<header>
		<div class="head">
		
			<div class="logo">
				<img src="img/banner.png">
			</div>
			<div class="nav-bar">
				<a class="
							 <?php echo ($_SERVER['PHP_SELF'] == "Index.php" ? "active" : "Announcement");?>
							 " href="Index.php"> Announcements </a>
							 <a>|</a>
				<a class="
							 <?php echo ($_SERVER['PHP_SELF'] == "Guide.php" ? "active" : "");?>
							 " href="Guide.php"> FYP Guidelines </a>

			</div>
		</div>
	</header>
	<!--header close-->
