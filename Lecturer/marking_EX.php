<?php
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE); 
$id = $_GET['id'];
$uid = $_SESSION['user'];

$gmstudent = mysqli_query($conn,"select * from marking where studID ='$id'");
$gm = mysqli_fetch_array($gmstudent);
$kira = mysqli_num_rows($gmstudent);

$dis = mysqli_query($conn,"SELECT * FROM project where stud1 ='$id' or stud2 ='$id' or stud3 ='$id' AND exid1 = '$uid' or exid2 ='$uid'");
$row = mysqli_fetch_array($dis);


$ex1m1 = $_POST['ex1mark1'];
$ex1m2 = $_POST['ex1mark2'];
$ex1m3 = $_POST['ex1mark3'];
$ex1m4 = $_POST['ex1mark4'];
$ex1m5 = $_POST['ex1mark5'];
$ex1m6 = $_POST['ex1mark6'];
$ex1m7 = $_POST['ex1mark7'];
$ex1m8 = $_POST['ex1mark8'];
$ex1m9 = $_POST['ex1mark9'];
$ex2m1 = $_POST['ex2mark1'];
$ex2m2 = $_POST['ex2mark2'];
$ex2m3 = $_POST['ex2mark3'];
$ex2m4 = $_POST['ex2mark4'];
$ex2m5 = $_POST['ex2mark5'];
$ex2m6 = $_POST['ex2mark6'];
$ex2m7 = $_POST['ex2mark7'];
$ex2m8 = $_POST['ex2mark8'];
$ex2m9 = $_POST['ex2mark9'];


if(isset($_POST['submit']))
{
	if($uid== $row['exid1'])
	{
		if($kira==0)
		{
			$sql = "insert into marking (studID,fyp1EX1reportW14,
fyp1EX1protoW14,
fyp1EX1presentW7,
fyp1EX1presentW14,
fyp2EX1reportW14,
fyp2EX1demoW7,
fyp2EX1demoW14,
fyp2EX1presentW7,
fyp2EX1presentW14) values ('$id','$ex1m1',
'$ex1m2',
'$ex1m3',
'$ex1m4',
'$ex1m5',
'$ex1m6',
'$ex1m7',
'$ex1m8',
'$ex1m9'
)";
				if ($conn->query($sql) === TRUE) 
	{
  header('location:lecturer.php?view=student');
} 
			else 
			{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		}
		else
		{
		$up1 = mysqli_query($conn,"Update marking SET 
		fyp1EX1reportW14 ='$ex1m1', fyp1EX1protoW14 ='$ex1m2', fyp1EX1presentW7 ='$ex1m3', 
		fyp1EX1presentW14 ='$ex1m4',
		fyp2EX1reportW14 ='$ex1m5', 
		fyp2EX1demoW7 ='$ex1m6', fyp2EX1demoW14 ='$ex1m7', fyp2EX1presentW7 ='$ex1m8', fyp2EX1presentW14 ='$ex1m9'
		where studID='$id'");
	 if($up1)
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
	else{
		if($kira==0){
			$sql2 = "insert into marking (studID,fyp1EX2reportW14,
fyp1EX2protoW14,
fyp1EX2presentW7,
fyp1EX2presentW14,
fyp2EX2reportW14,
fyp2EX2demoW7,
fyp2EX2demoW14,
fyp2EX2presentW7,
fyp2EX2presentW14) values ('$id','$ex2m1',
'$ex2m2',
'$ex2m3',
'$ex2m4',
'$ex2m5',
'$ex2m6',
'$ex2m7',
'$ex2m8',
'$ex2m9')";
				if ($conn->query($sql2) === TRUE) 
	{
  header('location:lecturer.php?view=student');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		}else{
			
		$up2 = mysqli_query($conn,"Update marking SET 
		fyp1EX2reportW14 ='$ex2m1', fyp1EX2protoW14 ='$ex2m2', fyp1EX2presentW7 ='$ex2m3', 
		fyp1EX2presentW14 ='$ex2m4',
		fyp2EX2reportW14 ='$ex2m5', 
		fyp2EX2demoW7 ='$ex2m6', fyp2EX2demoW14 ='$ex2m7', fyp2EX2presentW7 ='$ex2m8', fyp2EX2presentW14 ='$ex2m9'
		where studID='$id'");
	 if($up2)
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
	
}}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.mark {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		.label label {
			font-size: 40px;
		}

		.cont table {
			width: 100%;
			border: 1px solid black;
			border-collapse: collapse;
			background-color: whitesmoke;
		}

		.cont td,
		th {
			border: 1px solid lightgrey;
			border-collapse: collapse;
			vertical-align: text-top;
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
		fieldset{
			border: none;
			display: ;
		}

	</style>
</head>

<body>
	<div class="mark">
		<div class="label">
			<label>EXAMINE MARKS: <?php echo $id; ?></label>
		</div>
		<hr>
		<div class="cont">
			<form method="post">
				<table style="border:none">
					<tr>
						<td style="border:none">PROJECT TITLE:<br>
							<?php echo $row['ProjectTitle'] ?></td>
						<td style="border:none">STUDENT DETAILS:<br>
							<?php 
	
	$sql = mysqli_query($conn,"SELECT studName from student where studID = '$id'");
						$d = mysqli_fetch_array($sql);
						
	echo $d['studName']."<br>".$id; ?></td>

					</tr>
					<td style="border:none">SUPERVISOR DETAILS:<br>
						<?php
					$svid = $row['svid'];
					$s = mysqli_query($conn,"SELECT lectName from lecturer where lectID = '$svid'");
					$sget = mysqli_fetch_array($s);
					if(!empty($svid)){
					echo $sget['lectName']."<br>".$row['svid'];
					}else {
						echo "<a style=\"color:red;\">NOT ASSIGN</a>";
					}
					?>
					</td>
				</table>
				<br>
				<!--			start examiner's fyp 1 submission-->
				<?php 
			if ($uid == $row['exid1']){
			
			?>
			<fieldset <?php 
	if ($_SESSION['type']== "FYP 2"){
	echo "hidden>";
}else{
	echo "/></fieldset>";
}
							 ?>
				<table>
					<th style="background-color:black;color:white;font-size:15px;">FYP 1 (EXAMINER 1)</th>
				</table>
				<table>

					<tr>
						<th>#</th>
						<th>Week 7</th>
						<th>Week 14</th>
					</tr>
					<tr>
						<th>REPORT</th>
						<td><input id="out" disabled value="NOT AVAILABLE"></td>
						<td><input id="in" max="15" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1EX1reportW14'] ?>" name="ex1mark1"></td>
					</tr>
					<tr>
						<th>PROTOTYPE/PRELIMINARY RESULTS</th>
						<td><input id="out" value="NOT AVAILABLE" disabled></td>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1EX1protoW14'] ?>" name="ex1mark2"></td>
					</tr>
					<tr>
						<th>PRESENTATION</th>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1EX1presentW7'] ?>" name="ex1mark3"></td>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1EX1presentW14'] ?>" name="ex1mark4"></td>
					</tr>
				</table>
				</fieldset>
				<br>
				<!--			start examiner's fyp 2 submission-->
				<fieldset <?php 
	if ($_SESSION['type']== "FYP 1"){
	echo "hidden>";
}else{
	echo "/></fieldset>";
}
							 ?>
				<table>
					<th style="background-color:black;color:white;font-size:15px;">FYP 2 (EXAMINER 1)</th>
				</table>
				<table>

					<tr>
						<th>#</th>
						<th>Week 7</th>
						<th>Week 14</th>
					</tr>
					<tr>
						<th>REPORT</th>
						<td><input id="out" disabled value="NOT AVAILABLE"></td>
						<td><input id="in" max="10" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX1reportW14'] ?>" name="ex1mark5"></td>
					</tr>
					<tr>
						<th>DEMONSTRATION /IMPLEMENTATION</th>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX1demoW7'] ?>" name="ex1mark6"></td>
						<td><input id="in" max="10" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX1demoW14'] ?>" name="ex1mark7"></td>
					</tr>
					<tr>
						<th>PRESENTATION</th>
						<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX1presentW7'] ?>" name="ex1mark8"></td>
						<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX1presentW14'] ?>" name="ex1mark9"></td>
					</tr>
				</table>
	</fieldset>
				<?php }
			else{
			?>
			<fieldset <?php 
	if ($_SESSION['type']== "FYP 2"){
	echo "hidden>";
}else{
	echo "/></fieldset>";
}
							 ?>
				<table>
					<th style="background-color:black;color:white;font-size:15px;">FYP 1 (EXAMINER 2)</th>
				</table>
				<table>

					<tr>
						<th>#</th>
						<th>Week 7</th>
						<th>Week 14</th>
					</tr>
					<tr>
						<th>REPORT</th>
						<td><input id="out" disabled value="NOT AVAILABLE"></td>
						<td><input id="in" max="15" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1EX2reportW14'] ?>" name="ex2mark1"></td>
					</tr>
					<tr>
						<th>PROTOTYPE/PRELIMINARY RESULTS</th>
						<td><input id="out" value="NOT AVAILABLE" disabled></td>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1EX2protoW14'] ?>" name="ex2mark2"></td>
					</tr>
					<tr>
						<th>PRESENTATION</th>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1EX2presentW7'] ?>" name="ex2mark3"></td>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp1EX2presentW14'] ?>" name="ex2mark4"></td>
					</tr>
				</table>
</fieldset>
				<br>
				<!--			start examiner's fyp 2 submission-->
				<fieldset <?php 
	if ($_SESSION['type']== "FYP 1"){
	echo "hidden>";
}else{
	echo "/></fieldset>";
}
							 ?>
				<table>
					<th style="background-color:black;color:white;font-size:15px;">FYP 2 (EXAMINER 2)</th>
				</table>
				<table>

					<tr>
						<th>#</th>
						<th>Week 7</th>
						<th>Week 14</th>
					</tr>
					<tr>
						<th>REPORT</th>
						<td><input id="out" disabled value="NOT AVAILABLE"></td>
						<td><input id="in" max="10" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX2reportW14'] ?>" name="ex2mark5"></td>
					</tr>
					<tr>
						<th>DEMONSTRATION /IMPLEMENTATION</th>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX2demoW7'] ?>" name="ex2mark6"></td>
						<td><input id="in" max="10" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX2demoW14'] ?>" name="ex2mark7"></td>
					</tr>
					<tr>
						<th>PRESENTATION</th>
						<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX2presentW7'] ?>" name="ex2mark8"></td>
						<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo $gm['fyp2EX2presentW14'] ?>" name="ex2mark9"></td>
					</tr>
				</table>
</fieldset>
				<?php	}
			?>
				<hr>
				<input id="butt" type="button" onclick="window.location.href='lecturer.php?view=student'" value="BACK" name="submit">
				<input id="butt" type="submit" value="SUBMIT" name="submit">
			</form>
			<br>

		</div>
	</div>
</body>

</html>
