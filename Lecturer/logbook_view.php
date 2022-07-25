<?php
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE); 
$id = $_GET['id'];



$sql1 = mysqli_query($conn,"SELECT * from project where Pid ='$id'");
$row = mysqli_fetch_array($sql1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.logView {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		.logLabel label {
			font-size: 20px;
		}

		button {
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			margin-bottom: 15px;
		}

		.logCont table {
			width: 100%;
		}

		.logCont table,
		th,
		td {
			border: 1px solid lightgrey;
			border-collapse: collapse;
			padding: 5px;
		}

		.logCont th {
			background-color: whitesmoke;
		}

		#stat {
			text-align: center;
		}

	</style>
</head>

<body>
	<div class="logView">
		<div class="logLabel">
			<label><?php echo $row['ProjectTitle']; ?>'S LOGBOOK</label>

		</div>
		<hr>
		<div class="logCont">
			<button type="button" onclick='window.location.href="lecturer.php?view=logbook"'>BACK</button>
			<table>
				<tr>
					<th>NO</th>
					<th>WEEK(s)</th>
					<th>DATE</th>
					<th>ACTIVITIES</th>
					<th>LAST UPDATE</th>
					<th>STATUS</th>
					<th>ACTION</th>
				</tr>

				<?php 
					$sql = mysqli_query($conn,"Select * from logbook where Pid = '$id' order by logdate");
						$x=0;
				$kira = mysqli_num_rows($sql);
				if(empty($kira)){
					echo "</table><table><td><a style=\"color:red;text-align:center\">NO logbook available</a>";
				}
				else
				{
					while($data = mysqli_fetch_array($sql)){
						
					
					echo "<tr>";
					echo "<th>".++$x."</th>";
					echo "<td>".$data['week']."</td>";
					echo "<td>".$data['logdate']."</td>";
					echo "<td>".$data['activities']."</td>";
						
						//check last update by who?
						$uID = $data['byWho'];
						$stu = mysqli_query($conn,"SELECT * FROM student  where studID = '$uID'  ");
						$g = mysqli_fetch_array($stu);
						if($uID == $g['studID']){
					echo "<td>".$g['studName']."</td>";
							}
						else{
							$svu = mysqli_query($conn,"SELECT * FROM lecturer  where lectID = '$uID'  ");
						$g1 = mysqli_fetch_array($svu);
							echo "<td>".$g1['lectName']."</td>";
						}
						//check status 
						if($data['status'] == 0){
							echo "<td id=\"stat\" style=\"background-color:red;color:white\">UNCHECK</td>";
						}else{
							echo "<td id=\"stat\" style=\"background-color:green;color:white\">CHECK</td>";
						}
					
					echo "<td id=\"stat\"><a href=\"?id={$data['logID']}&view=logbookEdit\"><img style=\"width:25px;height:25px\" src=\"img/edit.png\"></a></td>";
					echo "</tr>";
					}
				}
					?>

			</table>
		</div>
	</div>
</body>

</html>
