<?php include_once 'config.php';
//include "config.php";
	
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<style>
		body {
			min-height: 600px;

		}

		textarea,
		p,
		h3 {
			margin-left: 10px;
			margin-right: 10px;

		}

		textarea {
			width: 95%;
			resize: none;
			height: 100px;
			background-color: whitesmoke;
			color: black;
			border: none;
			white-space: pre-line;
			text-align: justify;
			padding: 5px;



		}

		h3 {
			text-align: justify;
			color: #083488;
		}

		h1 {
			text-align: center;
		}

		a {
			text-decoration: none;
			margin-left: 10px;
			color: blue;
		}

		p {
			font-size: 12px;
		}

		#des {
			padding: 10px;

			text-transform: none;
			width: 95%;
			margin: 0 auto;
		}

		.projectList {
			padding: none;
			margin: none;
			position: relative;
			background-color: lightblue;
			/*	display: inline-block;*/
			padding: 10px;
		}

		.projectList h3 {
			text-align: center;
		}

		.project-content {
			display: none;
			background-color: white;
			width: auto;
		
			z-index: 1;
			padding: 5px;
			opacity: 70%;
		}

		.project-content table {
			width: 95%;
			margin: 0 auto;
			background-color: white;
				box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		}

		.project-content table,
		th,
		tr,
		td {
			border: 1px solid whitesmoke;
			border-collapse: collapse;
			padding: 5px;
		}

		.project-content th {
			background-color: lightgrey;
			vertical-align: text-top;
		}
		.project-content td{
			vertical-align: text-top;
			text-align: left;
		}

		.project-content {
			margin: 0 auto;
			margin-top: 10px;
			background-color: transparent;
		}

		.projectList:hover .project-content {
			display: block;
		}

	</style>

</head>

<body>
	<div style="background-color:dodgerblue; color:white">
		<h1>Announcement</h1>
		<hr>
	</div>
	<div class="projectList">
		<h3>**Project Published by Supervisor**</h3>
		<?php 
		$sql = mysqli_query($conn,"Select * from svproject where status = 'Approve' ");
	$check = mysqli_num_rows($sql);
		?>
		<div class="project-content">
			<table>
				<tr>
					<th></th>
					<th>Project Title</th>
					<th>Description</th>
					<th>Project Type</th>
					<th>Lecturer Name</th>
				</tr>

				<?php 
				$x = 0;
				if (empty($check)){
						echo "</table><table><td>NO Project Listed</td></table>";
					}else{
				while($result= mysqli_fetch_assoc($sql))
				{
					$Ptitle = $result['title'];
					$Pdesc = $result['description'];
					$Ptype = $result['type'];
					$Psvid = $result['svid'];
					$PostID = $result['id'];
					
	echo "<tr><th>".++$x."</th>
	<td><a href=\"view_project.php?id={$PostID}\">{$Ptitle}</a></td>";
	echo "<td>{$Pdesc}</td>";
	echo "<td>{$Ptype}</td>";
	$sqsv = mysqli_query($conn,"Select lectName from lecturer where lectID = '$Psvid' ");
	$data = mysqli_fetch_array($sqsv);
	echo "<td>{$data['lectName']}</td></tr>";
					}
				} ?>

			</table>
		</div>

	</div>
	<hr>
	<?php
$rpp = 4;

	
isset($_GET['post']) ? $post = $_GET['post'] : $post = 0;
	
if ($post > 1){
		$start = ($post -1) * $rpp;
	}else{
		$start = 0;
	}
$viewsql = 
	"SELECT id FROM announcement";
$view = mysqli_query($conn,$viewsql);
$tot = mysqli_num_rows($view);
$totalPost = $tot / $rpp;	
	
$viewsql = 
	"SELECT title, description, post_date, bywho FROM announcement ORDER BY id DESC Limit ".$start.",".$rpp."";
	
$view = mysqli_query($conn,$viewsql);

if (! $view){
	die ('Could not get Data:'. mysqli_error($conn));
}

	
while($row = mysqli_fetch_assoc($view)){
	$title = $row['title'];
	$description = $row['description'];
	$post_date = $row['post_date'];
	$bywho = $row['bywho'];
	
	
	
	echo "<h3> {$title} </h3>";
	echo "<div id=\"des\">".nl2br($description)."</div>";
	echo	"<i><p>Post By: {$bywho} | {$post_date}</p></i>".
		"<hr>";
}
	for ($x = 1; $x <= $totalPost +1;$x++){
		echo"<a href='?post=$x'> $x </a>";
	}
echo "<br>";


?>


</body>

</html>
