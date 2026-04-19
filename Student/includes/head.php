<?php

$sStudDp = htmlspecialchars((string) ($_SESSION['studDP'] ?? ''), ENT_QUOTES, 'UTF-8');
$sType = htmlspecialchars((string) ($_SESSION['type'] ?? ''), ENT_QUOTES, 'UTF-8');
$sYear = htmlspecialchars((string) ($_SESSION['year'] ?? ''), ENT_QUOTES, 'UTF-8');
$sStudName = htmlspecialchars((string) ($_SESSION['studName'] ?? ''), ENT_QUOTES, 'UTF-8');
$sUser = htmlspecialchars((string) ($_SESSION['user'] ?? ''), ENT_QUOTES, 'UTF-8');

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location:../Index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/hover.css">
</head>

<body>
	<div class="head">
		<div class="logo">
			<img src="../img/ums.png" alt="ums logo" style="float:left;width:100px;height:40px;display: block;
	margin: auto;">

		</div>

		<div class="dropdown">

			<?php if ($sStudDp === ''){
	echo "<img style=\"width: 40px;
	height: 40px;\" 
	class=\"dropbtn\" src=\"upload/student_img/dp.png\" >";
}else{ ?>
			<img class="dropbtn" style="width: 40px;
	height: 40px; margin-top:5px;" src="upload/student_img/<?php echo $sStudDp ?>">
			<?php } ?>
			<div class="dropdown-content">
				<a>
					<?php echo $sType."<hr>".$sYear."<hr>" ?>
					<?php 
				echo $sStudName; ?>
					<hr>
					<b>
						<?php echo $sUser; ?>
					</b>
					<hr>
				</a>
				<a style="margin-top:-5px;">
					<form method='post' action="">
						<input id="butt" type="submit" value="Logout" name="but_logout">
					</form>
				</a>

			</div>
		</div>

	</div>
</body>

</html>
