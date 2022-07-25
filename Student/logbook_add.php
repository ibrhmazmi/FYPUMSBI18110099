<?php 
include_once '../includes/config.php'; 
// set time zone UTC+08:00
date_default_timezone_set('Asia/Kuala_Lumpur');

$id = $_SESSION['user'];
$sql = mysqli_query($conn,"SELECT *
FROM project 
INNER  JOIN student 
ON student.Pid = project.Pid
INNER JOIN lecturer
ON lecturer.lectID = project.svid
WHERE student.studID = '$id' ");
if(!$sql){
	die ('Could Not Fetch Data'.mysqli_error());
}
$data = mysqli_fetch_array($sql);

if(isset($_POST['save'])){
	$id = $_SESSION['user'];
	$Pid = $_POST['Pid'];
	$svid = $_POST['sv'];
	$hari = $_POST['date'];
	$pType = $_POST['project'];
	$xtvt = mysqli_real_escape_string($conn,$_POST['activity']);
	$comment = mysqli_real_escape_string($conn,$_POST['comment']);
	$plan = mysqli_real_escape_string($conn,$_POST['plan']);
	$week = $_POST['week'];
	$stud1 = $_POST['stud1'];
	$stud2 = $_POST['stud2'];
	$stud3 = $_POST['stud3'];
	
	$sql = "INSERT INTO logbook (Pid,activities,comment,pType,logdate,week,nextPlan,byWho,stud1,stud2,stud3,svid) VALUES
	('$Pid','$xtvt','$comment','$pType','$hari','$week','$plan','$id','$stud1','$stud2','$stud3','$svid')";
	
	if ($conn->query($sql) === TRUE) 
	{
  header('location:Student.php?view=logbook');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.logBook {
			width: 100%;
			margin: 0 auto;
		}

		.logBook .addB {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		.logBook .addB p {
			text-align: center;
			padding: -5px;
		}

		.logBook .addB .logLabel label {
			font-size: 40px;
		}

		.logBook .addB table,
		tr,
		td {
			/*
			border: 1px solid black;
			border-collapse: collapse;
*/
			
			background-color: whitesmoke;
			width: 100%;
			padding: 5px;
		}
		

		.logBook .addB th {
			text-align: right;
			width: 20%;
		}

		#butt {
			margin-top: 10px;
			width: auto;
		}

	</style>
</head>

<body>
	<div class="logBook">
		<div class="addB">
			<div class="logLabel">
				<label>NEW CONSULTATION LOGBOOK</label>
				<hr>
			</div>
			<form action="" method="post">
				<input name="Pid" value="<?php echo $data['Pid'];?>" hidden>
				<input name="sv" value="<?php echo $data['lectID'];?>" hidden>
				<input name="stud1" value="<?php echo $data['stud1'];?>" hidden>
				<input name="stud2" value="<?php echo $data['stud2'];?>" hidden>
				<input name="stud3" value="<?php echo $data['stud3'];?>" hidden>
				<input name="project" value="<?php echo $_SESSION['type'];?>" hidden>
				<table>
					<tr>
						<th style="color:#659EC7;font-size:110%;">Project's Details</th>
					</tr>
					<tr>
						<th>Project Title :</th>
						<td><strong><?php echo $data['ProjectTitle']; ?></strong></td>
					</tr>

					<tr>
						<th style="color:#659EC7;font-size:110%;">Supervisor's Details</th>
					</tr>
					<tr>
						<th>Supervisor Name :</th>
						<td><?php echo $data['lectName']; ?></td>
					</tr>
					<tr>
						<th style="color:#659EC7;font-size:110%;">STUDENT's Details</th>
					</tr>
					<?php
					$st1 = $data['stud1'];
					$st2 = $data['stud2'];
					$st3 = $data['stud3'];
					$g = mysqli_query($conn,"select studName from student where studID = '$st1'");
					$d = mysqli_fetch_array($g);
					?>
					<tr>
						<th>student 1 :</th>
						<td><?php echo $d['studName']." (".$data['stud1'].")"; ?></td>
					</tr>
					<?php 
					if(!empty($st2)){
						$g = mysqli_query($conn,"select studName from student where studID = '$st2'");
					$d = mysqli_fetch_array($g);
						echo "<tr>
						<th>student 2 :</th>
						<td>{$d['studName']} ({$data['stud2']}) </td>
						</tr>";
					}else{
						echo "";
					}
					if(!empty($st3)){
						$g = mysqli_query($conn,"select studName from student where studID = '$st3'");
					$d = mysqli_fetch_array($g);
						echo "<tr>
						<th>student 3 :</th>
						<td>{$d['studName']} ({$data['stud3']}) </td>
						</tr>";
					}else{
						echo "";
					}
					?>
				</table>
				<hr style="border:none;">
				<table>

					<tr>
						<th>PROJECT :</th>
						<td><?php echo $_SESSION['type'] ?></td>
					</tr>
					<tr>
						<th>Semester/Session :</th>
						<td><?php echo $_SESSION['year'] ?></td>
					</tr>
				</table>
				<hr style="border:none;">
				<table>
					<tr>
						<th>Date:</th>
						<td><input name="date" type="date" value="<?= date('Y-m-d') ?>"></td>
					</tr>
					<tr>
						<th>Week:</th>
						<td><select name="week" style="padding:5px;">
								<option value="Week 1">WEEK 1</option>
								<option value="Week 2">WEEK 2</option>
								<option value="Week 3">WEEK 3</option>
								<option value="Week 4">WEEK 4</option>
								<option value="Week 5">WEEK 5</option>
								<option value="Week 6">WEEK 6</option>
								<option value="Week 7">WEEK 7</option>
								<option value="Week 8">WEEK 8</option>
								<option value="Week 9">WEEK 9</option>
								<option value="Week 10">WEEK 10</option>
								<option value="Week 11">WEEK 11</option>
								<option value="Week 12">WEEK 12</option>
								<option value="Week 13">WEEK 13</option>
								<option value="Week 14">WEEK 14</option>
							</select></td>
					</tr>
					<tr>
						<th>Achievements/ Activities:</th>
						<td><input style="width:100%;" name="activity" type="text"></td>
					</tr>
					<tr>
						<th>what have been discussed</th>
						<td><textarea style="width:100%; resize:none; height:100px;" name="comment"></textarea></td>
					</tr>
					<tr>
						<th>Next Meeting Plan :</th>
						<td><input style="width:100%;" name="plan" type="text"></td>
					</tr>
				</table>
				<input id="butt" type="reset" value="RESET">
				<input id="butt" type="submit" value="SAVE" name="save">
				<input id="butt" onclick="window.location.href='Student.php?view=logbook'" type="button" value="BACK">
			</form>
			<hr>
			<p>This is a computer-generated document. No signature is required.</p>
			<hr>
		</div>

	</div>
</body>

</html>
