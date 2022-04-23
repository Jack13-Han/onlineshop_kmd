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

<?php
	if(isset($_GET['action'])&&$_GET['action']=='delete')
	{
		del_product();
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
    	<div class="col-md-10 col-md-offset-1">
        	<table class="table table-striped">
  <tr>
    <td colspan="7"><a href="product.php" class="btn btn-success"> <span class="glyphicon  glyphicon-plus"></span>add product</a>  </td>
    </tr>
                <tr class="bg-success">
                	<td>Photo</td>
                    <td>ProductID</td>
                    <td>ProductName</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Qty</td>
                    <td>Actions</td>
                </tr>
                
                <?php
					if(isset($_GET['action'])&&$_GET['action']=='delete')
					{
						del_product();
					}
					$query="select product.*,category.*from product,category where product.category_id=category.cat_id order by product_id desc";
					$go_query=mysqli_query($connection,$query);
					while($row=mysqli_fetch_array($go_query))
					{
						$product_id=$row['product_id'];
						$product_name=$row['product_name'];
						$cat_name=$row['cat_name'];
						$price=$row['price'];
						$qty=$row['qty'];
						$photo=$row['photo'];
						echo "<tr>";
						echo "<td><img src='../images/{$photo}' width='100' height='100'></td>";
						echo "<td>{$product_id}</td>";
						echo "<td>{$product_name}</td>";
						echo "<td>{$cat_name}</td>";
						echo "<td>{$price}</td>";
						echo "<td>{$qty}</td>";
						echo "<td><a href='product.php?action=delete&p_id={$product_id}' class='glyphicon glyphicon-remove' onclick=\"return confirm('Are You Sure?')\"></a>|| <a href='edit.php?action=edit&p_id={$product_id}' class='glyphicon glyphicon-edit'</a></td>";
						echo "</tr>";
					}
				?>
            </table>
            
        </div>
    </div>
</div>                     
            
</body>
</html>