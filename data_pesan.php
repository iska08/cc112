<?php
session_start();
if (empty($_SESSION['112_username'])){
  header("Location:/");
}
//koneksi
include 'dbconfig.php';
?>

<?php
$sql = mysqli_query($kominfo, "SELECT * FROM lokasi ORDER BY id DESC limit 5");
$result = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}
echo json_encode(array("result" => $data));
?>