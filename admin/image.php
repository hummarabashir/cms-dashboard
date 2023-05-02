
<?php

include('connect.php');

if(isset($_FILES['files'])){
 $images_name = "";
    $errors= array();
    $desired_dir="uploads/";
  
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){

        $file_name = $_FILES['files']['name'][$key];
        $file_size =$_FILES['files']['size'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        $file_type=$_FILES['files']['type'][$key];  
echo $file_name;
// die();
  // $images_name =$images_name.",".$file_name;
        // $images_name = implode(",",$file_name);
        if($file_size > 8097152){
            $errors[]='File size must be less than 8 MB'; 
        }       

        $filename=time().$file_name; 
        if(empty($errors)==true){
    
            $move=move_uploaded_file($file_tmp,$desired_dir.$filename);
          
            if($move)
            {
              
                 mysql_query("INSERT into photo VALUES(photoid , '$file_name')"); 
                 // mysql_query("INSERT into photo VALUES(photoid ,'" . implode(',', $images_name) . "')");
                echo "The file ".$filename." has been uploaded";
            }
            else{
                echo $filename."is not uploaded"; 
            }

        }
        else{
            echo $errors;
        }
            }
    
    if(empty($error)){
        echo "All attachments are uploaded successfully"; 
    }
}
?>



<form action="" method="post" enctype="multipart/form-data">
 <input name="files[]" type="file" multiple="multiple" />
  <input type="submit" name="upload" value="Upload!" />
  </form>


<!-- <?php
// $sql = "SELECT * FROM photo";
// $result = mysql_query($sql);
// while($row = mysql_fetch_array($result)){
 // echo "<img src='./uploads/" . $row['image']. "' height='150px'><br>";
// }
 ?> -->