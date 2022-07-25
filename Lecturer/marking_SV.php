<?php
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE); 
$studID = $_GET['id'];
$id = $_SESSION['user'];
$s1 = $_POST['fyp1Rw7'];
$s2 = $_POST['fyp1Rw14'];
$s3 = $_POST['fyp1Pw14'];
$s4 = $_POST['fyp1Cw7'];
$s5 = $_POST['fyp1Cw14'];
$s6 = $_POST['fyp2Rw7'];
$s7 = $_POST['fyp2Rw14'];
$s8 = $_POST['fyp2IMw7'];
$s9 = $_POST['fyp2IMw14'];
$s10 = $_POST['fyp2Cw7'];
$s11 = $_POST['fyp2Cw14'];
$s12 = $_POST['fyp1Posw14'];

$sql = mysqli_query($conn,"select * from project where svid ='$id' AND stud1 ='$studID' or stud2 ='$studID'");

					$data = mysqli_fetch_array($sql);

$gmstudent = mysqli_query($conn,"select * from marking where studID ='$studID'");
$gm = mysqli_fetch_array($gmstudent);
$kira = mysqli_num_rows($gmstudent);

if(isset($_POST['submit'])){
	if($kira ==0){
		$sql2 = "insert into marking (studID,fyp1SVreportW7,
fyp1SVreportW14,
fyp1SVprotoW14,
fyp1SVlogW7,
fyp1SVlogW14,
fyp2SVreportW7,
fyp2SVreportW14,
fyp2SVimplementW7,
fyp2SVimplementW14,
fyp2SVlogW7,
fyp2SVlogW14,
fyp2SVposterW14) VALUES ('$studID','$s1',
'$s2',
'$s3',
'$s4',
'$s5',
'$s6',
'$s7',
'$s8',
'$s9',
'$s10',
'$s11',
'$s12'
)";
		if ($conn->query($sql2) === TRUE) 
	{
  header('location:lecturer.php?view=student');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
	else{
		
	
	$up = mysqli_query($conn,"Update marking SET fyp1SVreportW7 ='$s1', fyp1SVreportW14 ='$s2', fyp1SVprotoW14 ='$s3', fyp1SVlogW7 ='$s4', fyp1SVlogW14 ='$s5', fyp2SVreportW7 ='$s6', fyp2SVreportW14 ='$s7', fyp2SVimplementW7 ='$s8', fyp2SVimplementW14 ='$s9', fyp2SVlogW7 ='$s10', fyp2SVlogW14 ='$s11', fyp2SVposterW14 ='$s12' where studID='$studID'");
	 if($up)
    {
        mysqli_close($conn); // Close connection
        header("location:lecturer.php?view=student"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    } 
		}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
		}

		.mark {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		.label label {
			font-size: 40px;
		}

		.cont table,
		th,
		td {
			border: 1px solid whitesmoke;
			border-collapse: collapse;
			padding: 5px;
			vertical-align: text-top;
		}

		.cont table {
			width: 100%;

		}

		.cont th {
			background-color: lightgrey;
			width: 33%;

		}

		#ttop {
			background-color: whitesmoke;
			padding: 5px;
		}

		#in {
			width: 99%;
			text-align: center;
			padding: 0;
			height: 100%;

		}

		#out {
			width: 99%;
			text-align: center;
			height: 100%;
			padding: 0;
			border: 1px solid white;
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAIklEQVQIW2NkQAKrVq36zwjjgzhhYWGMYAEYB8RmROaABADeOQ8CXl/xfgAAAABJRU5ErkJggg==) repeat;

		}

		#butt {
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			margin-left: 10px;
		}

		fieldset {
			border: none;
			display: ;
		}

	</style>
</head>

<body>
	<div class="mark">
		<div class="label">
			<label>SUPERVISE MARKS</label>

		</div>
		<hr>
		<div class="cont">

			<table id="ttop">
				<tr>
					<td>PROJECT TITLE:<br>
						<?php echo $data['ProjectTitle']; ?>
					</td>
					<td>STUDENT:<br>
						<?php 
							$sql2 = mysqli_query($conn,"Select * FROM student where studID ='$studID'");
							$data2= mysqli_fetch_array($sql2);
							
							echo $data2['studName']."<br>".$studID;
							?>
					</td>
				</tr>
			</table>
			<br>
			<form method="post">
				<fieldset <?php 
	if ($_SESSION['type']== "FYP 2"){
	echo "hidden>";
}else{
	echo "/></fieldset>";
}
							 ?> <table>

					<th style="background-color:black;color:white;font-size:15px;">FYP 1</th>
					</table>
					<table>

						<tr>
							<th>#</th>
							<th>Week 7</th>
							<th>Week 14</th>
						</tr>
						<tr>
							<th>REPORT</th>
							<td><input id="in" type="number" max="10" min="0" name="fyp1Rw7" step="0.01" value="<?php echo $gm['fyp1SVreportW7'] ?>"></td>
							<td><input id="in" max="15" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1SVreportW14'] ?>" name="fyp1Rw14"></td>
						</tr>
						<tr>
							<th>PROTOTYPE/PRELIMINARY RESULTS</th>
							<td><input id="out" value="NOT AVAILABLE" disabled></td>
							<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1SVprotoW14'] ?>" name="fyp1Pw14"></td>
						</tr>
						<tr>
							<th>CONSULTATION/LOGBOOK</th>
							<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1SVlogW7'] ?>" name="fyp1Cw7"></td>
							<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1SVlogW14'] ?>" name="fyp1Cw14"></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset <?php 
	if ($_SESSION['type']== "FYP 1"){
	echo "hidden>";
}else{
	echo "/></fieldset>";
}
							 ?> <table>

					<th style="background-color:black;color:white;font-size:15px;">FYP 2</th>
					</table>
					<table>

						<tr>
							<th>#</th>
							<th>Week 7</th>
							<th>Week 14</th>
						</tr>
						<tr>
							<th>REPORT</th>
							<td><input id="in" max="5" min="0" type="number" step="0.01" name="fyp2Rw7" value="<?php echo $gm['fyp2SVreportW7'] ?>"></td>
							<td><input id="in" max="10" min="0" type="number" step="0.01" name="fyp2Rw14" value="<?php echo $gm['fyp2SVreportW14'] ?>"></td>
						</tr>
						<tr>
							<th>IMPLEMENTATION/SIMULATION TOOLS/EXPERIMENT</th>
							<td><input id="in" max="5" min="0" type="float" step="0.01" name="fyp2IMw7" value="<?php echo $gm['fyp2SVimplementW7'] ?>"></td>
							<td><input id="in" max="10" min="0" type="number" step="0.01" name="fyp2IMw14" value="<?php echo $gm['fyp2SVimplementW14'] ?>"></td>
						</tr>
						<tr>
							<th>CONSULTATION/LOGBOOK</th>
							<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2SVlogW7'] ?>" name="fyp2Cw7"></td>
							<td><input id="in" max="2.5" min="0" type="number" value="<?php echo $gm['fyp2SVlogW14'] ?>" name="fyp2Cw14" step="0.01"></td>
						</tr>
						<tr>
							<th>POSTER</th>
							<td><input id="out" value="NOT AVAILABLE" disabled></td>
							<td><input id="in" max="5" min="0" type="number" value="<?php echo $gm['fyp2SVposterW14'] ?>" name="fyp1Posw14" step="0.01"></td>
						</tr>
					</table>
				</fieldset>
				<hr>
				<input id="butt" type="button" onclick="window.location.href='lecturer.php?view=student'" value="BACK" name="">
				<input id="butt" type="submit" value="SUBMIT" name="submit">
			</form>
			<br>
		</div>
	</div>
</body>

</html>
