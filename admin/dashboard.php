    <?php
	session_start();
	include 'connect.php';
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
    	<div class="col-md-3">
        <div class="panel panel-primary">
        	<div class="panel-heading">
            <h3><span class="glyphicon glyphicon-list"></span>Products</h3>
        	</div>
        <div class="panel-body text-center">
        	<a href="product.php" class="btn btn-primary">View Detail
            <span class="badge">10</span></a> 
        </div>
        </div>
		</div>
        
    	<div class="col-md-3">
        <div class="panel panel-success">
        	<div class="panel-heading">
            <h3><span class="glyphicon glyphicon-list-alt"></span>Categories</h3>
        	</div>
        <div class="panel-body text-center">
        	<a href="category.php" class="btn btn-success">View Detail
            <span class="badge">
            <?php
				$total="select * from category";
				$get_total=mysqli_query($connection,$total);
				$num=mysqli_num_rows($get_total);
				echo $num;
			?>
            </span></a> 
        </div>
        </div>
		</div>
        
        <div class="col-md-3">
        <div class="panel panel-danger">
        	<div class="panel-heading">
            <h3><span class="glyphicon glyphicon-envelope"></span>Order</h3>
        	</div>
        <div class="panel-body text-center">
        	<a href="order.php" class="btn btn-danger">View Detail
            <span class="badge">10</span></a> 
        </div>
        </div>
		</div>
        
        <div class="col-md-3">
        <div class="panel panel-info">
        	<div class="panel-heading">
            <h3><span class="glyphicon glyphicon-user"></span>User</h3>
        	</div>
        <div class="panel-body text-center">
        	<a href="user.php" class="btn btn-info">View Detail
            <span class="badge">
            <?php
				$total="select * from user";
				$get_total=mysqli_query($connection,$total);
				$num=mysqli_num_rows($get_total);
				echo $num;
			?>
            </span></a> 
        </div>
        </div>
		</div>
	</div>
    <div class="row">
    	<a href="add_product.php" class="btn btn-info">Add Product</a>
        <a href="add_user.php" class="btn btn-info">Add User</a>
    </div>
    </div>
    </div>       

</div>
</body>
</html>