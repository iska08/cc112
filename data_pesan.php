<?php
// melakukan koneksi 
$connect = mysqli_connect('localhost', 'root', '', 'cc112');
//mengambil data 5 pesan terbaru 
$sql = mysqli_query($connect, "SELECT * FROM lokasi ORDER BY id DESC limit 5");
$result = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}
echo json_encode(array("result" => $data));
?>