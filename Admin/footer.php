<?php
include_once '../includes/config.php';
$sql = "SELECT * FROM footer";
$view = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($view)){
	

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.footA {
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
		}

		.footA .footB {
			width: 90%;
			margin: 0 auto;
		}

		.footA .footB label {
			font-size: 40px;
		}

		.footA .footB button {
			margin-left: 10px;
		}

		.footA .footB .footC table {
			width: 100%;
		}
		td{
			padding: 10px;
			text-align: center;
			
		}

		#td {
			background-color: lightgrey;
			color: black;
			width: 100%;
			padding: 5px;
		}

		#foot {
			text-align: center;
			background-color: #1e90ff;
			padding: 5px;
			color: white;
		}

	</style>
</head>

<body>
	<div class="footA">
		<div class="footB">
			<label>MANAGE FOOTER</label><button onclick="window.location.href='?view=foot_edit'">EDIT</button>
			<hr>
			<div class="footC">
				<table>
					<tr>
						<td>DISCLAIMER</td>
						<td id="td"><?php echo $row['disclaimer']; ?></td>
					</tr>
					<tr>
						<td>TITLE</td>
						<td id="td"><?php echo $row['title']; ?></td>
					</tr>
					<tr>
						<td>YEAR</td>
						<td id="td"><?php echo $row['year']; ?></td>
					</tr>
					<tr>
						<td>BY</td>
						<td id="td"><?php echo $row['byWho']; ?></td>
					</tr>
				</table>
				<hr>
				<p><b>PREVIEW</b></p>
				<p id="foot">
					<?php echo 
$row['disclaimer']." ".$row['year']." ".$row['title']." @ ".$row['byWho']	;
		;?>
				</p>
				<hr>
			</div>
		</div>
	</div>
</body>

</html>
<?php } ?>
