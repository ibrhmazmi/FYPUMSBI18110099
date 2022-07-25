<?php
include_once '../includes/config.php';
$id = $_SESSION['user'];
$sql = "SELECT * FROM lecturer WHERE lectID = '$id'";
$view = mysqli_query($conn,$sql);

if (!$view){
	die('Could not get data:'.mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.pS {
			margin: 0 auto;
			width: 100%;
		}

		.pS .pC {
			margin: 0 auto;
			width: 95%;
			margin-top: 20px;
		}

		.pS .pC .pL label {
			font-size: 40px;
		}

		.pS .pC .sTbl table {
			width: 50%;
		}

		.pS .pC .sTbl td {
			background-color: whitesmoke;
			padding: 5px;
		}

		.pS .pC .sTbl th {
			text-align: left;
			width: 10%;
		}

		.pL button {
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			margin-left: 5px;
		}

	</style>
</head>

<body>
	<div class="pS">

		<div class="pC">
			<div class="pL">
				<label>PROFILE</label>
				<button onclick="window.location.href='?view=profile_edit'">UPDATE PROFILE</button>
				<button onclick="window.location.href='?view=profile_pass'">CHANGE PASSWORD</button>
				<hr>
			</div>
			<div class="sTbl">
				<table>
					<?php
					while ($row = mysqli_fetch_array($view)){
						
					?>
					<tr>
						<th>NAME</th>
						<td> <?php echo $row['lectName'];?> </td>
					</tr>
					<tr>
						<th>MATRIC</th>
						<td> <?php echo $row['lectID'];?> </td>
					</tr>
					<tr>
						<th>PHONE</th>
						<td> <?php echo $row['lectPhone'];?> </td>
					</tr>
					<tr>
						<th>EMAIL</th>
						<td> <?php echo $row['lectEmail'];?> </td>
					</tr>
					<?php 					}

						?>
				</table>
			</div>
			<hr>
		</div>
	</div>
</body>

</html>
