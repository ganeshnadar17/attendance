<!DOCTYPE html>
<html>

<head>    
    <title>Ganesh Login </title>
	<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>assets/csc/bootstrap.min.css'>
</head>
<body>

<?php include('my_header.php');?>

    <div id='login_form'>
        <form action='<?php echo base_url();?>index.php/login/process' method='post' name='process'>
            <h2>User Login</h2>
            <br />
            <?php if(! is_null($msg)) echo $msg;?>            
            <label for='username'>Username</label>
            <input type='text' name='username' id='username' size='25' /><br />
        
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' size='25' /><br />                            
        
            <input type='Submit' value='Login' />            
        </form>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script scr="<?php echo base_url();?>assets/csc/js/bootstrap.min.js></script>
</body>
</html>