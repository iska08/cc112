<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "cc112";
//sesuaikan dengan password MySQL kalian
//create variable connectin
$kominfo = mysqli_connect($hostname, $username, $password, $database);
//checking connection
if(!$kominfo) {
  echo "Koneksi Gagal! : " . mysqli_connect_error();
} else {
  //echo "Koneksi Berhasil!";
}
 





