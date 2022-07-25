<?php
include_once '../includes/config.php';

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location:../Index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
	<div class="head">
		<div class="logo">
			<img src="../img/ums.png" alt="ums logo" style="float:left;width:100px;height:40px;display: block;
	margin: auto;">
		</div>

		<div class="f-right">
			<div class="u1">
			<?php echo $_SESSION['type']." |  ".$_SESSION['year']." | " ?>
				<?php echo $_SESSION['lectName']; ?>, <b><?php echo $_SESSION['user']; ?></b> |
				
			</div>
			<div class="btnout">
			<form method='post' action="">
				<input type="submit" value="Logout" name="but_logout">
			</form>
			</div>
		</div>
	</div>
</body>

</html>
