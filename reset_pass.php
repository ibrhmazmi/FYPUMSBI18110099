<?php include_once 'includes/config.php';
error_reporting(E_ALL & ~E_NOTICE);

$info = isset($_SESSION['info']) ? $_SESSION['info'] : '';

if (isset($_POST['submit'])) {
	$code = isset($_POST['code']) ? (int) $_POST['code'] : 0;
	$email = isset($_SESSION['email']) ? trim((string) $_SESSION['email']) : '';

	if ($email === '') {
		$info = 'Session expired. Please start again from Forgot Password.';
	} elseif ($code < 100000 || $code > 999999) {
		$info = '<style>.noty{background-color:indianred;color:white; }</style>Please enter a valid 6-digit code.';
	} else {
		$stmt = mysqli_prepare(
			$conn,
			'SELECT 1 FROM student WHERE studEmail = ? AND code = ?
			 UNION ALL
			 SELECT 1 FROM lecturer WHERE lectEmail = ? AND code = ?
			 LIMIT 1'
		);
		if ($stmt) {
			mysqli_stmt_bind_param($stmt, 'sisi', $email, $code, $email, $code);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$ok = mysqli_stmt_num_rows($stmt) > 0;
			mysqli_stmt_close($stmt);
		} else {
			$ok = false;
		}

		if ($ok) {
			$resetStud = mysqli_prepare($conn, 'UPDATE student SET code = 0 WHERE studEmail = ?');
			$resetLect = mysqli_prepare($conn, 'UPDATE lecturer SET code = 0 WHERE lectEmail = ?');
			$res1 = false;
			$res2 = false;
			if ($resetStud) {
				mysqli_stmt_bind_param($resetStud, 's', $email);
				$res1 = mysqli_stmt_execute($resetStud);
				mysqli_stmt_close($resetStud);
			}
			if ($resetLect) {
				mysqli_stmt_bind_param($resetLect, 's', $email);
				$res2 = mysqli_stmt_execute($resetLect);
				mysqli_stmt_close($resetLect);
			}

			if ($res1 || $res2) {
				$safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
				$noty = "Please Enter New Password for <br><b>{$safeEmail}</b>";
				$_SESSION['noty'] = $noty;
				header('location:reset.php');
				exit;
			}
			$info = 'Error when update code to db ';
		} else {
			$info = "<style>.noty{background-color:indianred;color:white; }</style>You've entered incorrect code";
		}
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
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number] {
			-moz-appearance: textfield;
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
