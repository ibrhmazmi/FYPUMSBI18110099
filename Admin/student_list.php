<!DOCTYPE html>
<html>

<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<link rel="stylesheet" href="css/stud_search.css">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>

	<div class="container">
		<h3 align="center"></h3>
		<br />
		<div class="card">
			<div class="card-header">
				<label>STUDENT LIST </label>
				<button onclick='window.location.href="?view=student_add"'>ADD</button>
				<button onclick="window.location.href='?view=student'">ALL</button>
			</div>
			<hr>
			<div class="card-body">
				<div class="form-group">
					<input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search" />
				</div>
				<div class="table-responsive" id="dynamic_content">

				</div>
			</div>
		</div>
	</div>
</body>

</html>
<script>
	$(document).ready(function() {

		load_data(1);

		function load_data(page, query = '') {
			$.ajax({
				url: "student_fetch.php",
				method: "POST",
				data: {
					page: page,
					query: query
				},
				success: function(data) {
					$('#dynamic_content').html(data);
				}
			});
		}

		$(document).on('click', '.page-link', function() {
			var page = $(this).data('page_number');
			var query = $('#search_box').val();
			load_data(page, query);
		});

		$('#search_box').keyup(function() {
			var query = $('#search_box').val();
			load_data(1, query);
		});

	});

</script>
