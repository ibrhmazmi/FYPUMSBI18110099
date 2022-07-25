<?php
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		#plateTop {
			width: 100%;
			margin-top: 20px;

			/*
			display: inline-flex;
			justify-content: space-around;
*/
		}

		#box {
			width: 31.21%;
			height: 150px;
			display: inline-block;
			box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
			border-radius: 20px;
		}

		#top {
			width: 100%;
			text-align: center;
			height: 20%;
			font-size: 20px;
			background-color: dodgerblue;
			color: white;
			padding-top: 10px;
			border-top-right-radius: 20px;
			border-top-left-radius: 20px;

		}

		#btm {
			width: 100%;
			height: 80%;
			background-color: lightgrey;
			text-align: center;
			border-bottom-left-radius: 20px;
			border-bottom-right-radius: 20px;
		}

		#btm a {
			font-size: 72px;
		}

		#lab {
			width: 90%;
			margin: 0 auto;
			margin-top: 10px;
			font-size: 40px;

		}

		table {
			margin-top: 20px;

			width: 100%;

		}

		th,
		td {
			font-size: 13px;

			vertical-align: text-top;
			text-align: left;
			padding: 10px;
			text-decoration: none;
			background-color: whitesmoke;
		}

		td {
			text-align: center;
		}

		#thCent {
			text-align: center;
			background-color: lightgrey;
		}

		@media screen and (max-width: 900px) {

			#top {
				font-size: 40%;
			}
		}
		@media screen and (max-width: 750px) {
			body{
				font-size: 10px;
			}
			#top {
				font-size: 12px;
			}
		}

	</style>
</head>

<body>
	<div id="lab"><label> DASHBOARD</label>
		<hr>

		<div id="plateTop">

			<div id="box">
				<div id="top">NUMBER OF STUDENT</div>

				<?php
				$result = $conn->query("select * from users where role ='student'");
				$count=$result->num_rows;
				?>

				<div id="btm"><a style="color:green"><?php echo "$count"; ?></a></div>



			</div>
			<div id="box">
				<div id="top">NUMBER OF LECTURER</div>

				<?php
				$result = $conn->query("select * from users where role !='student'");
				$LectCount=$result->num_rows;
				?>

				<div id="btm"><a style="color:green"><?php echo "$LectCount"; ?></a></div>

			</div>

			<div id="box">
				<div id="top">TOTAL PROJECT</div>

				<?php
				$result = $conn->query("select * from project ");
				$Total=$result->num_rows;
				?>

				<div id="btm"><a style="color:green"><?php echo "$Total"; ?></a></div>
			</div>

		</div>
		<br>
		<table>
			<tr>
				<th id="thCent">summarize</th>
				<th id="thCent">count</th>
			</tr>
			<tr>
				<th>HC12 students </th>
				<?php
				$check3 = mysqli_query($conn,"select * from student where programme like '%HC12%'");
				$d3 = mysqli_num_rows($check3);
				?>
				<td><?php echo $d3 ?></td>
			</tr>
			<tr>
				<th>HC13 students </th>
				<?php
				$check4 = mysqli_query($conn,"select * from student where programme like '%HC13%'");
				$d4 = mysqli_num_rows($check4);
				?>
				<td><?php echo $d4 ?></td>
			</tr>
			<tr>
				<th>PROJECTS with 1 student </th>
				<?php
				$check = mysqli_query($conn,"SELECT * from project where stud2 = ''");
				$d = mysqli_num_rows($check);
				?>
				<td><?php echo $d ?></td>
			</tr>
			<tr>
				<th>PROJECTS with 2 student </th>
				<?php
				$check2 = mysqli_query($conn,"SELECT * from project where stud2 != '' and stud3 = '' ");
				$d2 = mysqli_num_rows($check2);
				?>
				<td><?php echo $d2 ?></td>
			</tr>
			<tr>
				<th>PROJECTs WITH SUPERVISOR</th>
				<?php
				$check5 = mysqli_query($conn,"SELECT * from project where svid != '' ");
				$d5 = mysqli_num_rows($check5);
				?>
				<td><?php echo $d5 ?></td>
			</tr>
			<?php
				$check6 = mysqli_query($conn,"SELECT * from project where svid = '' ");
				$d6 = mysqli_num_rows($check6);
				if($d6 == 0){
					
				}else{
			?>
			<tr>
				<th>PROJECTs <b>WITHOUT</b> SUPERVISOR</th>
				<td><?php echo $d6 ?></td>
			</tr>
			<?php } ?>
		</table>
		<hr>

	</div>
</body>

</html>
