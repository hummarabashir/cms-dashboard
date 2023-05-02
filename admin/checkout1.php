<?php
 include('connect.php');
 session_start();
  // include("session1.php");
 // include("session2.php");
// if (!isset($_SESSION)) {
// }
 
   if (isset($_POST['checkout'])) {
$quantity = $_POST['quantity'];
$item_id = $_POST["quantity"];
}
$grand = $_SESSION["grand"];
// foreach ($_SESSION["shopping_cart"] as $item_id => $quantity) {
// 	$_SESSION["shopping_cart"][$item_id] = $quantity;
// 	$quan = $_SESSION["shopping_cart"][$item_id];
// 	foreach ($quan as $key => $value) {
// 		echo $value;

// 	}
// }

// echo $quantity;


// foreach($_POST as $var => $value) {
// if($value != '') {
// // add to session
// $_SESSION['shopping_cart'][$var] = $value;
// }
// }


// foreach($_SESSION['shopping_cart'] as $pid => $qty) {
// echo "Product id: $pid, Quantity:$qty ";
// echo "
// ";
// }



// $item_id = $_POST['item_id'];
// $_SESSION["shopping_cart"][$item_id] = $quantity;
// $quan = $_SESSION["shopping_cart"][$item_id];
// echo $_SESSION["shopping_cart"][$item_id];
// echo $quantity;
// echo $item_id;
   	// $_SESSION["shopping_cart"]["item_quantity"] = $_POST['quantity'];
   // $quantity = $_POST['quantity'];
   // $_SESSION['quantity'] = $quantity;
   // foreach ($_SESSION['quantity'] as $key => $value) {
   
   // 	echo $value;
   // }

   

  // 	 $item_array = array(  
  //                    'item_grand'     =>     $_POST["total"],  
  //                    'item_name'    =>     $_POST["pname"],  
  //                    'item_price'   =>     $_POST["price"],  
  //                     'item_quantity' =>     $_POST["quantity"]
  //               ); 
  // 	  $_SESSION["shopping_cart"] = $item_array; 
  // }
if (isset($_POST['submit'])) {
$userid = $_POST['userid'];
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];
$useremail = $_POST['useremail'];
$cname = $_POST['cname'];
$email = $_POST['email'];
$title = $_POST['title'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$grand = $_POST['grand'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$code = $_POST["code"];
// $country = $_POST['country'];
// $state = $_POST['state'];
$phone = $_POST['phone'];
$cell = $_POST['cell'];
$fax = $_POST['fax'];
$message = $_POST['message'];
// $cb = $_POST['cb'];
$sql = "INSERT INTO checkout VALUES(id, '$userid', '$username', '$userpassword', '$useremail', '$cname', '$email', '$title', '$fname', '$mname', '$lname', '$address1', '$address2', '$code', '$phone', '$cell', '$fax', '$message' ) ";
$result = mysql_query($sql);
$id = mysql_insert_id();
 foreach($_SESSION["shopping_cart"] as  $values) {
 
 	$itemname = $values["item_name"];
 	$itemid = $values['item_id'];
 	$price = $values['item_price'];
 	$quantity = $values['quantity'];

 	 // $sql1 = "INSERT INTO cart VALUES ('$id',  $values[item_name],  $values[item_price], $values[quantity], '$grand')";
 	$sql1 = "INSERT INTO cart VALUES(id, '$id', '$itemname','$price', '$quantity', '$grand') ";
 	 $result = mysql_query($sql1);
 }

if($result){
	echo "successful";
	unset($_SESSION['shopping_cart']);
}
else {	
	echo "error";
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
    <title>Checkout | Shopping Cart</title>
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
		
	</header>
<!--/header-bottom-->
<!--/header-->
<form action="" method="POST">
	<section id="cart_items">
		<div class="container">
		<!-- 	<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div> -->
			<!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<a href="shoplogin.php">Register/Signup</a>
						<!-- <label><input type="checkbox"> Register Account</label> -->
					</li>
					<li>
						<a href="checkout.php">Guest Checkout</a>
						<!-- <label><input type="checkbox"> Guest Checkout</label> -->
					</li>
					<li>
						<!-- <a href=""><i class="fa fa-times"></i>Cancel</a> -->
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">

							<p>Shopper Information</p>
				<input type="text" hidden name="userid" value="">
								<input type="text" placeholder="User Name" name="username" value="">
								<input type="password" placeholder="Password" name="userpassword" value="">
								<input type="email" placeholder="Email Address" name="useremail" value="">
							
							<!-- <a class="btn btn-primary" href="">Get Quotes</a> -->
							<!-- <a class="btn btn-primary" href="">Continue</a> -->
							<br>
							<br>

							<input type="submit" name="submit" value="continue">
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								
									<input type="text" placeholder="Company Name" name="cname">
									<input type="text" placeholder="Email*" name="email">
									<input type="text" placeholder="Title" name="title">
									<input type="text" placeholder="First Name *" name="fname">
									<input type="text" placeholder="Middle Name" name="mname">
									<input type="text" placeholder="Last Name *" name="lname">
									<input type="text" placeholder="Address 1 *" name="address1">
									<input type="text" placeholder="Address 2" name="address2">
								
							</div>
							<div class="form-two">
								
									<input type="text" placeholder="Zip / Postal Code *" name="code">
									<!-- <select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select> -->
									<!-- <input type="password" placeholder="Confirm password" name="password"> -->
									<input type="text" placeholder="Phone *" name="phone">
									<input type="text" placeholder="Mobile Phone" name="cell">
									<input type="text" placeholder="Fax" name="fax">
								
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox" name="cb"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>

		
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			


<div class="table-responsive cart_info" >
			
				<table class="table table-condensed" id="myTable">
					<thead>
						<tr class="cart_menu">
							<!-- <td class="image">Item</td> -->
							<td class="description">Description</td>
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
						<!-- 	<td class="cart_product">
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
						
							</td> -->
							<td class="cart_description">
								<h4><a href=""><?php echo $values["item_name"]; ?></a></h4>
								<!-- <p>Product ID: <a href=""><?php echo $values["item_id"]; ?></a> </p> -->
							</td>
							<td class="cart_price">
						
								<input type="text" style= "border:transparent;" readonly class="price" name="price" data-price="<?php echo $values["item_price"]; ?>"   value="<?php echo $values["item_price"]; ?>">
							</td>

							<td class="cart_quantity">
								    <input type="text" style= "border:transparent;"  readonly class="quant" name="quantity"  value="<?php echo $values["quantity"]; ?>"  >   
								 </td>

		
							

							<td class="cart_total">
								
								<td class="text-right amount">0</td> 
								<!-- <td><?php  $amount; ?></td> -->
								
					
							</td>	
						
						</tr>
						
							
						
						 <?php  
                         
                               }  
                       
                          }  
                          ?> 
      
					</tbody>
					 <tfoot>
    <tr>
      <td colspan="4" class="text-right"><b>Grand Total:</b></td>
      <!-- <td id="test" class="text-right total">@Model.Cart.ComputeTotalValue().ToString("#.## грн")</td> -->
       <td> <?php echo $grand;  ?></td> 
       <input type="text" name="grand" value="<?php echo $grand ?>" hidden>
    </tr>
  </tfoot>
				</table>

			
			</div>





			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

	</form>

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
