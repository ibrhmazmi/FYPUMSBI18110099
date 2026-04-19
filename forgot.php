<?php include_once 'includes/config.php';
error_reporting(E_ALL & ~E_NOTICE);

$email = isset($_POST['email']) ? trim((string) $_POST['email']) : '';
$err = '';

if (isset($_POST['submit'])) {
	if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$err = 'Please enter a valid email address.';
	} else {
		$c_student = 0;
		$c_lecturer = 0;

		$stmt = mysqli_prepare($conn, 'SELECT COUNT(*) FROM student WHERE studEmail = ?');
		if ($stmt) {
			mysqli_stmt_bind_param($stmt, 's', $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $c_student);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}

		$stmt = mysqli_prepare($conn, 'SELECT COUNT(*) FROM lecturer WHERE lectEmail = ?');
		if ($stmt) {
			mysqli_stmt_bind_param($stmt, 's', $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $c_lecturer);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}

		if ($c_student > 0 || $c_lecturer > 0) {
			$code = random_int(100000, 999999);

			$ok_student = true;
			$ok_lecturer = true;

			if ($c_student > 0) {
				$stmt = mysqli_prepare($conn, 'UPDATE student SET code = ? WHERE studEmail = ?');
				if ($stmt) {
					mysqli_stmt_bind_param($stmt, 'is', $code, $email);
					$ok_student = mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);
				} else {
					$ok_student = false;
				}
			}

			if ($c_lecturer > 0) {
				$stmt = mysqli_prepare($conn, 'UPDATE lecturer SET code = ? WHERE lectEmail = ?');
				if ($stmt) {
					mysqli_stmt_bind_param($stmt, 'is', $code, $email);
					$ok_lecturer = mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);
				} else {
					$ok_lecturer = false;
				}
			}

			if ($ok_student && $ok_lecturer) {
				$subject = 'Password Reset Code';
				$message = 'Your password Reset Code is ' . $code;
				$sender = 'From: ' . $mail_from;
				if (mail($email, $subject, $message, $sender)) {
					$safe = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
					$info = "We've sent a reset code to your email - <br><b>{$safe}</b>";
					$_SESSION['info'] = $info;
					$_SESSION['email'] = $email;
					header('location:reset_pass.php');
					exit;
				} else {
					$err = 'ERROR while send';
				}
			} else {
				$err = 'error when update code to db ';
			}
		} else {
			$err = 'Email does not exist';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<?php if ($err !== '') { ?>
			<div class="alert_box">
				<a><?php echo htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?></a>
			</div>
			<?php } ?>
			<form method="post">
				<input type="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter email address"><br>

				<button type="submit" name="submit">Continue</button>
			</form>
		</div>

	</div>
	<?php include_once 'includes/footer.php' ?>
</body>

</html>
