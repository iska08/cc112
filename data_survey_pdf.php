<?php
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
  @media print {
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

$html .= '<center><div><img src="112.jpg" width="100"></div><h4 style="text-transform: uppercase;">DATA RESPONDEN SURVEY KEPUASAN MASYARAKAT DARURAT CALL CENTER 112 KAB. SUMENEP</h4></center>';
$html .= ' 
</div>
<table>';
$html .= '<tr>
          <th>No.</th><th>Nama</th><th>Alamat</th><th>Hp</th><th>Bagaimana penilain anda adanya Layanan Darurat Call Center 112 Sumenep</th><th>Bagaimana penilain anda kecepatan respon layanan Darurat Call Center 112 Sumenep</th><th>Kritik/Saran</th>  
          </tr>';
$tampil = mysqli_query($kominfo, "select * from survey order by id desc ");
$nomor=1;  while($hasil = mysqli_fetch_assoc($tampil)) {
  $jumlah = mysqli_num_rows($tampil);
  $html .= '<tr>
            <td valign="top" width="3%">'.$nomor++.' </td>
            <td valign="top" width="10%">'.$hasil['nama'].'</td>
            <td valign="top" width="10%">'.$hasil['alamat'].'</td>
            <td valign="top" width="10%">'.$hasil['hp'].'</td>
            <td valign="top" width="15%">'.$hasil['res1'].'</td>
            <td valign="top" width="15%">'.$hasil['res2'].'</td>
            <td valign="top" width="">'.$hasil['res3'].'</td>
            </tr>';
}
$html .= '
<tr style="background-color: #eee!important;">
<td colspan="7" align="center" style="padding: 5px;"><b>Jumlah Responden : '.$jumlah.'</b></td></tr>';
$html .= '</table>
<div style="font-size:12px;">
<div><b>Ket.</b></div>
<div>0 - 50 = Cukup</div>
<div>60 - 70 = Baik</div>
<div>80 - 100 = Sangat Baik</div>
</div>
<br/>
<center style="font-size:12px;"><div>Copyright © 2022 Diskominfo Sumenep</div><div>https://112.sumenepkab.go.id</div></center>';
$html .= "</html>";
$dompdf->loadHtml($html);
$dompdf->set_option('isFontSubsettingEnabled', true);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('Folio', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$pdf = $dompdf->stream('CC112_responden', array('Attachment' => 0 ));
?>