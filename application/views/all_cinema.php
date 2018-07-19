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
	<table class="table table-striped">
		<tbody>
			<tr>
				<td colspan="1">
					<a class="nav-link" href="<?php echo base_url();?>/index.php/home/add_movie_data">ADD Movie Details <span class="sr-only">(current)</span></a>
				</td>
				<td colspan="1">
					<a class="nav-link" href="<?php echo base_url();?>/index.php/home/book_movie_list">Book Movie <span class="sr-only">(current)</span></a>
				</td>

			</tr>
			
		</tbody>
	</table>
</div>	

<div class="container">
	<a class="editor_create"></a>
	<table id="example" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Sr.no</th>
				<th>From Date</th>
                <th>To Date</th>	
                <th>Movie Name</th>	
                <th>Poster</th>	
                <th>EDIT</th>	
                <th>Delete</th>	
			</tr>
		</thead>
		<?php 
		if(!$movie_list){
			echo "No Student List available ";
			exit;			
		} 
				$x = 1;
				print_r($movie_list);
				foreach ($movie_list as $key=>$value): 
				?>
					<tr>
						<th><?php echo $x; $x++; ?></th>
						<th><?php echo $value['from_date']; ?></th>
						<th><?php echo $value['to_date']; ?></th>
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
						<form action='<?php echo base_url();?>/index.php/home/edit_movie_list' method='post' name=''>
							<input type='hidden' value="<?php echo $value['movie_id']; ?>" name="movie_id" />
							<input type='submit' class="edit_per_detail_btn" value='EDIT' />
						</form>
						</th>
						<th>
						<form action='<?php echo base_url();?>/index.php/home/delete_student_attendance' method='post' name='' id="del_attendance">
							<input type='hidden' value="<?php #echo $value['atten_id']; ?>" name="user_id" />
							<input type='button' class="delete_attendance"  value='Delete' />
						</form>
						</th>
				</tr>
			<?php endforeach; ?>
	</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
 </html>