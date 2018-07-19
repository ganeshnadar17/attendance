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
	<a class="editor_create"></a>
	<table id="example" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Sr.no</th>
				<th>Movie Name</th>
                <th>Image</th>	
                <th>Book</th>		
			</tr>
		</thead>
		<?php 
		if(!$book_movie_list){
			echo "No Movie Available today. ";
			exit;		
		} 
				$x = 1;
				#echo "<pre>"; print_r($book_movie_list);
				#exit;
				foreach ($book_movie_list as $key=>$value): 
				?>
					<tr>
						<th><?php echo $x; $x++; ?></th>
						<th><?php echo $value['movie_name']; ?></th>
						<th>
							<div>
								<p><?php  
									$image = $value['movie_image'] ; 
									$img= "http://localhost/ci/uploads/".$image;
									echo '<img src="'.$img.'" style="width:50px;height:60px">';
								?></p>
								</div>
						</th>
						<th>
						<form action='<?php echo base_url();?>/index.php/home/book_this_movie' method='post' name=''>
							<input type='hidden' value="<?php echo $value['movie_id']; ?>" name="movie_id" />
							<input type='submit' class="edit_per_detail_btn" value='BOOK' />
						</form>
						</th>
					</tr>
			<?php endforeach; ?>
	</table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
 </html>