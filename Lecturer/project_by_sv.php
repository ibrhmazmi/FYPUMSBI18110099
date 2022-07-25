<?php include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$id = $_SESSION['user'];
$sqlC = mysqli_query($conn,"Select * from lecturer where lectID = '$id'");
$d = mysqli_fetch_array($sqlC);
$loadStat = $d['workload_status'];
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

		.listCont {
			width: 100%;
		}

		table,
		tr,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
		}

		table {
			width: 100%;
		}

		button {
			margin-left: 10px;
		}

		th {
			padding: 5px;
			background-color: whitesmoke;
		}

		td {
			padding: 5px;
			vertical-align: text-top;
		}

		#tdcent {
			text-align: center;
			vertical-align: middle;
		}

		#pending {
			background-color: #cc9f25;
			color: white;
			vertical-align: middle;
			text-align: center;
		}

		#decline {
			background-color: #e8432a;
			color: white;
			vertical-align: middle;
			text-align: center;
		}

		#approve {
			background-color: #38ab32;
			color: white;
			vertical-align: middle;
			text-align: center;
		}

		#done {
			background-color: dodgerblue;
			color: white;
			vertical-align: middle;
			text-align: center;
		}

		.remind {

			text-align: center;
			background-color: lightgrey;
			width: 100%;
			margin-bottom: 5px;
			padding: 5px 0 5px 0;

		}
	</style>
</head>

<body>
	<div class="MainCont">
		<label>Personal Project</label><button <?php 
		if($loadStat == 'Ongoing'){
		echo "";
	
		}else{
			echo "disabled";			
		}
		?> onclick='window.location.href="lecturer.php?view=add_svproject"'>
			<?php 
		if($loadStat == 'Ongoing'){
		echo "ADD";
	
		}else{
			echo "FULL";			
		}
		?>
		</button>
		<hr>
		<div class="remind">**Click project title to view/edit project details**</div>
		<div class="listCont">
			<table>
				<tr>
					<th>No</th>
					<th>Title</th>
					<th>Type</th>
					<th>Description</th>
					<th>Requirement</th>
					<th>Status</th>
					<th>Applicant</th>
				</tr>
				<?php
					
						$x = 0;
					$sql = mysqli_query($conn,"Select * from svproject where svid = '$id' ORDER BY 
  CASE
    WHEN status LIKE '%Done%'  THEN 1
    WHEN status LIKE '%Approve%'  THEN 2
	 WHEN status LIKE '%Pending%'  THEN 3
    ELSE 4
  END");
					if($loadStat == 'Full'){
						echo "</table><a style=\"color:red\">Workload is Full. Cannot Add new Project</a>";
					}
					else if(mysqli_num_rows($sql) ==0){
						echo "</table><a style=\"color:red\">No Personal Project Requested.</a>";
					}else{
					
					while($row = mysqli_fetch_array($sql)){
						$pid = $row['id'];
					
					?>
				<tr>
					<th><?php echo ++$x ?></th>
					<td><?php 
						if($row['status'] === "Done"){
							echo $row['title'];
						}else{
						echo "<a href=\"?id={$pid}&view=view_svproject\">".$row['title']."</a>";} ?></td>
					<td><?php echo $row['type'] ?></td>
					<td><?php echo nl2br($row['description']) ?></td>
					<td><?php echo nl2br($row['requirement']) ?></td>

					<?php if ($row['status'] === "Pending"){
						echo "<td id='pending'>".$row['status'];
					} else if($row['status'] === "Approve"){
						echo "<td id='approve'>".$row['status'];
					} else if($row['status'] === "Done"){
						echo "<td id='done'>".$row['status'];
					} else{
						echo "<td id='decline'>".$row['status'];
					} 
						
					$sql2 = mysqli_query($conn,"Select * from application where svProjectID = '$pid'");
						$d = mysqli_num_rows($sql2);
					?>
					<td>
						<center><?php echo $d?></center>
					</td>

				</tr>
				<?php }}	?>
			</table>
			<?php  ?>
		</div>
	</div>
</body>

</html>