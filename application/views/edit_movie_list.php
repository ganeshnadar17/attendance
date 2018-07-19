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
		<?php print_r($edit_movie_list); ?>
		<form class='well form-horizontal' action='<?php echo base_url();?>index.php/home/save_edit_movie_data' method='post' name='process' enctype="multipart/form-data">
		<input type='hidden' value="<?php echo $edit_movie_list[0]['movie_id']; ?>" name="movie_id" />
		<div>
		<label for="start"><h3>From Date</h3></label>
		<div>
		<input type="date" id="from_date" name="from_date"
               value="<?php echo $edit_movie_list[0]['from_date']; ?>"
               min="2018-01-01" max="2018-12-31" />
			   </div>
    </div>
	<div>
		<label for="start"><h3>To Date</h3></label>
		<div>
		<input type="date" id="to_date" name="to_date"
               value="<?php echo $edit_movie_list[0]['to_date']; ?>"
               min="2018-01-01" max="2018-12-31" />
			   </div>
    </div>
	
	<div class="form-group">
		<label for="exampleInputFile">File input</label>
		<input type="file" name="fileToUpload" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
	</div>
	<div>
		<p><?php  
			$image = $edit_movie_list[0]['movie_image']; 
			$img= "http://localhost/ci/uploads/".$image;
			echo '<img src="'.$img.'" style="width:50px;height:60px">';
			?></p>
		</div>
	<div class="form-group row">
	<label for="staticEmail" class="col-sm-2 col-form-label"> Movie Name </label>
	<div class="col-sm-4">
	<input type="text" class="form-control" id="name_id" name='movie_name' placeholder="Movie Name" value="<?php echo $edit_movie_list[0]['movie_name']; ?>" >
	</div>
	</div>
	<input type="submit" class="btn" id="submit_id" value="Save">
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