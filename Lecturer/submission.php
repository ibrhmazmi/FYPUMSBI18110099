<?php
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE); 
$id = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.MainD {
			margin: 0 auto;
			width: 95%;
			margin-top: 20px;
		}

		.LabelD label {
			font-size: 40px;
		}

		.ContD table {
			width: 100%;
		}

		.ContD table,
		th,
		td,
		tr {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
			vertical-align: text-top;
		}

		.ContD th {
			background-color: whitesmoke;
			vertical-align: middle;
		}

		#cent {
			text-align: center;
		}

	</style>
</head>

<body>
	<div class="MainD">
		<div class="LabelD">
			<label>SUBMISSION </label>
		</div>
		<hr>
		<div class="ContD">
			<table>
				<tr>
					<th>#</th>
					<th>Project Title</th>
					<th>Student(s)</th>
					<th>PROPOSAL (WORD)</th>
					<th>FYP 1 REPORT (PDF)</th>
					<th>FYP 1 REPORT (WORD)</th>
					<th>FYP 2 REPORT (PDF)</th>
					<th>FYP 2 REPORT (WORD)</th>
					<th>POSTER</th>
					<th>Source File</th>
				</tr>
				<?php
					$sql = mysqli_query($conn,"SELECT * FROM project where svid = '$id'");
						$kira = mysqli_num_rows($sql);
					$x = 0;
					if(empty($kira)){
						echo "</table><table><td><a style=\"color:red\">NO STUDENT ASSIGNED</a></td></table>";
					}else{
						while($d = mysqli_fetch_array($sql)){
							
							//declare path to download Word file from
					$proWord = $d['proposalFileWord'];
					$proTarget = "../Student/upload/student_file/proposal/".basename($proWord);
					$R1Word = $d['fyp1FileWord'];
					$R1WordTarget = "../Student/upload/student_file/fyp1/".basename($R1Word);
					$R2Word = $d['fyp2FileWord'];
					$R2WordTarget = "../Student/upload/student_file/fyp2/".basename($R2Word);
					
					//declare path to download PDF file from
					$R1PDF = $d['fyp1FilePDF'];
					$R1PDFTarget = "../Student/upload/student_file/fyp1/".basename($R1PDF);
					$R2PDF = $d['fyp2FilePDF'];
					$R2PDFTarget = "../Student/upload/student_file/fyp2/".basename($R2PDF);
							
					//declare path to download poster 
					$poster = $d['poster'];
					$posterTar = "../Student/upload/student_file/poster/".basename($poster);
							
					//declare path to download source_file
					$source = $d['source_file'];
					$sourceTar = "../Student/upload/student_file/source/".basename($source);
						
						echo "<tr>
						<th>".++$x."</th>
						<td>{$d['ProjectTitle']}</td>";
							$stid1 = $d['stud1'];
							$stid2 = $d['stud2'];
							$stid3 = $d['stud3'];
							$check = mysqli_query($conn,"SELECT studName from student where studID ='$stid1' ");
							$s = mysqli_fetch_array($check);
						echo "<td>1. ".$s['studName']."<br>".$stid1;
							if(empty($stid2)){
								
							}else{
								$check = mysqli_query($conn,"SELECT studName from student where studID ='$stid2' ");
							$s = mysqli_fetch_array($check);
								echo "<br>2. ".$s['studName']."<br>".$stid2;
							}
							if(empty($stid3)){
								
							}else{
								$check = mysqli_query($conn,"SELECT studName from student where studID ='$stid3' ");
							$s = mysqli_fetch_array($check);
								echo "<br>3. ".$s['studName']."<br>".$stid3;
							}
					?>
				<td id="cent"><?php if(!$d['proposalFileWord']){
						echo "N/A";
					}else{
						echo "<a href='$proTarget'><img  style='width:25px;height:25px;' src='img/word.png'> </a>";}?></td>

				<td id="cent"><?php if(!$d['fyp1FilePDF']){
						echo "N/A";
					}else{echo  "<a href='$R1PDFTarget'><img  style='width:25px;height:25px;' src='img/pdf.png'> </a>";}?></td>

				<td id="cent"><?php if(!$d['fyp1FileWord']){
						echo "N/A";
					}else{ echo "<a href='$R1WordTarget'><img  style='width:25px;height:25px;' src='img/word.png'> </a>";}?></td>

				<td id="cent"><?php if(!$d['fyp2FilePDF']){
						echo "N/A";
					}else{echo "<a href='$R2PDFTarget'><img  style='width:25px;height:25px;' src='img/pdf.png'> </a>";}?></td>

				<td id="cent"><?php if(!$d['fyp2FileWord']){
						echo "N/A";
					}else{echo "<a href='$R2WordTarget'><img  style='width:25px;height:25px;' src='img/word.png'> </a>";}?></td>

				<td id="cent"><?php if(!$d['poster']){
						echo "N/A";
					}else{echo "<a href='$posterTar'><img  style='width:25px;height:25px;' src='img/poster.png'> </a>";}?></td>

				<td id="cent"><?php if(!$d['source_file']){
						echo "N/A";
					}else{echo "<a href='$sourceTar'><img  style='width:25px;height:25px;' src='img/zip.png'> </a>";}?></td>

				<?php
							}
					}
					?>
			</table>
		</div>
		<hr>
	</div>
</body>

</html>
