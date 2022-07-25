<?php include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);

$id = $_SESSION['user'];
$title = mysqli_real_escape_string($conn,$_POST['title']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$type = mysqli_real_escape_string($conn,$_POST['type']);
$requirement = mysqli_real_escape_string($conn,$_POST['requirement']);
$applicant = $_POST['applicant'];

if (isset($_POST['submit'])){
	$sql = "Insert into svproject (title,description,type,requirement,svid,total_applicant) values ('$title','$description','$type','$requirement','$id','$applicant')";
	$up = mysqli_query($conn,$sql);
	if($up === true){
		header('location:lecturer.php?view=svproject');
	}else{
		echo "Something wrong somewhere";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.MainCont {
			width: 95%;
			margin: 0 auto;
			margin-top: 20px;
		}

		label {
			font-size: 40px;
		}

		table {
			width: 100%;
		}

		th {
			width: 20%;
			text-align: left;
			vertical-align: text-top;
			padding: 10px;
		}

		td {
			width: 80%;
			padding: 10px;
		}

		input[type=text] {
			width: 99%;
		}

		textarea {
			width: 100%;
			margin: 0px;
			padding: 0px;
			resize: none;
			min-height: 50px;

		}

		/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
		}

	</style>
</head>

<body>
	<div class="MainCont">
		<label>Add Personal Project</label>
		<hr>
		<div class="ContList">
			<form method="post">
				<table>
					<tr>
						<th>Title :</th>
						<td><input type="text" placeholder="i.e. FYP Management System Using Feed-foward method, etc." required name="title"> </td>
					</tr>
					<tr>
						<th>Description :</th>
						<td><textarea name="description" placeholder="i.e. to develope a web system, to develope a mobile application, etc." required></textarea> </td>
					</tr>
					<tr>
						<th>Type :</th>
						<td><input type="text" placeholder="i.e. Web Development, Mobile App, Machine Learning, etc." required name="type"> </td>
					</tr>
					<tr>
						<th>Requirement :</th>
						<td><textarea required name="requirement" placeholder="i.e. proficient in PHP(Laravel),Flutter, etc."></textarea> </td>
					</tr>
					<tr>
						<th>Set Maximum number of Application :</th>
						<td><input type="number" max="10" placeholder="maximum:10" name="applicant"> </td>
					</tr>

				</table>
				<hr>
				<button onclick='GoConfirm(this);return false;' type="submit" name="submit">ADD</button>
				<input type="button" onclick='window.history.back()' value="BACK">
			</form>

		</div>
	</div>
</body>

</html>
<script>
	function GoConfirm(anchor) {
		var conf = confirm('Request to publish a new Project');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
