<?php
include("connect.php");
session_start();
$user_check=$_SESSION['login_user'];
$sql="SELECT*FROM login WHERE username='$user_check'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$login_session=$row['username'];
$login_role=$row['role'];
$login_password=$row['password'];
$login_email=$row['email'];
$login_phone=$row['phone'];
$login_image=$row['image'];
if(!isset($login_session)){
 mysql_close;
 header('location:login.php');
}
?>