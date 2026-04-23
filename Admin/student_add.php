<?php 
include_once "../includes/config.php";

if (isset($_POST['submit']))
{
	$name = mysqli_real_escape_string($conn, (string) $_POST['name']);
	$matric = mysqli_real_escape_string($conn, (string) $_POST['matric']);
	$courseSel = mysqli_real_escape_string($conn, trim((string) $_POST['courseSel']));
	$email = mysqli_real_escape_string($conn, (string) $_POST['email']);
	$phone = mysqli_real_escape_string($conn, (string) $_POST['phone']);
	$defaultCode = 0;

	mysqli_begin_transaction($conn);
	try {
		$sel = "INSERT INTO users (iduser,role,password) VALUES ('$matric','student','$matric')";
		$sel2 = "INSERT INTO student (studID,studName,studEmail,studPhone,programme,code) VALUES ('$matric','$name','$email','$phone','$courseSel','$defaultCode')";

		if (!$conn->query($sel)) {
			throw new Exception($conn->error);
		}
		if (!$conn->query($sel2)) {
			throw new Exception($conn->error);
		}

		mysqli_commit($conn);
		header('location:Admin.php?view=student');
		exit;
	} catch (Throwable $e) {
		mysqli_rollback($conn);
		echo "<br><a style='color:red; background-color: lightblue; padding:5px;margin-left:100px;'> Insert failed: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</a> ";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/stud_add.css">
</head>

<body>
	<div class="studPlus">
		<label>ADD NEW STUDENT</label>
		<hr>
		<div class="plusCont">
			<form method="post">
				<table>
					<tr>
						<td>NAME :</td>
						<td id="namebox"><input autocomplete="off" type="text" name="name"></td>
					</tr>
					<tr>
						<td>MATRIC NUMBER :</td>
						<td><input autocomplete="off" type="text" name="matric"></td>
						<td>COURSE :</td>
						<td>
							<select name="courseSel">
								<?php
							$sql = mysqli_query($conn,"SELECT * FROM course ORDER BY courseID ASC");	
								
							if(!$sql)
							{
							die ('Could not get Data:'. mysqli_error($conn));
							}
								while ($row = mysqli_fetch_assoc($sql))
								{
									echo "<option value=\"{$row['CourseCode']} \">
									{$row['CourseCode']}</option>";
								}
						?>

							</select>
						</td>
					</tr>
					<tr>
						<td>EMAIL :</td>
						<td><input autocomplete="off" type="email" name="email"></td>
					</tr>
					<tr>
						<td>PHONE NUMBER :</td>
						<td><input autocomplete="off" type="text" name="phone"></td>
					</tr>
					<tr>
						<td></td>

						<td>
							<button type="submit" name="submit">ADD</button>
						</td>
						<td>
							<button type="reset">RESET</button>
						</td>
						<td>
							<button type="reset" onclick='window.location.href="Admin.php?view=student_search"'>BACK</button>
						</td>
					</tr>
				</table>
			</form>
		</div>

		<hr>

	</div>
</body>

</html>
