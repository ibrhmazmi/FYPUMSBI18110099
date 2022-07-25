<?php
include_once "config.php";
$msg="";
if(!empty($_SESSION['msg']))
{
$msg = $_SESSION['msg'];
}else{
	$msg = "";
}
?>
<html>

<head>

	<link rel="stylesheet" href="css/log.css">
</head>

<body>
	<div class="left-bar">

		<div class="logBox">

			<form action="" method="post">
				<br>
				<div class="box">
					<center>
						<label>Matric Number</label><br>
						<input autocomplete="off" type="text" name="userid" placeholder="Matric Number" required><br>

						<label>Password</label><br>
						<input autocomplete="off" type="password" name="password" placeholder="Password" required><br>
						<?php	

if(isset($_POST["subbut"])){
	
			$user = $_POST["userid"];
			$pass = $_POST["password"];
	
		$query = 
		"SELECT * 
		FROM users 
		LEFT JOIN student ON student.studID = users.iduser 
		LEFT JOIN lecturer ON lecturer.lectID = users.iduser 
		WHERE users.iduser = '$user' 
		AND users.password= '$pass' ";
	
	$result = mysqli_query($conn,$query);
	
	if(mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['user'] = $row["iduser"];
			$_SESSION['role'] = $row["role"];
			$_SESSION['studName'] = $row["studName"];
			$_SESSION['lectName'] = $row["lectName"];
			$_SESSION['studDP'] = $row["studPhoto"];
			
			
			if($row["role"] == "admin")
			{
				header('location:Admin/Admin.php');
			}
			
			else if($row["role"] == "lecturer")
			{
				header('location:Lecturer/lecturer.php');
			}
			
			else 
			{
				header('location:Student/Student.php');
			}
			
			}
		}
	
else
{
//	header('location:index.php');
	$msg = "Incorrect Matric or Password !";
		
	}
}
?>
						<div class="noty">
						<?php echo $msg; ?>
						</div>
						<h5><a href="forgot.php">Forgot password?</a></h5>
						
						<button value="submit" name="subbut" id="subbut" type="submit">Login</button>
					</center>
				</div>
			</form>

		</div>

	</div>

</body>

</html>
