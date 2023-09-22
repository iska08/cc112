<?php
include 'dbconfig.php';

if (isset($_POST['id_lokasi'])) {
  $id_lokasi = $_POST['id_lokasi'];
  $query = "SELECT lokasi.*, kecamatan.nama_kecamatan, desa.nama_desa FROM lokasi 
            LEFT JOIN kecamatan ON lokasi.kec = kecamatan.id
            LEFT JOIN desa ON lokasi.desa = desa.id
            WHERE lokasi.id = $id_lokasi";
  $result = mysqli_query($kominfo, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
  } else {
    echo json_encode(array());
  }
} else {
  echo json_encode(array());
}
?>