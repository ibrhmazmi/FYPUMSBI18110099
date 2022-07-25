<?php include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$pid = $_GET['id'];
$sql = mysqli_query($conn,"Select * from svproject where id = '$pid'");
$row = mysqli_fetch_array($sql);

if(isset($_POST['update'])){
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$desc = mysqli_real_escape_string($conn,$_POST['desc']);
	$type = mysqli_real_escape_string($conn,$_POST['type']);
	$req = mysqli_real_escape_string($conn,$_POST['req']);

	$up = mysqli_query($conn,"Update svproject SET title = '$title', description = '$desc' , type = '$type', requirement = '$req'
	WHERE id = '$pid' ");
	if($up)
    {
        mysqli_close($conn); // Close connection
        header("location:lecturer.php?id={$pid}&view=view_svproject"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }   
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.mainC {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		label {
			font-size: 40px;
		}

		.contC table,
		th,
		td {

			border-collapse: collapse;
			padding: 5px;
		}

		.contC table {
			width: 100%;
			background-color: whitesmoke;
		}

		.contC th {
			width: 15%;
		}

		.contC td {
			width: 85%;
		}

		.contC input {
			width: 99%;
		}

		.contC textarea {
			width: 99%;
			resize: none;
			min-height: 100px;

		}

		.contC button {
			min-width: 50px;
			margin: 10px;
			padding: 5px;
			text-align: center;
		}

		#upbtn {
			background-color: dodgerblue;
			color: white;
			width: 100px;
		}

	</style>
</head>

<body>
	<div class="mainC">
		<label>Edit Project Details</label>
		<hr>
		<div class="contC">
			<form method="post">
				<table>
					<tr>
						<th>Title</th>
						<td><input type="text" name="title" value="<?php echo $row['title'] ?>"></td>
					</tr>
					<tr>
						<th>Description</th>
						<td><textarea name="desc" value=""><?php echo ($row['description']) ?></textarea></td>
					</tr>
					<tr>
						<th>Type</th>
						<td><input type="text" name="type" value="<?php echo $row['type'] ?>"></td>
					</tr>
					<tr>
						<th>Requirement</th>
						<td><textarea name="req" value=""><?php echo $row['requirement'] ?></textarea></td>
					</tr>
				</table>
				<button type="reset">RESET</button>
				<button id="upbtn" name="update" onclick='GoConfirm(this);return false;' type="submit">UPDATE</button>
				<button onclick="window.location.href='?id=<?php echo $pid ?>&view=view_svproject'" type="button">BACK</button>
			</form>
		</div>
	</div>
</body>

</html>
<script>
	function GoConfirm(anchor) {
		var conf = confirm('Confirm Update project Details?');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
