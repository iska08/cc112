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
if (isset($_GET['id']) && isset($_GET['action'])) {
  $id = $_GET['id'];
  $action = $_GET['action'];
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
    $targetNumbers = [];
    while ($dataNo = mysqli_fetch_assoc($noTim)) {
      $targetNumbers[] = $dataNo['noTelp'];
    }
    $message = '*Laporan Kejadian Terbaru*
Kejadian : _' . $kejadian . '_' . '
Lokasi : _' . $alamat . '_' . '
Tanggal Terima : _' . $tanggal_terima . '_' . '
Nama Pelapor : _' . $nama_pelapor . '_' . '
No. Telp Pelapor : _' . $noTelp_pelapor . '_' . '
Login Tim : _https://cc112sumenep.com/adm_login.php_';
    $countryCode = '62';
    foreach ($targetNumbers as $target) {
      $token = "8Y2hL2qgYz45oiPAAapW";
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
          'message' => $message,
          'countryCode' => $countryCode, //optional
        ),
        CURLOPT_HTTPHEADER => array(
          "Authorization: $token"
        ),
      ));
      $response = curl_exec($curl);
      curl_close($curl);
    }
  } else {
    die("Error: " . mysqli_error($kominfo));
  }
  if ($action === 'approve') {
    $approveStatus = 1;
  } elseif ($action === 'reject') {
    $approveStatus = 2;
  } else {
    die("Aksi tidak valid!");
  }
  $query = "UPDATE lokasi SET approve = $approveStatus WHERE id = $id";
  if (mysqli_query($kominfo, $query)) {
    header('Location: admcc112.php?hal=lokasi');
    exit();
  } else {
    echo "Error: " . mysqli_error($kominfo);
  }
}
?>