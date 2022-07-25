<?php
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);

$svid = $_SESSION['user'];

//count total supervised student
$sql1 = mysqli_query($conn,"SELECT project.ProjectTitle, student.studName, student.studID FROM `project` 
INNER JOIN student
 ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3
  WHERE svid = '$svid' ");
	$SVstudTotal = mysqli_num_rows($sql1);

//count total examined student
$sql2 = mysqli_query($conn,
	 "SELECT * FROM `project` 
	 INNER JOIN student
	 ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3
	 WHERE exid1 = '$svid' or exid2 = '$svid'");
$EXstudTotal = mysqli_num_rows($sql2);

//count supervised student who complete their logbook
$sql3 = mysqli_query($conn,"
SELECT project.ProjectTitle FROM logbook
INNER JOIN project
ON
project.Pid = logbook.Pid
WHERE project.svid = '$svid'
GROUP BY ProjectTitle
HAVING COUNT(*) >=6;");
$LogCom = mysqli_num_rows($sql3);

//count uncomplete logbooks
$sql4 = mysqli_query($conn,"
SELECT project.ProjectTitle FROM logbook
INNER JOIN project
ON
project.Pid = logbook.Pid
WHERE project.svid = '$svid'
GROUP BY ProjectTitle
HAVING COUNT(*) <6;");
$LogUNCom = mysqli_num_rows($sql4);

//count project that not started logbook
$sql5 = mysqli_query($conn,"
select ProjectTitle from project where svid = '$svid' and not exists 
  ( select * from logbook where project.Pid = logbook.Pid and svid = '$svid' )");
$LogNotStart = mysqli_num_rows($sql5);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<style>
		.dashMain {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px
		}

		.dashLabel label {
			font-size: 40px;
		}

		.dashCont table {
			width: 50%;
		}

		.dashCont th {
			vertical-align: top;
			text-align: left;
			padding: 5px;
			background-color: whitesmoke;
		}

		.dashCont td {
			text-align: center;
			background-color: whitesmoke;
			color: ;
			padding: 5px;

		}

		.dashCont p {
			font-size: 10px;
		}

		#head {
			background-color: lightgrey;
			text-align: center;
		}

		.pie {
			width: 30%;
		}

		#pie-chart {
			text-align: left;
			min-height: 200px;


		}

		.legend {

			min-width: 20%;
			min-height: 50px;
			padding: 5px;
			margin: 5px;
			vertical-align: middle;
		}

		#l1 {
			background-color: #52f28a;
			width: 10px;
			height: 10px;
			border: 1px solid none;
			color: transparent;

		}

		#l2 {
			background-color: #5967ff;
			width: 10px;
			height: 10px;
			border: 1px solid none;
			color: transparent;
		}

		#l3 {
			background-color: #f25262;
			width: 10px;
			height: 10px;
			border: 1px solid none;
			color: transparent;
		}

		.inl {
			display: flex;
		}
	</style>

</head>

<body>
	<div class="dashMain">
		<div class="dashLabel">
			<label>DASHBOARD</label>
		</div>
		<hr>
		<div class="dashCont">

			<?php if(!empty($LogCom) || !empty($LogUNCom) || !empty($LogNotStart)){
	
 ?><label style="margin-left:5px;">Logbook's Summary</label>
			<div class="inl">
				<div class="pie" id="pie-chart">
				</div>
				<div class="legend">
					<a id="l1">000</a>
					<a>Completed</a><br>
					<a id="l2">000</a>
					<a>ongoing </a><br>
					<a id="l3">000</a>
					<a>Not started</a>
				</div>
			</div>
			<?php }else {

} ?>
			<table>
				<tr>
					<th id="head">summarize</th>
					<th id="head">Count</th>
				</tr>
				<tr>
					<th>SUPERVISED STUDENT(s):</th>
					<td><?php echo $SVstudTotal; ?></td>
				</tr>
				<tr>
					<th>EXAMINED STUDENT(s):</th>
					<td><?php echo $EXstudTotal; ?></td>
				</tr>

			</table>
		</div>
	</div>

</body>

</html>
<script>
	$(document).ready(function() {
		Morris.Donut({
			element: 'pie-chart',
			data: [{
					label: "completed",
					value: <?php echo $LogCom;?>,

				},
				{
					label: "ongoing",
					value: <?php echo $LogUNCom;?>
				},
				{
					label: "not started",
					value: <?php echo $LogNotStart;?>
				}

			],
			colors: ['#52f28a', '#5967ff', '#f25262']
		})
	});
</script>