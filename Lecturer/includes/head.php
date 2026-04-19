<?php
include_once '../includes/config.php';

$sType = htmlspecialchars((string) ($_SESSION['type'] ?? ''), ENT_QUOTES, 'UTF-8');
$sYear = htmlspecialchars((string) ($_SESSION['year'] ?? ''), ENT_QUOTES, 'UTF-8');
$sLectName = htmlspecialchars((string) ($_SESSION['lectName'] ?? ''), ENT_QUOTES, 'UTF-8');
$sUser = htmlspecialchars((string) ($_SESSION['user'] ?? ''), ENT_QUOTES, 'UTF-8');

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
			<?php echo $sType." |  ".$sYear." | " ?>
				<?php echo $sLectName; ?>, <b><?php echo $sUser; ?></b> |
				
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
