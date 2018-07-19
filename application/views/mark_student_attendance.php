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
<form action='<?php echo base_url();?>index.php/home/mark_selected_attendance' method='post' name='add_attendance' id="add_attendance">
	<div>
		<label for="start"><h3>Date</h3></label>
		<input type="date" id="persent_date" name="persent_date"
               value="2018-07-22"
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
		if(!$students_list){
			echo "No Student List available ";
			exit;			
		} else 
			foreach ($students_list as $key=>$value): ?>
			<tfoot>
				<tr>
                    <th><?php echo $value['name']; ?></th>
					<th><input class="form-check-input" type="checkbox" name="student_present[]" class="language" value="<?php echo $value['id'];?>"></th>
				</tr>
			</tfoot>
		<?php endforeach; ?>
	</table>
		<input type="button" class="btn" id="submit_id" value="Student Present">
	</form>
</div>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
	//alert("2120");
	$("#submit_id").click(function(event) {
		if($("input:checked").length <= 1 ){
			alert("Please select the student name.");
			exit;
		}
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "/index.php/home/attendance_already_marked",
			dataType: 'json',
			data: {persent_date: $("#persent_date").val()},
			success: function(data){
				if(data.ret_value == 1){
					alert("Attendance Already Exists.");
					//event.preventDefault();
				}else{
					$("#add_attendance").submit();
				}
			}
		});
	});
});

</script>
</body>
</html>