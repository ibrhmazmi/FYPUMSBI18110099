<?php
include_once "../includes/config.php";

error_reporting(E_ALL ^ E_NOTICE);


$id = $_SESSION['user'];

$viewprof = "SELECT * 
FROM student
WHERE studID = '$id' ";
$prof = mysqli_query($conn,$viewprof);
if (! $prof){
	die('Could not get data:'.mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/student_profile.css">
</head>

<body>

	<?php 

	while($udata = mysqli_fetch_array($prof)){
	
  
	?>
	<div class="main_cont">
		<div class="stud_cont">
			<div class="">
				<label>USER PROFILE</label>

				<input id="butt" type="button" id="#edit_btn" onclick="window.location.href='?view=edit'" value="UPDATE PROFILE">
				<input id="butt" type="button" id="#edit_btn" onclick="window.location.href='?view=password'" value="CHANGE PASSWORD">

			</div>
			<hr>
			<div class="bg">
				<form id="fProf" method="" action="">

					<div class="row1">

						<?php if (!$udata['studPhoto']){ 
		echo "<img style=\"height: 200px;
	width: 200px;  \" src='upload/student_img/dp.png'>";}
	else{ 
		echo "<img style=\"height: 200px;
	width: 200px;  \" src='upload/student_img/{$udata['studPhoto']}'>";
		  } ?>
					</div>
					<br>
					<div id="sortF">
						<table>
							<tr>
								<td>
									Matric Number :
								</td>
								<td> <input id="input" name="" value="<?php echo $udata['studID'];  ?>" type="text" disabled>
								</td>
							</tr>
							<tr>
								<td>Programme :</td>
								<td><input id="input" name="" value="<?php echo $udata['programme'];  ?>" type="text" disabled></td>
							</tr>
							<tr>
								<td>Email Address :</td>
								<td><input id="input" name="" value="<?php echo $udata['studEmail'];  ?>" type="email" disabled></td>
							</tr>

							<tr>
								<td>Name :</td>
								<td> <input id="input" name="" value="<?php echo $udata['studName'];  ?>" type="text" disabled></td>
							</tr>

							<tr>
								<td>Phone Number :</td>
								<td><input id="input" name="" value="<?php echo $udata['studPhone'];  ?>" type="text" disabled></td>
							</tr>

						</table>
					</div>
				</form>
			</div>
			<hr>
		</div>
	</div>
	<?php  } ?>
</body>

</html>
