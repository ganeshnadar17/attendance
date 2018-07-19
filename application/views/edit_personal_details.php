<!DOCTYPE html>
<html>
<body>
<head>
<title> HOME </title>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/jquery.dataTables.min.css'>
</head>

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
        <a class="nav-link" href="<?php echo base_url();?>/index.php/home/edit_per_details"> All Student Details <span class="sr-only">(current)</span></a>
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
 
 
<div class="jumbotron">
	<h1 class="display-3"></h1>
	<p class="lead"><?php 
	if(!$per_data){
		echo "No Data Available";
	} else{
		foreach ($per_data as $key=>$value){	
			$key."=====".$value['name']."<br/>";
		}
	}			
	if(!$value['language']){
		echo "No language Selcted";
	} else{
		$lang[] = (explode('|', $value['language']));
		#print_r($lang);
		foreach ($lang as $key=>$language[]){	
		}
		#print_r($language);
	}?>
		<a class="editor_create"> Personal Details Added</a>
		<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
			<tr>
				<th>Name</th>
                <th>Email ID</th>
                <th>Number</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Language</th>
                <th>Image</th>
				
			</tr>
		</thead>
		<?php foreach ($per_data 	as $key=>$value): ?>
			<tfoot>
				<tr>
                    <th><?php echo $value['name']; ?></th>
                    <th><?php echo $value['emailid']; ?></th>
                    <th><?php echo $value['number']; ?></th>
                    <th><?php echo $value['age']; ?></th>
                    <th><?php echo $value['gender']; ?></th>
                    <th><?php echo $value['language']; ?></th>
                    <th><?php  
						$image = $value['upload_image'] ; 
						$img= "http://localhost/ci/uploads/".$image;
						echo '<img src="'.$img.'" style="width:50px;height:60px">';
					?></th>
					<th>
						<form action='<?php echo base_url();?>/index.php/home/edit_per_data' method='post' name='edit_artical'>
							<input type='hidden' value="<?php echo $value['id']; ?>" name="user_id" />
							<input type='submit' class="edit_per_detail_btn" value='EDIT' />
						</form>
					</th>
					<th>
						<form action='<?php echo base_url();?>index.php/home/personal_detete_data' method='post' name='add_artical' id="delele_btn">
							<input type='hidden' value="<?php echo $value['id']; ?>" name="user_id" />
							<input class="detele_btn_class" type='submit' value='DELETE'/>
						</form>
					</th>
				</tr>
			</tfoot>
		<?php endforeach; ?>
	</table>
</p>
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('.detele_btn_class').click(function(){
		//	alert("0000000000000");
		var txt;
		var r = confirm("Are you sure want to DELETE !");
		if (r != true) {
			txt = "You pressed Cancel!";
			event.preventDefault();
		}
	});
});
</script>
 