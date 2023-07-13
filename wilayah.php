<?php
// Include the database connection file
include 'dbconfig.php';
if (isset($_POST['kec_id']) && !empty($_POST['kec_id'])) {
    // Fetch state name base on country id
    $query = "SELECT * FROM desa WHERE  id_kecamatan = ".$_POST['kec_id']."  ";
    $result = $kominfo->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">== Pilih Desa ==</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['id'].'">'.$row['nama_desa'].'</option>';
        }
    } else {
        echo '<option value="">Desa Tidak Ada</option>';
    }
} elseif (isset($_POST['desa_id']) && !empty($_POST['desa_id'])) {
    // Fetch city name base on state id
    $query = "SELECT * FROM dusun WHERE  id_desa = ".$_POST['desa_id'];
    $result = $kominfo->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">== Pilih Dusun ==</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['id'].'">'.$row['nama_dusun'].'</option>';
        }
    } else {
        echo '<option value="">Dusun Tidak Ada</option>';
    }
}
?>