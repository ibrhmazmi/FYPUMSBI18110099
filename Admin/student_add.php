<?php 
include_once "../includes/config.php";

if (isset($_POST['submit']))
{
	$name = $_POST['name'];
	$matric = $_POST['matric'];
	$courseSel = $_POST['courseSel'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	
	$sel = "INSERT INTO users (iduser,role,password) 
	VALUES
	('$matric','student','$matric')";
	
	$sel2 = "INSERT INTO student (studID,studName,studEmail,studPhone,programme) VALUES ('$matric','$name','$email','$phone','$courseSel')";
	
	if ($conn->query($sel) === TRUE && $conn->query($sel2) === TRUE ) 
			{
				header('location:Admin.php?view=student');
			} 
			else 
			{
				echo "<br><a style='color:red; background-color: lightblue; padding:5px;margin-left:100px;'> Data Existed !</a> ";
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
							die ('Could not get Data:'. mysqli_error());
							}
								while ($row = mysqli_fetch_array($sql))
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
