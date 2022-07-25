<?php
include_once '../includes/config.php';

$svid = $_SESSION['user'];
					$sql = mysqli_query($conn,
											  "SELECT project.ProjectTitle, student.studName, student.studID FROM `project` 
											  INNER JOIN student
											  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3
											  WHERE svid = '$svid'");
					$msg = "NO DATA";
				
					$svTotal = mysqli_num_rows($sql);
					
				
				$x=0;
					if (!$sql){
						die ('Could not get DATA:'. mysqli_error());
					}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.studListMain {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		.studListMain .studLabel {
			font-size: 40px;
		}

		.studListMain .studList table {
			width: 100%;
			border: 1px solid black;
			text-align: left;
			border-collapse: collapse;

		}

		.studListMain .studList th {
			background-color: whitesmoke;
			border: 1px solid black;
			padding: 5px;
			vertical-align:middle;
		}

		.studListMain .studList td {
			/*				text-align: center;*/
			border: 1px solid black;
			padding: 5px;
		}

		#cent {
			text-align: center;
		}

	</style>
</head>

<body>
	<div class="studListMain">
		<div class="studLabel">
			<label>SUPERVISED STUDENT(<a style="color:blue;"><?php echo $svTotal ;?></a>)</label>
		</div>
		<hr>
		<p style="padding:5px;background-color:whitesmoke">**Click student's name to key-in marks**</p>
		<div class="studList">
			<table>
				<tr>
					<th>#</th>
					<th>PROJECT TITLE</th>
					<th>STUDENT NAME</th>
					<th id="cent">FYP 1</th>
					<th id="cent">FYP 2</th>
				</tr>
				<tr>
					<?php
				if (empty($svTotal) ){
					echo "</table><table><td><a style=\"color:red;text-align:center\">NO STUDENT ASSIGNED</a></table>";
				}else{
					
				
					while ($row = mysqli_fetch_array($sql)){
						
						echo "<tr>
						<th>".++$x. "</th>";
					?>
					<td>
						<?php echo $row['ProjectTitle']; ?>
					</td>
					<td>
						<?php echo "<a href=\"?id={$row['studID']}&view=markingSV\">".$row['studName']."</a><br><b>".$row['studID']."</b>"; ?>
					</td>


					<?php 
							$stID = $row['studID'];
							$data = mysqli_query($conn,"Select * FROM marking where studID = '$stID'");
							$m = mysqli_fetch_array($data);
					
//							calculate marks for fyp1
							$fyp1mark = $m['fyp1SVreportW7'] + $m['fyp1SVreportW14'] + $m['fyp1SVprotoW14'] + $m['fyp1SVlogW7'] + $m['fyp1SVlogW14'];
					?>
					<td id="cent"><?php echo $fyp1mark; ?></td>
					<?php
//							calculate marks for fyp2
							$fyp2mark = $m['fyp2SVreportW7'] + $m['fyp2SVreportW14'] + $m['fyp2SVimplementW7'] + $m['fyp2SVimplementW14'] + $m['fyp2SVlogW7'] + $m['fyp2SVlogW14'] + $m['fyp2SVposterW14'];
							?>

					<td id="cent"><?php echo $fyp2mark; ?></td>
				</tr>
				<?php
						}
					}
					
						?>
			</table>
		</div>
		<hr>
		<?php
	
				$svid = $_SESSION['user'];
					$sql = mysqli_query($conn,
											  "SELECT * FROM `project` 
											  INNER JOIN student
											  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3
											  WHERE exid1 = '$svid' or exid2 = '$svid'");
					$msg = "NO DATA";
	$kira2 = mysqli_num_rows($sql);
				$x=0;
					if (!$sql){
						die ('Could not get DATA:'. mysqli_error());
					}
	?>
		<div class="studLabel">
			<label>EXAMINED STUDENT(<a style="color:blue;"><?php echo $kira2; ?></a>)</label>
		</div>
		<hr>
		<div class="studList">
			<table>
				<tr>
					<th>#</th>
					<th>PROJECT TITLE</th>
					<th>STUDENT NAME</th>
					<th id="cent">FYP 1</th>
					<th id="cent">FYP 2</th>
				</tr>
				<tr>
					<?php
					if ($kira2 == 0){
						echo "</table><table><td><a style=\"color:red;text-align:center\">NO STUDENT ASSIGN</a></table>";
					}else{
						
					
					while ($row = mysqli_fetch_array($sql)){
						echo "<tr>
						<th>".++$x. "</th>";
					?>
					<td>
						<?php echo $row['ProjectTitle']; ?>
					</td>
					<td>
						<?php echo "<a href=\"?id={$row['studID']}&view=markingEX\">".$row['studName']."</a><br><b>".$row['studID']."</b>"; ?>
					</td>
					<td id="cent">
						<?php
							$stID = $row['studID'];
							$data = mysqli_query($conn,"Select * FROM marking where studID = '$stID'");
							$exM = mysqli_fetch_array($data);
				if($svid == $row['exid2'] ){
					$fyp1Ex2marking = $exM['fyp1EX2reportW14'] + $exM['fyp1EX2protoW14'] + $exM['fyp1EX2presentW7'] +$exM['fyp1EX2presentW14'];
					echo $fyp1Ex2marking;
				}
							else 
							{
					$fyp1Ex1marking = $exM['fyp1EX1reportW14'] + $exM['fyp1EX1protoW14'] + $exM['fyp1EX1presentW7'] +$exM['fyp1EX1presentW14'];
					echo $fyp1Ex1marking;
				}
					?>
					</td>
					<td id="cent">
						<?php
							if($svid == $row['exid2'] ){
					$fyp2Ex2marking = $exM['fyp2EX2reportW14'] + $exM['fyp2EX2demoW7'] + $exM['fyp2EX2demoW14'] + $exM['fyp2EX2presentW7'] + $exM['fyp2EX2presentW14'];
					echo $fyp2Ex2marking;
				}
							else 
							{
								$fyp2Ex1marking = $exM['fyp2EX1reportW14'] + $exM['fyp2EX1demoW7'] + $exM['fyp2EX1demoW14'] + $exM['fyp2EX1presentW7'] + $exM['fyp2EX1presentW14'];
								echo $fyp2Ex1marking;
				}
							?>
					</td>
				</tr>
				<?php
						
					}
					}
						?>
			</table>
		</div><br>
	</div>
</body>

</html>
