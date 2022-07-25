<!DOCTYPE html>
<html lang="en">

<head>

	<style>
		table,
		td,
		th {
			border: 1px solid black;
			background-color: white;
			text-align: left;
			padding: 5px;

		}

		th {
			background-color: whitesmoke;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		.thhover .hove,
		.hoveC {

			text-align: center;
		}

		.thhover .hoveC {
			text-align: left;
		}



		.marking,
		.mark_edit {
			width: 90%;
			margin: auto;
		}

		label {
			font-size: 40px;
		}

	</style>
</head>

<body>

	<div class="marking">
		<?php

		error_reporting(E_ALL ^ E_NOTICE);
		echo"
		<label>STUDENT'S MARK LIST</label>
		<button onclick='window.print();'>PRINT</button>
		<hr><br>
		<table >
			<tr><th>#</th>
				<th>MATRIC NUMBER</th>
				<th>STUDENT NAME</th>
				<th class=\"hoveC\">PROJECT 1 TOTAL MARKS</th>
				<th class=\"hoveC\">PROJECT 2 TOTAL MARKS</th>
				
				
				<th class=\"hoveC\" id='forPrint'>ACTION</th>
			</tr>";



$viewsql = 'SELECT * FROM student 
ORDER BY programme, studID';
$view = mysqli_query($conn,$viewsql);
if (! $view){
	die ('Could not get Data:'. mysqli_error($conn));
}
$x=0;
while($row = mysqli_fetch_array($view)){
	
	echo "<tr>
	<th>" .++$x. "</th>
	<td> 
	{$row['studID']} 
	</td>
	<td> 
	{$row['studName']} 
	</td>
	<td class=\"hoveC\" > ";
	
	$sid = $row['studID'];
	$sql = mysqli_query($conn,"SELECT * FROM marking where studID = '$sid'");
	$d = mysqli_fetch_array($sql);
	$fyp1total = 
		$d['fyp1SVreportW7'] + $d['fyp1SVreportW14'] + $d['fyp1SVprotoW14'] + $d['fyp1SVlogW7']
		+ $d['fyp1SVlogW14']+ $d['fyp1EX1reportW14'] + $d['fyp1EX1protoW14'] + $d['fyp1EX1presentW7'] + $d['fyp1EX1presentW14'] + $d['fyp1EX2reportW14'] + $d['fyp1EX2protoW14'] + $d['fyp1EX2presentW7'] + $d['fyp1EX2presentW14'];
	echo 
	"{$fyp1total} %
	</td>
	<td class=\"hoveC\" > ";
	
	$sid = $row['studID'];
	$sql2 = mysqli_query($conn,"SELECT * FROM marking where studID = '$sid'");
	$d2 = mysqli_fetch_array($sql2);
	$fyp2total = 
		$d2['fyp2SVreportW7'] + $d2['fyp2SVreportW14'] + $d2['fyp2SVimplementW7'] + $d2['fyp2SVimplementW14'] + $d2['fyp2SVlogW7'] + $d2['fyp2SVlogW14'] + $d2['fyp2SVposterW14'] + $d2['fyp2EX1reportW14'] + $d2['fyp2EX1demoW7'] + $d2['fyp2EX1demoW14'] + $d2['fyp2EX1presentW7'] + $d2['fyp2EX1presentW14'] + $d2['fyp2EX2reportW14'] + $d2['fyp2EX2demoW7']+ $d2['fyp2EX2demoW14'] + $d2['fyp2EX2presentW7'] + $d2['fyp2EX2presentW14'];
	echo 
	"{$fyp2total} %
	</td>
	 "; ?>
		<!--	display pass or fail-->

		<?php echo	" 
	</td>
	<td class=\"hoveC\" id='forPrint'>
	<small>
	<a href=\"?id={$row['studID']}&view=markEdit\">Edit  </a>
	</small> 
	</td>
	</tr>"
		;}
	mysqli_close($conn);
echo "</table> <br><hr>";
			?>
		<br>
	</div>
</body>

</html>
