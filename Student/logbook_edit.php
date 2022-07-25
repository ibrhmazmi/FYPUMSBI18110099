<?php
include_once '../includes/config.php';
$id = $_GET['id'];

	
		$result = "SELECT * FROM logbook WHERE logID = '$id' ";
		
		$qry = mysqli_query($conn,$result);
		if (! $qry){
		die ('Could not get Data:'. mysqli_error($conn));
}


$data = mysqli_fetch_array($qry); 
if(isset($_POST['update'])){
	
	$date = $_POST['logdate'];
	$xtvt = mysqli_real_escape_string($conn,$_POST['xtvt']);
	$com = mysqli_real_escape_string($conn,$_POST['comment']);
	$next = mysqli_real_escape_string($conn,$_POST['nextPlan']);
	
	$edit = mysqli_query($conn,"UPDATE
	logbook SET activities ='$xtvt', comment ='$com',logdate ='$date',nextPlan ='$next'
	WHERE logID ='$id' ");
	
	  if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:Student.php?view=logbook"); // redirects to all records page
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
		.logView {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;

		}

		.logView .logViewLabel {
			font-size: 40px;
		}

		.logView .logViewCont table {
			width: 100%;
			border: 1px solid lightgrey;
			padding: 5px;
			background-color: lightgrey;
		}

		#logText {
			width: 10%;
			vertical-align: text-top;

		}

		#back {
			margin-top: 20px;
			width: 20%;

		}

		#reset {
			width: 20%;
			margin-left: 20px;

		}

		#save {
			margin-left: 20px;
			width: 50%;
		}

		#log input {
			width: 100%;
			background-color: white;

		}

		#log textarea {
			width: 100%;
			resize: none;
			min-height: 110px;
			background-color: white;


		}

	</style>
	<script>
		//auto grow textarea
		function auto_grow(element) {
			element.style.height = "5px";
			element.style.height = (element.scrollHeight) + "px";
		}

	</script>
</head>

<body>
	<div class="logView">
		<?php
		
	
		?>
		<div class="logViewLabel">
			<label>EDIT <?php echo $data['week']; ?>'s LOGBOOK</label>
			<hr>
		</div>
		<div class="logViewCont">
			<form method="POST">
				<table>
					<tr>
						<td id="logText">DATE</td>
						<td id="log"><input name="logdate" type="date" value="<?php echo $data['logdate']; ?>"></td>
					</tr>
					<tr>
						<td id="logText">ACTIVITY</td>
						<td id="log"><input name="xtvt" type="text" value="<?php echo $data['activities']; ?>"></td>
					</tr>
					<tr>
						<td id="logText">what have been discussed</td>
						<td id="log"><textarea name="comment" oninput="auto_grow(this)"><?php echo $data['comment']; ?></textarea></td>
					</tr>
					<tr>
						<td id="logText">NEXT PLAN</td>
						<td id="log"><textarea name="nextPlan" oninput="auto_grow(this)"><?php echo $data['nextPlan']; ?></textarea></td>
					</tr>
				</table>
				<hr>
				<input type="button" onclick="window.location.href='Student.php?view=logbook'" id="back" value="BACK">
				<input type="submit" name="update" id="save" value="UPDATE">
				<input id="reset" type="reset" value="RESET">
			</form>
			<br>
			<br>
		</div>
	</div>


</body>

</html>
