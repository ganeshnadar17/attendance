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
<div>
	<p><h1><?php echo $already_booked_list[0]['movie_name'] ?></h1>
	<?php #echo "<pre>"; print_r($already_booked_list);
		$movie_list = array();
		foreach ($already_booked_list['already_booked_list'] as $key=>$value)	{
			#$data[] = array('1' => $value['selected_list']);
			$movie_list = array_merge(explode(",", $value['selected_list']), $movie_list);
			#$movie_list[] = $movie_list1;
		}?></p>
</div>
<div>
		<p><?php  
			$image = $already_booked_list[0]['movie_image']; 
			$img= "http://localhost/ci/uploads/".$image;
			echo '<img src="'.$img.'" style="width:300px;height:150px">';
			?></p>
		</div>
</div>

<div class="container">
	<a class="editor_create"></a>
	<form class='well form-horizontal' action='<?php echo base_url();?>index.php/home/selected_movie_list' method='post' name='process'>
	<input type='hidden' value="<?php echo $already_booked_list['already_booked_list'][0]['movie_id']; ?>" name="movie_id" />
	<table id="example" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>#</th>
				<?php for($i = 1; $i <= 10; $i++) :?>
				<th> <?php echo $i; ?></th>
				<?php endfor;?>		
			</tr>
		</thead>
			<?php for ($char = 'A'; $char <= 'J'; $char++) : ?>
				<tr>
					<th>  <?php echo $char; ?></br></th>
						<?php for($i = 1; $i <= 10; $i++) {?> 
<th><input class="form-check-input" type="checkbox" name="selected_movie_list[]" class="language" value="<?php echo $char.$i;?>" <?php if (in_array($char.$i, $movie_list)) { ?> checked="checked" disabled <?php } ?> ></br></th>
						<?php };?>
					</tr>
				<?php #endfor; ?>	
			<?php endfor; ?>
	</table>
<div>
	<input type="submit" class="btn" id="submit_id" value="BOOK">
	</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
 </html>