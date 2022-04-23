	<?php
	function add_user()
		{
			global $connection;
			$user_name=$_POST['username'];
			$password=$_POST['password'];
			$cpass=$_POST['comfirmpassword'];
			if($password!=$cpass)
				{
					echo"<script>window.alert('Password and Comfirmpassword are must be same')</script>";	
				}
			else if($password!="" && $user_name!="")
				{
					$query="select * from user where usrname='$user_name' and password=md5('$password')";	
					$ch_query=mysqli_query($connection,$query);
					$count=mysqli_num_rows($ch_query);
					if($count>0)
						{
							echo"<script>window.alert('This user is already exists')</script>";	
						}
					else
						{
							$hashvalue=md5($password);
							$user_role=$_POST['usertype'];
							$query="insert into  user(username,password,role)";
							$query.="values('$user_name','$hashvalue','$user_role')";
							$go_query=mysqli_query($connection,$query);
							if(!$go_query)
								{
									die("QUERY FAILED".mysqli_error($connection));	
								}
									header("location:user_list.php");	
					}
				}				
		}
		function del_user()
			{
				global $connection;
				$u_id=$_GET['id'];
				$query="delete from user where userid='$u_id'";
				$go_query=mysqli_query($connection,$query);
				header("location:user_list.php");	
			}
?>

<?php
	function insert_category()
		{
			global $connection;
			global $msg;
			$cat_name=$_POST['cat_name'];
			if($cat_name=="")
				{
					echo"<script>window.alert('enter name')</script>";	
				}
			else if($cat_name!="")
				{
					$query="select *from category where cat_name='$cat_name'";
					$ch_query=mysqli_query($connection,$query);
					$count=mysqli_num_rows($ch_query);
						if($count>0)
							{
								echo"<script>window.alert('already exists')</script>";
							}
					else
						{
							$query="insert into category(cat_name)values('$cat_name')";
							$go_query=mysqli_query($connection,$query);
								if(!$go_query)
									{
										die("QUERY FAILED".mysqli_error($connection));	
									}
								else
									{
										echo"<script>window.alert('successfully inserted')</script>";	
									}	
						}	
				}	
		}
		function update_category()
		{
			global $connection;
			$cat_name=$_POST['cat_name'];
			$cat_id=$_GET['c_id'];
			$query="update category set cat_name='$cat_name' where cat_id='$cat_id'";
			$go_query=mysqli_query($connection,$query);
			if(!$go_query)
			{
				die("QUERY FAIED".mysqli_eror($connection));
			}
			header("location:category.php");
		}
?>

<?php
	function add_product()
	{
		global $connection;
		$product_name=$_POST['product_name'];
		$cat_id=$_POST['category_id'];
		$price=$_POST['price'];
		$qty=$_POST['qty'];
		$photo=$_FILES['photo']['name'];
		if(is_numeric($price)==false)
		{
			echo "<script>window.alert('enter product Price is numeric value')</script>";
		}
		else if(is_numeric($qty)==false)
		{
			echo "<script>window.alert('enter product qty is numeric value')</script>";
		}
		else if($photo=="")
		{
			echo "<script>window.alert('Choose product Images')</script>";
		}
		else if($product_name!=""&&$photo!="")
		{
			$query="select * from product where product_name='$product_name'";
			$ch_query=mysqli_query($connection,$query);
			$count=mysqli_num_rows($ch_query);
			if($count>0)
			{
				echo "<script>window.alert('This Product is already exists')</script>";
			}
			else
			{
				$query="insert into product(product_name,category_id,price,qty,photo)";
				$query.="values('$product_name','$cat_id','$price','$qty','$photo')";
				$go_query=mysqli_query($connection,$query);
				if(!$go_query)
				{
					die ("QUERY FAILED".mysqli_error($connection));
				}
				else
				{
					move_uploaded_file($_FILES['photo']['tmp_name'],'../images/'.$photo);
					header("location:productlist.php");
				}
			}
		}
	}
	
	function update_product()
	{
		global $connection;
		$product_id=$_GET['p_id'];
		$product_name=$_POST['product_name'];
		$cat_id=$_POST['category_id'];
		$price=$_POST['price'];
		$qty=$_POST['qty'];
		$photo=$_FILES['photo']['name'];
		if(!$photo)
		{
			$query="update product set product_name='$product_name',category_id='$cat_id',price='$price',qty='$qty' where product_id='$product_id'";
		}
		else
		{
			$query="update product set product_name='$product_name',category_id='$cat_id',price='$price',qty='$qty',photo='$photo' where product_id='$product_id'";
		}
		$go_query=mysqli_query($connction,$query);
		if(!$go_query)
		{
			die("QUERY FAILED".mysqli_error($connection));
		}
		else
		{
			move_uploaded_file($_FILES['photo']['tmp_name'],'../images/'.$photo);
		}
		header("location:product.php");
	}
	
	function del_product()
	{
		global $connection;
		$p_id=$_GET['p_id'];
		$query="delete from product where product_id='$p_id'";
		$go_query=mysqli_query($connection,$query);
		header("location:product.php");
	}
?>

<?php
	function admin_login()
	{
		global $connection;
		$name=$_POST['adminname'];
		$password=$_POST['password'];
		$hpass=md5($password);
		$query="select * from user";
		$go_query=mysqli_query($connection,$query);
		while($out=mysqli_fetch_array($go_query))
		{
			$db_user_name=$out['user_name'];
			$db_password=$out['password'];
			$db_user_role=$out['role'];
			if($db_user_name==$name&&$db_password==$hpass&&$db_user_role=='admin')
			{ 
				$_SESSION['admin']=$name;
				header('location:dashboard.php');
			}
			else
			{
				echo "<script>window.alert('Invalid Admin name and Password')</script>";
				echo "<script>window.location.href='index.php'</script>";
			}
		}
	}
?>