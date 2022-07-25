<?php 
include_once '../includes/config.php';

if(isset($_POST['add']))
{
	$code = $_POST['code'];
	$name = $_POST['name'];
	
	$sql = "INSERT INTO course (CourseCode,CourseName) VALUES ('$code','$name')";
	
	if ($conn->query($sql) === TRUE) 
	{
  header('location:Admin.php?view=course');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.cos_m {
			width: 90%;
			margin: 0 auto;
			margin-top: 20px;
		}

		.cos_m label {
			font-size: 40px;

		}

		.cos_m .cos2 table {
			margin-top: 10px;
		}
		.cos_m .cos2 table th,td{
			padding: 10px;
		}

	</style>
</head>

<body>
	<div class="cos_m">
		<label> ADD NEW COURSE:</label>
		<hr>
		<div class="cos2">
			<form method="post">
				<table>
					<tr>
						<th>CODE:</th>
						<td><input type="text" placeholder="COURSE CODE" required name="code"></td>
					</tr>
					<tr>
						<th>Name:</th>
						<td><input type="text" placeholder="COURSE NAME" required name="name"></td>
					</tr>
					<tr>
						<td><button type="submit" name="add">SUBMIT</button></td>
					</tr>
				</table>
			</form>
			<hr>
		</div>
	</div>
</body>

</html>
