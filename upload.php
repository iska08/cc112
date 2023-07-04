<?php 
include 'dbconfig.php'; 

$id=$_POST['id'];
 //upload.php  
 $output = '';  
 if(is_array($_FILES))  
 {  
      foreach($_FILES['images']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['images']['name'][$name]);  
           $allowed_extension = array("jpg", "jpeg", "png", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["images"]["tmp_name"][$name];  
                $targetPath = "foto/".$new_name;  
                $insert_foto = mysqli_query($kominfo, "INSERT INTO foto SET id_lokasi='$id', nama_foto='$new_name' ");
                move_uploaded_file($sourcePath, $targetPath);  
           }  
      }  
     
      echo $output;  
 }  
 ?>  