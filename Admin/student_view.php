<?php 
include_once ('../includes/config.php');
		error_reporting(E_ALL ^ E_NOTICE);
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!--CSS-->
	<style>
		table,
		td,
		th {
			border: 1px solid black;
			background-color: white;
			text-align: left;
			padding: 5px;

		}

		td .td1 {
			text-align: justify;

		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th {
			background-color: whitesmoke;
		}

		.student_view {
			width: 90%;
			margin: 0 auto;
			margin-top: 10px;
		}

		.student_view label {
			font-size: 40px;

		}

		.student_view button {
			margin-left: 10px;
			box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
		}

		.student_view .sPut {
			margin-bottom: 10px;
			width: 50%;
		}

	</style>
<!--	Jscript-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	
</head>

<body>
	<div class="student_view">
		<label>STUDENT LIST</label><label hidden><?php echo " ".$_SESSION['type']." | ".$_SESSION['year']; ?></label><button onclick='window.location.href="Admin.php?view=student_search"'>BACK</button><button onclick="window.print();">PRINT</button>
		<hr><br>
		
		<table>
			<tr>
				<th>#</th>
				<th>MATRIC NUMBER</th>
				<th>COURSE</th>
				<th>NAME</th>
				<th>PHONE NUMBER</th>
				<th>EMAIL</th>
				<th id="forPrint">ACTION</th>
			</tr>
			<?php


$viewsql = 'SELECT * FROM users INNER JOIN student ON student.studID=users.iduser
ORDER BY programme,studID ';
		
$view = mysqli_query($conn,$viewsql);
$x = 0;
if (! $view)
{
	die ('Could not get Data:'. mysqli_error());
}

while($row = mysqli_fetch_array($view)){
	echo "<tr>
	<th>" .++$x. "</th>
	<td> 
	{$row['studID']} 
	</td>
	<td> 
	{$row['programme']} 
	</td>
	<td > 
	{$row['studName']} 
	</td>
	<td> 
	{$row['studPhone']} 
	</td>
	<td> 
	{$row['studEmail']} 
	</td>
	<td id='forPrint'>
	<small>
	<a onclick='confirmationDelete(this);return false;' href=\"student_delete.php?id={$row['studID']}\">Delete </a>
	</small> 
	</td>
	</tr>";
}
	
	
	mysqli_close($conn);
echo "</div></table> <br><hr>";
			?>
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
