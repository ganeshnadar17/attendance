<!DOCTYPE html>
<html>
<body>
<head>
<title> HOME </title>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/jquery.dataTables.min.css'>
</head>

<?php include('my_header.php');?>
 
<div class="jumbotron">
	<h1 class="display-3"></h1>
	<p class="lead"><?php
	if(!$per_edit_data){
		echo "No Data Available";
	} else {
		foreach ($per_edit_data as $key=>$value){	
			//$key."=====".$value['name']."<br/>";
		}
	}
	if(!$value['language']){
		echo "No language selected";
	} else {
		$lang[] = (explode('|', $value['language']));
		foreach($lang as $key=>$language){
			//$key."++++++".$language['0']."<br/>";
		}
	}?>
</div>
 
 
 
 <div class="container">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td colspan="1">
					<form class='well form-horizontal' action='<?php echo base_url();?>index.php/home/personal_update_data' method='post' name='process' enctype="multipart/form-data">
						<fieldset>
							<legend> Registration Form </legend>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label"> Name </label>
									<div class="col-sm-10">
										<input type="hidden" name="id" value="<?php echo $value['id'];?>">
										<input type="text" class="form-control" id="name_id" name='name' value="<?php echo $value['name'];?>" >
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" id="email_id" aria-describedby="emailHelp" placeholder="Enter email" name='emailid'  value="<?php echo $value['emailid'];?>">
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
									<label for="age">Age</label>
									<select class="custom-select" name="age" id="age_id">	
										<option> <?php echo $value['age'];?> </option>
										<?php
											for( $i = 1; $i<80; $i++ ) {
												?>
												<option value="<?php echo $i; ?>"> <?php echo $i;?> </option>
												<?php
											}
										?>
									</select>
								</div>
								<fieldset class="form-group">
								<legend>Gender</legend>
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="gender" id="gender_male_id" value="male" <?php if($value['gender'] == 'male') { ?> checked="checked" <?php } ?>>
										Male
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="gender" id="gender_female_id" value="female" <?php if($value['gender'] == 'female') { ?> checked="checked" <?php } ?>>
										Female
									</label>
								</div>
								</fieldset>
								<div class="form-group">
									<label for="exampleSelect1">Mobile Number</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="number_id" name='number' value="<?php echo $value['number'];?>">
									</div>
								</div>
								<div class="form-group">
									<label for="exampleTextarea">Address</label>
									<textarea class="form-control" id="address_id" rows="3" name='address' value="" > <?php echo $value['address'];?> </textarea>
								</div>
	
								<div class="form-group">
									<label for="exampleInputFile">File input</label>
									<input type="file" name="fileToUpload" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
									<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
								</div>
								<div>
								<p><?php  
									$image = $value['upload_image'] ; 
									$img= "http://localhost/ci/uploads/".$image;
									echo '<img src="'.$img.'" style="width:50px;height:60px">';
								?></p>
								</div>
								
    
								<fieldset class="form-group">
									<legend>Language</legend>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="language[]" class="language" value="english" <?php if(in_array("english", $language)) { ?> checked="true" <?php } ?>>
											English
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="language[]" class="language" value="hindi" <?php if(in_array("hindi", $language)) { ?> checked="checked" <?php } ?>>
											Hindi
										</label>
									</div>
									<div class="form-check">		
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="language[]" class="language" value="marathi" <?php if(in_array("marathi", $language)) { ?> checked="checked" <?php } ?>>
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