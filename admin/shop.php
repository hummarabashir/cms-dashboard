
<?php
session_start();
include('connect.php');
 
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | Shopping Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
	</header>
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->


<?php
 include("connect.php");
$sql= "SELECT* FROM pcategory";
$result=mysql_query($sql);
?>
<?php
    while($res = mysql_fetch_assoc($result)) {        
   
    ?>
							<div class="panel panel-default">
								<div class="panel-heading">
	
									<h4 class="panel-title"><a href="#"><?php echo $res['cname'];   ?></a></h4>
									
								</div>
							</div>
							<?php
										}

									?>	
					</div>
				</div>
			</div>

				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
					
									  <?php
$sql = "SELECT * FROM product ORDER BY pid ASC";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
	?>
	
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<?php
											$query= "SELECT * FROM photo where pid=".$row['pid']." LIMIT 1 ";
											// die();
											$pic_result = mysql_query($query);
											while($pic_row = mysql_fetch_array($pic_result)) {
												if (!empty($pic_row['image'])) {
													# code...
												
										?>
										<img src="uploads/<?= $pic_row['image'] ?> " width ="10px">
										<?php 
											}}
										 ?>
										<h2>$<?php echo $row['price'];?></h2>
										<p><?php echo $row['pname'];?></p>
										
										<input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
										 <a href="cart.php?page=shop&action=add&pid=<?php echo $row['pid'] ?>"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> 
										<!-- <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />   -->
									</div>
									 <form method="POST" action="cart.php?pid=<?php echo $row['pid']; ?>">
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$<?php echo $row['price'];?></h2>
											<p><?php echo $row['pname'];?></p>
											<input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
										 <!-- <a href="m.php?page=shop&action=add&pid=<?php echo $row['pid'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>  -->
										 <!-- <input type="text" hidden name="quantity"  value="1" />  -->
									<input type="submit" name="add_to_cart" class="fa fa-shopping-cart" class="btn btn-default" value="Add to Cart" />
										<br>
										<br>
										</div>
									</div>
								</form>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<!-- <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li> -->
										<li><a href="productdetail.php?pid=<?php echo $row['pid'] ?>">View Product</a></li>
									</ul>
								</div>
							</div>
</div>
						<?php
}
						?>
					
					</div>

					
				</div>
			</div>
		</div>
	</section>
	
	 <footer id="footer">

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 Shopping Cart. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer> <!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>