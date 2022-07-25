<?php


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

			<?php if (!$_SESSION['studDP']){
	echo "<img style=\"width: 40px;
	height: 40px;\" 
	class=\"dropbtn\" src=\"upload/student_img/dp.png\" >";
}else{ ?>
			<img class="dropbtn" style="width: 40px;
	height: 40px; margin-top:5px;" src="upload/student_img/<?php echo $_SESSION['studDP'] ?>">
			<?php } ?>
			<div class="dropdown-content">
				<a>
					<?php echo $_SESSION['type']."<hr>".$_SESSION['year']."<hr>" ?>
					<?php 
				echo $_SESSION['studName']; ?>
					<hr>
					<b>
						<?php echo $_SESSION['user']; ?>
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
