<?php
include_once '../includes/config.php';
if(isset($_POST['submit'])){
	
	$id = $_SESSION['user'];
	
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$sql = "UPDATE lecturer
	SET 
	lectPhone = '$phone',
	lectEmail = '$email'
	WHERE lectID = '$id'";
	$edit = mysqli_query($conn,$sql);
	
	if ($edit){
		mysqli_close($conn);
		header("location:lecturer.php?view=profile");
		exit;
	}else{
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.proEdit {
			width: 100%;
			margin: 0 auto;
		}

		.proEdit .proCont {
			width: 90%;
			margin: 0 auto;
		}

		.proEdit .proCont .proLable {
			margin-top: 10px;
		}

		.proEdit .proCont .proLable label {
			font-size: 40px;
		}

		.proEdit .proCont table {
			width: 50%;
		}

		.proEdit .proCont td {
			padding: 5px;
		}

		.proEdit .proCont input {
			width: 100%;
		}
		#butt{
			width: auto;
			margin-left: 10px;
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		}

	</style>
</head>

<body>
	<div class="proEdit">
		<?php 
		$id = $_SESSION['user'];
		$sql = "SELECT * FROM lecturer 
		where lectID = '$id'";
		$edit = mysqli_query ($conn,$sql);
		if (!$edit)
		{
		die('Could not get data:'.mysqli_error($conn));
}
		while ($row = mysqli_fetch_array($edit)){
			
		
		
		?>
		<div class="proCont">
			<div class="proLable">
				<label>EDIT <?php echo $row['lectID'] ?> PROFILE</label>
				<hr>
			</div>
			<form method="post">
				<table>
					<tr>
						<td>MATRIC</td>
						<td><input disabled type="text" value="<?php echo $row['lectID'] ?>"></td>
					</tr>
					<tr>
						<td>NAME</td>
						<td><input disabled type="text" value="<?php echo $row['lectName'] ?>"></td>
					</tr>
					<tr>
						<td>PHONE</td>
						<td><input name="phone" type="text" value="<?php echo $row['lectPhone'] ?>"></td>
					</tr>
					<tr>
						<td>EMAIL</td>
						<td><input name="email" type="email" value="<?php echo $row['lectEmail'] ?>"></td>
					</tr>




				</table>
				<hr>
				<input id="butt" type="button" onclick="window.history.go(-1); return false;" value="BACK">
				<input id="butt" type="submit" name="submit" value="UPDATE">
			</form>
			<br>

			
		</div>
		<?php } ?>
	</div>
</body>

</html>
