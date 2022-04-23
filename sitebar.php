<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style/bootstrap.css"/>
<script type="text/javascript" src="style/bootstrap.js"></script>
<script type="text/javascript" src="style/jquery.js"></script>
</head>

<body>
<div class="well">
	<h4>Blog Search</h4>
    <form action="search.php" method="post">
    	<div class="input-group">
        	<input type="text" name="search" class="form-control" />
            <span class="input-group-btn">
            	<button type="submit" name="submit" class="btn btn-primary btn-md">
                	<span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
</div>
<div class="well">
	<h4>Categories</h4>
    <div class="row">
    	<div class="col-sm-12">
        <ul class="list-unstyled">
        	<?php
				$category="select * from category";
            	$go_query=mysqli_query($connection,$category);
				while($out=mysqli_fetch_array($go_query))
				{
					$db_cat_id=$out['cat_id'];
					$db_cat_name=$out['cat_name'];
					echo "<li><a href='index.php?cat_id={$db_cat_id}'>{$db_cat_name}</a></li>";
					
				}
			?>
        </ul>
        </div>
    </div>
</div>
</body>
</html>