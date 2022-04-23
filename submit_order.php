<?php 
session_start();
		include 'admin/connect.php';
		include 'functions.php';
		if(!empty($_SESSION['user'])){
	$user_name=$_SESSION['user'];
	$query="select * from user where username='$user_name'";
	$go_query=mysqli_query($connection,$query);
	while($out=mysqli_fetch_array($go_query)){
		$user_id=$out['userid'];
		$user_name=$out['username'];
		$email=$out['email'];
		$phone=$out['phone'];
		$address=$out['address'];	
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
<form method="post" class="form-horizontal" action="submit.php">
<div class="form-group">
  <label class="control-label col-sm-2" >UserName:</label>
    <div class="col-sm-10">
      <input type="text" name="username" class="form-control" required="required" value="<?php if(isset($user_name)){ echo $user_name; } ?>" />
      <label class="text-danger"></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Email:</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" required="required" value="<?php if(isset($email)){ echo $email; } ?>" />
      <label class="text-danger"></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Phone:</label>
    <div class="col-sm-10">
      <input type="text" name="phone" class="form-control" required="required" value="<?php if(isset($phone)){ echo $phone; } ?>" />
      <label class="text-danger"></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Address:</label>
    <div class="col-sm-10">
      <textarea name="address" class="form-control" required="required" /><?php if(isset($address)) { echo $address; } ?></textarea>
      <label class="text-danger"></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Payment Type:</label>
    <div class="col-sm-10">
      <select name="payment_type" class="form-control">
      	<option>Master Card</option>
        <option>Visa Card</option>
        <option>Credit Card</option>
      </select>
      <label class="text-danger"></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >CardNo:</label>
    <div class="col-sm-10">
      <input type="text" name="cardno" class="form-control" required="required" />
      <label class="text-danger"></label>
    </div>
  </div>
  <label class="text-danger"></label>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <input type="hidden" value="<?php echo $user_id ?>" name="user_id" />
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
  </div>


</form>
</div>
</div>
</div>

</body>
</html>