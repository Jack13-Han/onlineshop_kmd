<?php
session_start();
include 'admin/connect.php';
include 'functions.php';
if(isset($_POST['register'])){
	$user_name=$_POST['username'];
	$password=$_POST['password'];
	$comfirm_password=$_POST['confirmpassword'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
		$address=$_POST['address'];
		$errors=array(
		'username'=>'',
		'password'=>'',
		'confirm_password'=>'',
		'match_password'=>'',
		'email'=>'',
		'phone'=>'',
		'address'=>'',
		);
		if ($user_name==''){
			$errors['username']='User Name must be enter';
		}else
		
		
		
		
		{
			if(strlen($user_name)<3){
				$errors['username']='User Name need to be longer';
			}
		}
		
		
		
		
		
		if($comfirm_password==''){
			$errors['confirm_password']='This Field could not be empty';
			}else
			
			
			
			
			
			{
				if($password!=$comfirm_password){
			$errors['$match_password']='Password Do not match';
				}
			}
			if($password==''){
				$errors['password']='This field could not be empty';
			}else{
				if(strlen($password)<3){
					$errors['password']='Password need to be longer';
				}
			}
			
			
			
			
			
			if($email==''){
				$errors['email']='This field could not be empty';
			}
			
			
			
			
			
			
			
			if($phone==''){
				$errors['phone']='This field could not be empty';
			}
			
			
			
			
			
			if($address==''){
				$errors['address']='This field could not be empty';
			}
			
			
			
			
			
			foreach($errors as $key=>$value){
				if(empty($value)){
					unset($errors[$key]);
				}
			}
			
			
			
			if(empty($errors)){
				//echo"<h3>Registration Success</h3>";
				create_accu();
			}
}
	?>			
			
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="assets/bootstrap.css"/>
<script type="text/javascript" src="assets/bootstrap.js"></script>
<script type="text/javascript" src="assets/jquery-1.10.2.js"></script>


</head>

<body>
<?php
 include 'header.php'
?>
  <div class="container Cus Top">
     <div class="row">
       <div class="col-sm-12">
             <div class="well well-sm">
                <h3>Welcome
                 <span class="showname">
                     <?php 
					   if(!empty($_SESSION['user'])){
						    echo $_SESSION['user'];
					   }
					   else{
						   $_SESSION['user']='';
					   }
					 ?>
                 </span>
                </h3>
             </div>
             <div class="row">
             <div class="col-md-8 col-md-offset-2">
             <form action="#" method="post" class="form-horizontal">
             
            <div class="form-group text-primary"> <lable class="control-lable col-md-2">User Name:</lable>
             <div class="col-md-10">
             <input type="text" name="username" value="<?php if(isset($user_name)){ echo $user_name;} ?>" class="form-control" id="username" placeholder="Enter user name" />
             <lable class="text-danger"><?php echo isset($errors['username'])? $errors['username']:'' ?> </label>
             </div>
             </div>
             
             
             
             
               <div class="form-group text-primary"> <lable class="control-lable col-md-2">Password:</lable>
             <div class="col-md-10">
             <input type="password" name="password" value="<?php echo isset($password)?$password:'' ?>" class="form-control" id="password" placeholder="Enter Password" />
              <lable class="text-danger"><?php echo isset($errors['password'])? $errors['password']:'' ?> </label>
             </div>
             </div>
             
             
             
               <div class="form-group text-primary"> <lable class="control-lable col-md-2">Confirm Password:</lable>
             <div class="col-md-10">
             <input type="password" name="confirmpassword" value="<?php echo isset($confirm_password)?$confirm_password:'' ?>" class="form-control" id="confirmpassword" placeholder="Enter Password again" />
             <lable class="text-danger"><?php echo isset($errors['confirm_password'])? $errors['confirm_password']:'' ?> </label>
              <lable class="text-danger"><?php echo isset($errors['match_password'])? $errors['match_password']:'' ?> </label>
             </div>
             </div>
             
             
             
              <div class="form-group text-primary"> <lable class="control-lable col-md-2">Email:</lable>
             <div class="col-md-10">
             <input type="email" name="email" value=" <?php echo isset($email)?$email:'' ?>" class="form-control" id="email" placeholder="Enter your email" />
              <lable class="text-danger"><?php echo isset($errors['email'])? $errors['email']:'' ?> </label>
             </div>
             </div>

             
             
              <div class="form-group text-primary"> <lable class="control-lable col-md-2">Phone:</lable>
             <div class="col-md-10">
             <input type="text" name="phone" value="<?php echo isset($phone)?$phone:'' ?>" class="form-control" id="phone" placeholder="Enter your Phone Number" />
              <lable class="text-danger"><?php echo isset($errors['phone'])? $errors['phone']:'' ?> </label>
             </div>
             </div>
             
             
             
              <div class="form-group text-primary"> <lable class="control-lable col-md-2">Address:</lable>
             <div class="col-md-10">
            <textarea name="address" value="<?php echo isset($address)?$address:'' ?>" class="form-control"  placeholder="Your Current Address" /></textarea>
             <lable class="text-danger"><?php echo isset($errors['address'])? $errors['address']:'' ?> </label>
             </div>
             </div>
             
             <label class="text-primary"></label>
             <div class="form-group">
             <div class="col-md-offset-2 col-md-10">
             <button type="submit" class="btn btn-default" name="register">Sign Up</button>
             </div>
             </div>
         
             
             
             
             
             
             
             </form>
             </div>
             </div>
             
             

</body>
</html>