<?php
include_once 'config.php';
$sql = "SELECT * FROM footer";
$view = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($view)){
	

?>
<!--		footer-->
<footer>
	<?php echo 
$row['disclaimer']." ".$row['year']." ".$row['title']." @ ".$row['byWho']	;
		;?>
</footer>
<?php } ?>
</div>
<!--main contain close-->
</body>
<!--	body close-->

</html>
