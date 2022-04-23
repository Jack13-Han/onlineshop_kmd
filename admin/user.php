<?php
	session_start();
	include'connect.php';
	include'function.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="../style/bootstrap.css"/>
<script type="text/javascript" src="../style/bootstrap.js"></script>
<script type="text/javascript" src="../style/jquery.js"></script>
</head>

<body>
<?php
	include 'header.php';
?>
<?php
	if(isset($_POST['add_user']))
		{
			add_user();	
		}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
    <div class="row">
        <div class="page-header">
        <h2>Welcome admin
        <span class="text-danger">
        <?php
			if(isset($_SESSION['admin']))
			{
				echo $_SESSION['admin'];
			}
			else
			{
				$_SESSION['admin']='';
			}
		?>
        </span>
        </h2>
    </div>
    </div>
    
    <div class="row">
    	<div class="col-md-6 col-md-offset-3">
        <form method="post">
        	<div class="form-group">
            <label>User Name</label>
            <input type="text" name="username" class="form-control" required="required" />
            </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required="required" />
            </div>
            <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="comfirmpassword" class="form-control" required="required" />
            </div>
            <div class="form-group">
            <label>User Type</label>
            <select name="usertype" class="form-control">
            	<option value="admin">---Admin---</option>
                <option value="user">---User---</option>
            </select>
	</div>
    	<button type="submit" name="add_user" class="btn btn-primary">Submit</button>
        </form>
   </div>
   </div>
   </div>
   </div>
</div>                      
            
</body>
</html>