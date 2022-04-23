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
    	<div class="col-md-12">
        <table class="table table-striped">
        	<tr>
            	<td colspan="4" align="right"><a href="user.php" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span>Add user</a></td>
            </tr>
            <tr>
            	<th>User ID</th>
                <th>User Name</th>
                <th>User Role</th>
                <th>Action</th>
            </tr>
            <?php
            $query="select * from user order by userid desc";
				$go_query=mysqli_query($connection,$query);
				while($row=mysqli_fetch_array($go_query))
					{
						$user_id=$row['userid'];
						$user_name=$row['username'];
						$user_role=$row['role'];
						echo"<tr>";
						echo"<td>{$user_id}</td>";
						echo"<td>$user_name</td>";
						echo"<td>{$user_role}</td>"	;
						echo"<td><a href='user_list.php? action=delete&id={$user_id}' class='glyphicon glyphicon-trash' onclick=\"return confirm('Are you sure')\"></a></td>";
						echo"</tr>";
					} 
			?>
        </table>
   </div>
   
   </div>
   </div>
</div>                      
            
</body>
</html>