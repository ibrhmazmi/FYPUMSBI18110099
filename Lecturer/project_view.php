<?php include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$pid = $_GET['id'];
$selStud = $_POST['select'];
$studentID = $_POST['studID'];


if(isset($_POST['select']))
	{
	$resetData = mysqli_query($conn,"Update application set status = 'Pending' where status = '$selStud'");
	
		$updata = mysqli_query($conn,"Update application set status = '$selStud' where studID = '$studentID'");
	
	$sql = mysqli_query($conn,"Select * From svproject where id = '$pid' and stud1 = '$studentID' or stud2 = '$studentID' or stud3 ='$studentID'");
	$row = mysqli_fetch_array($sql);
	$st1 = $row['stud1'];
	$st2 = $row['stud2'];
	$st3 = $row['stud3'];
	
	$selD = mysqli_query($conn,"Select * from application where studID = '$studentID' ");
		$data = mysqli_fetch_array($selD);
		$stat = $data['status'];
	
	
			if($stat == "Student 1" && $st2 == $studentID)
			{
				$remove = mysqli_query($conn,"Update svproject set stud2 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
				$sql = mysqli_query($conn,"Update svproject set stud1 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Student 1" && $st3 == $studentID)
			{
				$remove = mysqli_query($conn,"Update svproject set stud3 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
				$sql = mysqli_query($conn,"Update svproject set stud1 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Student 1")
			{
				
				$sql = mysqli_query($conn,"Update svproject set stud1 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Student 2" && $st1 == $studentID)
			{
				$remove = mysqli_query($conn,"Update svproject set stud1 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
				$sql = mysqli_query($conn,"Update svproject set stud2 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Student 2" && $st3 == $studentID)
			{
				$remove = mysqli_query($conn,"Update svproject set stud3 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
				$sql = mysqli_query($conn,"Update svproject set stud2 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Student 2")
			{
				
				$sql = mysqli_query($conn,"Update svproject set stud2 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Student 3" && $st1 == $studentID)
			{
				$remove = mysqli_query($conn,"Update svproject set stud1 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
				$sql = mysqli_query($conn,"Update svproject set stud3 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Student 3" && $st2 == $studentID)
			{
				$remove = mysqli_query($conn,"Update svproject set stud2 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
				$sql = mysqli_query($conn,"Update svproject set stud3 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Student 3")
			{
				
				$sql = mysqli_query($conn,"Update svproject set stud3 = '$studentID' where id ='$pid' ");
			}
			else if($stat == "Pending" && $st1 == $studentID){
				$remove1 = mysqli_query($conn,"Update svproject set stud1 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
			}
			else if($stat == "Pending" && $st2 == $studentID){
				$remove2 = mysqli_query($conn,"Update svproject set stud2 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
			}
			else if($stat == "Pending" && $st3 == $studentID){
				$remove3 = mysqli_query($conn,"Update svproject set stud3 = null where id ='$pid' and stud1 ='$studentID' or stud2 ='$studentID' or stud3 ='$studentID' ");
			}
			else
			{
				echo " error";
			}
	
	}

if(isset($_POST['final'])){
$check = mysqli_query($conn,"Select * from svproject  where id = '$pid' ")	;
	$d = mysqli_fetch_array($check);

$title	= $d['title'];
$svid		= $_SESSION['user'];
$stud1	= $d['stud1'];
$stud2	= $d['stud2'];
$stud3	= $d['stud3'];
	
	$sql = mysqli_query($conn,"INSERT into project (ProjectTitle, svid, stud1, stud2, stud3) VALUES ('$title','$svid','$stud1','$stud2','$stud3')");
	
	
	
	if($sql){
		$changeStat = mysqli_query($conn,"Update svproject set status = 'Done' where id = '$pid'");
			if($changeStat){
			$del1 = mysqli_query($conn,"Delete from application where svProjectID !='$pid' AND studID ='$stud1'");
			$del2 = mysqli_query($conn,"Delete from application where svProjectID !='$pid' AND studID ='$stud2'");
			$del3 = mysqli_query($conn,"Delete from application where svProjectID !='$pid' AND studID ='$stud3'");
			header('location:lecturer.php?view=svproject');
			}else{
				echo "cannot delete remaining application of the student";
			}
		
		}
	else{
		echo "Project not inserted";
	}
}
					
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.mainC {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		label {
			font-size: 40px;
		}

		#app {
			font-size: 20px;
		}

		.contC {
			margin: 0 auto;
			margin-top: 10px;
			background-color: whitesmoke;
		}

		.appC {
			margin: 0 auto;
			margin-top: 10px;
		}

		.contC table,
		.appC table {
			width: 100%;
		}

		.contC table,
		td,
		th,
		.appC table,
		td,
		th {
			border: 0.5px solid black;
			border-collapse: collapse;
			padding: 5px 0 5px 0;
		}

		.appC td {
			text-align: center;
		}

		.appC th {
			background-color: lightgrey;
		}

		.contC th {
			width: 25%;
		}

		.contC td {
			width: 75%;
			padding: 5px;
		}

		button {
			margin: 0 5px 0 5px;
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		}

		#conf {
			margin: 5px 5px 5px 5px;
			background-color: dodgerblue;
			color: white;
			min-width: 50px;
			padding: 5px;
			border: none;
			left: 50%;
		}

		#not {
			margin: 5px 5px 5px 5px;
			min-width: 50px;
			padding: 5px;
			left: 50%;
		}

	</style>
</head>

<body>
	<div class="mainC">
		<label>Project</label>
		<button onclick="window.location.href='lecturer.php?view=svproject'">BACK</button>
		<button onclick="window.location.href='lecturer.php?view=edit_svproject&id=<?php echo $pid?>'">EDIT</button>
		<hr>
		<div class="contC">
			<table>
				<?php 
			$pick = mysqli_query($conn,"Select * from svproject where id = '$pid'");
			$a = mysqli_fetch_array($pick);
			?>
				<tr>
					<th>Title</th>
					<td><?php echo nl2br($a['title'])?></td>
				</tr>
				<tr>
					<th>Type</th>
					<td><?php echo $a['type']?></td>
				</tr>
				<tr>
					<th>Description</th>
					<td><?php echo nl2br($a['description'])?></td>
				</tr>
				<tr>
					<th>Requirement</th>
					<td><?php echo nl2br($a['requirement'])?></td>
				</tr>
				<?php 
						$s1 = $a['stud1'];
						$s2 = $a['stud2'];
						$s3 = $a['stud3'];
						$stud1 = mysqli_query($conn,"Select studName from student where studID = '$s1'");
						$stud2 = mysqli_query($conn,"Select studName from student where studID = '$s2'");
						$stud3 = mysqli_query($conn,"Select studName from student where studID = '$s3'");
						$ss1 = mysqli_fetch_array($stud1);
						$ss2 = mysqli_fetch_array($stud2);
						$ss3 = mysqli_fetch_array($stud3);
				
				?>
				<tr>
					<th>Student</th>
					<td><?php
						if(!empty($s1)){
						echo "1. ".$ss1['studName']." (".$s1.")";
						}else{
							echo "<a style=\"color:red\">1. Not Assigned </a>";
						}
						if(!empty($s2)){
							echo "<br>2. ".$ss2['studName']." (".$s2.")";
						}else{
							echo "<br><a style=\"color:red\">2. Not Assigned </a>";
						}
						if(!empty($s3)){
						echo "<br>3. ".$ss3['studName']." (".$s3.")"; }
						else{
							echo "<br><a style=\"color:red\">3. Not Assigned </a>";
						}
						?></td>
				</tr>
			</table>

		</div>

		<form method="post">
			<button type="submit" name="final" onclick='confirmFinal(this);return false;' <?php if(empty($s1) && empty($s2) && empty($s3) ){
	echo "disabled id=\"not\"";
}else{
	echo "id=\"conf\"";
}
					  ?>>FINALISE PROJECT
			</button>

		</form>
		<hr>
		<label id="app">Applicant</label>
		<hr>
		<div class="appC">
			<table>
				<tr>
					<th>NO</th>
					<th>Programme</th>
					<th>Name</th>
					<th>Matric</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Status</th>
				</tr>
				<?php  
				$sql = mysqli_query($conn,"Select * from application  where svProjectID = '$pid' ORDER BY 
  CASE
    WHEN status LIKE '%student 1%'  THEN 1
    WHEN status LIKE '%student 2%'  THEN 2
    ELSE 3
  END");
				$check = mysqli_num_rows($sql);
				$x = 0 ;
if($check >0){
				while($row = mysqli_fetch_array($sql)){
					$studID = $row['studID'];
					$stat = $row['status'];
					$sql2 = mysqli_query($conn,"Select * from student where studID = '$studID' ");
					$data = mysqli_fetch_array($sql2);
					echo "<tr> 
					<th>".++$x."</th>
					<td>".$data['programme']."</td>
					<td>".$data['studName']."</td>
					<td>".$data['studID']."</td>
					<td>".$data['studEmail']."</td>
					<td>".$data['studPhone']."</td>"; ?>

				<td>

					<form method="post">
						<input type="text" hidden name="studID" value="<?php echo $data['studID']?>">
						<select name="select" onchange='this.form.submit()'>
							<option value="Pending">Please Select</option>
							<option value="Student 1" <?php if($stat == "Student 1"){ echo 'selected="selected"';} ?>>
								Student 1
							</option>
							<option value="Student 2" <?php if($stat == "Student 2"){ echo 'selected="selected"';} ?>>
								Student 2
							</option>
							<option value="Student 3" <?php if($stat == "Student 3"){ echo 'selected="selected"';} ?>>
								Student 3
							</option>
						</select>
						<noscript><input type="submit" value="Submit"></noscript>
					</form>
				</td>


				<?php	echo "</tr>";	}
}else{
	echo "</table><table><td><a style=\"color:red\">No Applicant</a></td></table> ";
}
				?>
			</table>
			<br>
		</div>
	</div>
</body>

</html>
<script>
	function confirmFinal(anchor) {
		var conf = confirm('Confirm to Finalise Project?');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
