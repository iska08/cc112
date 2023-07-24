<?php
// melakukan koneksi 
$connect = mysqli_connect('localhost', 'root', '', 'cc112');
//menghitung jumlah pesan dari tabel pesan
$query= mysqli_query($connect, "SELECT COUNT(id) as jumlah FROM lokasi ");
//menampilkan data
$hasil = mysqli_fetch_array($query);
//membuat data json
echo json_encode(array('jumlah' => $hasil['jumlah']));
?>