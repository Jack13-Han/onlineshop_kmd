<?php 
session_start();
		include 'admin/connect.php';
		include 'functions.php';
		$getquery="select * from product";
		$perpage=4;
		$go_query=mysqli_query($connection,$getquery);
		$num=mysqli_num_rows($go_query);
		$num=ceil($num/$perpage); 
		$page=''; //for panigation!
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
.CusTop{margin-top:70px;}
</style>
</head>

<body>
<?php include 'header.php' ?>
<div class="container CusTop">
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
        <div class="col-sm-3">
        	<?php include 'sitebar.php'; ?>
        </div>
        <div class="col-sm-9">
         <?php
	  		
		if(isset($_GET['page'])){
		$page=$_GET['page'];
		$show_product=($page*$perpage)-$perpage;	
		}
		if(!isset($_GET['page'])){
		$show_product=0;
		}
		
		if(isset($_GET['cat_id'])){
		$cid=$_GET['cat_id'];
		
		//if($page==1){
			//$query="select * from product limit 0,2";	
		//}
		//elseif($page==2){
			//$query="select * from product limit 2,2";
		//}
		//elseif($page==3){
			//$query="select * from product limit 4,2";
		//}
		$query="select * from product where category_id ='$cid' limit $show_product,$perpage";
		}else{
					$query="select * from product limit $show_product,$perpage";
	
		}
		$go_query=mysqli_query($connection,$query);
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
		
?>
        </div>
        
       </div>
       
			</div>
         </div><!---end row--->
          
    </div>
<hr />
 <ul class="pager">
 	<?php
		for($i=1;$i<=$num;$i++){
			if($i==$page){
			echo "<li><a href='index.php?page={$i}' style='background:#09f;color:#fff;'>{$i}</a></li>";
			}else{
				
				echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
			}
		}
	?>
 </ul>
</body>
</html>