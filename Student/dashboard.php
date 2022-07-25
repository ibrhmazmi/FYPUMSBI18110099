<?php include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);

$id = $_SESSION['user'];
$project = mysqli_query($conn,"Select * from project where stud1 = '$id' OR stud2 = '$id' or stud3 = '$id'");

$p = mysqli_fetch_array($project);


$logbook = mysqli_query($conn,"Select * from logbook where stud1 = '$id' OR stud2 = '$id' or stud3 = '$id'");

$log = mysqli_fetch_array($logbook);
$kira = mysqli_num_rows($logbook);
//calculate progress


?>
<! DOCTYPE html>
	<html lang="en">

	<head>

		<link rel="stylesheet" href="css/dashboard.css">
		<style>
			.dashMain {
				width: 95%;
				margin: 0 auto;
				margin-top: 20px;
			}

			.dashMain .dashLabel label {
				font-size: 40px;
			}

		</style>
	</head>

	<body>
		<div class="dashMain">
			<div class="dashLabel">
				<label>DASHBOARD</label>
			</div>
			<hr>
			<div class="dashCont">
				<!--			calculate progress formula-->
				<?php
				$cond0 = $kira ;
				if($cond0 >= 6){
					$cond0 = 20;
				}else{
					$cond0 = 0;
				}
				$cond1 = $p['proposalFileWord'] ;
				if($cond1 ==null){
					$cond1 = 0;
				}else{
					$cond1 = 10;
				}
				$cond2 = $p['fyp1FilePDF'] ;
				if($cond2 == null){
					$cond2 = 0;
				}else{
					$cond2 = 10;
				}
				$cond3 = $p['fyp1FileWord'] ;
				if($cond3 == null){
					$cond3 = 0;
				}else{
					$cond3 = 10;
				}
				$cond4 = $p['fyp2FilePDF'] ;
				if($cond4 ==null){
					$cond4 = 0;
				}else{
					$cond4 = 10;
				}
				$cond5 = $p['fyp2FileWord'] ;
				if($cond5 == null){
					$cond5 = 0;
				}else{
					$cond5 = 10;
				}
				$cond6 = $p['poster'];
				if($cond6 == null){
					$cond6 = 0;
				}else{
					$cond6 = 10;
				}
				$cond7 = $p['source_file'];
				if($cond7 == null){
					$cond7 = 0;
				}else{
					$cond7 = 20;
				}
				$progress = $cond0 + $cond1 + $cond2 + $cond3 + $cond4 + $cond5 + $cond6 + $cond7
				
				?>
				<!--				calculate END-->

				<div class="progress">
					<div class="progress-done" data-done="<?php echo $progress; ?>" style="<?php 
							 if ($progress == 100){
								 echo "background:green";
							 } else if ($progress >= 0){
								 echo "background:yellow";
							 }
							 else{
								 
							 }
							 ?>">
					</div>

				</div>
				<div class="percent">
					<?php echo $progress; ?><small>%</small>
				</div>
				<div class="checklist">
					<table>
						<tr>
							<td>PROPOSAL</td>
							<?php if($p['proposalFileWord'] == null){
	echo "<td style =\"text-align:center;\"><img src=\"img/cross.png\"></td>";
}else {
	echo "<td style =\"text-align:center;\"><img src=\"img/check.png\"></td>";
}
							?>
						</tr>
						<tr>
							<td>FYP 1 Word File</td>
							<?php 
							if($p['fyp1FileWord']==null){
	echo "<td style =\"text-align:center;\"><img src=\"img/cross.png\"></td>";
}else {
	echo "<td style =\"text-align:center;\"><img src=\"img/check.png\"></td>";
}
							?>
						</tr>
						<tr>
							<td>FYP 1 PDF File</td>
							<?php if($p['fyp1FilePDF']==null){
	echo "<td style =\"text-align:center;\"><img src=\"img/cross.png\"></td>";
}else {
	echo "<td style =\"text-align:center;\"><img src=\"img/check.png\"></td>";
}
							?>
						</tr>
						<tr>
							<td>FYP 2 Word File</td>
							<?php if($p['fyp2FileWord']==null){
	echo "<td style =\"text-align:center;\"><img src=\"img/cross.png\"></td>";
}else {
	echo "<td style =\"text-align:center;\"><img src=\"img/check.png\"></td>";
}
							?>
						</tr>
						<tr>
							<td>FYP 2 PDF File</td>
							<?php if($p['fyp2FilePDF']==null){
	echo "<td style =\"text-align:center;\"><img src=\"img/cross.png\"></td>";
}else {
	echo "<td style =\"text-align:center;\"><img src=\"img/check.png\"></td>";
}
							?>
						</tr>
						<tr>
							<td>LOGBOOK</td>
							<?php if($kira <6){
	echo "<td style =\"text-align:center;\"><img src=\"img/cross.png\"></td>";
}else {
	echo "<td style =\"text-align:center;\"><img src=\"img/check.png\"></td>";
}
							?>
						</tr>
						<tr>
							<td>Poster</td>
							<?php if($p['poster']==null){
	echo "<td style =\"text-align:center;\"><img src=\"img/cross.png\"></td>";
}else {
	echo "<td style =\"text-align:center;\"><img src=\"img/check.png\"></td>";
}
							?>
						</tr>
						<tr>
							<td>Source File</td>
							<?php if($p['source_file']==null){
	echo "<td style =\"text-align:center;\"><img src=\"img/cross.png\"></td>";
}else {
	echo "<td style =\"text-align:center;\"><img src=\"img/check.png\"></td>";
}
							?>
						</tr>
					</table>
				</div>
			</div>

		</div>
	</body>

	</html>
	<script>
		const progress = document.querySelector('.progress-done');

		progress.style.width = progress.getAttribute('data-done') + '%';
		progress.style.opacity = 1;

	</script>
