<!DOCTYPE html>
<html>

<head>    
    <title>Ganesh Login </title>
	<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/jquery.dataTables.min.css'>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>/index.php/home/home">Home <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>/index.php/home/add_artical">ADD Artical <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>/index.php/home/per_details">ADD Personal Details <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>/index.php/home/edit_per_details">All Personal Details <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>/index.php/home/all_student_attendance"> All Student Attendance <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	  
    </form>
  </div>
 </nav>
 <div class="container">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td colspan="1">
					<form class='well form-horizontal' action='<?php echo base_url();?>index.php/home/per_data' method='post' name='process' enctype="multipart/form-data">
						<fieldset>
							<legend> Registration Form </legend>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label"> Name </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="name_id" name='name' placeholder="Enter Name" >
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" id="email_id" aria-describedby="emailHelp" placeholder="Enter email" name='email_id'>
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
									<label for="age">Age</label>
									<select class="custom-select" name="age" id="age_id">	
										<option selected="" >Select Age</option>
										<?php
											for( $i = 1; $i<80; $i++ ) {
												?>
												<option value="<?php echo $i; ?>" > <?php echo $i;?> </option>
												<?php
											}
										?>
									</select>
								</div>
								<fieldset class="form-group">
								<legend>Gender</legend>
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="gender" id="gender_id" value="male" checked="">
										Male
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="female">
										Female
									</label>
								</div>
								</fieldset>
								<div class="form-group">
									<label for="exampleSelect1">Mobile Number</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="number_id" name='number'>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleTextarea">Address</label>
									<textarea class="form-control" id="address_id" rows="3" name='address'></textarea>
								</div>
	
								<div class="form-group">
									<label for="exampleInputFile">File input</label>
									<input type="file" name="fileToUpload" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
									<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
								</div>
    
								<fieldset class="form-group">
									<legend>Language</legend>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="language[]" class="language" value="english">
											English
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="language[]" class="language" value="hindi">
											Hindi
										</label>
									</div>
									<div class="form-check">		
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="language[]" class="language" value="marathi">
											Marathi
										</label>
									</div>
								</fieldset>
    
							<input type='submit' value='SUBMIT' id="submit_btn" />
						</fieldset>        
					</form>
				</td>
			</tr>
		</tbody>
	</table>
 </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
<script>
$(document).ready(function(){
		$('#submit_btn').click(function(){
			//alert($("#name_id").val());
			if($("#name_id").val()==""){
				alert("Name is empty");
				event.preventDefault();
			} else if($("#email_id").val() == ""){
				alert("Email is empty")
				event.preventDefault();
			} else if($("#age_id").val() == "Select Age"){
				alert("Please select age")
				event.preventDefault();
			} else if($("#address_id").val() == ""){
				alert("Please enter address")
				event.preventDefault();
			} else if($("#number_id").val() == "") {
				alert("Please enter number")
				event.preventDefault();
			} else if($("input:checked").length <= 1 ){
				alert("Please select language")
				event.preventDefault();
			}
			
		});
});
</script>
</body>
</html>