<?php
include_once ('../includes/config.php'); 
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.MainCont {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		label {
			font-size: 40px;
		}

		table,
		tr,
		td,
		th {
			border: 1px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 5px;
		}

		table {
			width: 100%;
		}

		#cent {
			text-align: center;
			vertical-align: middle;
		}

		#app,
		#dec,
		#pen {
			text-align: center;
			vertical-align: middle;
		}

		#app {
			background-color: limegreen;
			color: white
		}

		#dec {
			background-color: indianred;
			color: white
		}

		#pen {
			background-color: dodgerblue;
			color: white
		}

	</style>
</head>

<body>
	<div class="MainCont">
		<label>SV Project Request</label>
		<hr>

		<div class="SubCont">
			<table>
				<tr>
					<th>No</th>
					<th>SV name</th>
					<th>Project Title</th>
					<th>Description</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php 
				$sql = mysqli_query($conn,"Select * from svproject where status != 'Done' order by id");
					$x = 0;
				while($result = mysqli_fetch_array($sql)){
				if(empty($result)){
					echo "</table><th>No New Applicant</th>";
				}else{
				?>
				<tr>
					<td><?php echo ++$x ?></td>

					<td><?php $svid = $result['svid'];
						$sql2 = mysqli_query($conn,"Select * from lecturer where lectID = '$svid'");
					$d = mysqli_fetch_array($sql2);
						echo $d['lectName'];
						?></td>
					<td><?php echo $result['title'] ?></td>
					<td><?php echo $result['description'] ?></td>

					<?php 
							$stat = $result['status'];
							if($stat === 'Approve')
						{
							
							echo "<td id='app'>".$stat."</td>";
							
						}else if ($stat === 'Decline'){
							
							echo "<td id='dec'>".$stat."</td>";
							
						}else{
							
							echo "<td id='pen'>".$stat."</td>";
						} 
					?>


					<td id="cent"><?php 
						$pid = $result['id'];
					echo "<a href=\"?id={$pid}&view=Upsvproject\">View </a>";
						?></td>
				</tr>
				<?php }}?>

			</table>

		</div>
	</div>
</body>

</html>
