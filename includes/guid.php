<html>

<head>
	<link rel="stylesheet" href="css/guide.css">
</head>

<body>
	<div id="img_div">
		<h1>Guideline</h1>
		<hr>
	</div>
	<div class="guideBox">




		<div id="linkG">
			<?php
			
		$result = mysqli_query($conn, "SELECT * FROM guide ORDER by id  desc");
				
    while ($row = mysqli_fetch_array($result)) {
     $filedll = $row['file'];
		$filedir = "Admin/upload/file";
		 
      	if(!$row['file']){
      	echo "<li><a>".$row['text']."</a></li><br>";
		 }else{
				echo "<li>
				<a href='$filedir/$filedll'>
				{$row['text']}</a></li><br>";
			}
		 if(!$row['images']){ //image no show if not uploaded
			 
		 }else{
		 echo "<img style=\"max-width: 530px;
	max-height: 700px; margin:0 0 20px 20px;\" src='Admin/upload/img/".$row['images']."'>
		 </a><br>";
		 }
      
    }
			
  ?>
		</div>
	</div>

	</div>

</body>


</html>