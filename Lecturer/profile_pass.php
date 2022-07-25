<?php include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$id = $_SESSION['user'];
$alert = "";
if(isset($_POST['update'])){
	$fillPass = $_POST['pass'];
	$NewPass = $_POST['newPass'];
	$ConfirmNewPass = $_POST['ConPass'];
	
	$sql = mysqli_query($conn,"Select * from users where iduser = '$id'");
	$result = mysqli_fetch_array($sql);
	$oldPass = $result['password'];
	if(empty($fillPass)){
		$alert = "Please Enter Your Current Password";
	}
	else if($fillPass === $oldPass){
		if(empty($NewPass)){
			$alert = "Please Enter Your New Password";
		}
		else if (empty($ConfirmNewPass)){
			$alert = "Please Double Confirm Your Password";
		}
		else if($NewPass !== $ConfirmNewPass){
			$alert = "Your New Password Dont Matched";
		}else{
			$sql = mysqli_query($conn,"Update users SET password = '$NewPass' where iduser = '$id'");
			$alert = "";
			$success = "Password Changed Successfully";
		}
		
	}else{
		$alert = "Your Entered Password Don't Match with Current Password";
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.mainC {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		label {
			font-size: 40px;
		}

		contC {
			width: 100%;

		}

		table {
			margin-top: 10px;
		}

		th {
			vertical-align: text-top;
			text-align: right;
		}

		.al {
			text-align: center;
			padding: 5px;
			background-color: #FF3131;
			color: white;
			border-radius: 10px;
			opacity: 90%;
		}

		.suc {
			text-align: center;
			padding: 5px;
			background-color: green;
			color: white;
			border-radius: 10px;
			opacity: 90%;
		}


		button {
			box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
			margin-right: 10px;
		}

	</style>
</head>

<body>
	<div class="mainC">
		<label>Change Password</label>
		<hr>
		<div class="contC">
			<?php if($success != "") { ?>
			<div class="suc">
				<?php echo $success ?>
			</div>
			<?php } ?>
			<?php if($alert != "") {
		 ?>
			<div class="al">
				<?php echo $alert ?>
			</div>
			<?php }?>
			<form method="post">
				<table>
					<tr>
						<th>CURRENT PASSWORD:</th>
						<td><input name="pass" type="password"></td>
					</tr>
					<tr>
						<th>NEW PASSWORD:</th>
						<td><input name="newPass" type="password"></td>
					</tr>
					<tr>
						<th>CONFIRM NEW PASSWORD:</th>
						<td><input name="ConPass" type="password"></td>
					</tr>
				</table>
				<hr>
				<button type="button" onclick='window.location.href="lecturer.php?view=profile"'>BACK</button>
				<button type="submit" onclick='confirmPass(this);return false;' name="update">UPDATE PASSWORD</button>
			</form>
		</div>
	</div>
</body>

</html>
<script>
	function confirmPass(anchor) {
		var conf = confirm('CLICK "OK" TO CONFIRM CHANGES');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
