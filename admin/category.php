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
	if(isset($_POST['add_category']))
		{
			insert_category();	
		}
	if(isset($_POST['update_category']))
	{
		update_category();
	}
?>

<?php
	include 'header.php';
?>
<?php
	if(isset($_GET['action'])&&$_GET['action']=='delete')
		{
			del_user();	
		}
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
    	<div class="col-md-6">
    	<form method="post">
    	<div class="form-group">
    	<label>Add Category</label> 
   		<input type="text" name="cat_name" class="form-control" />
   </div>
   <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
   </form>
   <hr />
   
   <?php if(isset($_GET['action'])&&$_GET['action']=='edit')
   		{
			$cat_id=$_GET['c_id'];
			$query="select *from category where cat_id='$cat_id'";
			$go_query=mysqli_query($connection,$query);
			while($out=mysqli_fetch_array($go_query))
			{
				$catname=$out['cat_name'];
   ?>
   <form method="post">
   		<div class="form-group">
   		<label>Update Category</label>
   		<input type="text" name="cat_name" class="form-control" 		value="<?php echo $catname?>" />
   		</div>
   <button type="submit" name="update_category" class="btn					btn-primary">Update</button>
   </form> 
   <?php
			}}
   ?>
   </div>
   <div class="col-md-6">
   		<table class="table table-hover">
        	<tr>
            	<th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
			<?php
				$query="select *from category";
				$go_query=mysqli_query($connection,$query);
				while($row=mysqli_fetch_array($go_query))
					{
						$cat_id=$row['cat_id'];
						$catname=$row['cat_name'];
						echo"<tr>";
						echo"<td>{$cat_id}</td>";
						echo"<td>{$catname}</td>";
						echo"<td><a href='category.php?action=delete&c_id={$cat_id}'>Delete</a>||<a href='category.php?action=edit&c_id={$cat_id}'>Edit</a></td>";
						echo"</tr>";
					}
			?>
            </table>
</div> 
</div></div></div></div>                     
            
</body>
</html>