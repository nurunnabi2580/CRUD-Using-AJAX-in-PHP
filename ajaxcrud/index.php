<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax Crud Oparetion</title>

	<!-- CSS only -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">



</head>
<body>
	<div class="container-fluid bg-info" style="height:100vh">
		<div class="row">
			<div class="col-md-4 text-center border rounded mt-5 text-white">

				<div class="msg"></div>

				<h3>Add Student</h3>

				<div class="form-group">
					<input type="text" placeholder="Enter Student Name" id="formname" class="form-control">
				</div>

				<div class="form-group">
					<input type="text" placeholder="Enter Father Name" id="formfname" class="form-control">
				</div>

				<div class="form-group">
					<input type="text" placeholder="Enter Mother Name" id="formmname" class="form-control">
				</div>

				<div class="form-group">
					<input type="text" placeholder="Enter Phone Number" id="formphone" class="form-control">
				</div>
				<textarea class="form-control" id="formaddress" cols="30" rows="10"></textarea>

				<input class="save form-control mt-2" type="button" value="Add Student">

				<input class="update form-control mt-2" type="submit"  value="Update Student">

				<div class="form-group">
					<input type="hidden" id="id" class="form-control">
				</div>

			</div>

			<div class="col-md-8 text-center border rounded mt-5 text-white">
				<h3>All Student</h3>
				<div class="alldata"></div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js"></script>

	<script src="scripts.js"></script>

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

	<script type="text/javascript">
		$(document).ready( function () {
    	$('#table_id').DataTable();
		} );
	</script>
</body>
</html>