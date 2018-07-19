<!DOCTYPE html>
<html>
<body>
<head>
<title> HOME </title>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
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
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
 </nav>
<form action='<?php echo base_url();?>index.php/home/save_artical' method='post' name='add_artical'>
<div class="jumbotron">
  <label for="exampleTextarea">Enter Your Self</label>
      <textarea class="form-control" id="artical_data" name="artical_data"rows="3"></textarea>
	  <input type='Submit' value='SUBMIT' />   
</div>
</form>
	
</body>
</html>
