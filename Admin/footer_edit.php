<?php 
include_once '../includes/config.php';
$sql = "SELECT * FROM footer";
$foot = mysqli_query($conn,$sql);
if (! $foot){
	die ('Could not get Data:'. mysqli_error($conn));
}
$row = mysqli_fetch_array($foot);



if(isset($_POST['save'])){
	$dis = mysqli_real_escape_string($conn,$_POST['disclaimer']);
	$year = mysqli_real_escape_string($conn,$_POST['year']);
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$by = 
		mysqli_real_escape_string($conn,$_POST['by']);
	
	$sql = mysqli_query($conn,"UPDATE footer
	SET 
	disclaimer = '$dis',
	year = '$year',
	title = '$title',
	byWho = '$by'
	");
	 if($sql)
    {
        mysqli_close($conn); // Close connection
        header("location:Admin.php?view=foot"); // redirects to all records page
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
		.ed {
			width: 100%;
			margin: 0 auto;
		}

		.ed .ed2 {
			width: 90%;
			margin: 10px auto;
		}

		.ed .ed2 .ed3 label {
			font-size: 40px;
		}

		.ed .ed2 table {
			width: 100%;
		}

		.ed .ed2 input {
			margin-top: 5px;
			width: 90%;
		}

		#inst {
			width: 10%;
			;
		}

		.ed4 {
			background-color: whitesmoke;
			padding: 5px;
		}

	</style>
</head>

<body>
	<div class="ed">
		<div class="ed2">
			<div class="ed3"><label>EDIT FOOTER</label></div>
			<hr>

			<form method="post">
				<div class="ed4">
					<table>
						<tr>
							<td>DISCLAIMER</td>
							<td><input name="disclaimer" type="text" value="<?php echo $row['disclaimer']; ?>"></td>
						</tr>
						<tr>
							<td>YEAR</td>
							<td><input name="year" type="text" value="<?php echo $row['year']; ?>"></td>
						</tr>
						<tr>
							<td>TITLE</td>
							<td><input name="title" type="text" value="<?php echo $row['title']; ?>"></td>
						</tr>
						<tr>
							<td>BY</td>
							<td><input name="by" type="text" value="<?php echo $row['byWho']; ?>"></td>
						</tr>
					</table>
				</div>
				<hr>
				<input id="inst" type="button" onclick="window.history.go(-1); return false;" value="BACK">

				<input onclick='confirmationDelete(this);return false;' id="inst" type="submit" name="save" value="SAVE">

				<input id="inst" type="reset" value="RESET">


			</form>

		</div>
	</div>
</body>

</html>
<script>
	function confirmationDelete(anchor) {
		var conf = confirm('SAVE CHANGES?');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>