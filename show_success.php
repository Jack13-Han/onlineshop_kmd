<?php 
session_start();
include 'admin/connect.php';
include 'functions.php'; 
$order_id=$_SESSION['order_id'];
	echo $order_id;	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<link href="style/bootstrap.css" rel="stylesheet" />
<script src="style/jquery-1.10.2.js"></script>
<script src="style/bootstrap.js"></script>
<link href="style/style.css" rel="stylesheet">
<style>
.Top{margin-top:70px;}
</style>
<body>
<?php include 'header.php' ?>
<div class="container Top">
	<div class="row">
    	 <div class="col-sm-12">
 		 <h2>Dear Custmer, <strong><span class="show_name">
			<?php if(!empty($_SESSION['user'])){
				echo $_SESSION['user'];
			}else{
				$_SESSION['user']='';
			}?></span></strong></h2>
 				<p class="text-success lead"> &nbsp; &nbsp; &nbsp;You successfully sumitted the following products. Thanks for your shopping here.</p>
  				<p>
                	<table class="table table-hover">
                    	 <tr>
                         	<td>
                            <?php 
						$query="select * from orders where order_id='$order_id'";
						$go_query=mysqli_query($connection,$query);
						while($out=mysqli_fetch_array($go_query)){
							$db_name=$out['delivery_name'];
							$db_address=$out['delivery_phone'];
							$db_phone=$out['delivery_address'];
						}
						?>
						
                        <div class="panel panel-default">
  				<div class="panel-heading">
                <h3><span class="glyphicon glyphicon-envelop"></span> Customer's Information!</h3>
                </div>
 				 <div class="panel-body pull-left">
   			 		<p >Customr Name<span class="glyphicon glyphicon-user"></span>=<?php echo $db_name ?></p>
           			 <p>Customer Phone No=<span class="glyphicon glyphicon-phone"></span> <?php echo $db_phone ?></p>
          			 <p>Customer Address=<span class="glyphicon glyphicon-home"></span> <?php echo $db_address ?></p>
             	</div>
				</div>
						
					      
                            </td>
                            <td>
                            <table class="table table-striped">
                            	<tr>
                                	<th colspan="4">Order_information</th>
                                </tr>
                            	<tr>
                                	<th>Proudct Name</th>
                                    <th>Proudct Price</th>
                                    <th>Product Qty</th>
                                    <th>Unit Price</th>
                                </tr>
                            <?php
							$total=0; 
							$query="select orders_detail.*,product.*
					from orders_detail left join product on orders_detail.product_id=product.product_id where orders_detail.order_id='$order_id'";
							
							$go_query=mysqli_query($connection,$query);
							while($out=mysqli_fetch_array($go_query)){
								$product_name=$out['product_name'];
								$price=$out['price'];
								$qty=$out['product_qty'];
								$unit_price=$qty*$price;
								$total+=$unit_price;
								echo "<tr>
										<td>{$product_name}<br></td>
										<td>{$price}<br></td>
										<td>{$qty}<br></td>
										<td>{$unit_price}</td>
									  </tr>";
								
							}
							
							?>
                            <tr>
                            	
                            	<td colspan="3" align="right">Total Amount is</td>
                                <td><?php echo $total; ?></td>
                            </tr>
							</table>
                            </td>
                 
                         </tr>
                    </table>
                </p>
                	
                </p>	  
			</div>
</div>
</div>
</div>


</body>
</html>