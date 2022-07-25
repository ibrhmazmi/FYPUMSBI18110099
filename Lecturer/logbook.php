<?php
include_once '../includes/config.php';
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

		.logView .logLabel label {
			font-size: 40px;
		}

		.logView .logList {
			width: 100%;
		}

		.logView .logList table {
			width: 100%;
			border: 1px solid black;
			border-collapse: collapse;
		}

		.logView .logList th,
		td {
			border: 1px solid black;
			padding: 5px;
			vertical-align: text-top;

		}

		.logView .logList th {
			background-color: whitesmoke;
		}

		#acTD {
			/*			width: 10%;*/
			padding: none;
			margin: none;
			text-align: center;

		}

	</style>
</head>

<body>
	<div class="logView">
		<div class="logLabel">
			<label>STUDENT'S LOGBOOK LIST</label>
		</div>
		<hr>
		<div class="logList">
			<table>
				<tr>
					<th>#</th>
					<th>PROJECT TITLE</th>
					<th>STUDENT(s)</th>
					<th>LOGBOOK's COUNT</th>
					<th>ACTION</th>
				</tr>
				<?php 
				$supID = $_SESSION['user'];
				
				$sql = mysqli_query($conn,"SELECT * FROM project 
				WHERE svid = '$supID'");
				if (!$sql){
						die ('Could not get DATA:'. mysqli_error());
					}
				$x=0;
				$svTotal = mysqli_num_rows($sql);
				if(empty($svTotal)){
					echo "</table><table><td><a style=\"color:red;text-align:center\">NO STUDENT ASSIGNED</a></table>";
				}else{
					
				while ($row= mysqli_fetch_array($sql)){
					
					$pid = $row['Pid'];
					echo "<tr> 
					<th>".++$x."</th> 	<td>".$row['ProjectTitle']."</td>
					<td>";
					
					//retrieve student names
					$id1 = $row['stud1'];
					$id2 = $row['stud2'];
					$id3 = $row['stud3'];

					$qName = mysqli_query($conn,"SELECT studName FROM student where studID = '$id1' ");
					if(!$qName){
						die ('Could not fetch data!'.mysqli_error());
					}
					
					while($stName = mysqli_fetch_array($qName)){
					
					echo $stName['studName']."<br>".$row['stud1'];
						}
					
					echo	"<br>";
					
					$qName = mysqli_query($conn,"SELECT studName FROM student where studID = '$id2' ");
					if(!$qName){
						die ('Could not fetch data!'.mysqli_error());
					}
					
					while($stName = mysqli_fetch_array($qName)){
					echo	$stName['studName']."<br>".$row['stud2'];
					}
					
					echo	"<br>";
					
					$qName = mysqli_query($conn,"SELECT studName FROM student where studID = '$id3' ");
					if(!$qName){
						die ('Could not fetch data!'.mysqli_error());
					}
					
					while($stName = mysqli_fetch_array($qName)){
					echo	$stName['studName']."<br>".$row['stud3'];
					}
					//retrieve student names END
					//retrieve logbook count 
					$logCount = mysqli_query($conn,"SELECT * FROM logbook
					INNER JOIN project
					ON
					project.Pid = logbook.Pid
					WHERE logbook.Pid = '$pid' ");
					$kira = mysqli_num_rows($logCount);
					if(!$logCount){
						die ('Could not fetch data!'.mysqli_error());
					}
					
					if ($kira >= 6){
					echo "<td style=\"background-color:#90EE90;color:black;text-align:center\">".$kira. "</td>";
					} 
					else if ($kira > 0){
						echo "<td style=\"background-color:red;color:white;text-align:center\">".$kira. "</td>";
					}
					else{
						echo "<td style=\"background-color:red;color:white;text-align:center\">".$kira. "</td>";
					}
					
					echo "<td id=\"acTD\">
					<a href=\"?id={$row['Pid']}&view=logbookView\"><img style=\"width:25px;height:25px\" src=\"img/view.png\"></a>
					
					</td>
				</tr> ";	
				}				}

				?>

			</table>
			<hr>
			<br>
		</div>
	</div>
</body>

</html>
