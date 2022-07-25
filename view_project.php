<?php include_once 'includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$PostID = $_GET['id'];
$msg = "";

$sql = mysqli_query($conn,"Select * from svproject where id = '$PostID'");
$row = mysqli_fetch_array($sql);

		if(isset($_POST['login'])){
			$user = $_POST['matric'];
			$pass = $_POST['psw'];
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
			$_SESSION['studDP'] = $row["studPhoto"];
			 
			 if($row['role'] == "student")
			{
				$PostID = $_GET['id'];
				 $_SESSION['PostID'] = $PostID ;
				header('location:Student/Student.php?view=svProject');
			}
			else if($row['role'] == 'lecturer' || $row['role'] == 'admin')
			{
					
				$msg = "Your are not a student! Please login here";
				$_SESSION['msg'] = $msg;
				header('location:Index.php');
			}
			else{
				echo "Incorrect Matric or Password!";
			}
			}
		}
			else
			{
		$msg = "Incorrect Matric or Password !";
		}
			}
	?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="icon" href="img/fci.png">
	<style>
		

		.main {
			margin: 0 auto;
			min-height: 550px;
			width: 100%;
			margin-top: 20px;
		}

		.main label {
			padding: 10px;
			font-size: 40px;
		}

		.viewP {
			margin: 0 auto;
			width: auto;
			background-color: white;
			padding: 10px;
			border-radius: 10px;
			box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
		}

		.viewP table,
		th,
		td,
		tr {
			border: 1px solid none;
			border-collapse: collapse;
			padding: 10px;
			margin: 0 auto;
		}

		.viewP table {
			margin: 0 auto;
			width: 95%;
		}

		.viewP th {
			width: 20%;
			vertical-align: text-top;
			text-align: left;
			background-color: lightgray;
			border: 1px solid white;
			margin: 5px;
		}

		.viewP td {
			width: 80%;
			vertical-align: text-top;
		}

		input,
		button {
			margin: 0 auto;
		}

		input {
			margin: 10px auto;
			width: auto;
		}




		button {
			margin: 10px auto;
			width: 15%;
			border-radius: 10px;
			background-color: dodgerblue;
			color: white;
		}


		.open-button {
			margin: 0 auto;
			width: 25%;
			border-radius: 10px;
			background-color: dodgerblue;
			color: white;
		}

		/* The popup form - hidden by default */
		.form-popup {
			display: none;
			margin: 0 auto;
			bottom: 40%;
			top: 40%;
			left: 40%;
			min-width: 200px;
			min-height: 250px;
			position: fixed;
			border-radius: 10px;
			z-index: 9;
			background-color: white;
			padding: 10px;
			text-align: center;
			box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;

		}

		#btnpop {
			width: 25%;
			margin: 0 auto;
		}


		#b {
			font-size: 10px;
		}
		.alert{
			text-align: center;
			min-width: 200px;
			padding: 10px;
			background-color: indianred;
			color: white;
			margin: 5px;
		}

	</style>

</head>

<body>
	<?php include_once 'includes/header.php' ?>
	<div class="main">
		<label>Project Application</label>
		<hr>
		<?php if($msg !== ""){ ?>
		<div class="alert">
			<?php echo $msg ?>
		</div>
		<?php }
		else{
			
		}?>
		<div class="viewP">
			<table>
				<?php 
	$lectid = $row['svid'];
	$check = mysqli_query($conn,"Select lectName from lecturer where lectID = '$lectid'");
				$d = mysqli_fetch_array($check);
	
				?>
				<tr>
					<th>By</th>
					<td><?php echo $d['lectName'] ?></td>
				</tr>
				<tr>
					<th>Project Title</th>
					<td><?php echo $row['title'] ?></td>
				</tr>
				<tr>
					<th>Description</th>
					<td><?php echo nl2br($row['description']) ?></td>
				</tr>
				<tr>
					<th>Type</th>
					<td><?php echo nl2br($row['type']) ?></td>
				</tr>
				<tr>
					<th>Requirement</th>
					<td><?php echo nl2br($row['requirement']) ?></td>
				</tr>
			</table>

		</div>

		<hr>

		<form method="post">
			<button onclick="window.location.href='Index.php'">BACK</button>

			<button class="open-button" onclick="openForm()">Apply</button>

			<div class="form-popup" id="myForm">
				<form method="post">
					<h4>Login</h4>
					
					<label id="b"><b>Matric Number</b></label><br>
					<input type="text" placeholder="Matric Number " name="matric" required><br>

					<label id="b"><b>Password</b></label><br>
					<input type="password" placeholder="Enter Password" name="psw" required><br>

					<button type="submit" id="btnpop" name="login">Login</button>
					<button type="button" id="btnpop" onclick="closeForm()">Close</button>
				</form>
			</div>
		</form>
	</div>
	<?php include_once 'includes/footer.php' ?>
</body>

</html>
<script>
	function openForm() {
		document.getElementById("myForm").style.display = "block";


	}

	function closeForm() {
		document.getElementById("myForm").style.display = "none";

	}

</script>
