<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.main-cont {
			width: 90%;
			margin: 10px auto;
			font-size: 12px;


		}

		.cont {
			width: 100%;


		}

		.cont table {
			width: 100%;
			margin: 0 auto;
		}



		th {
			background-color: whitesmoke;
		}

		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;

		}

		label {
			margin-bottom: 10px;
			font-size: 40px;


		}

	</style>

</head>

<body>
	<div class="main-cont">
		<label>GUIDELINE </label>
		<button onclick="window.location.href='?view=newGuide'">ADD</button>
		<div class="cont">



			<hr><br>
			<table>
				<tr>
					<th>#</th>
					<th>TITLE</th>
					<th>FILE</th>
					<th>IMAGE</th>
					<th>ACTION</th>
				</tr>
				<?php
			
		$result = mysqli_query($conn, "SELECT * FROM guide ORDER by id  desc");
				$x = 0;
				
    while ($row = mysqli_fetch_array($result)) {
     $filedll = $row['file'];
		$filedir = "upload/file";
		 
		 echo "<tr> 
		 <th>" .++$x. "</th>
		 <td>{$row['text']}</td>
		 <td>{$row['file']}</td>
		 <td>{$row['images']}</td>
		 <td><a onclick='confirmationDelete(this);return false;'  href=\"guide_delete.php?id={$row['id']}\">Delete</a></td>";
     
      
    }
			
  ?>
			</table><br>
			<hr>
		</div>

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