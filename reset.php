<?php include_once 'includes/config.php';
error_reporting(E_ALL & ~E_NOTICE);

$noty = isset($_SESSION['noty']) ? $_SESSION['noty'] : '';
$email = isset($_SESSION['email']) ? trim((string) $_SESSION['email']) : '';

if ($email === '') {
	header('Location: forgot.php');
	exit;
}

if (isset($_POST['reset'])) {
	$pass1 = isset($_POST['pass']) ? (string) $_POST['pass'] : '';
	$pass2 = isset($_POST['confirm_pass']) ? (string) $_POST['confirm_pass'] : '';

	if ($pass1 !== $pass2) {
		$noty = "<style>.alert{background-color:indianred;color:white;} </style>Confirmed Password not matched";
	} else {
		$stmt = mysqli_prepare(
			$conn,
			'SELECT studID AS uid FROM student WHERE studEmail = ?
			 UNION ALL
			 SELECT lectID AS uid FROM lecturer WHERE lectEmail = ?
			 LIMIT 1'
		);
		$id = null;
		if ($stmt) {
			mysqli_stmt_bind_param($stmt, 'ss', $email, $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $uid);
			if (mysqli_stmt_fetch($stmt)) {
				$id = $uid;
			}
			mysqli_stmt_close($stmt);
		}

		if ($id !== null && $id !== '') {
			$up = mysqli_prepare($conn, 'UPDATE users SET password = ? WHERE iduser = ?');
			if ($up) {
				mysqli_stmt_bind_param($up, 'ss', $pass1, $id);
				$run = mysqli_stmt_execute($up);
				mysqli_stmt_close($up);
				if ($run) {
					unset($_SESSION['email'], $_SESSION['noty'], $_SESSION['info']);
					header('Location: Index.php');
					exit;
				}
			}
			$noty = 'Failed to change your password';
		} else {
			$noty = 'ERROR when fetch data';
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

		.passRes {
			margin: 0 auto;
			margin-top: 20px;
			padding: 10px;
			border: 1px solid black;
			border-radius: 10px;
			text-align: center;
			width: 40%;
			background-color: white;
		}

		.passRes input {
			width: 70%;
			border-radius: 10px;
			padding: 5px;
			margin: 5px;
		}

		.passRes button {
			width: 50%;
			background-color: dodgerblue;
			color: white;
			border-radius: 10px;
			padding: 5px;
		}

		.passRes h1 {
			padding: 0;
			margin: 0;
		}

		.alert {
			width: 90%;
			background-color: palegreen;
			color: black;
			margin: 0 auto;
			margin-top: 10px;
			padding: 5px;
			border-radius: 10px;
		}

	</style>
</head>

<body>
	<?php include_once 'includes/header.php' ?>
	<div class="main">
		<form method="post">
			<div class="passRes">
				<h1>RESET PASSWORD</h1>
				<div class="alert">
					<?php echo $noty
				?>
				</div>
				<input type="password" placeholder="new password" name="pass"><br>
				<input type="password" placeholder="confirm new password" name="confirm_pass"><br>
				<button type="submit" name="reset">RESET</button>

			</div>
		</form>
	</div>
	<?php include_once 'includes/footer.php' ?>
</body>

</html>
