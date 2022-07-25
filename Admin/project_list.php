<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/pList.css">
</head>

<body>
	<div class="mainCont">
		<label> PROJECT LIST: <?php echo $_SESSION['type']." | ".$_SESSION['year']." "; ?></label><button onclick="window.print();">Print</button>
		<hr>
		<p style="padding:5px;background-color:whitesmoke;">**Click Project's Title to Assign supervisor/examiners**</p>
		<div class="listCont">


			<?php include_once "../includes/config.php";
error_reporting(E_ALL ^ E_NOTICE);  

			
		
				$list = mysqli_query($conn,"SELECT * FROM project ORDER by svid DESC")  or die (mysqli_error($conn)); 
			
		
			if($list->num_rows>0){
			?>

			<table>
				<tr>
					<th>#</th>
					<th>TITLE</th>
					<th>SUPERVISOR</th>
					<th>STUDENT(s)</th>
					<th>PROPOSAL (WORD)</th>
					<th>FYP 1 REPORT (PDF)</th>
					<th>FYP 1 REPORT (WORD)</th>
					<th>FYP 2 REPORT (PDF)</th>
					<th>FYP 2 REPORT (WORD)</th>
					<th>POSTER</th>
					<th>SOURCE FILE</th>
					<th>EXAMINER</th>

				</tr>

				<?php
				
				$x = 0;
				while($row = mysqli_fetch_array($list)){
					//declare path to download Word file from
					$proWord = $row['proposalFileWord'];
					$proTarget = "../Student/upload/student_file/proposal/".basename($proWord);
					$R1Word = $row['fyp1FileWord'];
					$R1WordTarget = "../Student/upload/student_file/fyp1/".basename($R1Word);
					$R2Word = $row['fyp2FileWord'];
					$R2WordTarget = "../Student/upload/student_file/fyp2/".basename($R2Word);
					
					//declare path to download PDF file from
					$R1PDF = $row['fyp1FilePDF'];
					$R1PDFTarget = "../Student/upload/student_file/fyp1/".basename($R1PDF);
					$R2PDF = $row['fyp2FilePDF'];
					$R2PDFTarget = "../Student/upload/student_file/fyp2/".basename($R2PDF);
					
					//declare path to download poster
					$poster = $row['poster'];
					$posterTar = "../Student/upload/student_file/poster/".basename($poster);
					
					//declare path to download sourcefile
					$source = $row['source_file'];
					$sourceTar = "../Student/upload/student_file/source/".basename($source);
					?>
				<tr>
					<th><?php echo ++$x ?> </th>

					<td><a href="?id=<?php echo $row['Pid']; ?>&view=assign"><?php echo $row['ProjectTitle'];?></a></td>

					<td><?php
					$s = $row['svid'];
					$sc = mysqli_query($conn,"SElect lectName from lecturer where lectID = '$s'");
					$sName = mysqli_fetch_array($sc);
					if (!empty($s)){
					echo $sName['lectName'];
						}
						else{
							echo "<a style=\"color:red;text-align:center;\">NOT ASSIGN</a>";
						}
						?></td>


					<td><?php 
					$st1 = $row['stud1'];
					$sq = mysqli_query($conn,"SELECT studName from student where studID ='$st1' ");
					$d = mysqli_fetch_array($sq);
					echo "1. ".$d['studName']."<br>".$row['stud1'];?><br>

						<?php 
					
					$st2 = $row['stud2'];
					if(!empty($st2)){
					$sq = mysqli_query($conn,"SELECT studName from student where studID ='$st2' ");
					$d = mysqli_fetch_array($sq);
					
					echo "2. ".$d['studName']."<br>".$row['stud2'];
						}
					else{
					}
					$st3 = $row['stud3'];
					if(!empty($st3)){
					$sq = mysqli_query($conn,"SELECT studName from student where studID ='$st3' ");
					$d = mysqli_fetch_array($sq);
					
					echo "<br>3. ".$d['studName']."<br>".$row['stud3'];
						}
					else{
					}
						
						?>
					</td>


					<td><?php if(!$row['proposalFileWord']){
						echo "N/A";
					}else{
						echo "<a href='$proTarget'><img  style='width:30px;height:30px;' src='img/word.png'> </a>";}?></td>

					<td><?php if(!$row['fyp1FilePDF']){
						echo "N/A";
					}else{echo  "<a href='$R1PDFTarget'><img  style='width:30px;height:30px;' src='img/pdf.png'> </a>";}?></td>

					<td><?php if(!$row['fyp1FileWord']){
						echo "N/A";
					}else{ echo "<a href='$R1WordTarget'><img  style='width:30px;height:30px;' src='img/word.png'> </a>";}?></td>

					<td><?php if(!$row['fyp2FilePDF']){
						echo "N/A";
					}else{echo "<a href='$R2PDFTarget'><img  style='width:30px;height:30px;' src='img/pdf.png'> </a>";}?></td>

					<td><?php if(!$row['fyp2FileWord']){
						echo "N/A";
					}else{echo "<a href='$R2WordTarget'><img  style='width:30px;height:30px;' src='img/word.png'> </a>";}?></td>

					<td><?php if(!$row['poster']){
						echo "N/A";
					}else{echo "<a href='$posterTar'><img  style='width:30px;height:30px;' src='img/poster.png'> </a>";}?></td>

					<td><?php if(!$row['source_file']){
						echo "N/A";
					}else{echo "<a href='$sourceTar'><img  style='width:30px;height:30px;' src='img/zip.png'> </a>";}?></td>


					<td><?php
					if($row['exid1'] == null && $row['exid2'] == null){
				
						echo "<a style=\"color:red;text-align:center;\">NOT ASSIGN</a>";
					}else if($row['exid1'] ==null){
						
					$ckex2 = $row['exid2'];
					$cd = mysqli_query($conn,"SELECT lectName from lecturer where lectID = '$ckex2'");
					$d = mysqli_fetch_array($cd);
						echo "<a style=\"color:red\">1.NOT ASSIGN</a><br>2.".$d['lectName'];
					}
					else if ($row['exid2'] ==null){
					$ckex1 = $row['exid1'];
					$cd = mysqli_query($conn,"SELECT lectName from lecturer where lectID = '$ckex1'");
					$d = mysqli_fetch_array($cd);
						echo "1.".$d['lectName']."<br><a style=\"color:red\">2.NOT ASSIGN</a>";
					}else{
						$ckex1 = $row['exid1'];
					$ckex2 = $row['exid2'];
					$cd = mysqli_query($conn,"SELECT lectName from lecturer where lectID = '$ckex1'");
					$d = mysqli_fetch_array($cd);
						$cd2 = mysqli_query($conn,"SELECT lectName from lecturer where lectID = '$ckex2'");
					$d2 = mysqli_fetch_array($cd2);
						 echo "1.".$d['lectName']."<br>2.".$d2['lectName'];
					}
						?></td>

				</tr>


				<?php	
				}
				}
				?>
			</table>
			<br>
			<hr>
		</div>



	</div>
</body>

</html>
