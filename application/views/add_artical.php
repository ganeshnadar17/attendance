<!DOCTYPE html>
<html>
<body>
<head>
<title> HOME </title>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
</head>

<?php include('my_header.php');?>

<form action='<?php echo base_url();?>index.php/home/save_artical' method='post' name='add_artical'>
<div class="jumbotron">
  <label for="exampleTextarea">Enter Your Self</label>
      <textarea class="form-control" id="artical_data" name="artical_data"rows="3"></textarea>
	  <input type='Submit' value='SUBMIT' />   
</div>
</form>
	
</body>
</html>
