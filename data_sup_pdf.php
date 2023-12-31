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
        margin-top:10px;
        margin-bottom:10px;
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
$html .= '<center><div><img src="112.jpg" width="100"></div><h4 style="text-transform: uppercase;">DATA SUPPORT DARURAT CALL CENTER 112 KAB. SUMENEP';
if($_GET['dari_bulan'] || $_GET['sampai_bulan']) {
    if(empty($_GET['th'] && $_GET['kej'])) {
        if($hak_akses=='Admin'){
            $html .= ' <div>Semua Kejadian Kedaruratan</div> ';
        }elseif($hak_akses=='Tim'){
            $html .= ' <div>Semua Kejadian '.$nama.'</div> ';
        }
    }
    $html .= ' <div> BULAN : '.kebulan($_GET['dari_bulan']).'';
    if($_GET['sampai_bulan']) {
        $html .= ' - '.kebulan($_GET['sampai_bulan']).'';
    }
}
if($_GET['th']) {
    $html .= ' '.$_GET['th'].'</div> ';
}
if(empty($_GET)) {
    if($hak_akses=='Admin'){
        $html .= ' <div>Semua Kejadian Kedaruratan</div> ';
    }elseif($hak_akses=='Tim'){
        $html .= ' <div>Semua Kejadian '.$nama.'</div> ';
    }
}
$html .= '</div></h4></center><table>';
$html .= 
        '<tr>
            <th>No.</th>
            <th>Kejadian</th>
            <th>Kecamatan dan Desa</th>
            <th>Data Pelapor</th>
            <th>Alamat Kejadian</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Laporan Penyelesaian</th>
            <th>Foto</th>  
        </tr>';
if($hak_akses == 'Admin'){
    $dari_bulan = $_GET['dari_bulan'];
    $sampai_bulan = $_GET['sampai_bulan'];
    $th = $_GET['th'];
    if($_GET['dari_bulan'] && $_GET['th']) {
        $tampil = mysqli_query($kominfo, "SELECT * FROM tim WHERE bulan='$dari_bulan' AND tahun='$th' ORDER BY id DESC");
    }
    if($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th']){
        $tampil = mysqli_query($kominfo, "SELECT * FROM tim WHERE bulan BETWEEN '$dari_bulan' AND '$sampai_bulan' AND tahun='$th' ORDER BY id DESC");
    }
}elseif ($hak_akses == 'Tim') {
    $dari_bulan = $_GET['dari_bulan'];
    $sampai_bulan = $_GET['sampai_bulan'];
    $th = $_GET['th'];
    $query = 
            "SELECT
                t.id,
                t.id_lokasi,
                t.opd_terkait,
                t.ket,
                t.laporan
            FROM tim AS t
            INNER JOIN opd_terkait AS opd ON t.opd_terkait = opd.id
            WHERE
            opd.nama_opd = '$nama'
            AND t.tahun = '$th'";
    if (!empty($dari_bulan) && !empty($sampai_bulan)) {
        $query .= " AND t.bulan BETWEEN '$dari_bulan' AND '$sampai_bulan'";
    } elseif (!empty($dari_bulan)) {
        $query .= " AND t.bulan = '$dari_bulan'";
    }
    $query .= " ORDER BY t.id DESC";
    $tampil = mysqli_query($kominfo, $query);
}
$nomor=1;
while($hasil = mysqli_fetch_assoc($tampil)) { 
    $jumlah  = mysqli_num_rows($tampil);
    $html   .= '
        <tr>
            <td valign="top" width="3%">'.$nomor++.' </td>';
    $id      = $hasil['id_lokasi'];
    $lokasi1 = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE id='$id'");
    $lokasi2 = mysqli_fetch_array($lokasi1);
    $html   .= '
            <td valign="top" width="10%">'.$lokasi2['kejadian'].'</td>
            <td valign="top" width="10%"><strong>Kecamatan:</strong><br>';
    $id_kec  = $lokasi2['kec'];
    $kec1    = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
    $kec2    = mysqli_fetch_array($kec1);
    $html   .= ''.$kec2['nama_kecamatan'].'<br><br><strong>Desa:</strong><br>';
    $id_desa = $lokasi2['desa'];
    $desa1   = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
    $desa2   = mysqli_fetch_array($desa1);
    $html   .= ''.$desa2['nama_desa'].'</td>
            <td valign="top" width="10%">
                <strong>Nama Pelapor:</strong><br>
                '.$lokasi2['nama_pelapor'].'
                <br><br>
                <strong>No. Telp Pelapor:</strong><br>
                '.$lokasi2['noTelp_pelapor'].'
            </td>
            <td valign="top" width="10%">'.$lokasi2['alamat'].'</td>
            <td valign="top" width="10%">
                <strong>Tanggal Terima:</strong><br>
                '.$lokasi2['tanggal_terima'].'
                <br><br>
                <strong>Tanggal Selesai:</strong><br>
                '.$lokasi2['tanggal_selesai'].'
            </td>
            <td valign="top">'.$hasil['ket'].'</td>
            <td valign="top">'.$hasil['laporan'].'</td>
            <td valign="top">';
    $id_tim   = $hasil['id'];
    $lokasi_foto = mysqli_query($kominfo, "select * from foto_tim where id_tim='$id_tim'");
    while($foto1 = mysqli_fetch_array($lokasi_foto)) {
        $html .= '<img width="165" style="padding:2px;" src="foto/'.$foto1['nama_foto'].'" />';                           
    }
    $html .='
            </td>
        </tr>';
}
$html .= '
        <tr style="background-color: #eee!important;">
            <td colspan="9" align="center" style="padding: 5px;">
                <b>Jumlah Kejadian : '.$jumlah.'</b>
            </td>
        </tr>';
$html .= '
    </table><br/>
    <center style="font-size:12px;">
        <div>Copyright © ' . date("Y") . ' Diskominfo Sumenep</div><div>https://112.sumenepkab.go.id</div>
    </center>';
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