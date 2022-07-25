<?php 
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE); 
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
		
		$matric = $_POST['matNum'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$Phone = $_POST['conNum'];
		$role = $_POST['role'];
		$code = $_POST['kod'];
		$workload = $_POST['workload'];
			
		$sql = "INSERT INTO users (iduser,role,password) VALUES('$matric','$role','$matric');";

		$sql1 = "INSERT INTO lecturer(lectID,lectName,lectEmail,lectPhone, programme,workload) VALUES ('$matric','$name','$email','$Phone','$code','$workload')";
	

		if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE ) 
			{
				header('location:Admin.php?view=lecturer');
			} 
			else if ($conn->query($sql) === TRUE && $conn->query($sql1) === FALSE ){
				echo "<br><a style='color:red; background-color: lightblue; padding:5px;margin-left:100px;'> 1 !</a> ";
				exit;
			}
			else if ($conn->query($sql) === FALSE && $conn->query($sql1) === TRUE ){
				echo "<br><a style='color:red; background-color: lightblue; padding:5px;margin-left:100px;'> 2 !</a> ";
				exit;
			}
			else if ($conn->query($sql) === FALSE && $conn->query($sql1) === FALSE ){
				echo "<br><a style='color:red; background-color: lightblue; padding:5px;margin-left:100px;'> 3 !</a> ";
				exit;
			}
			else 
			{
				echo "<br><a style='color:red; background-color: lightblue; padding:5px;margin-left:100px;'> Data Existed !</a> ";
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
while($d = mysqli_fetch_array($sql3))
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