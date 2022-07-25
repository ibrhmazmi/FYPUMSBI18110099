<?php
include_once "../includes/config.php";
error_reporting(E_ALL ^ E_NOTICE);
$msg = "";
$msg = $_SESSION['msg'];

if(isset($_POST['submit'])){
//	declare
	$id = $_SESSION['user'];
	//proposal
	$proWord = $_FILES['propWord']['name'];
	$proWordTarget = "upload/student_file/proposal/".basename($proWord);
	//fyp1
	$R1PDF = $_FILES['R1PDF']['name'];
	$R1PDFTarget = "upload/student_file/fyp1/".basename($R1PDF);
	$R1Word = $_FILES['R1Word']['name'];
	$R1WordTarget = "upload/student_file/fyp1/".basename($R1Word);
	//fyp2
	$R2PDF = $_FILES['R2PDF']['name'];
	$R2PDFTarget = "upload/student_file/fyp2/".basename($R2PDF);
	$R2Word = $_FILES['R2Word']['name'];
	$R2WordTarget = "upload/student_file/fyp2/".basename($R2Word);
	//poster
	$poster = $_FILES['poster']['name'];
	$posterTar = "upload/student_file/poster/".basename($poster);
	//source_file
	$source = $_FILES['source']['name'];
	$sourceTar = "upload/student_file/source/".basename($source);
	
//	query
//	if proposal not empty, then upload
if (!empty($_FILES['propWord']['name']))
{
	$sql = "UPDATE  project 
	SET 
	proposalFileWord = '$proWord',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
	//check if fyp1 report word & pdf not empty, then upload
	else if (!empty($_FILES['R1PDF']['name']) && !empty($_FILES['R1Word']['name']) )
{
	$sql = "UPDATE  project 
	SET 
	fyp1FileWord = '$R1Word',
	fyp1FilePDF = '$R1PDF',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
	//check if fyp2 report word & pdf not empty, then upload both
	else if (!empty($_FILES['R2PDF']['name']) && !empty($_FILES['R2Word']['name']) )
{
	$sql = "UPDATE  project 
	SET 
	fyp2FileWord = '$R2Word',
	fyp2FilePDF = '$R2PDF',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
	// check if only fyp1 report pdf not empty, then upload
	else if (!empty($_FILES['R1PDF']['name']))
{
	$sql = "UPDATE  project 
	SET 
	fyp1FilePDF = '$R1PDF',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
	// check if only fyp1 report Word not empty, then upload
else if (!empty($_FILES['R1Word']['name']))
{
$sql = "UPDATE  project 
	SET 
	fyp1FileWord = '$R1Word',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
	// check if only fyp2 report pdf not empty, then upload
	else if (!empty($_FILES['R2PDF']['name']))
{
	$sql = "UPDATE  project 
	SET 
	fyp2FilePDF = '$R2PDF',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
		// check if only fyp2 report Word not empty, then upload
	else if (!empty($_FILES['R2Word']['name']))
{
$sql = "UPDATE  project 
	SET 
	fyp2FileWord = '$R2Word',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
	//check if poster and source_file not empty, then upload
else if (!empty($_FILES['poster']['name']) && !empty($_FILES['source']['name']) )
{
	$sql = "UPDATE  project 
	SET 
	poster = '$poster',
	source_file = '$source',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
	//check if only poster is not empty, then upload
	else if (!empty($_FILES['poster']['name']))
{
	$sql = "UPDATE  project 
	SET 
	poster = '$poster',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}
	//check if source_file is not empty, then upload
	else if (!empty($_FILES['source']['name']))
{
	$sql = "UPDATE  project 
	SET 
	source_file = '$source',
	LastUpdateBy = '$id'
	WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
	mysqli_query($conn, $sql);
}else{
		$msg = "ERROR when uploading file";
	}
	
//	upload proposal word
	if (move_uploaded_file($_FILES['propWord']['tmp_name'], $proWordTarget)) 
	{
  		$msg = "File uploaded successfully";
  	}
	else
	{
  		$msg = "Failed to move proposal ";
  	}
	//upload fyp1&2 pdf
	if (move_uploaded_file($_FILES['R1PDF']['tmp_name'], $R1PDFTarget)) 
	{
  		$msg = "File uploaded successfully";
  	}
	else
	{
  		$msg = "Failed to move Fyp1 Report PDF File ";
  	}
	
	if (move_uploaded_file($_FILES['R2PDF']['tmp_name'], $R2PDFTarget)) 
	{
  		$msg = "File uploaded successfully";
  	}
	else
	{
  		$msg = "Failed to move Fyp2 Report PDF File";
  	}
	
	//upload fyp1&2 Word
	if (move_uploaded_file($_FILES['R1Word']['tmp_name'], $R1WordTarget)) 
	{
  		$msg = "File uploaded successfully";
  	}
	else
	{
  		$msg = "Failed to move Fyp1 Report Word File";
  	}
	if (move_uploaded_file($_FILES['R2Word']['tmp_name'], $R2WordTarget)) 
	{
  		$msg = "File uploaded successfully";
  	}
	else
	{
  		$msg = "Failed to move Fyp2 Report Word File";
  	}
	//upload poster & source file
	if (move_uploaded_file($_FILES['poster']['tmp_name'], $posterTar)) 
	{
  		$msg = "File uploaded successfully";
  	}
	else
	{
  		$msg = "Failed to move poster File";
  	}
	
	if (move_uploaded_file($_FILES['source']['tmp_name'], $sourceTar)) 
	{
  		$msg = "File uploaded successfully";
  	}
	else
	{
  		$msg = "";
  	}
	}

$id = $_SESSION['user'];

$viewprof = "SELECT * 
FROM project
WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
$up = mysqli_query($conn,$viewprof);
$kira = mysqli_num_rows($up);
if (! $up){
	die('Could not get data:'.mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/upload.css">
</head>

<body>

	<div class="mainUp">
		<div class="uplabel">
			<label>FILE SUBMISSION</label>
			<hr>
			<?php
	if($kira == 0){
	    echo "<a style=\"color:red\">NO PROJECT YET. Please start your project!</a>";
	}
	else{
	    while($row = mysqli_fetch_array($up)){
		
	?>
		</div>
		<div class="for">
			<form method="post" enctype="multipart/form-data">

				<table>
					<tr class="bord">
						<td><label><strong>PROPOSAL</strong></label></td>
						<td><label><strong>FILE</strong></label></td>
						
						<?php
						$viewprof = "SELECT * 
FROM project
WHERE stud1 = '$id' or stud2 = '$id' or stud3 = '$id' ";
$check1 = mysqli_query($conn,$viewprof);
if (! $up){
	die('Could not get data:'.mysqli_error($conn));
}
		$data = mysqli_fetch_array($check1);
		$sql= mysqli_query($conn,"select * from project where stud1 = '$id' or stud2 = '$id' or stud3 = '$id' and proposalFileWord != NULL ");
		$kira2 = mysqli_num_rows($sql);
		if ($kira2 == 0){
			echo "<td>Please Upload Your Proposal</td>";
		}else{
		?>
						<td><small style="margin-left:-10px;">DELETE</small></td>
						<?php } ?>
					</tr>

					<tr>
						<td>
							<label> WORD</label>
						</td>

						<?php 
						if($row['proposalFileWord'] != null)
						{
							echo "<td><a style='background-color:green;color:white;padding:5px;'>Uploaded </a> </td>";
							if ($_SESSION['type']== "FYP 2"){
								echo "<td><a><img src=\"img/delete.png\"></a></td>";
							}else{
							echo "<td><a onclick='confirmationDelete(this);return false;' href=\"upload_delete.php?propoFile={$row['proposalFileWord']}&id={$id}\"><img src=\"img/delete.png\"></a></td>";
						}
						}
						else 
						{
							echo"<td>
							<input type='file' accept='.doc,.docx' name='propWord'>
							</td>"; 
						}
						?>
					</tr>
					<tr class="bord">
						<td><label><strong>FYP 1 REPORT </strong></label></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>
							<label> PDF</label>
						</td>
						<?php 
						if($row['fyp1FilePDF'] != null)
						{
							echo "<td><a style='background-color:green;color:white;padding:5px;'>Uploaded </a> </td>";
							if ($_SESSION['type']== "FYP 2"){
								echo "<td><a><img src=\"img/delete.png\"></a></td>";
							}else{
							echo"
							<td><a onclick='confirmationDelete(this);return false;' href=\"upload_delete.php?fyp1PDF={$row['fyp1FilePDF']}&id={$id}\"><img src=\"img/delete.png\"></a></td>";
						}}
						else 
						{
							echo"	<td>
							<input type='file' accept='.pdf' id='pdfbut' name='R1PDF'>
							</td>";
						}
						?>
					</tr>
					<tr>
						<td>
							<label> WORD</label>
						</td>

						<?php 
						if($row['fyp1FileWord'] != null)
						{
							echo "<td><a style='background-color:green;color:white;padding:5px;'>Uploaded </a> </td>";
							if ($_SESSION['type']== "FYP 2"){
								echo "<td><a><img src=\"img/delete.png\"></a></td>";
							}else{
							echo "
							<td><a onclick='confirmationDelete(this);return false;' href=\"upload_delete.php?fyp1Word={$row['fyp1FileWord']}&id={$id}\"><img src=\"img/delete.png\"></a></td>";
						}}
						else 
						{
							echo"<td>
							<input type='file' accept='.doc,.docx' name='R1Word'>
							</td>"; 
						}
						?>
					</tr>
					<tr class="bord">
						<td><label><strong>FYP 2 REPORT </strong></label></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>
							<label> PDF</label>
						</td>
						<?php 
						if($row['fyp2FilePDF'] != null)
						{
							echo "<td><a style='background-color:green;color:white;padding:5px;'>Uploaded </a> </td>";
							if ($_SESSION['type']== "FYP 1"){
								echo "<td><a><img src=\"img/delete.png\"></a></td>";
							}else{
							echo "<td><a onclick='confirmationDelete(this);return false;' href=\"upload_delete.php?fyp2PDF={$row['fyp2FilePDF']}&id={$id}\"><img src=\"img/delete.png\"></a></td>";
						}
							
						}
						else 
						{
							echo"	<td>
							<input type='file' accept='.pdf' id='pdfbut' name='R2PDF'>
							</td>";
						}
						?>
					</tr>
					<tr>
						<td>
							<label> WORD</label>
						</td>

						<?php 
						if($row['fyp2FileWord'] != null)
						{
							echo "<td><a style='background-color:green;color:white;padding:5px;'>Uploaded </a> </td>";
								if ($_SESSION['type']== "FYP 1"){
								echo "<td><a><img src=\"img/delete.png\"></a></td>";
							}else{
							echo "<td><a onclick='confirmationDelete(this);return false;' href=\"upload_delete.php?fyp2Word={$row['fyp2FileWord']}&id={$id}\"><img src=\"img/delete.png\"></a></td>";
						}
							
						}
						else 
						{
							echo"<td>
							<input type='file' accept='.doc,.docx' name='R2Word'>
							</td>"; 
						}
						?>
					</tr>
					<tr class="bord">
						<td><label><strong>Poster/Source_File </strong></label></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><label>Poster</label></td>
						<?php 
						if($row['poster'] != null)
						{
							echo "<td><a style='background-color:green;color:white;padding:5px;'>Uploaded </a> </td>";
								if ($_SESSION['type']== "FYP 1"){
								echo "<td><a><img src=\"img/delete.png\"></a></td>";
							}else{
							echo "<td><a onclick='confirmationDelete(this);return false;' href=\"upload_delete.php?poster={$row['poster']}&id={$id}\"><img src=\"img/delete.png\"></a></td>";
						}
							
						}
						else 
						{
							echo"<td>
							<input type='file' accept='.jpg,.jpeg,.png' name='poster'>
							</td>"; 
						}
						?>
					</tr>
					<tr>
						<td><label>Source File/Material</label></td>
						<?php 
						if($row['source_file'] != null)
						{
							echo "<td><a style='background-color:green;color:white;padding:5px;'>Uploaded </a> </td>";
								if ($_SESSION['type']== "FYP 1"){
								echo "<td><a><img src=\"img/delete.png\"></a></td>";
							}else{
							echo "<td><a onclick='confirmationDelete(this);return false;' href=\"upload_delete.php?source_file={$row['source_file']}&id={$id}\"><img src=\"img/delete.png\"></a></td>";
						}
							
						}
						else 
						{
							echo"<td>
							<input type='file' accept='.zip,.rar,.7zip' name='source'>
							</td>"; 
						}
						?>
					</tr>
				</table>
				<hr>
		
						<?php echo $msg ?>
						<button id="butt" style="width:auto;margin-top:10px;" id="btnsub" type="submit" name="submit">UPLOAD</button>
					
				
			</form>
			<br>
		</div>
		

	</div>
	<?php }} ?>
</body>

</html>
<script>
	function confirmationDelete(anchor) {
		var conf = confirm('Are you sure want to delete this file?');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>