<?php include_once '../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.Mng_course {
			width: 90%;
			margin: 0 auto;
		}

		.Mng_course .labCor {
			margin-top: 20px;
		}

		.Mng_course .labCor label {
			font-size: 40px;
		}

		.Mng_course .labCor button {
			margin-left: 10px;
		}

		.Mng_course .labCor .vCourse table {
			width: 100%;
			border: 1px solid lightgrey;
			border-collapse: collapse;
		}

		.Mng_course .labCor .vCourse th,
		td {
			text-align: left;
			border: 1px solid lightgrey;
			border-collapse: collapse;
			padding: 5px;
		}

		.Mng_course .labCor .vCourse th {
			background-color: whitesmoke;
		}

		#countN {
			width: 5%;
			text-align: center;
		}

		#code {
			width: 10%;

		}

	</style>
</head>

<body>
	<div class="Mng_course">
		<div class="labCor">
			<label>COURSE LIST</label>
			<button  onclick="window.location.href='?view=course_add'">ADD</button>
			<hr>
			<div class="vCourse">
				<table>
					<tr>
						<th id="countN">#</th>
						<th id="code">CODE</th>
						<th>NAME</th>
						<th id="code">ACTION</th>
					</tr>
					<?php  
					
					$sqlc = 'SELECT * FROM course ORDER BY courseID ASC ';
					
					$sql = mysqli_query($conn,$sqlc);
						$x = 0;
					
					if(!$sql)
					{
						die ('Could not get Data:'. mysqli_error());
					}
				
					while ($row = mysqli_fetch_array($sql))
					{
						$id = $row['courseID'];
					echo "<tr>
						<th>" .++$x. "</th>
						<td> {$row['CourseCode'] }</td>
						<td> {$row['CourseName']}</td>
						<td><a href=\"course_delete.php?courseID={$id}\">DELETE</a></td>
						</tr>";
					}
					?>
				</table>
			</div>
		</div>
	</div>
</body>

</html>
