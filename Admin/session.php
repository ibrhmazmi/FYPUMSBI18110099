<?php 
include_once '../includes/config.php';
error_reporting(E_ALL ^ E_NOTICE);
$sql = mysqli_query($conn,"Select * from session");
$row = mysqli_fetch_array($sql);
$ses = $row['type'];

$setYear = 2019;
$CurrentYear = date('Y');
?>
<!DOCYPE html>
	<html lang="en">

	<head>
		<style>
			.sesMain {
				width: 95%;
				margin: 0 auto;
				margin-top: 20px;
			}

			.sesLabel label {
				font-size: 40px;
			}

			table {
				width: 70%;
				border-collapse: collapse;
			}

			td,
			th {
				width: 25%;
				text-align: center;
			}

			th {
				border: 1px solid black;
				border-collapse: collapse;
				padding: 5px;

				background-color: lightgrey;
				text-align: center;
			}

		</style>
	</head>

	<body>
		<div class="sesMain">
			<div class="sesLabel">
				<label>Manage Current Semester</label>
			</div>
			<hr>
			<?php 
			$fyp1 = $_POST['FYP_1'];
			$fyp2 = $_POST['FYP_2'];
			$year = $_POST['year'];
			
			
			
			if(isset($_POST['FYP_1'])){
			$sql = mysqli_query($conn,"Update session set type= '$fyp1'");
				if($sql)
    {
        mysqli_close($conn); // Close connection
        header("location:Admin.php?view=semester"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }    
				
			}
			else if(isset($_POST['FYP_2'])){
				$sql = mysqli_query($conn,"Update session set type= '$fyp2'");
				if($sql)
    {
        mysqli_close($conn); // Close connection
        header("location:Admin.php?view=semester"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }    
			}
			else if(isset($_POST['year'])){
				$sql = mysqli_query($conn,"Update session set year ='$year'");
					if($sql)
    {
        mysqli_close($conn); // Close connection
        header("location:Admin.php?view=semester"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }  
			}
			?>
			<div class="sesCont">
				<form method="post">
					<table>
						<tr>
							<td>CURRENT FYP:</td>
							<th><?php echo $ses?></th>
							<td>Current Year:</td>
							<th><?php echo $row['year'] ?></th>
						</tr>
						<tr>
							<td>

								<input type="submit" value="FYP 1" name="FYP_1" <?php 
								if ($ses == "FYP 1"){
									echo "disabled";
								}else{
								}
								?>>
								<input type="submit" value="FYP 2" name="FYP_2" <?php 
								if ($ses == "FYP 2"){
									echo "disabled";
								}else{
								}
								?>>
							</td>
							<td></td>
							<td>
								<?php  
$x = date('Y', strtotime('-4 year'));
$y = date('Y', strtotime('+1 year'));
$z = $row['year'];
 ?>
								<select name="year" onchange='this.form.submit()'>
									<option value="<?php echo $z?>">SELECT YEAR</option>
									<?php
while($x <= $y) {
	$a = $x + 1;
  echo "<option value='1-{$x}/{$a}'>1-".$x."/";
  echo $x + 1;
  echo "</option><br>";
  echo "<option value='2-{$x}/{$a}'>2-".$x."/";
  echo $x + 1;
  echo "<br></option>";
  $x++;
}
?>
								</select>
								<noscript><input type="submit" value="Submit"></noscript>
							</td>
						</tr>

					</table>
				</form>
			</div>
		</div>
	</body>

	</html>
