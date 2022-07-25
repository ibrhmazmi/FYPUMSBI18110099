<?php
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['change'])){
	$id = $_SESSION['user'];
	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	
	$sql = mysqli_query($conn,"update users 
	SET 
	password = '$pass'
	WHERE iduser = '$id'");
	
	if ($sql){
		mysqli_close($conn);
		header("location:Student.php?view=profile");
		exit;
	}else{
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<style>
			.RPmain {
				width: 95%;
				margin: 0 auto;
				margin-top: 20px;
			}
			.RPLabel label{
				font-size: 40px;
			}
			.RPcont {
				margin-top: 10px;
				padding: 10px;
			}
			.RPcont input{
				margin-top: 10px;
			}
		</style>
		<script>
	function confirmationDelete(anchor) {
		var conf = confirm('CLICK "OK" TO CHANGE PASSWORD');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
<!--	double check password-->
		<script>
				function check_pass() {
    if (document.getElementById('pass').value == document.getElementById('confirm_pass').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
		</script>
	</head>
	<body>
		<div class="RPmain">
			<div class="RPLabel">
				<label>Change PASSWORD</label>
			</div>
			<hr>
			<div class="RPcont">
		
				<form method="post">
					<table>
						<tr>
							<td>NEW PASSWORD:</td>
							<td><input type="password" id="pass" name="pass" onchange='check_pass();'></td>
						</tr>
						<tr>
							<td>CONFIRM PASSWORD:</td>
							<td><input type="password" id="confirm_pass" name="confirm_pass" onchange='check_pass();'> </td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="change" disabled id="submit" value="CHANGE" onclick='confirmationDelete(this);return false;'> 
							<input  type="button" onclick="window.location.href='?view=profile'" name="change" value="BACK"></td>
						</tr>
					</table>
					
				</form>
			</div>
		</div>
	</body>
</html>