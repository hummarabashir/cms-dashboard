 <?php
 $item_name =  $_SESSION["iname"];
 $item_price =  $_SESSION["item_price"];
 $quantity =  $_SESSION["item_quantity"];
 $pid = $_SESSION["pid"];
 if(isset($_SESSION["shopping_cart"]))  
      {  
        $grand = $_SESSION["grand"];
        $quan = $_SESSION['shopping_cart'][$key]['quantity'];
          $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
          // print_r($item_array_id);
          // die();
           if(!in_array($pid, $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                 $item_array = array(  
                     'item_id'     =>     $pid,  
                     'item_name'    =>     $item_name,  
                     'item_price'   =>     $item_price,  
                     'quantity' =>     $quan
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
                'item_id'          =>     $pid,  
                'item_name'    =>     $item_name,  
                     'item_price'   =>     $item_price,  
                     'quantity' =>     $quan
           );
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
//       foreach(  $item_array as $k=> $v ) {
// if( $k == "item_quantity") 
// 	$v=$_POST['quantity'];
// }  
   

 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $pid)  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  

?>