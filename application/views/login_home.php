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
