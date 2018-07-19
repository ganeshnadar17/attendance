<!DOCTYPE html>
<html>
<body>
<head>
<title> HOME </title>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/jquery.dataTables.min.css'>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><?php echo $first_name;?></a>
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
        <a class="nav-link" href="<?php echo base_url();?>/index.php/home/edit_per_details"> Edit Personal Details <span class="sr-only">(current)</span></a>
      </li>
    </ul>
	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
 </nav>

<div class="jumbotron">
  <h1 class="display-3"><?php echo $first_name; ?></h1>
  <p class="lead"><?php 
  if(!$artical)
  {
	  echo "No Artical Available";
  }
  else
  {
	  	  foreach ($artical as $key=>$value)
	  {	
		#$key = $key + 1 ;
	   $key."=====".$value['artical_user']."<br/>";
	   $key + 1;
	  }
}?>
	  
	  <a class="editor_create">Artical Added</a>
 
<table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                        </tr>
                    </thead>
					
					<?php foreach ($artical as $key=>$value): ?>
                                             
                    <tfoot>
                        <tr>
                            <th><?php echo $key;?></th>
                            <th><?php echo $value['artical_user']; ?></th>
							<th>
							<form action='<?php echo base_url();?>/index.php/home/edit_artical' method='post' name='edit_artical'>
							<input type='hidden' value="<?php echo $value['id']; ?>" name="artical_id" />
							<input type="text" name="artical_data" class="edit_txt" id="edit_single_txt<?php echo $value['id']?>" value="<?php echo $value['artical_user']; ?>" />
							<input type="submit" class="save_btn" id="save_single_btn<?php echo $value['id']?>" value="Save" />
							<input type='button' class="edit_btn" rel1="<?php echo $value['id']?>" value='EDIT' />
							</form>
							</th>
							<th>
							<form action='<?php echo base_url();?>index.php/home/detete_artical' method='post' name='add_artical' id="delele_btn">
							<input type='hidden' value="<?php echo $value['id']; ?>" name="user_id" />
							<input type='Submit' value='DELETE' class="detele_btn_class"/>
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
	 $('.edit_txt').hide();
	 $('.save_btn').hide();
    $(".edit_btn").click(function(){
		//$('.edit_txt').toggle();
		$('#edit_single_txt' +$(this).attr("rel1") ).toggle();
		$('#save_single_btn' +$(this).attr("rel1") ).toggle();
		$(this).hide();
		//alert("The id is "+ $(this).attr("rel1") );
    });
});

$(document).ready(function(){
	$('.detele_btn_class').click(function(){
		//alert("0000000000000");
		var txt;
		var r = confirm("Are you sure want to DELETE !");
		if (r != true) {
			txt = "You pressed Cancel!";
			event.preventDefault();
		}
	});
});
</script>
	
</body>
</html>
