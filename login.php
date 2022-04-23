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
.CusTop{margin_top:70px;}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container Custop ">
<div class="row">
    	 <div class="col-sm-12">
 			<div class="well well-sm">
        	<h3>Welcome
            <span class="showname">
			<?php if(!empty($_SESSION['user'])){
				echo $_SESSION['user'];
			}else{
				$_SESSION['user']='';	
			}?></span><?php //echo $num ?>
            </h3>
           </div><!---end well--->
          </div><!---end row---->
<div class="row">
<div class="col-md-8 col-md-offset-2">
<form method="post" class="form-horizontal">
<div class="form-group">
  <label class="control-label col-sm-2" >UserName:</label>
    <div class="col-sm-10">
      <input type="text" name="username" class="form-control" required="required" />
      <label class="text-danger"></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Password:</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" required="required" />
      <label class="text-danger"></label>
    </div>
  </div>
  <label class="text-danger"></label>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="login">Login</button>
    </div>
  </div>


</form>
</div>
</div>
</div>

</body>
</html>