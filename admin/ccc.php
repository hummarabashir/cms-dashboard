  <?php   
 session_start();  
 include("session2.php");
 include('connect.php');
  if(isset($_GET['pid']))
{
	$pid = $_GET['pid'];
}

 if(isset($_POST["add_to_cart"]))  
 {  
$item_name = $_POST["hidden_name"];
$item_price = $_POST["hidden_price"];


 }
 if (isset($_POST["checkout"])) {
 	# code...
 	$quantity = $_POST["quantity"];
 }
 $_SESSION["pid"] = $pid;
 $_SESSION["iname"] = $item_name;
 $_SESSION["item_price"] = $item_price;
 $_SESSION["item_quantity"]= $quantity;
     
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
	<form action="" method="POST" id="cart" name="cart">
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
			<div class="table-responsive cart_info" >
			
				<table class="table table-condensed" id="myTable">
					<thead>
						<tr class="cart_menu">
							 <td class="image">Item</td> 
							<td class="description">Product Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							 <td class="totall" >Total</td> 
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
								<h4><input type="text" name="pname" value="<?php echo $values["item_name"]; ?>"></h4>
								<!-- <h4><a href=""><?php echo $values["item_name"]; ?></a></h4> -->
								<p>Product ID: <a href=""><?php echo $values["item_id"]; ?></a> </p>
								<input type="text" hidden name="item_id" value="<?php echo $values["item_id"]; ?>">
							</td>
							<td class="cart_price">
								<!-- <p>$<?php echo $values["item_price"]; ?></p> -->
								<input type="text"  class="price" name="price" data-price="<?php echo $values["item_price"]; ?>"  id="price" value="<?php echo $values["item_price"]; ?>">
							</td>

							<td class="cart_quantity">

								
								<!-- <div class="cart_quantity_button"> -->
									<!-- <a class="cart_quantity_up" href=""> + </a> -->
								  <input type="text" class="quant" name="quantity"  value="1" id="qnt_1" >    
								 <!-- <input type="text" name="quantity"  value="" placeholder="1" />    -->
									  <!-- <p><?php echo $values["item_quantity"]; ?></p>    -->
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
								<!-- </div> -->
								 <!-- <input type="text" name="quantity"  value="" />  --> 
								 </td>
		
							

							<td class="cart_total">
								<!-- <p class="cart_total_price">$<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></p> -->
								<!-- $<input id="total" name="total[]" value="<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>"> -->
								<td class="text-right amount">30</td>
								
								<!-- <input name="gTotal" id="grand_total" /> -->
								 <!-- <p class="cart_total_price">$<?php echo number_format($quantity * $values["item_price"], 2); ?></p>  -->
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="cart.php?action=delete&pid=<?php echo $values["item_id"]; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						
							
						
						 <?php  
                                     // $total = $total + ($values["item_quantity"] * $values["item_price"]);   
						  // $total = $total + ($quantity * $values["item_price"]);
                               }  
                          ?> 

						  <!--  <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  --> 
                          <?php  
                          }  
                          ?> 
      
					</tbody>
					 <tfoot>
    <tr>
      <td colspan="4" class="text-right"><b>Grand Total:</b></td>
      <td id="test" class="text-right total">@Model.Cart.ComputeTotalValue().ToString("#.## грн")</td>
      <!-- <td><input type="text" name="total" class="total"></td> -->
    </tr>
  </tfoot>
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
						<!-- <ul> -->
							<!-- <li>Shipping Cost <span>Free</span></li> -->
							<!-- <li>Total <span>$<?php echo number_format($total, 2); ?></span></li> -->
							<!-- <li>Total  $<input style="border:transparent;" name="gTotal" id="ItemsTotal" value="<?php echo number_format($total, 2); ?>" /></li> -->
							<!-- <td class="total">Total</td> -->
							<!-- <li><td id="test" class="total"></td></li> -->
						<!-- </ul> -->
							 <!-- <a class="btn btn-default update" href="">Update</a>  -->
							 <!-- <button type="submit" name="submit">Update Cart</button> -->
								<!-- <input type="submit" name="submit" value="update cart">    -->
							 <a class="btn btn-default check_out" href="checkout.php">CheckOut</a> 
							 <!-- <input type="submit" name="checkout" value="checkout"> -->

				</div>
				</div>
			</div>
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  update();
  $(".quant").change(function() {
    //this: context of the input that was changed
    console.log('calling /Cart/AddTocart; id:',$(this).attr('data-id'),' quantity: ', $(this).val());
    $.get(
      '/Cart/AddTocart', {
        id: $(this).attr('data-id'),
        returnUrl: '',
        quantity: $(this).val()
      });
    update();
  });

  function update() {
    var sum = 0.0;
    var quantity;
    $('#myTable > tbody  > tr').each(function() {

      quantity = $(this).find('.quant').val();
      var price = parseFloat($(this).find('.price').attr('data-price').replace(',', '.'));
      var amount = (quantity * price);

      sum += amount;
      $(this).find('.amount').text('' + amount );
    });
    $('.total').text(sum );
  }
});
</script>

</body>
</html>