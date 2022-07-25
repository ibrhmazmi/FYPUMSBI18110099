<!DOCTYPE html>
<html lang="en">

<head>

	<style>
		table,
		td,
		th {
			border: 1px solid black;
			background-color: white;
			text-align: left;
			border-collapse: collapse;
			padding: 5px;

		}

		th {
			background-color: whitesmoke;
			
		}

		td .td1 {
			text-align: justify;

		}
		td,th{
			vertical-align: text-top;
		}

		table {
			width: 100%;
			margin-top: 10px;

		}

		.pview {
			width: 90%;
			margin: 0 auto;
		}



		label {
			font-size: 40px;
		}

		.btn {
			margin-top: 10px;
		}

		.btn button {
			box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
		}

	</style>
</head>

<body>
	<div class="pview">
		<?php
		include_once ('../includes/config.php');
		error_reporting(E_ALL ^ E_NOTICE);
		?>

		<div class='btn'>
			<label>ANNOUNCEMENT </label>
			<button id="addpost" onclick="window.location.href='?view=newPost'">ADD </button>
		</div>
		<hr><br>
		<table>
			<tr>
				<th>#</th>
				<th>TITLE</th>
				<th>DESCRIPTION</th>
				<th>DATE POST</th>
				<th>BY</th>
				<th>ACTION</th>

			</tr>
			<?php

$viewsql = 'SELECT 
id,title,description,post_date,bywho
FROM 
announcement
ORDER BY id desc
';
$x = 0;
			
$view = mysqli_query($conn,$viewsql);
if (! $view){
	die ('Could not get Data:'. mysqli_error());
}

while($row = mysqli_fetch_array($view)){
	echo "<tr>
	<th>".++$x."</th>
	<td> 
	{$row['title']} 
	</td>
	<td>".nl2br($row['description'])." 
	</td>
	<td> 
	{$row['post_date']} 
	</td>
	<td>{$row['bywho']} 
	</td>
	
	<td>
	<small>
	<a id='del' onclick='confirmationDelete(this);return false;'  href=\"post_delete.php?id={$row['id']}\">Delete </a>
	</small> 
	</td>
	</tr>";}
	
echo "</table>";
			?>
			<br>
			<hr>
	</div>
	<br>

</body>

</html>
<script>
	function confirmationDelete(anchor) {
		var conf = confirm('Are you sure want to delete this record?');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
