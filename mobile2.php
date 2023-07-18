<?php
    //koneksi
    include 'dbconfig.php';
    session_start();
    if (empty($_SESSION['agenda_username'])){header("Location:login_mobile.php");}
    $id_agenda = $_GET['id_agenda'];
    $jabatan = $_SESSION['jabatan'];



$query_pag_data1 = "SELECT * from acara where id='$id_agenda'";
$result_pag_data1 = mysqli_query($kominfo, $query_pag_data1);
$row_detail = mysqli_fetch_assoc($result_pag_data1);
$tanggal_detail=$row_detail['tanggal'];




?>

<div class="card-body px-lg-5 py-lg-5">
              <div class=""><center><img src="img/smp.png" width="80"></center></div>
              <hr/>
              <div class="text-center text-muted mb-4">
                <h4>Agenda <b><?php echo  $jabatan; ?></b><div><?php echo $tanggal_detail; ?> </div></h4>
              </div>
              <hr/> 
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<?php
$query_pag_data1 = "SELECT * from acara ";
$result_pag_data1 = mysqli_query($kominfo, $query_pag_data1);

while($row = mysqli_fetch_assoc($result_pag_data1)) {
$jabatan2=$row['jabatan'];

$query_pag_kor = "SELECT * from jabatan where nama_jabatan='$jabatan'";
$result_pag_kor = mysqli_query($kominfo, $query_pag_kor);
$row_kor = mysqli_fetch_assoc($result_pag_kor);
$nama_kor=$row_kor['nama_jabatan'];
$nama_kor1="(".$nama_kor.")";
                

 if(preg_match("(Sekretaris Dinas)",$jabatan2)){$sekdis = "Sekretaris Dinas";}
 if(preg_match("(Kepala Bidang TI)",$jabatan2)){$kabid_ti = "Kepala Bidang TI";}
 if(preg_match("(Kepala Bidang IKP)",$jabatan2)){$kabid_ikp = "Kepala Bidang IKP";}
 if(preg_match("(Kepala Bidang SP)",$jabatan2)){$kabid_sp = "Kepala Bidang SP";}
 if(preg_match("(Kepala Bidang SP)",$jabatan2)){$kabid_sp = "Kepala Bidang SP";}
 if(preg_match($nama_kor1,$jabatan2)){$nama_kor3=$nama_kor;}

 }

if($jabatan=="Kepala Dinas" OR $jabatan==$sekdis OR $jabatan==$kabid_ti OR $jabatan==$kabid_ikp OR $jabatan==$kabid_sp OR $jabatan==$nama_kor3){
?>  
<div class="row">
<!-- agenda --> 
<div class="col-md-6">  
<div class="card card-primary card-outline">
<div class="card-header "><h5 class="card-title">Agenda</h5></div>  
<div class="card-body box-profile">               

<?php
$query_pag_data = "SELECT * from acara  where  id='$id_agenda' AND jabatan like '%$jabatan%' ";
$result_pag_data = mysqli_query($kominfo, $query_pag_data);
while($row = mysqli_fetch_assoc($result_pag_data)) {
 $id=$row['id'];
 $no_agenda=$row['no_agenda']; 
 $pakaian=$row['pakaian'];  
 $nama_acara=$row['nama_acara']; 
 $lokasi=$row['lokasi']; 
 $jabatan1=$row['jabatan'];
 $tanggal=$row['tanggal'];
 $jam=$row['jam']; 
 $ket=$row['ket'];
 $pa=$row['pa'];
 $dis1=$row['dis1'];
 $dis2=$row['dis2'];
 $dis3=$row['dis3'];
 $status=$row['status']; 
 $laporan=$row['laporan'];
 $pejabat_laporan=$row['pejabat_laporan']; 
 $foto=$row['foto']; 
 $hari=$row['hari'];    
?>
                   
                        <table>
                          <tbody>
                            <tr >
                              <td valign="top" style="border-style: none;">
                                 <b>No. Agenda</b>
                              </td>
                              <td valign="top" style="border-style: none;">
                                :
                              </td>
                              <td valign="top" style="border-style: none;">
                                <?php echo $no_agenda; ?>
                              </td>
                            </tr>
                            <tr >
                              <td valign="top" style="border-style: none;">
                                 <b>Acara</b>
                              </td>
                              <td valign="top" style="border-style: none;">
                                :
                              </td>
                              <td valign="top" style="border-style: none;">
                                <?php echo $nama_acara; ?>
                              </td>
                            </tr>
                            <tr>
                              <td valign="top" valign="top" style="border-style: none;">
                                 <b>Tempat</b>
                              </td>
                              <td valign="top" style="border-style: none;">
                                :
                              </td>
                              <td valign="top" style="border-style: none;">
                                <?php echo $lokasi; ?>
                              </td>
                            </tr>
                             <tr>
                              <td valign="top" style="border-style: none;">
                                 <b>Pakaian</b>
                              </td>
                              <td valign="top" style="border-style: none;">
                                :
                              </td>
                              <td valign="top" style="border-style: none;">
                                <?php echo $pakaian; ?>
                              </td>
                            </tr> 
                            <tr>
                              <td valign="top" style="border-style: none;">
                                <b>Hari</b>
                              </td>
                              <td valign="top" style="border-style: none;">
                                :
                              </td>
                              <td valign="top" style="border-style: none;">
                                <?php echo $hari; ?>
                              </td>
                            </tr>  
                            <tr>
                              <td valign="top" style="border-style: none;">
                                <b>Tanggal</b>
                              </td>
                              <td valign="top" style="border-style: none;">
                                :
                              </td>
                              <td valign="top" style="border-style: none;">
                                <?php echo $tanggal; ?>
                              </td>
                            </tr> 
                            <tr>
                              <td valign="top" style="border-style: none;">
                               <b> Pukul</b>
                              </td>
                              <td valign="top" style="border-style: none;">
                                :
                              </td>
                              <td valign="top" style="border-style: none;">
                                <?php echo $jam; ?>
                              </td>
                            </tr>
                            <tr>
                              <td valign="top" valign="top" style="border-style: none;">
                                <b>Pimpinan Acara </b>
                              </td>
                              <td valign="top" style="border-style: none;">
                                :
                              </td>
                              <td valign="top" style="border-style: none;">
                                <?php echo $pa; ?>
                              </td>
                            </tr> 
                                                    
                          </tbody>
                        </table>
                          
</div><!-- /end .card-body box-agenda -->
</div><!-- /end .card card-primary card-outline -->
</div><!-- /end .col-md-6 --> 
<!-- end agenda --> 
<!-- disposisi --> 
<div class="col-md-6"> 
<div class="card card-primary card-outline"> 
<div class="card-header "><h5 class="card-title">Disposisi</h5></div> 
<div class="card-body box-profile">   

                               <?php if($jabatan=='Kepala Dinas' OR $jabatan==$sekdis OR $jabatan==$jabatan OR $pejabat_laporan==$jabatan){?>
                               <?php if($pejabat_laporan){}else{?> 
                               <div class="input-group input-group-sm">                                                           
                               <?php if($status == 0): ?>
                               <button id="status" data-id="<?php echo $id; ?>"  value="0" class="btn btn-danger btn-sm btn-sm">Tidak hadir</button> 
                               <?php elseif($status == 1): ?>
                               <button id="status" data-id="<?php echo $id; ?>"  value="1" class="btn btn-success btn-sm hapus">Hadir</button> 
                               <?php endif ?>
                               </div>
                               <hr/>
                               <?php } ?>
                               <?php if($pejabat_laporan){?>
                               <span class="btn btn-success btn-sm"><b> Hadir : <?php echo $pejabat_laporan; ?></b></span>
                               <?php }else{}?>                                                                 
                               <form id="edit_disposisi"  method="post">
                               <?php if($jabatan=='Kepala Dinas' OR $dis1){ ?>   
                               <span class="input-group-append"><b>Disposisi</b>&nbsp;:&nbsp;</span>                       
                               <input hidden name="id" value="<?php echo $id; ?>"> 
                               <input hidden name="jabatan[]" value="(Kepala Dinas)">                                                            
                               <div class="form-check">
                               <input class="form-check-input" type="checkbox" <?php if($jabatan=='Kepala Dinas'){}else{ ?>onclick="return false;" <?php } ?> name="jabatan[]" value="(Sekretaris Dinas)" <?php if(preg_match("(Sekretaris Dinas)",$jabatan1)){echo "checked";}else{} ?>/>
                               <label class="form-check-label" for="flexCheckDefault">Sekretaris Dinas</label>
                               </div>
                               <div class="form-check">
                               <input class="form-check-input" type="checkbox" <?php if($jabatan=='Kepala Dinas' OR $jabatan=='Sekretaris Dinas'){}else{ ?>onclick="return false;" <?php } ?> name="jabatan[]" value="(Kepala Bidang TI)" <?php if(preg_match("(Kepala Bidang TI)",$jabatan1)){echo "checked";}else{} ?>/>
                               <label class="form-check-label" for="flexCheckDefault">Kepala Bidang Teknologi Informatika</label>
                               </div>
                               <div class="form-check">
                               <input class="form-check-input" type="checkbox" <?php if($jabatan=='Kepala Dinas' OR $jabatan=='Sekretaris Dinas'){}else{ ?>onclick="return false;" <?php } ?> name="jabatan[]" value="(Kepala Bidang IKP)" <?php if(preg_match("(Kepala Bidang IKP)",$jabatan1)){echo "checked";}else{} ?>/>
                               <label class="form-check-label" for="flexCheckDefault">Kabid Informasi & Komunikasi Publik</label>
                               </div>
                               <div class="form-check">
                               <input class="form-check-input" type="checkbox" <?php if($jabatan=='Kepala Dinas' OR $jabatan=='Sekretaris Dinas'){}else{ ?>onclick="return false;" <?php } ?> name="jabatan[]" value="(Kepala Bidang SP)" <?php if(preg_match("(Kepala Bidang SP)",$jabatan1)){echo "checked";}else{} ?>/>
                               <label class="form-check-label" for="flexCheckDefault">Kepala Bidang Statistik & Persandian</label>
                               </div>

                               <span class="input-group-append"><b>Disposisi Koordinator/Kasi/Kasubag : </b></span>                             
                              <?php 
                                     if(preg_match("(Kepala Dinas)",$jabatan1)){$kadis = "Kepala Dinas";}
                                     if(preg_match("(Sekretaris Dinas)",$jabatan1)){$sek = "Sekretaris Dinas";}
                                     if(preg_match("(Kepala Bidang TI)",$jabatan1)){$ti = "Kepala Bidang TI";}
                                     if(preg_match("(Kepala Bidang IKP)",$jabatan1)){$ikp = "Kepala Bidang IKP";}
                                     if(preg_match("(Kepala Bidang SP)",$jabatan1)){$sp = "Kepala Bidang SP";}
                             
                              $query_pag_kor = "SELECT * from jabatan where sub='$sek' OR sub='$ti' OR sub='$sp' OR sub='$ikp' ";
                              $result_pag_kor = mysqli_query($kominfo, $query_pag_kor);
                              while($row_kor = mysqli_fetch_assoc($result_pag_kor)){

                              $nama_kor=$row_kor['nama_jabatan'];
                              $nama_kor1="(".$nama_kor.")";
                              ?>
                               <div class="form-check">
                               <input class="form-check-input" type="checkbox" <?php if($jabatan=='Kepala Dinas' OR $jabatan=='Sekretaris Dinas' OR $jabatan=='Kepala Bidang TI' OR $jabatan=='Kepala Bidang SP' OR $jabatan=='Kepala Bidang IKP'){}else{ ?>onclick="return false;" <?php } ?> name="jabatan[]" value="(<?php echo $nama_kor; ?>)" <?php if(preg_match($nama_kor1,$jabatan1)){echo "checked";}else{} ?>/>
                               <label class="form-check-label" for="flexCheckDefault"><?php echo $nama_kor ?></label>
                               </div>

                              <?php } } ?> 
                               <br/>
                               <?php if(preg_match("(Sekretaris Dinas)",$jabatan1)){$sekdis = "Sekretaris Dinas";}
                                     if(preg_match("(Kepala Bidang TI)",$jabatan1)){$kabid_ti = "Kepala Bidang TI";}
                                     if(preg_match("(Kepala Bidang IKP)",$jabatan1)){$kabid_ikp = "Kepala Bidang IKP";}
                                     if(preg_match("(Kepala Bidang SP)",$jabatan1)){$kabid_sp = "Kepala Bidang SP";}
                                     if(preg_match($nama_kor1,$jabatan2)){$nama_kor3=$nama_kor;}
                               
                               ?>
                                                           
                               <?php if($jabatan=='Kepala Dinas'){ ?> 
                               <!-- Kadis -->                                 
                               <center><b>Kepala Dinas</b>&nbsp;:&nbsp;</center>    
                               <textarea  class="form-control"  name="dis1" cols="30" rows="5"><?php if($dis1){echo $dis1;}else{} ?></textarea>
                               <!-- Kadis - Sekdis -->
                               <center><b>Sekretaris Dinas</b>&nbsp;:&nbsp;</center>
                               <textarea readonly class="form-control" name="dis2" cols="30" rows="5"><?php echo $dis2; ?></textarea>
                               <textarea hidden class="form-control" name="dis3" cols="30" rows="5"><?php echo $dis3; ?></textarea> 
                               <!-- Kadis -Bidang -->
                               <?php $query_pag_kor = "SELECT * from jabatan where sub='$sek' OR sub='$ti' OR sub='$sp' OR sub='$ikp' ";
                               $result_pag_kor = mysqli_query($kominfo, $query_pag_kor);
                               while($row_kor = mysqli_fetch_assoc($result_pag_kor)){

                               $nama_kor=$row_kor['nama_jabatan'];
                               $nama_kor1="(".$nama_kor.")";
                               ?>
                               <?php if(preg_match("(Sekretaris Dinas)",$jabatan1)){}else{?>
                               <?php if(preg_match($nama_kor1,$jabatan1)){?>
                               <center><b><?php if(preg_match("(Kepala Bidang SP)",$jabatan1)){echo $kabid_sp;} if(preg_match("(Kepala Bidang TI)",$jabatan1)){ echo $kabid_ti;} if(preg_match("(Kepala Bidang IKP)",$jabatan1)){echo $kabid_ikp;} ?></b>&nbsp;:&nbsp;</center>
                               <textarea readonly class="form-control" name="dis3" cols="30" rows="5"><?php echo $dis3; ?></textarea>  
                               <?php }else{}}}?>
                               <?php }else{}?> 
                               <?php if($jabatan=='Sekretaris Dinas'){ ?>
                                <!-- Sekdis - Kadis -->
                               <center><b>Kepala Dinas</b>&nbsp;:&nbsp;</center>  
                               <textarea readonly class="form-control" name="dis1"cols="30" rows="5"><?php echo $dis1; ?></textarea>
                               <!-- Sekdis -->
                               <center><b>Sekretaris Dinas</b>&nbsp;:&nbsp;</center>
                               <textarea  class="form-control"  name="dis2" cols="30" rows="5"><?php if($dis2){echo $dis2;}else{} ?></textarea>
                               <?php }else{}?>
                               <!-- Sekdis - Bidang -->
                               <?php if($jabatan==$kabid_ti OR $jabatan==$kabid_ikp OR $jabatan==$kabid_sp){ ?>
                               <center><b>Kepala Dinas</b>&nbsp;:&nbsp;</center>  
                               <textarea readonly class="form-control" name="dis1"cols="30" rows="5"><?php echo $dis1; ?></textarea>
                               <center><b>Sekretaris Dinas</b>&nbsp;:&nbsp;</center>
                               <textarea disabled class="form-control" cols="30" rows="5"><?php echo $dis2; ?></textarea>
                               <textarea hidden class="form-control" name="dis3" cols="30" rows="5"><?php echo $dis3; ?></textarea> 
                              <?php  $query_pag_kor = "SELECT * from jabatan where sub='$sek' OR sub='$ti' OR sub='$sp' OR sub='$ikp' ";
                              $result_pag_kor = mysqli_query($kominfo, $query_pag_kor);
                              while($row_kor = mysqli_fetch_assoc($result_pag_kor)){

                              $nama_kor=$row_kor['nama_jabatan'];
                              $nama_kor1="(".$nama_kor.")"; ?>

                               <?php if(preg_match($nama_kor1,$jabatan1)){?>
                               <center><b><?php echo $jabatan;?></b>&nbsp;:&nbsp;</center>                               
                               <textarea  class="form-control" name="dis3" cols="30" rows="5"><?php echo $dis3; ?></textarea>
                               <?php }else{} } ?>
                               <?php }else{} ?>
                               <?php if($jabatan=='Kepala Dinas' OR $jabatan=='Sekretaris Dinas' OR $jabatan==$kabid_ti OR $jabatan==$kabid_ikp OR $jabatan==$kabid_sp){}else{
                               $query_pag_kabid = "SELECT * from jabatan where nama_jabatan='$jabatan' ";
                               $result_pag_kabid = mysqli_query($kominfo, $query_pag_kabid);
                               $row_kabid = mysqli_fetch_assoc($result_pag_kabid);
                               $kabid=$row_kabid['sub'];

                                ?>
                               <!-- Bidang - Kadis -->
                               <center><b>Kepala Dinas</b>&nbsp;:&nbsp;</center>  
                               <textarea readonly class="form-control" name="dis1"cols="30" rows="5"><?php echo $dis1; ?></textarea>
                               <!-- Bidang - Sekdis -->
                               <center><b>Sekretaris Dinas</b>&nbsp;:&nbsp;</center>
                               <textarea disabled class="form-control" cols="30" rows="5"><?php echo $dis2; ?></textarea>
                               <!-- Bidang -->    
                               <center><b><?php echo $kabid;?></b>&nbsp;:&nbsp;</center>
                               <textarea  <?php if($kabid){echo "disabled";} ?> class="form-control" name="dis3" cols="30" rows="5"><?php echo $dis3; ?></textarea>
                               <?php } ?>                            
                              
                                <br/>                             
                               <?php if($jabatan=='Kepala Dinas' OR $jabatan=='Sekretaris Dinas' OR $jabatan==$kabid_ti OR $jabatan==$kabid_ikp OR $jabatan==$kabid_sp){ ?>    
                               <span class="input-group-append">
                               <button type="submit" name="kirim_disposisi" class="btn btn-info btn-sm">Simpan Disposisi</button>                               
                               </span>
                               <?php }else{ }?>
                               <?php }else{}?> 
                               </form>
                               <?php if($status == 1): ?>                                                              
                                <?php if($jabatan=='Kepala Dinas' OR $pejabat_laporan==$jabatan OR $pejabat_laporan=="" OR $jabatan==$kabid_ti OR $jabatan==$kabid_ikp OR $jabatan==$kabid_sp){ ?> 
                                 
                                <form id="edit_laporan"  method="post">
                                   <input hidden name="id" value="<?php echo $id; ?>">
                                   <input hidden name="pejabat_laporan" value="<?php echo $jabatan; ?>">
                                   <input hidden name="nama" value="<?php echo $nama_acara; ?>">
                                    <center><b>Isi Laporan</b>&nbsp;:&nbsp;</center> 
                                   <br/> 
                                   <div class="custom-file">
                                      <input type="file" name="foto" class="custom-file-input" id="customFile">
                                      <label class="custom-file-label" for="customFile">Pilih foto</label>
                                   </div>
                                   <div class="my-3">                              
                                   <?php if($foto){?><img class="img-thumbnail" src="images/<?php echo $foto;?>"><?php }else{}?>
                                   </div>   
                                   <div class="form-group">                                                               
                                   <textarea class="form-control " name="laporan" id="<?php echo $id; ?>"><?php echo $laporan; ?></textarea>
                                  </div>                                     
                                  <button type="submit" name="kirim_laporan" class="btn btn-info btn-sm">Simpan Laporan</button>                                 
                                </form>
                                <br/>
                                <form id="form_reset_laporan"  method="post">
                                  <input hidden name="id" value="<?php echo $id; ?>">
                                  <button type="submit" name="reset_laporan" class="btn btn-warning btn-sm">Reset Laporan</button>

                                </form>
                                <?php }else{} ?>  
                               <?php endif ?>                 
                               
<script>
       $('#<?php echo $id; ?>').summernote({
        placeholder: 'Tulis laporan disini...',
        tabsize: 2,
        height: 200
      });
</script>      
<?php } }else{echo '<div class="text-center text-muted mb-4">
                <h4>Anda Tidak Punya Hak Akses</h4></div>';} ?> 
   

</div><!-- /end .card card-primary card-outline -->
</div><!-- /end .col-md-6 -->
</div>
<!-- end disposisi --> 
</div><!-- /end .row -->
</div><!-- /end .container-fluid -->
</section><!-- /end .content -->
<hr/>
     <div class="form-group">
                        <center>
                         <a href="logout_mobile.php" class="btn btn-warning">Log Out</a>
                        <a href="data_mobile.php" class="btn btn-info">Batal</a>
                      </center>
     </div>

<br/>




