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
					<a class="nav-link" href="<?php echo base_url();?>/index.php/home/all_students_list">ADD Attendance <span class="sr-only">(current)</span></a>
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
				<th>Date</th>
                <th>Number of student Present</th>	
                <th>Edit</th>	
                <th>Delete</th>	
			</tr>
		</thead>
		<?php 
		if(!$all_student_data){
			echo "No Student List available ";
			exit;			
		} 
				$x = 1;
				foreach ($all_student_data as $key=>$value): 
				$stud = (explode('|', $value['student_id']));
				?>
					<tr>
						<th><?php echo $x; $x++; ?></th>
						<th><?php echo $value['atten_date']; ?></th>
						<th><?php echo sizeof($stud); ?></th>
						<th>
						<form action='<?php echo base_url();?>/index.php/home/edit_student_attendance' method='post' name=''>
							<input type='hidden' value="<?php echo $value['atten_id']; ?>" name="atten_id" />
							<input type='submit' class="edit_per_detail_btn" value='EDIT' />
						</form>
						</th>
						<th>
						<form action='<?php echo base_url();?>/index.php/home/delete_student_attendance' method='post' name='' id="del_attendance">
							<input type='hidden' value="<?php echo $value['atten_id']; ?>" name="user_id" />
							<input type='button' class="delete_attendance"  value='Delete' />
						</form>
						</th>
				</tr>
			<?php endforeach; ?>
	</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
	//alert("2120");
	$(".delete_attendance").click(function(event) {
		var txt;
		var r = confirm("Are you sure want to DELETE !");
		if (r != true) {
			txt = "You pressed Cancel!";
			event.preventDefault();
		}  else {
			$("#del_attendance").submit();
		}
	});
});

</script>

 </body>
 </html>