<?php include_once '../includes/config.php';

$id = $_SESSION['user'];

$sql = mysqli_query($conn,"SELECT * FROM
logbook WHERE stud1 = '$id' OR stud2 = '$id' or stud3 = '$id' ORDER BY week  ");
$kira = mysqli_num_rows($sql);
if(!$sql){
	die ('Could not fetch data!'.mysqli_error());
}
$x = 0;
	
	$check = mysqli_query($conn,"SELECT svid FROM project where stud1 = '$id' or stud2 = '$id' or stud3 = '$id'");
if(!$check){
	die ('Could not fetch data!'.mysqli_error());
}
$tick = mysqli_fetch_array($check);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		a {
			text-decoration: none;
		}

		.logMain {
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
		}

		.logMain .logStyle {
			width: 95%;
			margin: 0 auto;

		}

		.logMain .logStyle .logLabel {
			font-size: 40px;
		}

		.logMain .logStyle .logCont table {
			width: 100%;
			border: 1px solid black;
			border-collapse: collapse;

		}

		.logMain .logStyle .logCont tr,
		td,
		th {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
			padding: 5px;
		}

		.logMain .logStyle .logCont th {
			background-color: whitesmoke;
			height: 20px;
		}

		.logMain .logStyle .logCont .notice {
			background-color: whitesmoke;
			padding-left: 5px;
			padding-top: 5px;
			padding-bottom: 5px;
			font-size: 12px;
			margin-bottom: 10px;
		}

		img {
			height: 25px;
			width: 25px;
		}
		#butt{
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		}
	</style>
</head>

<body>
	<div class="logMain">
		<div class="logStyle">
			<div class="logLabel">
				<label>LOGBOOK</label>
				<?php if (empty($tick['svid'])){
	?>
				<input id="butt" type="button" disabled value="ADD " onclick='window.location.href="Student.php?view=logadd"'>
				<?php
} else {
	?>
				<input id="butt" type="button" value="ADD " onclick='window.location.href="Student.php?view=logadd"'>
				<?php
}
	 ?>
			</div>
			<hr>
			<div class="logCont">
				<div class="notice">
					<p>MINIMUM : 6 TIMES</p>
					<p> CURRENT COUNT : <?php echo $kira; ?></p>
				</div>
				<table>
					<tr>
						<th>NO</th>
						<th>WEEK</th>
						<th>DATE</th>
						<th>ACTIVITIES</th>
						<th>STUDENT(s)</th>
						<th>STATUS</th>
						<th>ACTION</th>
					</tr>

					<?php
					if($kira == 0){
						echo "</table><table><td><a style=\"color:red\">Please Create a Logbook!</a></td></table>";
					}
					else{
					while ($row = mysqli_fetch_array($sql)){
						
					echo "<tr>
						<th>" .++$x. "</th>";
					?>
					<td><?php echo $row['week'] ?></td>
					<td><?php echo $row['logdate'] ?></td>
					<td><?php echo $row['activities'] ?></td>
					<td><?php 
						$stu1 = $row['stud1'];
						$checkName = mysqli_query($conn,"Select studName from student where studID = '$stu1'");
						$d = mysqli_fetch_array($checkName);
						echo "1.". $d['studName'];
						
							if ($row['stud2'] != null){ 
								$stu2 = $row['stud2'];
						$checkName = mysqli_query($conn,"Select studName from student where studID = '$stu2'");
						$d = mysqli_fetch_array($checkName);
								echo "<br>2.".$d['studName']; }
						else {
							echo "";
						}
						
						if ($row['stud3'] != null){ 
							$stu3 = $row['stud3'];
						$checkName = mysqli_query($conn,"Select studName from student where studID = '$stu3'");
						$d = mysqli_fetch_array($checkName);
							echo "<br>3.".$d['studName']; }
						else {
							echo "";
						}
							
							?></td>
					<?php 
						$stat = $row['status'];
						if ($stat == 1){
						echo "<td style=\"background-color:green; color:white\">check</td>" ;
						}else{
							echo "<td style=\"background-color:red; color:white\">uncheck</td>";
						}
						?>
					<td>
						<?php 
							echo "<a href=\"?id={$row['logID']}&view=logview\"><img src=\"img/view.png\"></a>
							<a href=\"?id={$row['logID']}&view=logedit\"><img src=\"img/edit.png\"></a>"
								
								?>

					</td>
					</tr>
					<?php
											}}
					

						?>
				</table>
			</div>
			<hr>
		
		</div>
	</div>
</body>

</html>
