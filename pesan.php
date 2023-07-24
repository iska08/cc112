<?php
session_start();
if (empty($_SESSION['112_username'])){
  header("Location:/");
}
//koneksi
include 'dbconfig.php';
?>

<?php
$kejadian = $_SESSION['kejadian'];
$data = explode(",", $kejadian);
$whereClause = "";
foreach ($data as $value) {
    $value = mysqli_real_escape_string($kominfo, $value); // Hindari SQL injection
    if ($whereClause !== "") {
        $whereClause .= " OR ";
    }
    $whereClause .= "kejadian = '$value'";
}
$hak_akses = $_SESSION['hak_akses'];
if($hak_akses=='Admin'){
    $query= mysqli_query($kominfo, "SELECT COUNT(id) AS jumlah FROM lokasi");
}elseif($hak_akses=='Tim'){
    $query= mysqli_query($kominfo, "SELECT COUNT(id) AS jumlah FROM lokasi WHERE $whereClause");
}
//menampilkan data
$hasil = mysqli_fetch_array($query);
//membuat data json
echo json_encode(array('jumlah' => $hasil['jumlah']));
?>