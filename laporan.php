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
  .detail {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    padding-left: 30px;
    font-family: Times New Roman, Times, serif;
    font-size: 10pt;
  }
  .detail table {
    width: auto;
  }
  .detail table th {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
    background-color: #eee;
  }
  .tim table {
    padding-left: 30px;
    padding-right: 30px;
    display: table;
    table-layout: fixed;
    border-collapse: separate;
    width: 100% !important;
    max-width: 100%;
    border-spacing: 0;
    border-bottom: none;
  }
  .tim table th {
    border: 1px solid #000;
    background-color: #eee!important;
    padding: 5px;
    font-size:14px;
    border-collapse: collapse;
  }
  .tim table td {
    page-break-inside: avoid;
    page-break-after: auto;
    border: 1px solid #000;font-size:13px;
    padding: 5px;
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

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM lokasi WHERE id = $id";
  $result = $kominfo->query($sql);
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tim = explode(',', $row['tim']);
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
    exit;
  }
  
  $html .='
  <div class="detail">
    <table>
      <tr>
        <td>NAMA KEJADIAN</td>
        <td>:</td>
        <td>' . $kej .'</td>
      </tr>
      <tr>
        <td>LOKASI KEJADIAN</td>
        <td>:</td>
        <td>' . $alamat . ', ' . $desa2['nama_desa'] . ', ' . $kec2['nama_kecamatan'] . '</td>
      </tr>
      <tr>
        <td>WAKTU KEJADIAN</td>
        <td>:</td>
        <td>' . $tgl_terima . '</td>
      </tr>
    </table>
  </div>
  <br>
  <br>
  <div class="tim">
    <table>
      <tr>
        <th>NO</th>
        <th>NAMA</th>
        <th>TIM/OPD</th>
        <th>TANDA TANGAN</th>
      </tr>';
$nomor=1;
$ttd=1;
$nama = $_SESSION['nama'];
foreach ($tim as $anggota) {
  $html .= '
      <tr>
        <td width="5%"><center>'.$nomor++.'<center></td>
        <td>'.$anggota.'</td>
        <td>'.$nama.'</td>
        <td>';
  if($ttd % 2 == 0 ){
    $html .= '<center>'.$ttd++.'</center>';
  }else{
    $html .= $ttd++;
  }
  $html .= '</td>
      </tr>';
}
$html.='
    </table>
  </div>
  <br>
  <br>
  ';
} else {
  echo "ID tidak ditemukan.";
  exit;
}
$html .= '
  <div class="ttd">
    <table>
      <tr><td>KEPALA DINAS KOMUNIKASI DAN INFORMATIKA</td></tr>
      <tr>
        <td>
          KABUPATEN SUMENEP
          <br>
          <br>
          <br>
          <br>
        </td>
      </tr>
      <tr><td><u>FERDIANSYAH TETRAJAYA, SH.</u></td></tr>
      <tr><td>Pembina Utama Muda</td></tr>
      <tr><td>NIP. 19680227 199703 1 005</td></tr>
    </table>
  </div>
';
$html .= "</html>";
$dompdf->loadHtml($html);
$dompdf->set_option('isFontSubsettingEnabled', true);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
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