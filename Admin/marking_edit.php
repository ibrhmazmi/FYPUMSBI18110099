<?php

include_once ('../includes/config.php'); // Using database connection file here
error_reporting(E_ALL ^ E_NOTICE);
$id = $_GET['id']; // get id through query string

$svM = mysqli_query($conn,"SELECT * from marking where studID = '$id' ");
		$a = mysqli_fetch_assoc($svM);
$kira = mysqli_num_rows($svM);

$s1 = $_POST['fyp1SVreportW7'];
$s2 = $_POST['fyp1SVreportW14'];
$s3 = $_POST['fyp1SVprotoW14'];
$s4 = $_POST['fyp1SVlogW7'];
$s5 = $_POST['fyp1SVlogW14'];
$s6 = $_POST['fyp1EX1reportW14'];
$s7 = $_POST['fyp1EX1protoW14'];
$s8 = $_POST['fyp1EX1presentW7'];
$s9 = $_POST['fyp1EX1presentW14'];
$s10 = $_POST['fyp1EX2reportW14'];
$s11 = $_POST['fyp1EX2protoW14'];
$s12 = $_POST['fyp1EX2presentW7'];
$s13 = $_POST['fyp1EX2presentW14'];
$s14 = $_POST['fyp2SVreportW7'];
$s15 = $_POST['fyp2SVreportW14'];
$s16 = $_POST['fyp2SVimplementW7'];
$s17 = $_POST['fyp2SVimplementW14'];
$s18 = $_POST['fyp2SVlogW7'];
$s19 = $_POST['fyp2SVlogW14'];
$s20 = $_POST['fyp2SVposterW14'];
$s21 = $_POST['fyp2EX1reportW14'];
$s22 = $_POST['fyp2EX1demoW7'];
$s23 = $_POST['fyp2EX1demoW14'];
$s24 = $_POST['fyp2EX1presentW7'];
$s25 = $_POST['fyp2EX1presentW14'];
$s26 = $_POST['fyp2EX2reportW14'];
$s27 = $_POST['fyp2EX2demoW7'];
$s28 = $_POST['fyp2EX2demoW14'];
$s29 = $_POST['fyp2EX2presentW7'];
$s30 = $_POST['fyp2EX2presentW14'];

if(isset($_POST['update'])){
	if($kira ==1){
		
	$squp = mysqli_query($conn,"UPDATE marking
	SET 
	fyp1SVreportW7 = '$s1', 
	fyp1SVreportW14 = '$s2', 
	fyp1SVprotoW14 = '$s3', 
	fyp1SVlogW7 = $s4,
	fyp1SVlogW14 = $s5, 
	fyp1EX1reportW14 = $s6,
	fyp1EX1protoW14 = $s7, 
	fyp1EX1presentW7 = $s8,
	fyp1EX1presentW14 = $s9, 
	fyp1EX2reportW14 = $s10, 
	fyp1EX2protoW14 = $s11,
	fyp1EX2presentW7= $s12,
	fyp1EX2presentW14= $s13,
	fyp2SVreportW7 = $s14,
	fyp2SVreportW14= $s15, 
	fyp2SVimplementW7= $s16, 
	fyp2SVimplementW14 = $s17,
	fyp2SVlogW7= $s18, 
	fyp2SVlogW14= $s19, 
	fyp2SVposterW14= $s20, 
	fyp2EX1reportW14= $s21,
	fyp2EX1demoW7= $s22,
	fyp2EX1demoW14= $s23, 
	fyp2EX1presentW7 = $s24,
	fyp2EX1presentW14= $s25, 
	fyp2EX2reportW14= $s26,
	fyp2EX2demoW7 = $s27,
	fyp2EX2demoW14 = $s28,
	fyp2EX2presentW7 = $s29,
	fyp2EX2presentW14= $s30
	WHERE studID = '$id'");
	
	if($squp)
    {
        mysqli_close($conn); // Close connection
        header("location:Admin.php?view=mark"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    } 
	}
	else{
		
		$sql = "insert into marking (studID,fyp1SVreportW7,
fyp1SVreportW14,
fyp1SVprotoW14,
fyp1SVlogW7,
fyp1SVlogW14,
fyp1EX1reportW14,
fyp1EX1protoW14,
fyp1EX1presentW7,
fyp1EX1presentW14,
fyp1EX2reportW14,
fyp1EX2protoW14,
fyp1EX2presentW7,
fyp1EX2presentW14,
fyp2SVreportW7,
fyp2SVreportW14,
fyp2SVimplementW7,
fyp2SVimplementW14,
fyp2SVlogW7,
fyp2SVlogW14,
fyp2SVposterW14,
fyp2EX1reportW14,
fyp2EX1demoW7,
fyp2EX1demoW14,
fyp2EX1presentW7,
fyp2EX1presentW14,
fyp2EX2reportW14,
fyp2EX2demoW7,
fyp2EX2demoW14,
fyp2EX2presentW7,
fyp2EX2presentW14) VALUES ('$id','$s1',
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
'$s12',
'$s13',
'$s14',
'$s15',
'$s16',
'$s17',
'$s18',
'$s19',
'$s20',
'$s21',
'$s22',
'$s23',
'$s24',
'$s25',
'$s26',
'$s27',
'$s28',
'$s29',
'$s30') ";
		if ($conn->query($sql) === TRUE) 
	{
  header('location:Admin.php?view=mark');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	
		}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		input[type=number]::-webkit-inner-spin-button {
			-webkit-appearance: none;
		}

		#inputNum {
			width: 100%;
			height: 100%;
			padding: 0;
			border: none;
			border-bottom: 1px solid lightgrey;
			background-color: khaki;
			text-align: center;

		}

		.cont {
			width: 95%;
			margin: 10px auto;

		}

		#headLabel {
			font-size: 40px;
		}

		.cont table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			background-color: whitesmoke;

			text-align: center;
			padding: 5px;
		}

		td {}

		table {
			width: 100%;
		}

		#tdL {
			text-align: left;
			background-color: lightgrey;
		}

		#dis {
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAIklEQVQIW2NkQAKrVq36zwjjgzhhYWGMYAEYB8RmROaABADeOQ8CXl/xfgAAAABJRU5ErkJggg==) repeat;
		}

		#z {
			font-size: 150%;
		}

		#tdH {
			background-color: lightgrey;
		}

		#butt {
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			margin-left: 10px;
		}
	</style>
</head>
<div class="cont">
	<?php 
	$sql = mysqli_query($conn,"SELECT studName from student where studID = '$id'");
	$r = mysqli_fetch_array($sql);
	?>
	<label id="headLabel">Update <?php echo $r['studName']." (".$id.")";  ?> Marks</label>
	<hr>

	<form method="POST" action="">


		<table>
			<th style="background-color:black;color:white">FYP 1</th>
		</table>
		<?php 
		$showSVReportFYP1 = $a['fyp1SVreportW7'] + $a['fyp1SVreportW14'];
		$showSVLogFYP1 = $a['fyp1SVlogW7'] + $a['fyp1SVlogW14'];
		$svFYP1Total = $showSVReportFYP1 + $a['fyp1SVprotoW14'] + $showSVLogFYP1;
		?>
		<table>
			<tr>

				<td id="tdL"><b><u>Supervisor</u></b></td>
				<td id="tdH">WEEK 7</td>
				<td id="tdH">Week 14</td>
				<td id="tdH">Total(%)</td>
			</tr>
			<tr>
				<td id="tdL">Report</td>
				<td><input id="inputNum" max="10" min="0" step="0.01" name="fyp1SVreportW7" type="number" value="<?php echo $a['fyp1SVreportW7']; ?>">/10</td>
				<td><input id="inputNum" max="15" min="0" step="0.01" name="fyp1SVreportW14" type="number" value="<?php echo $a['fyp1SVreportW14']?>">/15</td>
				<td><?php echo $showSVReportFYP1 ;?>/25</td>
			</tr>
			<tr>
				<td id="tdL">Prototype/Preliminary Results</td>
				<td id="dis">N/A</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1SVprotoW14" type="number" value="<?php echo $a['fyp1SVprotoW14']?>">/5</td>
				<td><?php echo $a['fyp1SVprotoW14'] ?>/5</td>
			</tr>
			<tr>
				<td id="tdL">Consultation/Logbook</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1SVlogW7" type="number" value="<?php echo $a['fyp1SVlogW7']?>">/5</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1SVlogW14" type="number" value="<?php echo $a['fyp1SVlogW14']?>">/5</td>
				<td><?php echo $showSVLogFYP1 ?>/10</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td id="z"><b><?php echo $svFYP1Total; ?>/40</b></td>
			</tr>

			<?php 
			$showEX1PresentFYP1 = $a['fyp1EX1presentW7'] + $a['fyp1EX1presentW14'];
			$ex1FYP1Total = $a['fyp1EX1reportW14'] + $a['fyp1EX1protoW14'] + $showEX1PresentFYP1;
			?>
			<tr>
				<td id="tdL"><b><u>Examiner 1</u></b></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td id="tdL">Report</td>
				<td id="dis">N/A</td>
				<td><input id="inputNum" max="15" min="0" step="0.01" name="fyp1EX1reportW14" type="number" value="<?php echo $a['fyp1EX1reportW14']?>">/15</td>
				<td><?php echo $a['fyp1EX1reportW14'];?>/15</td>
			</tr>
			<tr>
				<td id="tdL">Prototype/Preliminary Results</td>
				<td id="dis">N/A</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1EX1protoW14" type="number" value="<?php echo $a['fyp1EX1protoW14']?>">/5</td>
				<td><?php echo $a['fyp1EX1protoW14'] ?>/5</td>
			</tr>
			<tr>
				<td id="tdL">Presentation</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1EX1presentW7" type="number" value="<?php echo $a['fyp1EX1presentW7']?>">/5</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1EX1presentW14" type="number" value="<?php echo $a['fyp1EX1presentW14']?>">/5</td>
				<td><?php echo $showEX1PresentFYP1; ?>/10</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td id="z"><b><?php echo $ex1FYP1Total; ?>/30</b></td>
			</tr>

			<?php 
			$showEX2PresentFYP1 = $a['fyp1EX2presentW7'] + $a['fyp1EX2presentW14'];
			$ex2FYP1Total = $a['fyp1EX2reportW14'] + $a['fyp1EX2protoW14'] + $showEX2PresentFYP1;
			?>
			<tr>
				<td id="tdL"><b><u>Examiner 2</u></b></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td id="tdL">Report</td>
				<td id="dis">N/A</td>
				<td><input id="inputNum" max="15" min="0" step="0.01" name="fyp1EX2reportW14" type="number" value="<?php echo $a['fyp1EX2reportW14']?>">/15</td>
				<td><?php echo $a['fyp1EX2reportW14'] ?>/15</td>
			</tr>
			<tr>
				<td id="tdL">Prototype/Preliminary Results</td>
				<td id="dis">N/A</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1EX2protoW14" type="number" value="<?php echo $a['fyp1EX2protoW14']?>">/5</td>
				<td><?php echo $a['fyp1EX2protoW14'] ?>/5</td>
			</tr>
			<tr>
				<td id="tdL">Presentation</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1EX2presentW7" type="number" value="<?php echo $a['fyp1EX2presentW7']?>">/5</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp1EX2presentW14" type="number" value="<?php echo $a['fyp1EX2presentW14']?>">/5</td>
				<td><?php echo $showEX2PresentFYP1; ?>/10</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td id="z"><b><?php echo $ex2FYP1Total; ?>/30</b></td>
			</tr>
			<?php
			$FYP1Total = $svFYP1Total + $ex1FYP1Total + $ex2FYP1Total;
			?>
			<tr>
				<td style="text-align:right">TOTAL(%)</td>
				<td></td>
				<td></td>
				<td id="z"><b><?php echo $FYP1Total;?></b></td>
			</tr>
		</table>
		<br>
		<table>
			<th style="background-color:black;color:white">FYP 2</th>
		</table>
		<table>
			<tr>
				<td id="tdL"><b><u>Supervisor</u></b></td>
				<td id="tdH">WEEK 7</td>
				<td id="tdH">Week 14</td>
				<td id="tdH">Total(%)</td>
			</tr>
			<?php
			$showSVReportFYP2 = $a['fyp2SVreportW7'] + $a['fyp2SVreportW14'];
			$showSVSimuFYP2 = $a['fyp2SVimplementW7']+$a['fyp2SVimplementW14'];
			$showSVLogFYP2 = $a['fyp2SVlogW7'] + $a['fyp2SVlogW14'];
			$svFYP2Total = $showSVReportFYP2 + $showSVSimuFYP2 +$showSVLogFYP2 + $a['fyp2SVposterW14'];
			
			?>
			<tr>
				<td id="tdL">Report</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp2SVreportW7" type="number" value="<?php echo $a['fyp2SVreportW7']?>">/5</td>
				<td><input id="inputNum" max="10" min="0" step="0.01" name="fyp2SVreportW14" type="number" value="<?php echo $a['fyp2SVreportW14']?>">/10</td>
				<td><?php echo $showSVReportFYP2; ?>/15</td>
			</tr>
			<tr>
				<td id="tdL">Implementation/Simulation Tools/ Experiment</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp2SVimplementW7" type="number" value="<?php echo $a['fyp2SVimplementW7']?>">/5</td>
				<td><input id="inputNum" max="10" min="0" step="0.01" name="fyp2SVimplementW14" type="number" value="<?php echo $a['fyp2SVimplementW14']?>">/10</td>
				<td><?php echo $showSVSimuFYP2 ?>/15</td>
			</tr>
			<tr>
				<td id="tdL">Consultation/Logbook</td>
				<td><input id="inputNum" max="2.5" min="0" step="0.01" name="fyp2SVlogW7" type="number" value="<?php echo $a['fyp2SVlogW7']?>">/2.5</td>
				<td><input id="inputNum" max="2.5" min="0" step="0.01" name="fyp2SVlogW14" type="number" value="<?php echo $a['fyp2SVlogW14']?>">/2.5</td>
				<td><?php echo $showSVLogFYP2;?></td>
			</tr>
			<tr>
				<td id="tdL">Poster [OR Report Summary -TBA]</td>
				<td id="dis">N/A</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp2SVposterW14" type="number" value="<?php echo $a['fyp2SVposterW14']?>">/5</td>
				<td><?php echo $a['fyp2SVposterW14']; ?>/5</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td id="z"><b><?php echo $svFYP2Total;?>/40</b></td>
			</tr>
			<?php
			$showEX1DemoFYP2 = $a['fyp2EX1demoW7'] + $a['fyp2EX1demoW14'];
			$showEx1PresentFYP2 = $a['fyp2EX1presentW7'] + $a['fyp2EX1presentW14'];
			$ex1FYP2Total = $a['fyp2EX1reportW14'] + $showEX1DemoFYP2 + $showEx1PresentFYP2;
			?>
			<tr>
				<td id="tdL"><b><u>Examiner 1</u></b></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td id="tdL">Report</td>
				<td id="dis">N/A</td>
				<td><input id="inputNum" max="10" min="0" step="0.01" name="fyp2EX1reportW14" type="number" value="<?php echo $a['fyp2EX1reportW14']?>">/10</td>
				<td><?php echo $a['fyp2EX1reportW14'];?>/10</td>
			</tr>
			<tr>
				<td id="tdL">Demonstration/ Implementation</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp2EX1demoW7" type="number" value="<?php echo $a['fyp2EX1demoW7']?>">/5</td>
				<td><input id="inputNum" max="10" min="0" step="0.01" name="fyp2EX1demoW14" type="number" value="<?php echo $a['fyp2EX1demoW14']?>">/10</td>
				<td><?php echo $showEX1DemoFYP2 ?>/15</td>
			</tr>
			<tr>
				<td id="tdL">Presentation</td>
				<td><input id="inputNum" max="2.5" min="0" step="0.01" name="fyp2EX1presentW7" type="number" value="<?php echo $a['fyp2EX1presentW7']?>">/2.5</td>
				<td><input id="inputNum" max="2.5" min="0" step="0.01" name="fyp2EX1presentW14" type="number" value="<?php echo $a['fyp2EX1presentW14']?>">/2.5</td>
				<td><?php echo $showEx1PresentFYP2 ?>/5</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td id="z"><b><?php echo $ex1FYP2Total ?>/30</b></td>
			</tr>
			<?php
			$showEX2DemoFYP2 = $a['fyp2EX2demoW7'] + $a['fyp2EX2demoW14'];
			$showEx2PresentFYP2 = $a['fyp2EX2presentW7'] + $a['fyp2EX2presentW14'];
			$ex2FYP2Total = $a['fyp2EX2reportW14'] + $showEX2DemoFYP2 + $showEx2PresentFYP2;
			?>
			<tr>
				<td id="tdL"><b><u>Examiner 2</u></b></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td id="tdL">Report</td>
				<td id="dis">N/A</td>
				<td><input id="inputNum" max="10" min="0" step="0.01" name="fyp2EX2reportW14" type="number" value="<?php echo $a['fyp2EX2reportW14']?>">/10</td>
				<td><?php echo $a['fyp2EX2reportW14'] ?>/10</td>
			</tr>
			<tr>
				<td id="tdL">Demonstration/ Implementation</td>
				<td><input id="inputNum" max="5" min="0" step="0.01" name="fyp2EX2demoW7" type="number" value="<?php echo $a['fyp2EX2demoW7']?>">/5</td>
				<td><input id="inputNum" max="10" min="0" step="0.01" name="fyp2EX2demoW14" type="number" value="<?php echo $a['fyp2EX2demoW14']?>">/10</td>
				<td><?php echo $showEX2DemoFYP2 ?>/15</td>
			</tr>
			<tr>
				<td id="tdL">Presentation</td>
				<td><input id="inputNum" max="2.5" min="0" step="0.01" name="fyp2EX2presentW7" type="number" value="<?php echo $a['fyp2EX2presentW7']?>">/2.5</td>
				<td><input id="inputNum" max="2.5" min="0" step="0.01" name="fyp2EX2presentW14" type="number" value="<?php echo $a['fyp2EX2presentW14']?>">/2.5</td>
				<td><?php echo $showEx2PresentFYP2 ?>/5</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td id="z"><b><?php echo $ex2FYP2Total ?>/30</b></td>
			</tr>
			<?php
			$FYP2Total = $ex1FYP2Total + $ex2FYP2Total + $svFYP2Total;
			?>
			<tr>
				<td style="text-align:right">TOTAL(%)</td>
				<td></td>
				<td></td>
				<td id="z"><b><?php echo $FYP2Total ?></b></td>
			</tr>
		</table>
		<br>

		<input id="butt" type="button" onclick="window.location.href='Admin.php?view=mark'" name="back" value="BACK">
		<input id="butt" onclick='confirmationDelete(this);return false;' type="submit" name="update" value="UPDATE">
	</form>
	<hr>
</div>

</html>
<script>
	function confirmationDelete(anchor) {
		var conf = confirm('Confirm Update?');
		if (conf)
			window.location = anchor.attr("href");
	}
</script>