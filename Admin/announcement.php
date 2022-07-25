<?php 
date_default_timezone_set('Asia/Kuala_Lumpur');// set time zone UTC+08:00



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/post_view.css">


</head>

<body>

	<div class="ant">
		<h1>CREATE Announcement</h1>
		<hr>
		<!--		post announcement-->
		<form method="post" action="post_insert.php">
			<div class="title"><br>
				<label> Title:</label>

				<input type="text" name="title" required placeholder="Post Title">
				<input type="date" name="post_date" value="<?php echo date('Y-m-d'); ?>" disabled>
				<input type="time" name="post_time" / value="<?= date('h:i'); ?>" disabled>
			</div>
			<div class="des">
				<br>
				<textarea id="mytextarea" name="desc" maxlength="2000" placeholder="Description (maximum 2000 character)" required></textarea>
			</div>
			<div class="butt">
				<input id="butt" type="reset" value="RESET">
				<input onclick='confirmationDelete(this);return false;' id="butt" type="submit" value="POST" name="btn">
				<input id="butt" type="button" onclick="window.location.href='Admin.php?view=post'" value="BACK">
			</div>

		</form>
		<hr>
		<!--		view after post-->

	</div>
</body>

</html>
<script>
	function confirmationDelete(anchor) {
		var conf = confirm('Confirm Post?');
		if (conf)
			window.location = anchor.attr("href");
	}

</script>
