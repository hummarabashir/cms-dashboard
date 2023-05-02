

<?php
include('connect.php');
include('session.php');
if (isset($_POST['add'])) {
	# code...
	$username = $_POST['username']; 
	$pname = $_POST['pname'];
  $description = $_POST['description'];
	$status = $_POST['status'];
  $price = $_POST['price'];
  $category = $_POST['category'];

	$sql = "INSERT INTO product Values(pid, '$username', '$pname', '$category', '$price' , now() , '$status',  '$description')";
	$result= mysql_query($sql);
$id = mysql_insert_id();

   foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){

        $file_name = $_FILES['files']['name'][$key];
        $file_size =$_FILES['files']['size'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        $file_type=$_FILES['files']['type'][$key];  
// echo $file_name;
 // $filename=time().$file_name; 
$filename=$file_name; 
echo $file_name;
 $desired_dir="uploads/";
        if(empty($errors)==true){
    
            $move=move_uploaded_file($file_tmp,$desired_dir.$filename);
          
            if($move)
            {
              
                 mysql_query("INSERT into photo(pid, image) VALUES('$id', '$file_name')"); 
                 // mysql_query("INSERT into photo VALUES(photoid ,'" . implode(',', $images_name) . "')");
                echo "The file ".$filename." has been uploaded";
              header('location:createproduct.php');
            }
            }
          }


	if ($result) {
      echo " added successfully ";
     header('location:createproduct.php');

		# code...
	}

	else{
echo "error";
	}
}




?>