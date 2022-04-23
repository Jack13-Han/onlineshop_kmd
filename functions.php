<?php
function show_result(){
	global $connection;
$data=$_POST['search'];
	
	$query="select * from product where product_name LIKE '%$data%'";
	$go_query=mysqli_query($connection,$query);
	$count_result=mysqli_num_rows($go_query);
	if($count_result==0){
		echo '<div class="well well-lg"> Sorry,no results found! <a href="index.php">Back</a></div>';	
	}elseif($count_result>0){
		
	while($out=mysqli_fetch_array($go_query)){
		$product_id=$out['product_id'];
		$product_name=$out['product_name'];
		$category_id=$out['category_id'];
		$price=$out['price'];
		$qty=$out['qty'];
		$photo=$out['photo'];
		$display ='<div class="col-sm-3 col-md-3"><div class="thumbnail">';
		$display.="<img src='images/{$photo}'>";
		$display.='<div class="caption">';
	
		$display.="<h3>{$product_name}</h3>";

		$display.="<p>{$price}</p>";
		$display.='<p class="text-center"><a href="add-to-cart.php?id='.$product_id.'" class="btn btn-primary">Add-to-cat</a></p>';
		$display.="</div></div></div>";
		
		echo $display;
	
	}
	}	
}

function show_resultc(){
	global $connection;
$data=$_GET['cat_id'];
	
	$query="select * from product where category_id = '$data'";
	$go_query=mysqli_query($connection,$query);
	$count_result=mysqli_num_rows($go_query);
	if($count_result==0){
		echo '<div class="well well-lg"> Sorry,no results found! <a href="index.php">Back</a></div>';	
	}elseif($count_result>0){
		
	while($out=mysqli_fetch_array($go_query)){
		$product_id=$out['product_id'];
		$product_name=$out['product_name'];
		$category_id=$out['category_id'];
		$price=$out['price'];
		$qty=$out['qty'];
		$photo=$out['photo'];
		$display ='<div class="col-sm-3 col-md-3"><div class="thumbnail">';
		$display.="<img src='images/{$photo}'>";
		$display.='<div class="caption">';
	
		$display.="<h3>{$product_name}</h3>";

		$display.="<p>{$price}</p>";
		$display.='<p class="text-center"><a href="add-to-cart.php?id='.$product_id.'" class="btn btn-primary">Add-to-cat</a></p>';
		$display.="</div></div></div>";
		
		echo $display;
	
	}
	}	
}

function create_accu(){
	global $connection;
	global $user_name;
	global $password;
	global $email;
	global $phone;
	global $address;
	
	$hpass=md5($password);
	$query="select * from user where username='$user_name' and password='$hpass'";
	$user_query=mysqli_query($connection,$query);
	$count=mysqli_num_rows($user_query);
			if($count>0){
			echo "<script>window.alert('already exists')</script>";	
				}
			else{	
				$query="insert into user(username,password,email,phone,address,role)";
				$query.="values('$user_name','$hpass','$email','$phone','$address','user')";
				$go_query=mysqli_query($connection,$query);
				if(!$go_query){
					die("QUERY FAILED".mysqli_error($connection));
				}
				else
				{echo"<script>window.alert('you successfully created an accuount')</script>";
				}
				
				}
                
		}
	

?>