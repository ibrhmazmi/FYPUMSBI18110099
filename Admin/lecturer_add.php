<?php 
include_once '../includes/config.php';
error_reporting(E_ALL & ~E_NOTICE); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.lectAd {
			width: 90%;
			margin: 0 auto;
			margin-top: 10px;
		}

		.lectAd label {
			font-size: 40px;
		}

		.lectAd .AdCont th {
			background-color: whitesmoke;
			padding: 10px;
			text-align: left;
			width: 20%;
		}

		.lectAd .AdCont td {
			width: 30%;
			padding: 10px;
			text-align: left;
		}

		#adBt {
			margin-top: 10px;
			width: 10%;
			box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
		}

		#sel {
			width: 50%;
		}

		.AdCont option {
			text-align: center;

		}

		#inSt {
			width: 100%;
			box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
		}
	</style>
</head>

<body>
	<div class="lectAd">
		<label>ADD NEW LECTURER</label>
		<?php
		if (isset($_POST['submit']))
		{	
		
		$matric = mysqli_real_escape_string($conn, (string) $_POST['matNum']);
		$name = mysqli_real_escape_string($conn, (string) $_POST['name']);
		$email = mysqli_real_escape_string($conn, (string) $_POST['email']);
		$Phone = mysqli_real_escape_string($conn, (string) $_POST['conNum']);
		$role = mysqli_real_escape_string($conn, (string) $_POST['role']);
		$code = mysqli_real_escape_string($conn, trim((string) $_POST['kod']));
		$workload = (int) $_POST['workload'];
		$defaultCode = 0;
			
		$sql = "INSERT INTO users (iduser,role,password) VALUES('$matric','$role','$matric')";
		$sql1 = "INSERT INTO lecturer(lectID,lectName,lectEmail,lectPhone, programme,workload,code) VALUES ('$matric','$name','$email','$Phone','$code','$workload','$defaultCode')";
	
		mysqli_begin_transaction($conn);
		try {
			if (!$conn->query($sql)) {
				throw new Exception($conn->error);
			}
			if (!$conn->query($sql1)) {
				throw new Exception($conn->error);
			}
			mysqli_commit($conn);
			header('location:Admin.php?view=lecturer');
			exit;
		} catch (Throwable $e) {
			mysqli_rollback($conn);
			echo "<br><a style='color:red; background-color: lightblue; padding:5px;margin-left:100px;'> Insert failed: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</a> ";
			exit;
		}
			}

		?>
		<hr>
		<div class="AdCont">
			<form method="post">
				<table id="sel">
					<tr>
						<th>ROLE:</th>
						<td>
							<select id="inSt" name="role">
								<option id="inSt" value="lecturer">Supervisor/Examiner</option>
								<option id="inSt" value="admin">Coordinator</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>PROGRAMME:</th>
						<td><select id="inSt" name="kod">
								<?php 
	$sql3 = mysqli_query($conn,"SELECT * from course");
while($d = mysqli_fetch_assoc($sql3))
							{
		echo "<option id=\"inSt\" value=\"{$d['CourseCode']}\">{$d['CourseCode']} </option>";
							}							
							?>
							</select>
						</td>
					</tr>
					<tr>
						<th>MATRIC NUMBER:</th>
						<td> <input id="inSt" type="text" name="matNum" required></td>
					</tr>
					<tr>
						<th>NAME:</th>
						<td> <input id="inSt" type="text" name="name" required></td>
					</tr>
					<tr>
						<th>EMAIL:</th>
						<td> <input id="inSt" type="email" name="email" required></td>
					</tr>
					<tr>
						<th>CONTACT NUMBER:</th>
						<td> <input id="inSt" type="number" name="conNum"></td>
					</tr>
					<tr>
						<th>Workload:</th>
						<td> <input id="inSt" type="number" name="workload" required></td>
					</tr>
				</table>
				<hr>
				<input id="adBt" type="button" onclick="window.history.back()" value="BACK">
				<button id="adBt" type="submit" name="submit">ADD</button>

			</form>
		</div>
	</div>

</body>

</html>