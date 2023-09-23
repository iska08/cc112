<?php
include 'dbconfig.php';

$id = $_POST['id'];
$output = '';

if (is_array($_FILES)) {
    foreach ($_FILES['foto']['name'] as $name => $value) {
        $file_name = explode(".", $_FILES['foto']['name'][$name]);
        $allowed_extension = array("jpg", "jpeg", "png", "gif");

        $file_extension = strtolower($file_name[1]);

        if (in_array($file_extension, $allowed_extension)) {
            $new_name = uniqid() . '.' . $file_extension;
            $sourcePath = $_FILES["foto"]["tmp_name"][$name];
            $targetPath = "foto/" . $new_name;

            if (move_uploaded_file($sourcePath, $targetPath)) {
                $insert_foto = mysqli_prepare($kominfo, "INSERT INTO foto_tim (id_tim, nama_foto) VALUES (?, ?)");
                mysqli_stmt_bind_param($insert_foto, "is", $id, $new_name);
                if (mysqli_stmt_execute($insert_foto)) {
                    $output .= "File " . $_FILES['foto']['name'][$name] . " berhasil diupload.<br>";
                } else {
                    $output .= "Gagal menyimpan informasi foto ke database.<br>";
                }
            } else {
                $output .= "Terjadi kesalahan saat mengupload " . $_FILES['foto']['name'][$name] . ".<br>";
            }
        } else {
            $output .= "Ekstensi file " . $_FILES['foto']['name'][$name] . " tidak diizinkan.<br>";
        }
    }
    echo $output;
}
?>