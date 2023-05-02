<?php
session_start();
$conn = mysql_connect("localhost" , "root" , "farwaali") or die(mysql_error);
$dbc = mysql_select_db("user" , $conn);
    $username=$_POST['username'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
     $email=$_POST['email'];
    $role=$_POST['role'];
  $file_name = $_FILES['image']['name'];
    $folder = __DIR__."/uploads/" .$file_name;
   $file_tmp = $_FILES['image']['tmp_name'];
    if( move_uploaded_file($file_tmp, $folder)) {       
    } else {
      echo "Not uploaded" .$_FILES["file"]["error"];;
    }
    $file = $_FILES['image']['name'];
    $image_name = addslashes($_FILES['image']['name']);
        $sql= "SELECT username from login WHERE username='$username'";
    $res = mysql_query($sql);
    $num_rows = mysql_num_rows($res);
     if (($num_rows)!=0) 
    {
      $msg= "username already exists";
      $_SESSION["msg"]=$msg;
      header('location: register.php');
    }
    else {
    $sqlQ ="INSERT INTO login VALUES(id, '$username' , '$password' , '$phone' , '$email' , '$role','$image_name')";
    $query= mysql_query($sqlQ);
    if(!$query){
        echo "Failed!" . mysql_error();
        echo "<br>";    
    }
    else{
        
         $msg= "Registration Successfull";
      $_SESSION["msg"]=$msg;
      header('location: register.php'); 
         
    }
  }

   
  
    ?>
