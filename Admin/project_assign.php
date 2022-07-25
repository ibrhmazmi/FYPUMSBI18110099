<?php 
include_once "../includes/config.php";
error_reporting(E_ALL ^ E_NOTICE); 

$id = $_GET['id'];

$sql = mysqli_query($conn,"select * from project where Pid = '$id'");
$row = mysqli_fetch_array($sql);



if(isset($_POST['assign'])){
$sv = $_POST['sv'];
$ex1 = $_POST['exid1'];
$ex2 = $_POST['exid2'];
	
$sql = mysqli_query($conn,"
UPDATE project SET svid ='$sv', exid1 = '$ex1', exid2 = '$ex2'
WHERE Pid = '$id'");
	  if($sql)
    {
        mysqli_close($conn); // Close connection
        header("location:Admin.php?view=projectList"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    } 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.cont {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		.label label {
			font-size: 40px;
		}

		.assign table,
		th,
		td,
		tr {

			vertical-align: text-top;
		}

		.assign table {
			width: 100%;
			background-color: whitesmoke;

		}

		.assign td {
			padding: 10px;

		}

		.assign select {
			margin-left: 150px;
			text-align: center;
			box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
			float: right;
			padding: 5px;
		}

		.assign input {
			margin-top: 10px;
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			margin-left: 10px;
		}

		#t2 {
			width: 30%;
		}

	</style>
</head>

<body>
	<div class="cont">
		<div class="label">
			<label>ASSIGN SUPERVISOR AND EXAMINERS</label>
		</div>
		<hr>
		<div class="assign">
			<table>
				<tr>
					<td>
						Project Title:<br>
						<?php echo $row['ProjectTitle'];?>
					</td>
				</tr>
				<tr>
					<td>
						STUDENT(s):<br>
						<?php 
			$stid = $row['stud1'];
			$stid2 = $row['stud2'];
			$stid3 = $row['stud3'];
			
			$c = mysqli_query($conn,"select studName from student where studId ='$stid'");
			$d = mysqli_fetch_array($c);
			
			echo "1. ".$d['studName']."<br>".$row['stud1']; ?>
						<?php 
			if (!empty($row['stud2'])){
				$c = mysqli_query($conn,"select studName from student where studId ='$stid2'");
			$d = mysqli_fetch_array($c);
				
				echo "<br>2. ".$d['studName']."<br>".$row['stud2'];
			}else{
				
			}
			if (!empty($row['stud3'])){
				$c = mysqli_query($conn,"select studName from student where studId ='$stid3'");
			$d = mysqli_fetch_array($c);
				
				echo "<br>3. ".$d['studName']."<br>".$row['stud3'];
			}else{
				
			}
			?>

					</td>
				</tr>
			</table>
			<br>
			<form method="POST">
				<table id="t2">
					<!--				supervisor-->
					<tr>
						<td>
							SUPERVISOR DETAILS:
							<br>
							<?php 
				$svid = $row['svid'];
				$exid1 = $row['exid1'];
				$exid2 = $row['exid2'];
				if (!empty($svid)){
				$sql = mysqli_query($conn,"SELECT lectName FROM lecturer where lectID = '$svid'");
				$sname = mysqli_fetch_array($sql);
				echo $sname['lectName'];
					echo "<br>".$row['svid'];
				echo "<select name=\"sv\">
				<option value=\"{$svid}\">SELECT SUPERVISOR
				</option>
				<option value=\"\">REMOVE</option>";
					
				$sql = mysqli_query($conn,"select * FROM lecturer where lectID != '$svid' and lectID != '$exid1' and lectID != '$exid2'and workload_status != 'Full'");
		while($data = mysqli_fetch_array($sql)){
		$id = $data['lectID'];
			//check total supervise
			$svstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where svid = '$id' ");
	$kira = mysqli_num_rows($svstu);
			//checl total examine
			$exstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where exid1 = '$id' or exid2 = '$id' ");
	$kira2 = mysqli_num_rows($exstu);
			//count current workload
			$total = $kira + $kira2;
			
			$check = mysqli_query($conn,"Select * from lecturer where lectID = '$id' ");
			$lihat = mysqli_fetch_array($check);
		echo 
		"
		<option value=".$data['lectID'].">".$data['lectName']." (".$total."/".$lihat['workload'].")</option>";
					}
					echo "</select>";
					
				}
				else{
					$svid = $row['svid'];
				$exid1 = $row['exid1'];
				$exid2 = $row['exid2'];
				echo " 
				<a style=\"color:red;text-align:center\">NOT ASSIGN </a>
				<select name=\"sv\">
				<option value=\"{$svid}\">SELECT SUPERVISOR
				</option><option value=\"\">REMOVE</option>";
				$sql = mysqli_query($conn,"select * FROM lecturer where lectID != '$svid' and lectID != '$exid1' and lectID != '$exid2'and workload_status != 'Full'");
		while($data = mysqli_fetch_array($sql)){
				$id = $data['lectID'];
			//check total supervise
			$svstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where svid = '$id' ");
	$kira = mysqli_num_rows($svstu);
			//checl total examine
			$exstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where exid1 = '$id' or exid2 = '$id' ");
	$kira2 = mysqli_num_rows($exstu);
			//count current workload
			$total = $kira + $kira2;
			
			$check = mysqli_query($conn,"Select * from lecturer where lectID = '$id' ");
			$lihat = mysqli_fetch_array($check);
		echo 
		"
		<option value=".$data['lectID'].">".$data['lectName']." (".$total."/".$lihat['workload'].")</option>";
					}
					echo "</select>";
				
				
				}?>
						</td>
					</tr>
					<!--					examiner 1-->
					<tr>
						<td>
							EXAMINER 1 DETAILS:
							<br>
							<?php 
				$svid = $row['svid'];
				$exid1 = $row['exid1'];
				$exid2 = $row['exid2'];
				if (!empty($exid1)){
				$sql = mysqli_query($conn,"SELECT lectName FROM lecturer where lectID = '$exid1'");
				$sname = mysqli_fetch_array($sql);
				echo $sname['lectName'];
					echo "<br>".$row['exid1'];
					
				echo "<select name=\"exid1\">
				<option value=\"{$exid1}\">SELECT EXAMINER 1
				</option><option value=\"\">REMOVE</option>";
				$sql = mysqli_query($conn,"select * FROM lecturer where lectID != '$svid' and lectID != '$exid1' and lectID != '$exid2' and workload_status != 'Full'");
		while($data = mysqli_fetch_array($sql)){
		$id = $data['lectID'];
			//check total supervise
			$svstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where svid = '$id' ");
	$kira = mysqli_num_rows($svstu);
			//checl total examine
			$exstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where exid1 = '$id' or exid2 = '$id' ");
	$kira2 = mysqli_num_rows($exstu);
			//count current workload
			$total = $kira + $kira2;
			
			$check = mysqli_query($conn,"Select * from lecturer where lectID = '$id' ");
			$lihat = mysqli_fetch_array($check);
		echo 
		"
		<option value=".$data['lectID'].">".$data['lectName']." (".$total."/".$lihat['workload'].")</option>";
					}
					echo "</select>";
					
					
					
				
				}
				else{
					$svid = $row['svid'];
				$exid1 = $row['exid1'];
				$exid2 = $row['exid2'];
				echo " 
				<a style=\"color:red;text-align:center\">NOT ASSIGN </a>
				<select name=\"exid1\">
				<option value=\"{$exid1}\">SELECT EXAMINER 1
				</option><option value=\"\">REMOVE</option>";
				$sql = mysqli_query($conn,"select * FROM lecturer where lectID != '$svid' and lectID != '$exid1' and lectID != '$exid2' and workload_status != 'Full'");
		while($data = mysqli_fetch_array($sql)){
		$id = $data['lectID'];
			//check total supervise
			$svstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where svid = '$id' ");
	$kira = mysqli_num_rows($svstu);
			//checl total examine
			$exstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where exid1 = '$id' or exid2 = '$id' ");
	$kira2 = mysqli_num_rows($exstu);
			//count current workload
			$total = $kira + $kira2;
			
			$check = mysqli_query($conn,"Select * from lecturer where lectID = '$id' ");
			$lihat = mysqli_fetch_array($check);
		echo 
		"
		<option value=".$data['lectID'].">".$data['lectName']." (".$total."/".$lihat['workload'].")</option>";
					}
					echo "</select>";
				
				
				}?>
						</td>
					</tr>
					<!--					examiner 2-->
					<tr>
						<td>
							EXAMINER 2 DETAILS:
							<br>
							<?php 
				$svid = $row['svid'];
				$exid1 = $row['exid1'];
				$exid2 = $row['exid2'];
				if (!empty($exid2)){
				$sql = mysqli_query($conn,"SELECT lectName FROM lecturer where lectID = '$exid2'");
				$sname = mysqli_fetch_array($sql);
				echo $sname['lectName'];
					echo "<br>".$row['exid2'];
					
				echo "<select name=\"exid2\">
				<option value=\"{$exid2}\">SELECT EXAMINER 2
				</option><option value=\"\">REMOVE</option>";
				$sql = mysqli_query($conn,"select * FROM lecturer where lectID != '$svid' and lectID != '$exid1' and lectID != '$exid2'and workload_status != 'Full'");
		while($data = mysqli_fetch_array($sql)){
		$id = $data['lectID'];
			//check total supervise
			$svstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where svid = '$id' ");
	$kira = mysqli_num_rows($svstu);
			//checl total examine
			$exstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where exid1 = '$id' or exid2 = '$id' ");
	$kira2 = mysqli_num_rows($exstu);
			//count current workload
			$total = $kira + $kira2;
			
			$check = mysqli_query($conn,"Select * from lecturer where lectID = '$id' ");
			$lihat = mysqli_fetch_array($check);
		echo 
		"
		<option value=".$data['lectID'].">".$data['lectName']." (".$total."/".$lihat['workload'].")</option>";
					}
					echo "</select>";
					
				}
				else{
					$svid = $row['svid'];
				$exid1 = $row['exid1'];
				$exid2 = $row['exid2'];
				echo " 
				<a style=\"color:red;text-align:center\">NOT ASSIGN </a>
				<select name=\"exid2\">
				<option value=\"{$exid2}\">SELECT EXAMINER 2
				</option><option value=\"\">REMOVE</option>";
				$sql = mysqli_query($conn,"select * FROM lecturer where lectID != '$svid' and lectID != '$exid1' and lectID != '$exid2'and workload_status != 'Full'");
		while($data = mysqli_fetch_array($sql)){
	$id = $data['lectID'];
			//check total supervise
			$svstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where svid = '$id' ");
	$kira = mysqli_num_rows($svstu);
			//checl total examine
			$exstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where exid1 = '$id' or exid2 = '$id' ");
	$kira2 = mysqli_num_rows($exstu);
			//count current workload
			$total = $kira + $kira2;
			
			$check = mysqli_query($conn,"Select * from lecturer where lectID = '$id' ");
			$lihat = mysqli_fetch_array($check);
		echo 
		"
		<option value=".$data['lectID'].">".$data['lectName']." (".$total."/".$lihat['workload'].")</option>";
					}
					echo "</select>";
				}?>
						</td>
					</tr>
				</table>
				<input type="button" onclick="window.location.href='Admin.php?view=projectList'" value="BACK">
				<input onclick='confirmationDelete(this);return false;' type="submit" name="assign" value="ASSIGN">
			</form>
			<br>
		</div>
	</div>
</body>

</html>
<script>
	function confirmationDelete(anchor) {
		var conf = confirm('Click "OK" to confirm changes.');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
