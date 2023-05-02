  <?php   
 session_start();  
 include('connect.php');
 if (isset($_POST['submit'])) {
 	$quantity = $_POST['quantity'];
 	$price =  $_POST['price'];
 	echo $price;
 	foreach ($quantity as $value) {
 		# code...
 		echo $value;
 	}
 }
 if(isset($_GET['pid']))
{
	$id = $_GET['pid'];
// if (isset($_POST['submit'])) {
// 	$quantity = $_POST['quantity'];
// 	 foreach ($_SESSION["shopping_cart"] as $key => $value) {
//            	$key['item_quantity'] = $quantity;
//             } 
// }
 if(isset($_POST["add_to_cart"]))  
 {  
 	
 	$quantity = 1;
      if(isset($_SESSION["shopping_cart"]))  
      {  
          $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
          // print_r($item_array_id);
          // die();
           if(!in_array($_GET["pid"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                 $item_array = array(  
                     'item_id'     =>     $_GET["pid"],  
                     'item_name'    =>     $_POST["hidden_name"],  
                     'item_price'   =>     $_POST["hidden_price"],  
                     // 'item_quantity' =>     1 
                ); 
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  

           } 
      }  
      else  
      {  
             $item_array = array(  
                'item_id'          =>     $_GET["pid"],  
                'item_name'        =>     $_POST["hidden_name"],  
                'item_price'       =>     $_POST["hidden_price"],  
                // 'item_quantity'    =>     1 
           );
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
//       foreach(  $item_array as $k=> $v ) {
// if( $k == "item_quantity") 
// 	$v=$_POST['quantity'];
// }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["pid"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
}

 ?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | Shopping Cart</title>
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
					<div class="col-sm-6">
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
		<!--header-middle-->
	
	</header><!--/header-->
<div>
	<form action="" method="POST">
	<section id="cart_items">
		<center>
			<h1 style="color: orange";><b>VIEW CART || PRODUCTS</b></h1>
		</center>
		<div class="container">
		<!-- 	<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="shop.php">Products</a></li> 
				  <li class="active"><a href = " ">Shopping Cart</a></li>
				</ol>
			</div> -->
			<div class="table-responsive cart_info">
			
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						 <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
						<tr>
							<td class="cart_product">
									<?php
											$query= "SELECT * FROM photo where pid=".$values['item_id']." LIMIT 1 ";
											// die();
											$pic_result = mysql_query($query);
											while($pic_row = mysql_fetch_array($pic_result)) {
												if (!empty($pic_row['image'])) {
													# code...
												
										?>
										
										
										<img src="uploads/<?= $pic_row['image'] ?> " width ="50px">
										<?php 
											}}
										 ?>
								<!-- <a href=""><img src="images/cart/one.png" alt=""></a> -->
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $values["item_name"]; ?></a></h4>
								<p>Product ID: <a href=""><?php echo $values["item_id"]; ?></a> </p>
							</td>
							<td class="cart_price">
								<p>$<?php echo $values["item_price"]; ?></p>
								<input type="text" hidden name="price" value="<?php echo $values["item_price"]; ?>">
							</td>

							<td class="cart_quantity">

								
								<!-- <div class="cart_quantity_button"> -->
									<!-- <a class="cart_quantity_up" href=""> + </a> -->
								  <input type="text" name="quantity[]"  value="<?php echo $quantity ?>" />   
								 <!-- <input type="text" name="quantity"  value="" placeholder="1" />    -->
									  <!-- <p><?php echo $values["item_quantity"]; ?></p>    -->
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
								<!-- </div> -->
								 <!-- <input type="text" name="quantity"  value="" />  --> 
								 </td>
		
							

							<td class="cart_total">
								<!-- <p class="cart_total_price">$<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></p> -->
								<p class="cart_total_price">$<?php echo number_format($quantity * $values["item_price"], 2); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="cart.php?action=delete&pid=<?php echo $values["item_id"]; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						 <?php  
                                    // $total = $total + ($values["item_quantity"] * $values["item_price"]);   
						  $total = $total + ($quantity * $values["item_price"]);
                               }  
                          ?> 

						  <!--  <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  --> 
                          <?php  
                          }  
                          ?> 
					</tbody>
				</table>

			
			</div>
		</div>
	</section> <!--/#cart_items-->

	 <section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
				</div>
					<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?php echo number_format($total, 2); ?></span></li>
						</ul>
							 <!-- <a class="btn btn-default update" href="">Update</a>  -->
							 <!-- <button type="submit" name="submit">Update Cart</button> -->
								<input type="submit" name="submit" value="update cart">   
							<!-- <a class="btn btn-default check_out" href="">CheckOut</a> -->

					</div>
				</div>
			</div>
		</div>
	</section>
</form>
		</div>		

	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 SHOPPING CART Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

</body>
</html>