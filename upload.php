<?php
include 'dbconfig.php';
$id = $_POST['id'];
$output = '';  
if (is_array($_FILES)) {
     foreach ($_FILES['images']['name'] as $name => $value) {
          $file_name = explode(".", $_FILES['images']['name'][$name]);
          $allowed_extension = array("jpg", "jpeg", "png", "gif");
          if (in_array(strtolower($file_name[1]), $allowed_extension)) {
               $new_name = rand() . '.' . $file_name[1];
               $sourcePath = $_FILES["images"]["tmp_name"][$name];
               $targetPath = "foto/" . $new_name;
               
               $insert_foto = mysqli_query($kominfo, "INSERT INTO foto SET id_lokasi='$id', nama_foto='$new_name'");
            
               if ($insert_foto) {
                    move_uploaded_file($sourcePath, $targetPath);
                    $output .= "File " . $_FILES['images']['name'][$name] . " berhasil diupload.<br>";
               } else {
                    $output .= "Terjadi kesalahan saat mengupload " . $_FILES['images']['name'][$name] . ".<br>";
               }
          } else {
               $output .= "Ekstensi file " . $_FILES['images']['name'][$name] . " tidak diizinkan.<br>";
          }
     }
     echo $output;
}
?>
