<?php
include_once ('../includes/config.php'); 
error_reporting(E_ALL & ~E_NOTICE);
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
	echo 'Invalid project id';
	exit;
}
$status = isset($_POST['status']) ? mysqli_real_escape_string($conn, (string) $_POST['status']) : '';
if(isset($_POST['update'])){
	$up = mysqli_query($conn, "UPDATE svproject SET status = '$status' WHERE id = $id ");
	if($up){
		header('location:Admin.php?view=svproject');
		exit;
	}else{
		echo " cannot update";
	}
}
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
	
		$sql= mysqli_query($conn, 'SELECT * FROM svproject WHERE id = ' . $id);
		$row= mysqli_fetch_assoc($sql);
		if (!$row) {
			echo 'Project not found';
			exit;
		}
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
						$svid_esc = mysqli_real_escape_string($conn, (string) $svid);
						$sql2 = mysqli_query($conn,"SELECT lectName FROM lecturer WHERE lectID = '$svid_esc'");
						$d = mysqli_fetch_assoc($sql2); 
						?>
						<th>Supervisor Name</th>
						<td><?php echo htmlspecialchars($d['lectName'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
					</tr>
					<tr>
						<th>Project Title</th>
						<td><?php echo htmlspecialchars((string) $row['title'], ENT_QUOTES, 'UTF-8'); ?></td>
					</tr>
					<tr>
						<th>Project Description</th>
						<td><?php echo nl2br(htmlspecialchars((string) $row['description'], ENT_QUOTES, 'UTF-8')); ?></td>
					</tr>
					<tr>
						<th>Project Type</th>
						<td><?php echo htmlspecialchars((string) $row['type'], ENT_QUOTES, 'UTF-8'); ?></td>
					</tr>
					<tr>
						<th>Project Requirement</th>
						<td><?php echo nl2br(htmlspecialchars((string) $row['requirement'], ENT_QUOTES, 'UTF-8')); ?></td>
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
