<?php
include("connect.php");
session_start();
$user_check=$_SESSION['login_user'];
$sql= "SELECT*FROM userlogin WHERE username='$user_check'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$login_session=$row['username'];
$login_userid = $row['userid'];
$login_password=$row['password'];
$login_email=$row['email'];
 // if(!isset($login_session)){
 //   mysql_close;
  // header('location:checkout.php');
 // }
$grand = $_SESSION["grand"];
?>