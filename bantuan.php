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
  // Ambil data dari database
  $query = "SELECT
        l.lat_long,
        l.kejadian,
        l.alamat,
        l.tanggal_terima,
        l.nama_pelapor,
        l.noTelp_pelapor,
        t.opd_terkait,
        t.ket
        FROM lokasi AS l
        INNER JOIN tim AS t ON l.id = t.id_lokasi
        WHERE t.id = $id";
  $result = mysqli_query($kominfo, $query);
  if ($result) {
    $data = mysqli_fetch_assoc($result);
    // Ubah format koordinat
    $kordinat = $data['lat_long'];
    $kordinat = preg_replace('/LatLng\((-?\d+\.\d+), (-?\d+\.\d+)\)/', '$1,$2', $kordinat);
    $url = 'https://www.google.com/maps?q=';
    $maps = $url . $kordinat;
    $kejadian = $data['kejadian'];
    $alamat = $data['alamat'];
    $tanggal_terima = $data['tanggal_terima'];
    $nama_pelapor = $data['nama_pelapor'];
    $noTelp_pelapor = $data['noTelp_pelapor'];
    $opd_terkait = $data['opd_terkait'];
    $ket = $data['ket'];

    $namaOPD1 = mysqli_query($kominfo, "SELECT nama_opd FROM opd_terkait WHERE id='$opd_terkait'");
    $namaOPD2 = mysqli_fetch_array($namaOPD1);
  } else {
    die("Error: " . mysqli_error($kominfo));
  }
  if ($action === 'bantuan') {
    $bantuan = 1;
    // Mengirim pesan ke nomor telepon hanya jika belum dikirim sebelumnya
    $pesanTelahDikirim = false;
    $noTim = mysqli_query($kominfo, "SELECT noTelp FROM user WHERE hak_akses = 'Tim' OR hak_akses = 'Admin' AND nama LIKE '%$namaOPD2%'");
    if ($noTim) {
      $targetNumbers = [];
      while ($dataNo = mysqli_fetch_assoc($noTim)) {
        $targetNumbers[] = $dataNo['noTelp'];
      }
      // Ubah format URL peta untuk perangkat seluler
      $maps_mobile = 'https://www.google.com/maps/search/?api=1&query=' . $kordinat;
      $message = "*Laporan Butuh Bantuan*
Lokasi Kejadian : $maps_mobile
Kejadian : $kejadian
Alamat Kejadian : $alamat
Tanggal Terima : $tanggal_terima
Nama Pelapor : $nama_pelapor
No. Telp Pelapor : $noTelp_pelapor
Keterangan : $ket
Login Tim : https://cc112sumenep.com/login.php";
      $countryCode = '62';
      foreach ($targetNumbers as $target) {
        if (!$pesanTelahDikirim) {
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
          // Set pesan telah dikirim agar tidak mengirim lagi
          $pesanTelahDikirim = true;
        }
      }
    } else {
      die("Error: " . mysqli_error($kominfo));
    }
  } else {
    die("Aksi tidak valid!");
  }
  // Update status approve di database
  $query = "UPDATE tim SET bantuan = $bantuan WHERE id = $id";
  if (mysqli_query($kominfo, $query)) {
    header('Location: admcc112.php?hal=support');
    exit();
  } else {
    echo "Error: " . mysqli_error($kominfo);
  }
}
?>