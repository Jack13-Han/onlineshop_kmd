<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style/bootstrap.css"/>
<script type="text/javascript" src="style/bootstrap.js"></script>
<script type="text/javascript" src="style/jquery.js"></script>
</head>

<body>
<?php
	if(empty($_SESSION['user'])):
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
    	<div class="navbar-header">
        	<a href="#" class="navbar-brand">Online Book Sale</a>
        </div>
        <ul class="nav navbar-nav">
        	<li class="active">
            	<a href="index.php">Home</a>
            </li>
            <li>
            	<a href="login.php">Login</a>
            </li>
            <li>
            	<a href="registration.php">Register</a>
            </li>
       </ul>             
    </div>
</nav>
<?php
	else:
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
    	<div class="navbar-header">
        	<a href="#" class="navbar-brand">Online Book Sale</a>
        </div>
        <ul class="nav navbar-nav">
        	<li class="active">
            	<a href="index.php">Home</a>
            </li>
            <li>
            	<a href="cart.php">Cart</a>
            </li>
            <li>
            	<a href="logout.php">Logout</a>
            </li>
       </ul>
    </div>
</nav>
<?php
	endif;
?>
</body>
</html>