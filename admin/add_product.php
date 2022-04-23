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
	if(isset($_POST['add_product']))
	{
		add_product();
	}
?>

<div class="container">
	<div class="row">
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
    	<div class="col-md-6 col-md-offset-3">
        	<form method="post" enctype="multipart/form-data">
            	<div class="form-group">
                	<label>Product Name</label>
                    <input type="text" name="product_name" class="form-control" />
                </div>
                <div class="form-group">
                	<label>Category Name</label>
                    <select name="category_id" class="form-control">
                    	<?php
							$query="select * from category";
							$go_query=mysqli_query($connection,$query);
							while($row=mysqli_fetch_array($go_query))
							{
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
								echo "<option value={$cat_id}>{$cat_name}</option>";
							}
						?>
                    </select>
                </div>
                <div class="form-group">
                	<label>Price</label>
                    <input type="text" name="price" class="form-control" />
                </div>
                <div class="form-group">
                	<label>Quantity</label>
                    <input type="text" name="qty" class="form-control" />
                </div>
                <div class="form-group">
                	<label>File input</label>
                    <input name="photo" type="file" />
                </div>
                <input name="add_product" type="submit" value="Save" class="btn btn-primary" />
            </form>
            
        </div>
    </div>
</div>                     
            
</body>
</html>