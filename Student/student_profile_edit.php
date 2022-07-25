<?php
include_once ('../includes/config.php');

error_reporting(E_ALL ^ E_NOTICE);

$msg = "";

if(isset($_POST['save'])){
	
	$image = $_FILES['image']['name'];
	$id = $_SESSION['user'];
	$name = $_POST['name'];
	$contactno = $_POST['contactno'];
	$imgtarget = "upload/student_img/".basename($image);
	
	if (move_uploaded_file($_FILES['image']['tmp_name'], $imgtarget)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
	
	if(empty($_FILES['image']['name'])){
		
		$edit = "UPDATE student
	SET 
	studPhone ='$contactno'
	WHERE studID ='$id'";
	$editProf = mysqli_query($conn,$edit);
	}
	else
	{
		
		$edit = "UPDATE student
	SET
	studPhone ='$contactno',
	studPhoto ='$image'
	WHERE studID ='$id'";
	$editProf = mysqli_query($conn,$edit);
		
	}
	
	
	if ($editProf){
		mysqli_close($conn);
		header("location:Student.php?view=profile");
		exit;
	}else{
		echo mysqli_error($conn);
	}
}



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

	<?php while($udata = mysqli_fetch_array($prof)){
	
	?>

	<div class="main_cont">

		<div class="stud_cont">

			<label>UPDATE PROFILE</label>
			<hr>
			<div class="bg">
				<form id="fProf" method="post" action="" enctype="multipart/form-data">

					<div class="row1">
						<?php if (!$udata['studPhoto']){echo"Please Upload Your Photo";}
	else{ 
		echo "<img style=\"height: 200px;
	width: 200px;\" src='upload/student_img/{$udata['studPhoto']}'>";
		  } ?>
					</div>
					<br>
					<table>
						<tr>
							<td>Add New Profile Image :</td>
							<td><input type="file" name="image" accept=".jpg,.jpeg,.png"></td>
						</tr>


						<div id="sortF">

							<tr>
								<td>Matric Number :</td>
								<td><input id="input" name="" value="<?php echo $udata['studID'];  ?>" type="text" disabled></td>
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
								<td><input id="input" name="name" disabled value="<?php echo $udata['studName'];  ?>" type="text"></td>
							</tr>

							<tr>
								<td>Phone Number :</td>
								<td><input id="input" name="contactno" value="<?php echo $udata['studPhone'];  ?>" type="number"></td>
							</tr>
						</div>
					</table>
					
				
			</div>
<hr>
					
						<input id="butt" type="submit" value="SAVE" name="save">

						<input id="butt" onclick="window.location.href='Student.php?view=profile'" type="button" value="BACK">
					
				</form>


		</div>
	</div>
	<?php  } ?>
</body>

</html>
