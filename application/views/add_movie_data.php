<!DOCTYPE html>
<html>
	<body>
		<head>
			<title> HOME </title>
			<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
			<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/jquery.dataTables.min.css'>
		</head>

		<?php include('my_header.php');?>
		<div class="container">
		<form class='well form-horizontal' action='<?php echo base_url();?>index.php/home/added_movie_data' method='post' name='process' enctype="multipart/form-data">
		<div>
		<label for="start"><h3>From Date</h3></label>
		<div>
		<input type="date" id="from_date" name="from_date"
               value="<?php #echo $edit_student_data[0]['atten_date']?>"
               min="2018-01-01" max="2018-12-31" />
			   </div>
    </div>
	<div>
		<label for="start"><h3>To Date</h3></label>
		<div>
		<input type="date" id="to_date" name="to_date"
               value="<?php #echo $edit_student_data[0]['atten_date']?>"
               min="2018-01-01" max="2018-12-31" />
			   </div>
    </div>
	
	<div class="form-group">
		<label for="exampleInputFile">File input</label>
		<input type="file" name="fileToUpload" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
	</div>
	<div class="form-group row">
	<label for="staticEmail" class="col-sm-2 col-form-label"> Movie Name </label>
	<div class="col-sm-4">
	<input type="text" class="form-control" id="name_id" name='movie_name' placeholder="Movie Name" >
	</div>
	</div>
	<input type="submit" class="btn" id="submit_id" value="Student Present">
	</form>
</div>

		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
	$('#sandbox-container .input-daterange').datepicker({
});
	//alert("2120");
	$("#submit_id").click(function(event) {
		if($("input:checked").length <= 0 ){
			alert("Please select the student name.");
			exit;
		} else {
			$("#add_attendance").submit();
		}
	});
});

</script>
		
	</body>
</html>