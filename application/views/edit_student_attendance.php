<!DOCTYPE html>
<html>
	<body>
		<head>
			<title> HOME </title>
			<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
			<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/jquery.dataTables.min.css'>
		</head>

		<?php include('my_header.php');?>
		<?php #echo "<pre>";print_r($edit_student_data);?>
		
		<div class="container">
<form action='<?php echo base_url();?>index.php/home/save_edit_attendance' method='post' name='add_attendance' id="add_attendance">
<input type='hidden' value="<?php echo $edit_student_data[0]['atten_id']; ?>" name="atten_id" />
	<div>
		<label for="start"><h3>Date</h3></label>
		<input type="date" id="persent_date" name="persent_date" disabled
               value="<?php echo $edit_student_data[0]['atten_date']?>"
               min="2018-01-01" max="2018-12-31" />
    </div>
<a class="editor_create"></a>
		<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
			<tr>
				<th>Name</th>
                <th>Mark Attendance</th>	
			</tr>
		</thead>
		<?php 
		if(!$edit_student_data){
			echo "No Student List available ";
			exit;			
		} else 
			foreach ($edit_student_data[0]['all_users'] as $key=>$value): ?>
			<tfoot>
				<tr>
                    <th><?php echo $value['name']; ?></th>
					<th><input class="form-check-input" type="checkbox" name="student_present[]" class="language" value="<?php echo $value['id'];?>" <?php if($value['user_present'] == 1) { ?> checked="checked" <?php } ?>></th>
				</tr>
			</tfoot>
		<?php endforeach;?>
	</table>
		<input type="button" class="btn" id="submit_id" value="Student Present">
	</form>
</div>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
	//alert("2120");
	$("#submit_id").click(function(event) {
		if($("input:checked").length <= 0 ){
			alert("Please select the student name.");
			exit;
		} else {
			$("#add_attendance").submit();
		}
	});
});

</script>
		
	</body>
</html>