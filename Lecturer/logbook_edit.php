<?php
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE); 
$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * from logbook where logID ='$id'");
	$d = mysqli_fetch_array($sql);
$Pid = $d['Pid'];
if(isset($_POST['confirm'])){
	
	$komen = mysqli_real_escape_string($conn,$_POST['svkomen']);
	$stat = 1;
	
	$sql = mysqli_query($conn,"UPDATE logbook 
	SET  svComment ='$komen', status = '$stat'
	where logID='$id'");
	
	if($sql)
    {
        mysqli_close($conn); // Close connection
        header("location:lecturer.php?id={$Pid}&view=logbookView"); // redirects to all records page
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
		.EditView {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		.EditLabel label {
			font-size: 40px;
		}

		.EditLabel a {
			margin: none;
			padding: none;
		}

		.EditLabel a:hover {
			color: none;
		}

		.EditCont table {
			width: 100%;
			background-color: whitesmoke;
			padding: 5px;
		}

		.EditCont td,
		th,
		textarea {
			vertical-align: text-top;
			padding: 5px;
			text-align: left;
		}

		.EditCont textarea {
			width: 99.5%;
			min-height: 200px;
			resize: none;
		}

		.EditCont th {
			width: 20%;
		}

		EditCont td {
			width: 78%;
		}

		#input {
			width: 100%;
		}

		#butt {
			margin-left: 10px;
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		}

	</style>
</head>

<body>
	<div class="EditView">
		<div class="EditLabel">
			<label>CHECK : </label><a style="font-size:20px;"><?php echo $d['week']." ".$d['logdate']; ?></a>
		</div>
		<hr>
		<div class="EditCont">
			<form method="post">
				<table>
					<tr>
						<th>ACTIVITIES: </th>
						<td><input id="input" name="" disabled type="text" value="<?php echo $d['activities']?>"></td>
					</tr>
					<tr>
						<th>what have been discussed: </th>
						<td><textarea disabled name=""><?php echo $d['comment']?></textarea></td>
					</tr>
					<tr>
						<th>Supervisor's Comment: </th>
						<td><textarea  name="svkomen"><?php echo $d['svComment']?></textarea></td>
					</tr>
					<tr>
						<th>Next Plan: </th>
						<td><input id="input" name="" disabled type="text" value="<?php echo $d['nextPlan']?>"></td>

					</tr>
				
			
				</table>
				<hr>
				<input id="butt" type="reset" value="RESET">
				<input id="butt" type="button" onclick="window.history.back()" value="BACK">
				<input id="butt" type="submit" onclick='confirmStat(this);return false;' name="confirm" value="CONFIRM">
				
			</form>
			<br>
		</div>
	</div>
</body>

</html>
<script>
	function confirmStat(anchor) {
		var conf = confirm('CLICK "OK" TO CONFIRM');
		if (conf)
			window.location = anchor.attr("href");
	}

	

</script>
