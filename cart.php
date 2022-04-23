<?php 
session_start();
		include 'admin/connect.php';
		include 'functions.php';
		if(isset($_POST['login'])){
	$name=$_POST['username'];
	$password=$_POST['password'];
	$errors=array(
		'username'=>'',
		'password'=>''
	);
	if($name==''){
		$errors['username']="This field could not be empty";	
	}
	if($password==''){
		$errors['password']="This field could not be empty";
	}
	
	$hpass=md5($password);
	$query="select * from user";
	$go_query=mysqli_query($connection,$query);
	while($out=mysqli_fetch_array($go_query)){
		$db_user_name=$out['username'];
		$db_password=$out['password'];
		$db_user_role=$out['role'];	
		if($db_user_name==$name & $db_password==$hpass & $db_user_role=='admin'){
		$_SESSION['admin']=$name;
		header('location:admin/product.php');
	}
	elseif($db_user_name==$name & $db_password==$hpass){
		$_SESSION['user']=$name;
		header('location:index.php');	
	}
	else{
		header('location:index.php');	
	}
	}
	
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style/bootstrap.css"/>
<script type="text/javascript" src="style/bootstrap.js"></script>
<script type="text/javascript" src="style/jquery.js"></script>
<style>
.Custop{margin-top:70px;}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container Custop ">
	<div class="row">
		<div class="panel panel-primary">
  <div class="panel-heading"><h2>Shopping Cart</h2></div>
  
 <?php if(!empty($_SESSION['cart'])): ?>
  <div class="panel-body">
  <table id="" class="table table-condensed">
      <tr>
      	<th>Photo</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Price</th>
        <th>Action</th>
 	 </tr>
     
      <?php
        $total = 0;
        foreach($_SESSION['cart'] as $id => $qty):
          $result = mysqli_query($connection,"SELECT * FROM product WHERE product_id=$id");
          $row = mysqli_fetch_assoc($result);
          $total += $row['price'] * $qty;
		
      ?>
     
      <tr>
      	<td><img src="images/<?php echo $row['photo'] ?>" width="100" height="100" class="img img-thumbnail" /></td>
        <td><?php echo $row['product_name'] ?></td>
        <td><?php echo $qty ?>
        <span>
        	<a href="increase_qty.php?id=<?php echo $id ?>" class="glyphicon glyphicon-plus-sign"></a>
            <a href="decrease_qty.php?id=<?php echo $id ?>" class="glyphicon glyphicon-minus-sign"></a>
        </td>
        <td>$<?php echo $row['price'] ?></td>
        <td>$<?php echo $row['price'] * $qty ?></td>
        <td><span  style="margin:5px"></span>
        <a href="remove.php?id=<?php echo $id ?>" class="glyphicon glyphicon-remove"></a></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="5" align="right"><b>Total:</b></td>
        <td>$<?php echo $total; ?></td>
      </tr>
    </table>
    </div>

<div class="panel-footer">
<a href="clear.php" class="btn btn-danger">Clear Cart</a>
<a href="index.php" class="btn btn-default">Back</a>
<a href="submit_order.php" class="btn btn-success">Submit Order!</a>
</div>

	</div>

<?php else: ?>
		<h3  class="text-danger lead text-center">You select no products now!</h3>
        <p class="text-center"><a href="index.php" class="btn btn-info">Shop Now</a></p>
<?php endif; ?>
      
</div>
</div>
</div>



</body>
</html>