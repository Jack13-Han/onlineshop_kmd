<?php 
session_start();
		include 'admin/connect.php';
		include 'functions.php'; 
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
.CusTop{margin-top:70px;}
</style>
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
			}?></span>
            </h3>
            
       		 </div>
             
        <div class="row">
        <div class="col-sm-3">
        	<?php include 'sitebar.php'; ?>
        </div>
        <div class="col-sm-9">
    <?php
	if(isset($_POST['submit'])){
		show_result();	
	}
?>		
			</div>
         </div><!---end row--->
    </div>
  </div>
</div>


</body>
</html>