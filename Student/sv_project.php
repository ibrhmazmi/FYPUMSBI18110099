<?php include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$btn = "Apply";
$PostID = $_SESSION['PostID'];
$sql = mysqli_query($conn,"Select * from svproject where id = '$PostID'");
$data = mysqli_fetch_array($sql);
$id = $_SESSION['user'];

$checkProject = mysqli_query($conn,"Select * from project where stud1 ='$id' or stud2 ='$id' or stud2 ='$id' ");

$checkApplicant = mysqli_query($conn,"Select * from application where svProjectID = '$PostID' and studID = '$id'");

$checkMaxSlot = mysqli_query($conn,"Select total_applicant from svproject where id = '$PostID'");
$d = mysqli_fetch_array($checkMaxSlot);
$checkMax = $d['total_applicant'];
$checkCurSlot = mysqli_query($conn,"Select * from application where svProjectID = '$PostID'");

if(isset($_POST['apply'])){
	$sql2 = mysqli_query($conn,"insert into application (svProjectID,studID	) values ('$PostID','$id') ");
	header('location:Student.php?view=project');
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


		.contC th {
			text-align: right;
			vertical-align: text-top;
			padding: 10px;
			border: 1px solid black;
			background-color: lightgrey;
			color: black;
		}

		.contC td {
			padding: 10px;
		}

		#btn-apply {
			margin: 0 auto;
			margin-top: 10px;
			box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
			width: 30%;
			left: 35%;
			right: 35%;
			padding: 5px;
			background-color: cornflowerblue;
			color: white;
		}

	</style>
</head>

<body>
	<div class="mainC">
		<label>Application</label>
		<hr>
		<div class="contC">
			<?php 
	//check if student already assigned to a project
	if(mysqli_num_rows($checkProject)>0){
		echo "<a style=\"color:red\">You already assigned to a project</a>";
	}
//check if the project is available to apply
	else if(mysqli_num_rows($sql)>0){ ?>
			<table>
				<tr>
					<th>Project :</th>
					<td><?php echo $data['title']?></td>
				</tr>
				<?php 
					$svid = $data['svid'];
					$sql2 = mysqli_query($conn,"Select lectName from lecturer where lectID = '$svid'");
					$show = mysqli_fetch_array($sql2);
					?>
				<tr>
					<th>Potential Supervisor Name :</th>
					<td><?php echo $show['lectName']?></td>
				</tr>
				<tr>
					<th>Type :</th>
					<td><?php echo $data['type']?></td>
				</tr>
				<tr>
					<th>Description :</th>
					<td><?php echo nl2br($data['description'])?></td>
				</tr>
				<tr>
					<th>Requirement :</th>
					<td><?php echo nl2br($data['requirement'])?></td>
				</tr>
			</table>
			<hr>
			<form method="post">
				<input id="btn-apply" type="submit" name="apply" onclick='confirmApply(this);return false;' <?php 
						if(mysqli_num_rows($checkApplicant)>0){
						echo "disabled value='Applied'";
						}
						else if($checkMax == mysqli_num_rows($checkCurSlot))
						{
							echo "disabled value='Full Application' >";
							echo " <style> #btn-apply{ background-color:blue;}</style>";
						}
						else{
							echo  "value='Apply'>";
							echo " <style> #btn-apply{ background-color:green;}</style>";
						}
					 ?> </form>
				<?php }
// if no project is selected
				else{
				echo "<a style=\"color:red\">No project Selected</a>";
				}?>

		</div>

	</div>
</body>

</html>
<script>
	function confirmApply(anchor) {
		var conf = confirm('Confirm Apply?');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
