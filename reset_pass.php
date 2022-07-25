<?php include_once 'includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$info = $_SESSION['info'];

if(isset($_POST['submit'])){
	$code = $_POST['code'];
	$email = $_SESSION['email'];
	$sql = "Select *
FROM
(SELECT studEmail,code FROM student 
UNION 
SELECT lectEmail,code FROM lecturer) as user_Email
WHERE studEmail = '$email' and code = $code";
	
	$result = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result) >0){
		$code = 0;
		$resetStud = "Update student Set code = $code where studEmail = '$email'";
		$resetLect = "Update lecturer Set code = $code where lectEmail = '$email'";
		$res1 = mysqli_query($conn,$resetStud);
		$res2 = mysqli_query($conn,$resetLect);
		
		if($res1 >0 || $res2 >0){
			$noty = "Please Enter New Password for <br><b>$email</b>";
			$_SESSION['noty'] = $noty;
			header('location:reset.php');
		}
		else{
			$info = "Error when update ";
		}
	}
	else
	{
		$info = "<style>.noty{background-color:indianred;color:white; }</style>You've entered incorrect code";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.main {
			min-height: 550px;
		}

		.res {
			margin: 0 auto;
			width: 50%;
			text-align: center;
			border: 1px solid black;
			margin-top: 20px;
			border-radius: 10px;
			background-color: white;
			box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
		}

		.res input {
			width: 70%;
			margin: 10px;
			border-radius: 10px;
			padding: 5px;
		}

		.res button {
			width: 50%;
			margin: 10px;
			background-color: dodgerblue;
			color: white;
			border-radius: 10px;
			padding: 5px;
			box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;

		}

		.noty {
			padding: 5px;
			background-color: royalblue;
			color: white;
			border-radius: 10px;
			width: 70%;
			margin: 0 auto;
		}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			/* display: none; <- Crashes Chrome on hover */
			-webkit-appearance: none;
			margin: 0;
			/* <-- Apparently some margin are still there even though it's hidden */
		}

		input[type=number] {
			-moz-appearance: textfield;
			/* Firefox */
		}

	</style>
</head>

<body>
	<?php include_once 'includes/header.php' ?>
	<div class="main">
		<form method="post">
			<div class="res">
				<h3>Code Verification</h3>
				<div class="noty">
					<?php echo $info ?>
				</div>
				<input type="number" name="code" autocomplete="off">
				<br>

				<button type="submit" name="submit">SUBMIT</button>
				<button type="button" onclick="window.history.back()" name="back">BACK</button>
			</div>
		</form>
	</div>
	<?php include_once 'includes/footer.php' ?>
</body>

</html>
