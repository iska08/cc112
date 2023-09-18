<?php
session_start();

include 'dbconfig.php';
include 'fungsi_bulan.php';
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$html = '
<style type="text/css">
  @page {
    margin: 0;
    size: A4;
  }
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    font-size: 12pt;
  }
  #header {
    width: 100%;
    color: black;
    text-align: center;
    padding: 10px 0;
    line-height: 1;
  }
  #header h4,
  #header h3,
  #header h5 {
    margin: 5px 0;
    line-height: 1;
  }
  #logo1 {
    float: left;
    margin-left: 20px;
  }
  #logo2 {
    float: right;
    margin-right: 20px;
  }
  #content {
    padding: 20px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
  }
  .detail {
    padding-left: 30px;
    font-family: Times New Roman, Times, serif;
    font-size: 10pt;
  }
  .detail table {
    width: auto;
  }
  th {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
    background-color: #eee;
  }
  .page_break {
    page-break-before: always;
  }
</style>
';

$hak_akses = $_SESSION['hak_akses'];
$nama = $_SESSION['nama'];
$html .= '
<div id="header">
  <img id="logo1" src="logo/sumenep.png" width="75">
  <img id="logo2" src="logo/white.png" width="75">
  <h4>PEMERINTAH KABUPATEN SUMENEP</h4>
  <h3>DINAS KOMUNIKASI DAN INFORMATIKA</h3>
  <h5>Jl. KH. Mansyur No. 71 Telp. (0328) 662635 Fax. 663984</h5>
  <h4><u>SUMENEP</u></h4>
  <br>
  <h4>DAFTAR HADIR PENANGANAN KEDARURATAN CALL CENTER 112 SUMENEP</h4>
  <h4>TAHUN ' . date("Y") . '</h4>
</div>';

// Periksa apakah 'id' ada dalam URL
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM lokasi WHERE id = $id";
  $result = $kominfo->query($sql);
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $kej = $row['kejadian'];
    $alamat = $row['alamat'];
    $id_desa = $row['desa'];
    $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
    $desa2 = mysqli_fetch_array($desa1);
    $id_kec = $row['kec'];
    $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
    $kec2 = mysqli_fetch_array($kec1);
    $tgl_terima = $row['tanggal_terima'];
  } else {
    echo "Data tidak ditemukan.";
    exit; // Hentikan eksekusi jika data tidak ditemukan
  }
  
  $html .='
  <div class="detail">
    <table>
      <tr>
        <td>KEJADIAN</td>
        <td>:</td>
        <td>' . $kej .'</td>
      </tr>
      <tr>
        <td>LOKASI</td>
        <td>:</td>
        <td>' . $alamat . ', ' . $desa2['nama_desa'] . ', ' . $kec2['nama_kecamatan'] . '</td>
      </tr>
      <tr>
        <td>TANGGAL</td>
        <td>:</td>
        <td>' . $tgl_terima . '</td>
      </tr>
      <tr>
        <td>PUKUL</td>
        <td>:</td>
        <td>.....................................................</td>
      </tr>
    </table>
  </div>
  ';
} else {
  echo "ID tidak ditemukan.";
  exit; // Hentikan eksekusi jika ID tidak ditemukan
}

// Lanjutkan dengan konten PDF
$html .= '
<div id="content">
<table>';
$html .= '</table><br/><center style="font-size:12px;"><div>Copyright © ' . date("Y") . ' Diskominfo Sumenep</div><div>https://112.sumenepkab.go.id</div></center>';
$html .= "</html>";
$dompdf->loadHtml($html);
$dompdf->set_option('isFontSubsettingEnabled', true);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dari_bulan = $_GET['dari_bulan'];
$sampai_bulan = $_GET['sampai_bulan'];
$th = $_GET['th'];
$kej = $_GET['kej'];
if($_GET['dari_bulan'] && $_GET['th']) {
  $data = $_GET['dari_bulan']."_".$_GET['th'];
}
if($_GET['dari_bulan'] && $_GET['th'] && $_GET['kej']) {
  $data = $_GET['dari_bulan']."_".$_GET['kej'];
}
if($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th']) {
  $data = $_GET['dari_bulan']."_".$_GET['sampai_bulan']."_".$_GET['th']."_semua_kejadian";
}
if($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th'] && $_GET['kej']) {
  $data = $_GET['dari_bulan']."_".$_GET['sampai_bulan']."_".$_GET['th']."_".$_GET['kej'];
}
if(empty($_GET)) {
  $data="kab_sumenep";
}
$pdf = $dompdf->stream('CC112_'.$data.'', array('Attachment' => 0 ));
?>
