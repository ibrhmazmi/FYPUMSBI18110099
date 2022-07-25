<?php 
include_once('../includes/config.php');

 $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	
	$image_text = mysqli_real_escape_string($conn, $_POST['text']);
	  
  	$image = $_FILES['image']['name'];
  	$imgtarget = "upload/img/".basename($image);
	  
	  $file = $_FILES['file']['name'];
	  $filetarget = "upload/file/".basename($file);
	  $filePath = $filetarget . $file;
	  $fileType = pathinfo($filePath,PATHINFO_EXTENSION);
	  
	  

  	$sql = "INSERT INTO guide (images, text, file) VALUES ('$image', '$image_text', '$file')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $imgtarget)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
	  //allow certain format
	  $allowType = array('doc','docx','pdf');
	  
	if(in_array($fileType, $allowType)){
		if (move_uploaded_file($_FILES['file']['tmp_name'], $filetarget)) {
			$msg = "file uploaded successfully";
			 header('location:Admin.php?view=guideline');
		}else{
			$msg = "Failed to upload file";
			 header('location:Admin.php?view=guideline');
		}
	}
	  else{
		  $msg = "Sorry, only doc, docx & PDF files are allowed to upload.";
		   header('location:Admin.php?view=guideline');
	  }
	 
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.cont {
			width: 100%;
		}

		.cont-kid {
			width: 90%;
			margin: 0 auto;
		}

		tr {
			padding: 10px;
		}

		td {
			max-width: 100px;
			padding: 10px
		}

		/*
		form input,
		button {
			margin-bottom: 10px;
		}
*/

	</style>
</head>
<div class="cont">
	<div class="cont-kid">
		<h1>POST NEW GUIDELINE</h1>
		<hr>
		<br>
		
			<form method="POST" action="" enctype="multipart/form-data">
				<input type="hidden" name="size" value="1000000">
<table>
				<div>
					<tr>
						<td>
							<label>Upload Image</label>
						</td>
						<td>
							<input id="img_btn" type="file" accept=".jpg,.jpeg,.png" name="image">
						</td>
					</tr>
					<tr>
						<td>
							<label>Upload File</label>
						</td>
						<td>
							<input id="file_btn" type="file" accept=".pdf,.doc,.docx" name="file">
						</td>
					</tr>
				</div>
				<div>
					<tr>
						<td>
							<label>Title:</label>
						</td>
						<td>
							<input type="text" name="text" placeholder="Title" required>
						</td>
					</tr>
				</div>	</table>
				<div>
					
						
							<button style="margin-left:20px" type="submit" name="upload">POST</button>
							<button style="margin-left:20px" type="reset">RESET</button>
							<input style="margin-left:20px" type="button" onclick="window.location.href='Admin.php?view=guideline'" value="BACK">
						
					
				</div>
			</form>
	
		<hr>
	</div>
</div>


</html>

