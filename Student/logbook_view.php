<?php
include_once '../includes/config.php';
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
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;

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
		$id = $_GET['id'];
		
		$result = "SELECT * FROM logbook WHERE logID = '$id' ";
		
		$qry = mysqli_query($conn,$result);
		if (! $qry){
		die ('Could not get Data:'. mysqli_error($conn));
}


$data = mysqli_fetch_array($qry); 
		?>
		<div class="logViewLabel">
			<label> <?php echo $data['week']; ?>'s LOGBOOK</label>
			<input type="button" onclick="window.location.href='Student.php?view=logbook'" id="back" value="BACK">
			<hr>
		</div>
		<div class="logViewCont">
			<table>
				<tr>
					<td id="logText">DATE</td>
					<td id="log"><input type="text" disabled value="<?php echo $data['logdate']; ?>"></td>
				</tr>
				<tr>
					<td id="logText">ACTIVITY</td>
					<td id="log"><input disabled type="text" value="<?php echo $data['activities']; ?>"></td>
				</tr>
				<tr>
					<td id="logText">what have been discussed</td>
					<td id="log"><textarea disabled oninput="auto_grow(this)"><?php echo $data['comment']; ?></textarea></td>
				</tr>
				<?php
				$svcom = $data['svComment'];
				if (empty($svcom)){
					
				}else{
				?>
				<tr>
					<td id="logText">Supervisor's comments</td>
					<td id="log"><textarea disabled oninput="auto_grow(this)"><?php echo $data['svComment']; ?></textarea></td>
				</tr>
				<?php }?>
				<tr>
					<td id="logText">NEXT PLAN</td>
					<td id="log"><textarea disabled><?php echo $data['nextPlan']; ?></textarea></td>
				</tr>
			</table>
			<hr>

		</div>
	</div>


</body>

</html>
