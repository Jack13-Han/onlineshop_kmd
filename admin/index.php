<?php
	session_start();
	include 'connect.php';
	include 'function.php';
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
	if(isset($_POST['login']))
	{
		admin_login();
	}
?>
<div class="container">
	<div class="row">
    	<div class="col-md-10 col-md-offset-1">
        	<form method="post">
            	<div class="form-group">
            		<label>User Name</label>
                		<input name="adminname" type="text" class="form-control" />
               		<label>Password</label>
                		<input name="password" type="text" class="form-control" />
                	<input name="login" type="submit" value="Login" class="btn btn-primary"/>
                </div>              
            </form>
    </div>
</div>
</body>
</html>