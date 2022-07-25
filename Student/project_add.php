<?php
include_once ('../includes/config.php');
$msg = "";
error_reporting(E_ALL ^ E_NOTICE);


if(isset($_POST['addProject'])){

	$PTitle = mysqli_real_escape_string($conn,$_POST['ProjectTitle']) ;
	$id = $_SESSION['user'];
	$bywho = $_SESSION['user'];
	$stud2 = $_POST['stud2'];
	$stud3 = $_POST['stud3'];
	$sv = $_POST['sv'];
	
	$proWord = $_FILES['propWord']['name'];
	$proWordTarget = "upload/student_file/proposal/".basename($proWord);
	
	
	$sql = "
	INSERT 
	INTO project (ProjectTitle, stud1, stud2, stud3, svid, LastUpdateBy,proposalFileWord) 
	VALUES 
	('$PTitle', '$id', '$stud2', '$stud3', '$sv','$bywho','$proWord');";

	$semakDB = mysqli_query($conn,"Select * from student where studID = '$stud2' or studID = '$stud3' ");
	$semakDB2 = mysqli_num_rows($semakDB);
	
	$semakProject = mysqli_query($conn,"select * from project where stud1 = '$stud2' or stud1 = '$stud2' or stud3 = '$stud2' or stud2 = '$stud2' or stud2 = '$stud2' or stud2 = '$stud2' or stud3 = '$stud2' or stud3 = '$stud2' or stud3 = '$stud2'");
	$semakProject2 = mysqli_num_rows($semakProject);
	
	//check if student 2 and 3 is empty
	if(empty($stud2) && empty($stud3)){
		//check if no problem , execute next query
		 mysqli_query($conn,$sql);
			$sPid = mysqli_insert_id($conn);
			//check if student Project Id is empty
			$sql1 = "Update student set Pid = '$sPid' where studID = '$id'";
			$res = mysqli_query($conn,$sql1);
			 if($res === false){
				 echo "2nd query failed";
			 }else{
				 header('location:Student.php?view=project');
			 }
	}
	// else check if student 2 empty but student 3 filled
	   else if (empty($stud2) && !empty($stud3))
	  {
	      echo "<a>Please Fill student 2 box or change student 3 into student 2</a>";
	  }  
	// else check if student 2 exist in database
	else if ($semakDB2 == 0){
	    echo "<a>STUDENT(s) not in database!</a>";
	}
	//else check if student 2 and 3 already have existing project
	else if($semakProject2 != 0){
	    echo "<a>Student already have project!</a>";
	}
	// else echo error 
	 else {
	echo "Error:" . $sql . "<br>" . mysqli_error($conn);
}
	
	//	upload proposal word
	if (move_uploaded_file($_FILES['propWord']['tmp_name'], $proWordTarget)) 
	{
  		$msg = "File uploaded successfully";
  	}
	else
	{
  		$msg = "Failed to upload ";
  	}
  	
  
mysqli_close($conn);
	
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> FYP Project</title>
	<link rel="stylesheet" href="css/project_add.css">

</head>

<body>
	<div class="main_form">
		<div class="plainB">
			<label>ADD FYP PROJECT</label>
			<hr>
			<div>

				<div class="box">
					<form action="" method="post" enctype="multipart/form-data">

						<table>
							<tr>
								<td id="td">TITLE</td>
								<td><textarea type="text" name="ProjectTitle" required></textarea></td>
							</tr>
							<tr>
								<td id="td">STUDENT</td>
								<td><input type="text" name="stud1" disabled value="<?php echo $_SESSION['user']; ?>"><br>

									<?php 
								//	$sql = mysqli_query($conn,"select s.studID,s.studName from student as s where not exists ( select p.Pid from project as p where s.Pid=p.Pid )") ;
								//	
								//	?>
									<input type="text" name="stud2" placeholder="STUDENT 2 (*optional)">

									<br>
									<input type="text" name="stud3" placeholder="STUDENT 3 (*optional) ">
								</td>
							</tr>
							<tr>
								<td id="td">SELECT SUPERVISOR</td>
								<td><select name="sv">
										<option value="">SELECT SUPERVISOR</option>
										<?php 
									$svcheck = mysqli_query($conn,"SELECT lectName,lectID FROM lecturer");
									
									while ($svPick = mysqli_fetch_array($svcheck)){
										echo "<option value=\"{$svPick['lectID']}\">{$svPick['lectName']}</option>";
									}
									
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td>UPLOAD PROPOSAL</td>
								<td><input type='file' accept='.doc,.docx' name='propWord'></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="addProject" value="SUBMIT"><br>
									<input type="button" onclick="window.location.href='Student.php?view=project'" value="BACK">
								</td>
							</tr>
						</table>
					</form>
				</div>

			</div>

		</div>
	</div>


</body>

</html>
