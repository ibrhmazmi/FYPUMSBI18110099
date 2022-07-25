<?php 
include_once ('../includes/config.php');
		error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<style>
		table,
		td,
		th {
			border: 1px solid lightgrey;
			background-color: white;
			text-align: left;
			padding: 5px;
		}

		td .td1 {
			text-align: justify;

		}

		th {
			background-color: whitesmoke;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		.lecturer_view {
			width: 90%;
			margin: 0 auto;
			margin-top: 10px;
		}

		.lecturer_view label {
			font-size: 40px;
		}

		.lecturer_view button {
			box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
		}

	</style>
</head>

<body>
	<div class="lecturer_view">



		<label>LECTURER LIST</label>
		<button onclick='window.location.href="?view=lecturer_add"'>ADD</button>
		<button onclick="window.print();">PRINT</button>
		<hr><br>
		<table>
			<tr>
				<th>#</th>
				<th>MATRIC NUMBER</th>
				<th>PROGRAMME</th>
				<th>NAME</th>
				<th>SUPERVISED NO.</th>
				<th>EXAMINED NO.</th>
				<th>Workload</th>
				<th>EMAIL</th>
				<th id="forPrint">ACTION</th>
			</tr>


			<?php
$viewsql = 'SELECT * FROM users
INNER JOIN lecturer 
ON lecturer.lectID = users.iduser
WHERE role != "student"
ORDER BY lectName desc
LIMIT 0,20';
$view = mysqli_query($conn,$viewsql);
$x = 0;
if (! $view){
	die ('Could not get Data:'. mysqli_error());
}

while($row = mysqli_fetch_array($view)){
	echo "<tr>
	<th>" .++$x. "</th>
	<td> 
	{$row['lectID']} 
	</td>
	<td>{$row['programme']}</td>
	<td > 
	{$row['lectName']} 
	</td>";
	
	//count student's supervise
	$id = $row['lectID'];
	$svstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where svid = '$id' ");
	$kira = mysqli_num_rows($svstu);
	echo
	"<td> 
	{$kira} 
	</td>";
	
	//count student's examine
	$exstu = mysqli_query($conn,"SELECT * FROM `project` 
	  INNER JOIN student
	  ON student.studID=project.stud1 or student.studID=project.stud2 or student.studID = project.stud3 where exid1 = '$id' or exid2 = '$id' ");
	$kira2 = mysqli_num_rows($exstu);
	echo"
	<td> 
	{$kira2} 
	</td>";
	$wok = $row['workload'];
	$tot = $kira + $kira2;
	
	if($tot == $wok){
		$up = mysqli_query($conn,"Update lecturer SET workload_status = 'Full' where lectID = '$id' ");
	}else{
		$up = mysqli_query($conn,"Update lecturer SET workload_status = 'Ongoing' where lectID = '$id' ");
	}
	echo "<td><center>".$tot."/".$row['workload']."</center></td>";
	echo "<td>{$row['lectEmail']}</td>
	<td id='forPrint'>
	<small>
	<a onclick='confirmationDelete(this);return false;' href=\"lecturer_delete.php?id={$row['lectID']}\">Delete </a>
	</small> 
	</td>
	</tr>";}
	mysqli_close($conn);
			?>
		</table> <br>
		<hr>

		<br>
	</div>
</body>

</html>
<script>
	function confirmationDelete(anchor) {
		var conf = confirm('Are you sure want to delete this record?');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
