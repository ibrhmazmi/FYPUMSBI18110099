<?php
include_once '../includes/config.php';
error_reporting(E_ALL & ~E_NOTICE);

/**
 * Posted mark → SQL fragment for FLOAT columns (strict mode rejects '' in numeric columns).
 */
function marking_ex_sql_float(mixed $v): string {
	$v = trim((string) $v);
	if ($v === '') {
		return 'NULL';
	}
	if (!is_numeric($v)) {
		return 'NULL';
	}
	return (string) (float) $v;
}

if (!isset($_GET['id']) || !isset($_SESSION['user'])) {
	exit('Invalid request');
}
$id = mysqli_real_escape_string($conn, (string) $_GET['id']);
$uid = mysqli_real_escape_string($conn, (string) $_SESSION['user']);

$gmstudent = mysqli_query($conn,"SELECT * FROM marking WHERE studID ='$id'");
$gm = mysqli_fetch_assoc($gmstudent) ?: [];
$kira = mysqli_num_rows($gmstudent);

$dis = mysqli_query($conn,"SELECT * FROM project WHERE (stud1 ='$id' OR stud2 ='$id' OR stud3 ='$id') AND (exid1 = '$uid' OR exid2 ='$uid')");
$row = mysqli_fetch_assoc($dis) ?: [];


if(isset($_POST['submit']))
{
	$ex1m1 = $_POST['ex1mark1'] ?? '';
	$ex1m2 = $_POST['ex1mark2'] ?? '';
	$ex1m3 = $_POST['ex1mark3'] ?? '';
	$ex1m4 = $_POST['ex1mark4'] ?? '';
	$ex1m5 = $_POST['ex1mark5'] ?? '';
	$ex1m6 = $_POST['ex1mark6'] ?? '';
	$ex1m7 = $_POST['ex1mark7'] ?? '';
	$ex1m8 = $_POST['ex1mark8'] ?? '';
	$ex1m9 = $_POST['ex1mark9'] ?? '';
	$ex2m1 = $_POST['ex2mark1'] ?? '';
	$ex2m2 = $_POST['ex2mark2'] ?? '';
	$ex2m3 = $_POST['ex2mark3'] ?? '';
	$ex2m4 = $_POST['ex2mark4'] ?? '';
	$ex2m5 = $_POST['ex2mark5'] ?? '';
	$ex2m6 = $_POST['ex2mark6'] ?? '';
	$ex2m7 = $_POST['ex2mark7'] ?? '';
	$ex2m8 = $_POST['ex2mark8'] ?? '';
	$ex2m9 = $_POST['ex2mark9'] ?? '';

	if($uid == ($row['exid1'] ?? ''))
	{
		if($kira==0)
		{
			$idEsc = mysqli_real_escape_string($conn, (string) $id);
			$sql = "insert into marking (studID,fyp1EX1reportW14,
fyp1EX1protoW14,
fyp1EX1presentW7,
fyp1EX1presentW14,
fyp2EX1reportW14,
fyp2EX1demoW7,
fyp2EX1demoW14,
fyp2EX1presentW7,
fyp2EX1presentW14) values ('".$idEsc."',".marking_ex_sql_float($ex1m1).",
".marking_ex_sql_float($ex1m2).",
".marking_ex_sql_float($ex1m3).",
".marking_ex_sql_float($ex1m4).",
".marking_ex_sql_float($ex1m5).",
".marking_ex_sql_float($ex1m6).",
".marking_ex_sql_float($ex1m7).",
".marking_ex_sql_float($ex1m8).",
".marking_ex_sql_float($ex1m9)."
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
		$idEsc = mysqli_real_escape_string($conn, (string) $id);
		$up1 = mysqli_query($conn,"Update marking SET 
		fyp1EX1reportW14 =".marking_ex_sql_float($ex1m1).", fyp1EX1protoW14 =".marking_ex_sql_float($ex1m2).", fyp1EX1presentW7 =".marking_ex_sql_float($ex1m3).", 
		fyp1EX1presentW14 =".marking_ex_sql_float($ex1m4).",
		fyp2EX1reportW14 =".marking_ex_sql_float($ex1m5).", 
		fyp2EX1demoW7 =".marking_ex_sql_float($ex1m6).", fyp2EX1demoW14 =".marking_ex_sql_float($ex1m7).", fyp2EX1presentW7 =".marking_ex_sql_float($ex1m8).", fyp2EX1presentW14 =".marking_ex_sql_float($ex1m9)."
		where studID='".$idEsc."'");
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
			$idEsc = mysqli_real_escape_string($conn, (string) $id);
			$sql2 = "insert into marking (studID,fyp1EX2reportW14,
fyp1EX2protoW14,
fyp1EX2presentW7,
fyp1EX2presentW14,
fyp2EX2reportW14,
fyp2EX2demoW7,
fyp2EX2demoW14,
fyp2EX2presentW7,
fyp2EX2presentW14) values ('".$idEsc."',".marking_ex_sql_float($ex2m1).",
".marking_ex_sql_float($ex2m2).",
".marking_ex_sql_float($ex2m3).",
".marking_ex_sql_float($ex2m4).",
".marking_ex_sql_float($ex2m5).",
".marking_ex_sql_float($ex2m6).",
".marking_ex_sql_float($ex2m7).",
".marking_ex_sql_float($ex2m8).",
".marking_ex_sql_float($ex2m9).")";
				if ($conn->query($sql2) === TRUE) 
	{
  header('location:lecturer.php?view=student');
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
		}else{
			
		$idEsc = mysqli_real_escape_string($conn, (string) $id);
		$up2 = mysqli_query($conn,"Update marking SET 
		fyp1EX2reportW14 =".marking_ex_sql_float($ex2m1).", fyp1EX2protoW14 =".marking_ex_sql_float($ex2m2).", fyp1EX2presentW7 =".marking_ex_sql_float($ex2m3).", 
		fyp1EX2presentW14 =".marking_ex_sql_float($ex2m4).",
		fyp2EX2reportW14 =".marking_ex_sql_float($ex2m5).", 
		fyp2EX2demoW7 =".marking_ex_sql_float($ex2m6).", fyp2EX2demoW14 =".marking_ex_sql_float($ex2m7).", fyp2EX2presentW7 =".marking_ex_sql_float($ex2m8).", fyp2EX2presentW14 =".marking_ex_sql_float($ex2m9)."
		where studID='".$idEsc."'");
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
							<?php echo htmlspecialchars((string)($row['ProjectTitle'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
						<td style="border:none">STUDENT DETAILS:<br>
							<?php 
	
	$sql = mysqli_query($conn,"SELECT studName from student where studID = '$id'");
						$d = mysqli_fetch_assoc($sql) ?: [];
						
	echo htmlspecialchars((string)($d['studName'] ?? ''), ENT_QUOTES, 'UTF-8')."<br>".htmlspecialchars((string)$id, ENT_QUOTES, 'UTF-8'); ?></td>

					</tr>
					<td style="border:none">SUPERVISOR DETAILS:<br>
						<?php
					$svid = $row['svid'] ?? '';
					$s = mysqli_query($conn,"SELECT lectName from lecturer where lectID = '$svid'");
					$sget = mysqli_fetch_assoc($s) ?: [];
					if(!empty($svid)){
					echo htmlspecialchars((string)($sget['lectName'] ?? ''), ENT_QUOTES, 'UTF-8')."<br>".htmlspecialchars((string)($row['svid'] ?? ''), ENT_QUOTES, 'UTF-8');
					}else {
						echo "<a style=\"color:red;\">NOT ASSIGN</a>";
					}
					?>
					</td>
				</table>
				<br>
				<!--			start examiner's fyp 1 submission-->
				<?php 
			if ($uid == ($row['exid1'] ?? '')){
			
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
						<td><input id="in" max="15" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp1EX1reportW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark1"></td>
					</tr>
					<tr>
						<th>PROTOTYPE/PRELIMINARY RESULTS</th>
						<td><input id="out" value="NOT AVAILABLE" disabled></td>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp1EX1protoW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark2"></td>
					</tr>
					<tr>
						<th>PRESENTATION</th>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp1EX1presentW7'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark3"></td>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp1EX1presentW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark4"></td>
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
						<td><input id="in" max="10" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX1reportW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark5"></td>
					</tr>
					<tr>
						<th>DEMONSTRATION /IMPLEMENTATION</th>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX1demoW7'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark6"></td>
						<td><input id="in" max="10" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX1demoW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark7"></td>
					</tr>
					<tr>
						<th>PRESENTATION</th>
						<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX1presentW7'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark8"></td>
						<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX1presentW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex1mark9"></td>
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
						<td><input id="in" max="15" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp1EX2reportW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark1"></td>
					</tr>
					<tr>
						<th>PROTOTYPE/PRELIMINARY RESULTS</th>
						<td><input id="out" value="NOT AVAILABLE" disabled></td>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp1EX2protoW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark2"></td>
					</tr>
					<tr>
						<th>PRESENTATION</th>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp1EX2presentW7'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark3"></td>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp1EX2presentW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark4"></td>
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
						<td><input id="in" max="10" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX2reportW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark5"></td>
					</tr>
					<tr>
						<th>DEMONSTRATION /IMPLEMENTATION</th>
						<td><input id="in" max="5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX2demoW7'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark6"></td>
						<td><input id="in" max="10" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX2demoW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark7"></td>
					</tr>
					<tr>
						<th>PRESENTATION</th>
						<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX2presentW7'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark8"></td>
						<td><input id="in" max="2.5" min="0" type="number" step="0.01" value="<?php echo htmlspecialchars((string)($gm['fyp2EX2presentW14'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" name="ex2mark9"></td>
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
