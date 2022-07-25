<?php include_once 'includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$email = $_POST['email'];
$err = '';

if(isset($_POST['submit'])){
	$sql = ("Select *
FROM
(SELECT studEmail FROM student 
UNION 
SELECT lectEmail FROM lecturer) as user_Email
where studEmail = '$email'");
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) >0)
	{
		$code = rand(999999,111111);
		$stud_code = "UPDATE student SET code = $code WHERE studEmail = '$email'";
		$lect_code = "UPDATE lecturer SET code = $code WHERE lectEmail = '$email'";
		
		$check_stud = mysqli_query($conn,$stud_code);
		$check_lect = mysqli_query($conn,$lect_code);
		
		if($check_stud || $check_lect)
		{
			$subject = "Password Reset Code";
			$message = "Your password Reset Code is $code";
			$sender = "From: qalphag96@gmail.com";
			if(mail($email, $subject, $message, $sender))
			{
				$info = "We've sent a reset code to your email - <br><b>$email</b>";
				$_SESSION['info'] = $info;
				$_SESSION['email'] = $email;
				header('location:reset_pass.php');
			}
			else
			{
				$err = "ERROR while send";
			}
		}
		else
		{
			$err = "error when update code to db ";
		}
	}
	else
	{
		$err = "Email does not exist";
	}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="img/fci.png">
	<style>
		.ForMain {
			/*				margin-top: 40px;*/
			min-height: 550px;
		}

		.box1 {
			border: 1px solid none;
			width: 30%;
			margin: auto;
			margin-top: 20px;
			text-align: center;
			padding: 10px;
			border-radius: 10px;
			background-color: white;
			box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
			min-height: 200px;
			top: 50%;
			bottom: 50%;
		}

		.box1 input,
		button {
			width: 90%;
			border-radius: 10px;
			border: 0.5px solid black;
			padding: 5px;

		}

		.box1 button {
			background-color: dodgerblue;
			color: white;
			margin: 5px;
			box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
		}

		.box1 input:hover,
		input:active {
			box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;
			border: none;
		}

		.alert_box {
			border: 1px solid none;
			margin-top: -20px;
			margin-bottom: 5px;
			border-radius: 5px;
			color: white;
			background-color: indianred;
			padding: 5px;
		}

	</style>
</head>

<body>
	<?php include_once 'includes/header.php' ?>
	<div class="ForMain">
		<div class="box1">
			<h3>Forgot Password</h3>
			<h6>Enter your email address</h6>
			<?php if($err == ''){
}else{
 ?>
			<div class="alert_box">
				<?php echo "<a>".$err."</a>"; ?>
			</div>
			<?php }	?>
			<form method="post">
				<input type="email" name="email" placeholder="Enter email address"><br>

				<button type="submit" name="submit">Continue</button>
			</form>
		</div>

	</div>
	<?php include_once 'includes/footer.php' ?>
</body>

</html>
