<?php include_once '../includes/config.php'; 
			$id = $_SESSION['user'];

			$viewsql = mysqli_query($conn,
									  "SELECT * FROM project 
									   JOIN lecturer
									  ON lecturer.lectID=project.svid WHERE stud1 = '$id' OR stud2 = '$id' or stud3 = '$id' ");
$data = mysqli_fetch_array($viewsql);
//assign lectName to null if no SV assign yet
		$svname = $data['lectName'] ?? null;
			
			$sql = mysqli_query($conn,
									  "SELECT * FROM project 
									  WHERE stud1 = '$id' OR stud2 = '$id' or stud3 = '$id' ");
			if(! $sql){
				die ('Could not fetch data!'.mysqli_error());
			}
				$row_count = $sql->num_rows;
				if ($row_count == 1)  {
					
			while ($row = mysqli_fetch_array($sql))
			{ 
			$file = $row['proposalFileWord'];
			$filedir = "upload/student_file/proposal";

			?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/project_vew.css">
</head>

<body>
	<div class="viewMain">
		<div class="viewCont">
			<label>PROJECT </label>
			<input type="button" disabled value="ADD PROPOSAL" onclick='window.location.href="Student.php?view=projectADD"'>
			<hr>
			<table>
				<tr>
					<td id="td1">TITLE</td>
					<td><textarea id="title" style="resize:none;" disabled type="text" value="<?php echo $row['ProjectTitle'];?>"><?php echo $row['ProjectTitle'];?> </textarea></td>
				</tr>
				<tr>
					<td id="td1">SUPERVISOR</td>
					<td><input id="title" disabled type="text" <?php 
				if ($svname == null){
					echo "style=\"color:red\"  value=\"NOT ASSIGN\"";
				}
				else {
				echo "value=\"".$svname."\"" ; 
				} ?>></td>
				</tr>
				<?php
				$id1 = $row['stud1'];
				$id2 = $row['stud2'];
				$id3 = $row['stud3'];
				$check = mysqli_query($conn,"Select studName from student where studID = '$id1'");
				$d = mysqli_fetch_array($check);
				?>
				<tr>
					<td id="td1">STUDENT 1</td>
					<td><input id="title" disabled type="text" value="<?php echo $d['studName']." (".$id1.")";?>"></td>
				</tr>
				<?php if ($row['stud2'] == null)
				{
				
				} 
				else 
				{$check = mysqli_query($conn,"Select studName from student where studID = '$id2'");
				$d = mysqli_fetch_array($check);
				?>
				<tr>
					<td id="td1">STUDENT 2</td>
					<td><input id="title" disabled type="text" value="<?php echo $d['studName']." (".$id2.")";?>"></td>
				</tr>
				<?php 
				} 
				?>

				<?php 
				if ($row['stud3'] == null)
				{
				
				} 
				else 
				{
					$check = mysqli_query($conn,"Select studName from student where studID = '$id3'");
				$d = mysqli_fetch_array($check);
				?>
				<tr>
					<td id="td1">STUDENT 3</td>
					<td><input id="title" disabled type="text" value="
					<?php echo $d['studName']." (".$id3.")";?>
					"></td>
				</tr>
				<?php } ?>

				<?php if($row['proposalFileWord']== null)
				{
					echo "<tr>
					<td id='td1'>FILE</td>
					<td><input id='title' disabled value='NOT UPLOADED' type='text'>
					</td></tr>";
					}
				else 
				{
				?>
				<tr>
					<td id="td1">FILE</td>
					<?php echo "<td><a href='$filedir/$file'>
					<img style=\"width:30px;height:30px;\" src=\"img/word.png\"></a></td>";
					?>
				</tr>
				<?php } ?>
				<!--check examiner 1-->
				<tr>
					<td id="td1">EXAMINER 1</td>
					<?php
					$ex1sql = mysqli_query($conn,
									  "SELECT * FROM project 
									   JOIN lecturer
									  ON lecturer.lectID=project.exid1 WHERE stud1 = '$id' OR stud2 = '$id' or stud3 = '$id' ");
$data = mysqli_fetch_array($ex1sql);
//assign lectName to null if no SV assign yet
		$ex1name = $data['lectName'] ?? null;
				if($row['exid1'] ==null){
					echo "<td><input id=\"title\"  disabled style=\"color:red\"  value=\"NOT ASSIGN\" ></td>";
				}else{
					?>
					<td><input id="title" disabled type="text" value="<?php echo $ex1name;?>"></td>
					<?php } ?>
				</tr>
				<!--				check examiner 2-->
				<tr>
					<td id="td1">EXAMINER 2</td>
					<?php
					$ex1sql = mysqli_query($conn,
									  "SELECT * FROM project 
									   JOIN lecturer
									  ON lecturer.lectID=project.exid2 WHERE stud1 = '$id' OR stud2 = '$id' or stud3 = '$id' ");
$data = mysqli_fetch_array($ex1sql);
//assign lectName to null if no SV assign yet
		$ex2name = $data['lectName'] ?? null;
				if($row['exid2'] ==null){
					echo "<td><input id=\"title\"  disabled style=\"color:red\"  value=\"NOT ASSIGN\" ></td>";
				}else{
					?>
					<td><input id="title" disabled type="text" value="<?php echo $ex2name;?>"></td>
					<?php } ?>
				</tr>
			</table>
			<hr>
			
		</div>

	</div>
</body>

</html>
<?php }
		
				}
else {?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/project_vew.css">
</head>

<body>
	<div class="viewMain">
		<div class="viewCont">
			<label>PROJECT </label>
			<input type="button" value="ADD PROPOSAL" onclick='window.location.href="Student.php?view=projectADD"'>
			<hr>
			<table>
				<tr>
					<td id="td1">TITLE</td>
					<td><input id="title" disabled type="text" value=""></td>
				</tr>
				<tr>
					<td id="td1">SUPERVISOR</td>
					<td><input id="title" disabled type="text" value=""></td>
				</tr>
				<tr>
					<td id="td1">STUDENT 1</td>
					<td><input id="title" disabled type="text" value=""></td>
				</tr>
				<tr>
					<td id="td1">STUDENT 2</td>
					<td><input id="title" disabled type="text" value=""></td>
				</tr>
				<tr>
					<td id="td1">STUDENT 3</td>
					<td><input id="title" disabled type="text" value=""></td>
				</tr>
				<tr>
					<td id="td1">EXAMINER 1</td>
					<td><input id="title" disabled type="text" value=""></td>
				</tr>
				<tr>
					<td id="td1">EXAMINER 2</td>
					<td><input id="title" disabled type="text" value=""></td>
				</tr>
			</table>
			<hr>
			<?php 
				$checkApplication = mysqli_query($conn,"Select * from application where studID = '$id'");
				$x = 0
					?>
					<label id="apLabel">Application</label>
					<hr>
			<table id="ap">
				<tr>
				<th id="apth">NO</th>
					<th id="apth">PROJECT</th>
					<th id="apth">SV Name</th>
				</tr>
				<?php 
					if(mysqli_num_rows($checkApplication)>0){
					while($result = mysqli_fetch_array($checkApplication))
			{ 
						$pid = $result['svProjectID'];
				$sql = mysqli_query($conn,"Select * from svproject where id = '$pid' ");
				$data = mysqli_fetch_array($sql);
						$svpid = $data['svid'];
						$sql2 = mysqli_query($conn,"SElect lectName from lecturer where lectID = '$svpid'");
						$data2 = mysqli_fetch_array($sql2);
				?>
				<tr>
				<td id="ap"><?php echo ++$x ?></td>
					<td id="ap"><?php echo $data['title'] ?></td>
					<td id="ap"><?php echo $data2['lectName'] ?></td>
				</tr>
			
			<?php	} 
					}
	else{
	echo "</tabel><table><th><a style=\"color:red\">No Project Applied</a></th>";				}?>
			</table>
			
		</div>
	</div>
</body>

</html>

<?php } ?>


