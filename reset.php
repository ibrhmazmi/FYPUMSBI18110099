<?php include_once 'includes/config.php';
error_reporting(E_ALL ^ E_NOTICE); 
$noty = $_SESSION['noty'];
$email = $_SESSION['email'];

if(isset($_POST['reset']))
{
	$pass1 = $_POST['pass'];
	$pass2 = $_POST['confirm_pass'];
	
	if ($pass1 !== $pass2)
	{
		$noty = "<style>.alert{background-color:indianred;color:white;} </style>Confirmed Password not matched";
	}
	else
	{
		$sql ="Select *
FROM
(SELECT studEmail,studID,code FROM student 
UNION 
SELECT lectEmail,lectID,code FROM lecturer) as A
where A.studEmail = '$email'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$id = $row['studID'];
		if(mysqli_num_rows($result) >0)
		{
			$up = "Update users SET password = '$pass1' 
			where iduser = '$id'";
			$run = mysqli_query($conn,$up);
			if($run)
			{
				header('Location: Index.php');
			}
			else
			{
				$noty = "Failed to change your password";
			}
		}
		else
		{
			$noty = "ERROR when fetch data";
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
