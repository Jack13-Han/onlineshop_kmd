<?php
	session_start();
	include 'connect.php';
	include 'function.php';
	$orders=mysqli_query($connection,"select * from orders order by order_id desc");

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css"/>
    <script type="text/javascript" src="../style/bootstrap.js"></script>
    <script type="text/javascript" src="../style/jquery.js"></script>
    
    <style>
	
		.Top
		{
			margin-top:40px;
		}
	
	</style>

</head>

<body>

	<?php
	
		include 'header.php';
	
	?>

	<div class="container Top">
    
     <div class="row">
     
      <div class="col-md-12">
      
       <div class="row">
       
        <div class="page-header">
        
         <h2> Welcome Admin, 
         
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
       
        <table class="table table-striped">
        
         <tr>
         
          <th width="5%"> No </th>
          <th width="5%"> Customer Name </th>
          <th width="5%"> Phone </th>
          <th width="30%"> Delivery Address </th>
          <th width="30%"> Item(s) </th>
          <th width="10%"> Ordered_Date </th>
          <th width="10%"> Sended_Date </th>
          <th width="10%"> Action </th>
         
         </tr>
         
         <?php
		 
		 	while($out=mysqli_fetch_array($orders))
			{
				$check=$out['status'];
				
				if($check>0)
				{
					$show='<tr class="mark">';
				}
				
				else
				{
					$show='<tr>';
					$show.='<td>'.$out['order_id'].'</td>';
					$show.='<td>'.$out['delivery_name'].'</td>';
					$show.='<td>'.$out['delivery_phone'].'</td>';
					$show.='<td>'.$out['delivery_address'].'</td>';
					$show.='<td>';
					
					$orderid=$out['order_id'];
					$order=mysqli_query($connection,"select orders_detail.*,product.* from
					orders_detail left join product on orders_detail.product_id=product.product_id
					where orders_detail.order_id='{$orderid}'");
					
					while($row=mysqli_fetch_assoc($order))
					{
						$show.='<ul>'.$row['product_name'].'<span style="color:red;">
						['.$row['product_qty'].'] </span> </ul>';
					}
					
					$show.='</td>';
					$show.='<td>'.$out['order_date'].'</td>';
					$chesec=$out['status'];
					
					if($chesec>0)
					{
						$show.='<td>'.$out['send_date'].'</td>';
					}
					
					else
					{
						$show.='<td> ----/--/---- </td>';
					}
					
					if($out['status'])
					{
						$show.='<td> <a href="status.php?id='.$out['order_id'].'&status=0"
						class="btn btn-danger"> Undo </a> </td>';
					}
					
					else
					{
						$show.='<td> <a href="status.php?id='.$out['order_id'].'&status=1"
						class="btn btn-info"> Mark as Delivered </a> </td>';
					}
					
					$show.='</tr>';
					echo $show;
				}
			}
		 
		 ?>
        
        </table>
       
       </div>
       
      </div>
      
     </div>
     
    </div>
      


</body>
</html>