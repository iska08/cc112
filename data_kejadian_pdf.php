<?php
session_start(); // Pastikan session sudah dimulai

// Cek apakah pengguna memiliki hak akses
if (!isset($_SESSION['hak_akses'])) {
    // Pengguna tidak memiliki hak akses, redirect atau tampilkan pesan kesalahan
    echo "Anda tidak memiliki izin untuk mengakses file ini.";
    exit();
}
include 'dbconfig.php';
include 'fungsi_bulan.php';
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$html = '
<style type="text/css">
  @page {
    margin-top:10px; margin-bottom:10px;
  }
  @media print{
    #tbl1 {
      -webkit-print-color-adjust: exact !important;
    }
  }
  table {
    display: table;
    table-layout: fixed;
    border-collapse: separate;
    width: 100% !important;
    max-width: 100%;
    border-spacing: 0;
    border-bottom: none;
  }
  th {
    border: 1px solid #000;background-color: #eee!important;
    padding: 5px;font-size:14px;border-collapse: collapse;
  }
  td {
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
$html .= '<center><div><img src="112.jpg" width="100"></div><h4 style="text-transform: uppercase;">DATA KEJADIAN DARURAT CALL CENTER 112 KAB. SUMENEP';
if($_GET['dari_bulan'] || $_GET['sampai_bulan']) {
  if(empty($_GET['th'] && $_GET['kej'])) {
    if($hak_akses=='Admin'){
      $html .= ' <div>Semua kejadian Kedaruratan</div> ';
    }elseif($hak_akses=='Tim'){
      $html .= ' <div>Semua kejadian '.$nama.'</div> ';
    }
  } else {
    $html .= ' <div> KEJADIAN : '.$_GET['kej'].' </div>';
  }
  $html .= ' <div> BULAN : '.kebulan($_GET['dari_bulan']).'';
  if($_GET['sampai_bulan']) {
    $html .= ' - '.kebulan($_GET['sampai_bulan']).'';
  }
}
if($_GET['th']) {
  $html .= ' '.$_GET['th'].'</div> ';
}
if($_GET['kej']) {}
if(empty($_GET)) {
  if($hak_akses=='Admin'){
    $html .= ' <div>Semua kejadian Kedaruratan</div> ';
  }elseif($hak_akses=='Tim'){
    $html .= ' <div>Semua kejadian '.$nama.'</div> ';
  }
}
$html .= '</div></h4></center><table>';
$html .= '<tr>
          <th>No.</th><th>Kejadian</th><th>Kecamatan</th><th>Desa</th><th>Nama & Nomor Telepon Pelapor</th><th>Alamat</th><th>Tanggal Terima</th><th>Tanggal Selesai</th><th>Keterangan</th><th>Foto</th>  
          </tr>';
if($hak_akses=='Admin'){
  $dari_bulan = $_GET['dari_bulan'];
  $sampai_bulan = $_GET['sampai_bulan'];
  $th = $_GET['th'];
  $kej = $_GET['kej'];
  if($_GET['dari_bulan'] && $_GET['th']) {
    $tampil = mysqli_query($kominfo, "select * from lokasi  where  bulan='$dari_bulan' and tahun='$th'  order by id desc ");
  }
  if($_GET['dari_bulan'] && $_GET['th'] && $_GET['kej']){
    $tampil = mysqli_query($kominfo, "select * from lokasi  where  bulan='$dari_bulan' and tahun='$th' and kejadian='$kej' order by id desc ");
  }
  if($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th']){
    $tampil = mysqli_query($kominfo, "select * from lokasi  where bulan between '$dari_bulan' and '$sampai_bulan' and tahun='$th'  order by id desc ");
  }
  if($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th'] && $_GET['kej']){
    $tampil = mysqli_query($kominfo, "select * from lokasi  where bulan between '$dari_bulan' and '$sampai_bulan' and tahun='$th' and kejadian='$kej' order by id desc ");
  }
}elseif ($hak_akses == 'Tim') {
  $kejadian = $_SESSION['kejadian'];
  $data = explode(",", $kejadian);
  // Membuat bagian WHERE untuk mengambil data berdasarkan nilai dalam array
  $whereClause = "";
  foreach ($data as $value) {
      $value = mysqli_real_escape_string($kominfo, $value); // Hindari SQL injection
      if ($whereClause !== "") {
          $whereClause .= " OR ";
      }
      $whereClause .= "kejadian = '$value'";
  }
  $dari_bulan = $_GET['dari_bulan'];
  $sampai_bulan = $_GET['sampai_bulan'];
  $th = $_GET['th'];
  
  // Mengubah query SQL untuk memasukkan tahun yang dipilih oleh pengguna
  $tahunClause = "";
  if (!empty($th)) {
      $tahunClause = " AND tahun = '$th'";
  }

  if ($_GET['dari_bulan'] && $_GET['th']) {
      $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE bulan='$dari_bulan' $tahunClause ORDER BY id DESC");
  }
  if ($_GET['dari_bulan'] && $_GET['th'] && $whereClause) {
      $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE bulan='$dari_bulan' $tahunClause AND ($whereClause) ORDER BY id DESC");
  }
  if ($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th']) {
      $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE bulan BETWEEN '$dari_bulan' AND '$sampai_bulan' $tahunClause ORDER BY id DESC");
  }
  if ($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th'] && $whereClause) {
      $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE bulan BETWEEN '$dari_bulan' AND '$sampai_bulan' $tahunClause AND ($whereClause) ORDER BY id DESC");
  }
}
$nomor=1;
while($hasil = mysqli_fetch_assoc($tampil)) { 
  $jumlah = mysqli_num_rows($tampil);
  $html .= '<tr>
            <td valign="top" width="3%">'.$nomor++.' </td> 
            <td valign="top" width="10%">'.$hasil['kejadian'].'</td>
            <td valign="top" width="10%">';
  $id_kec=$hasil['kec'];
  $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
  $kec2 = mysqli_fetch_array($kec1);
  $html .= ''.$kec2['nama_kecamatan'].'</td>
            <td valign="top" width="10%">';
  $id_desa=$hasil['desa'];
  $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
  $desa2 = mysqli_fetch_array($desa1);
  $html .= ''.$desa2['nama_desa'].'</td>
            <td valign="top" width="10%">Nama: '.$hasil['nama_pelapor'].'<br>No. Telp: '.$hasil['noTelp_pelapor'].'</td>
            <td valign="top" width="10%">'.$hasil['alamat'].'</td>
            <td valign="top" width="10%">'.$hasil['tanggal_terima'].'</td>
            <td valign="top" width="10%">'.$hasil['tanggal_selesai'].'</td>           
            <td valign="top">'.$hasil['ket'].'</td>
            <td valign="top">';
  $id_lokasi=$hasil['id'];
  $lokasi_foto = mysqli_query($kominfo, "select * from foto where id_lokasi='$id_lokasi'");
  while($foto1 = mysqli_fetch_array($lokasi_foto)) {
    $html .= '<img width="145" style="padding:2px;" src="foto/'.$foto1['nama_foto'].'" />';                           
  }
  $html .= '</td>
            </tr>';
}
$html .= '
<tr style="background-color: #eee!important;">
<td colspan="10" align="center" style="padding: 5px;"><b>Jumlah Kejadian : '.$jumlah.'</b></td>
</tr>';
$html .= '</table><br/><center style="font-size:12px;"><div>Copyright © ' . date("Y") . ' Diskominfo Sumenep</div><div>https://112.sumenepkab.go.id</div></center>';
$html .= "</html>";
$dompdf->loadHtml($html);
$dompdf->set_option('isFontSubsettingEnabled', true);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('Folio', 'landscape');
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