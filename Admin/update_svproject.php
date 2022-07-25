<?php
include_once ('../includes/config.php'); 
error_reporting(E_ALL ^ E_NOTICE);
	$id = $_GET['id'];
$status = $_POST['status'];
if(isset($_POST['update'])){
	$up = mysqli_query($conn,"Update svproject set status = '$status' where id = '$id' ");
	if($up){
		header('location:Admin.php?view=svproject');
	}else{
		echo " cannot update";
	}
}
?>
<!DOCTPYE html>
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
			table{
				width: 100%;
			}
			th{
				width: 20%;
				vertical-align: text-top;
				text-align: left;
				background-color: whitesmoke;
			}
			td{
				vertical-align: text-top;
				text-align: left;
				width: 80%;
				padding: 10px;
			}

		</style>
	</head>
<?php
	
		$sql= mysqli_query($conn,"Select * From svproject where id = '$id'");
		$row= mysqli_fetch_array($sql);
		?>
	<body>
		<div class="MainCont">
			<label>Approve/Decline Project</label>
			<hr>
			<div class="UpCont">
				<form method="post">
				<table>
					<tr>
					<?php 
						$svid = $row['svid'];
						$sql2 = mysqli_query($conn,"Select lectName from lecturer where lectID = '$svid'");
						$d = mysqli_fetch_array($sql2); 
						?>
						<th>Supervisor Name</th>
						<td><?php echo $d['lectName']; ?></td>
					</tr>
					<tr>
						<th>Project Title</th>
						<td><?php echo $row['title'] ?></td>
					</tr>
					<tr>
						<th>Project Description</th>
						<td><?php echo nl2br($row['description']) ?></td>
					</tr>
					<tr>
						<th>Project Type</th>
						<td><?php echo $row['type'] ?></td>
					</tr>
					<tr>
						<th>Project Requirement</th>
						<td><?php echo nl2br($row['requirement']) ?></td>
					</tr>
					<tr>
						<th>Project Status</th>
						<td><select name="status">
							<option value="Approve">Approve</option>
							<option value="Decline">Decline</option>
						
						</select></td>
					</tr>
				</table>
				
<input type="button" value="BACK" onclick="window.history.back()">
			<button type="submit" name="update">UPDATE</button>
				</form>
			</div>
		</div>

	</body>

	</html>
