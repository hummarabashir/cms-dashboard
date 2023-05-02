<?php session_start(); 
include("connect.php");
$username = $_GET['username'];
$sql= "DELETE FROM login WHERE username='$username'";
$result=mysql_query($sql);
if($result){
header("Location:tables.php");
}
else {
echo "ERROR";
}
?>