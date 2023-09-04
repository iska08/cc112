<?php
session_start();
include 'dbconfig.php';
if (empty($_SESSION['112_username'])) {
  header("Location: login.php");
}
// Periksa hak akses
$akses = $_SESSION['hak_akses'];
if ($akses !== 'Admin') {
  die("Akses ditolak!");
}
// Periksa apakah parameter 'id' dan 'action' telah diterima
if (isset($_GET['id']) && isset($_GET['action'])) {
  $id = $_GET['id'];
  $action = $_GET['action'];
  // Fetch data from the database based on the given $id
  $query = "SELECT kejadian, alamat, tanggal_terima, nama_pelapor, noTelp_pelapor FROM lokasi WHERE id = $id";
  $result = mysqli_query($kominfo, $query);
  if ($result) {
    $data = mysqli_fetch_assoc($result);
    $kejadian       = $data['kejadian'];
    $alamat         = $data['alamat'];
    $tanggal_terima = $data['tanggal_terima'];
    $nama_pelapor   = $data['nama_pelapor'];
    $noTelp_pelapor = $data['noTelp_pelapor'];
  } else {
    die("Error: " . mysqli_error($kominfo));
  }
  $noTim = mysqli_query($kominfo, "SELECT noTelp FROM user WHERE hak_akses = 'Tim' AND kejadian LIKE '%$kejadian%'");
  if ($noTim) {
    $dataNo   = mysqli_fetch_assoc($noTim);
    $noTarget = $dataNo['noTelp'];
  } else {
    die("Error: " . mysqli_error($kominfo));
  }
  // Periksa apakah 'action' adalah 'approve' atau 'reject'
  if ($action === 'approve') {
    $approveStatus = 1;
    // Pastikan Anda telah mengisi nomor telepon dan token yang sesuai
    $target = $noTarget;
    $token = "8Y2hL2qgYz45oiPAAapW";
    // Proses pengiriman pesan melalui API
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => $target,
            'message' =>    '*Laporan Kejadian Terbaru*
Kejadian : _' . $kejadian . '_' . '
Lokasi : _' . $alamat . '_' . '
Tanggal Terima : _' . $tanggal_terima . '_' . '
Nama Pelapor : _' . $nama_pelapor . '_' . '
No. Telp Pelapor : _' . $noTelp_pelapor . '_',
            'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
  } elseif ($action === 'reject') {
    $approveStatus = 2;
  } else {
    die("Aksi tidak valid!");
  }
  // Update status approve pada data lokasi
  $query = "UPDATE lokasi SET approve = $approveStatus WHERE id = $id";
  if (mysqli_query($kominfo, $query)) {
    header('Location: admcc112.php?hal=lokasi');
    exit();
  } else {
    echo "Error: " . mysqli_error($kominfo);
  }
}
?>