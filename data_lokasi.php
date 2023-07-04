<?php
    session_start();
    if (empty($_SESSION['112_username'])){header("Location:login.php");}
    //koneksi
    include 'dbconfig.php';
     
?>
 
    <style>
        /* ukuran peta */
        #mapid {
            height: 600px;width:100%;
        }
        .jumbotron{
            
        }
         
        
    </style>
  <script src="js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />  
<div class="card card-info card-outline"> 
<div class="card-header ">
<h5 class="card-title">Data Lokasi Kejadian</h5>
</div>
<div class="card-body ">    
<div class="row"> 
<div class="col-md-12">
<div><button class="btn btn-info btn-sm" id="add_lokasi">Input Lokasi</button></div><br/>
<div class="table-responsive">
                  <table id="tower" class="table table-bordered">
                    <thead>
                       <th>
                        No.
                      </th>
                      <th>
                        Kejadian
                      </th>
                       <th>
                        Kecamatan
                      </th>
                       <th>
                       Desa
                      </th>
                       <th>
                      Tanggal Terima
                      </th>
                       <th>
                      Tanggal Selesai
                      </th>
                      <th>
                        Alamat
                      </th>
                      <th>
                        Keterangan
                      </th>
                       <th>
                        Foto
                      </th>
                       <th>
                        
                      </th>
                    </thead>
                    <tbody>
                     
                        <?php $nomor=1; $tampil = mysqli_query($kominfo, "select * from lokasi order by id desc"); //ambil data dari tabel lokasi
                         while($hasil = mysqli_fetch_array($tampil)){ ?> 
                      <tr> 
                        <td>
                          <?php echo $nomor++; ?>
                        </td>
                        <td>
                         <?php echo $hasil['kejadian']; ?>
                        </td>
                        <td>
                         <?php $id_kec=$hasil['kec']; 
                            $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'"); 
                            $kec2 = mysqli_fetch_array($kec1);
                            echo $kec2['nama_kecamatan']; ?>
                        </td>
                        <td>
                         <?php $id_desa=$hasil['desa']; 
                            $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'"); 
                            $desa2 = mysqli_fetch_array($desa1);
                            echo $desa2['nama_desa']; ?>
                        </td>
                        <td>
                         <?php echo $hasil['tanggal_terima']; ?>
                        </td>
                        <td>
                         <?php echo $hasil['tanggal_selesai']; ?>
                        </td>
                        <td>
                         <?php echo $hasil['alamat']; ?>
                        </td>
                        
                        <td>
                          <?php echo $hasil['ket']; ?>
                        </td>
                        <td width="20%">
                            <div class="row">
                            <?php $id_lokasi=$hasil['id']; 
                            $lokasi_foto = mysqli_query($kominfo, "select * from foto where id_lokasi='$id_lokasi'"); 
                            while($foto1 = mysqli_fetch_array($lokasi_foto)){?>                           
                            <div class="col text-center">   
                            <div><a href="foto/<?php echo $foto1['nama_foto'] ?>" data-toggle="lightbox"><img class="img-thumbnail" src="foto/<?php echo $foto1['nama_foto'] ?>" /></a>
                            <a style="position:absolute;top:10px;right:20px;" class="btn btn-danger btn-sm " id="hapus_foto" value="<?php echo $foto1['id']; ?>">Hapus</a><a style="position:absolute;top:10px;left:20px;" class="btn btn-danger btn-sm " data-target="#crop-modal_<?php echo $foto1['id']; ?>" data-toggle="modal">Edit</a>                            
                            </div>
                            <!-- Crop Modal -->
                            <div id="crop-modal_<?php echo $foto1['id']; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <span class="close" data-dismiss="modal">X</span>                                            
                                        </div>
                                        <h4 class="modal-title">Edit Foto</h4>
                                        <div align="center"class="modal-body">
                                          <img src="foto/<?php echo $foto1['nama_foto'] ?>" class="cropbox">
                                          <form action="save.php?file=<?php echo $foto1['nama_foto'] ?>" method="post" onsubmit="return checkCoords();">
                                            <input type="hidden" id="x" name="x" />
                                            <input type="hidden" id="y" name="y" />
                                            <input type="hidden" id="w" name="w" />
                                            <input type="hidden" id="h" name="h" />
                                            <br>
                                            <input type="submit" value="Save Image" class="btn btn-info btn-sm">
                                            <br><br>
                                          </form>
                                        </div>                                        
                                    </div>
                                </div>
                            </div><!-- end of #crop-modal -->  
                            </div>               
                            <?php }  ?> 
                            </div>
                            <br/>                         
                            <form method="post" id="upload_foto">                               
                              <input type="file" name="foto" data-icon="false" required>
                              <input hidden type="text" name="id" value="<?php echo $hasil['id']; ?>">
                              <input hidden type="text" name="kej" value="<?php echo $hasil['kejadian']; ?>">
                              <br/> 
                              <br/>                     
                              <button type="submit" class="btn btn-info btn-sm" id="inputGroupFileAddon04">Upload</button>                             
                            </form> 
                        </td>
                         <td width="5%">
                          <div class="btn-group">  
                          <a class="btn btn-info btn-sm" id="edit_lokasi" value="<?php echo $hasil['id']; ?>">Edit</a>
                          <a class="btn btn-danger btn-sm " id="hapus_lokasi" value="<?php echo $hasil['id']; ?>">Hapus</a>
                          
                          </div>
                        </td>
                      </tr>
                        <?php } ?>
                     
                    </tbody>
                </table>
</div>

</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#tower').DataTable({
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]]
    });
} );
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>

  <script type="text/javascript">
    $(function(){
      $('.cropbox').Jcrop({
        aspectRatio: 1,
        onSelect: updateCoords
      });
    });

    function updateCoords(c){
      $('#x').val(c.x);
      $('#y').val(c.y);
      $('#w').val(c.w);
      $('#h').val(c.h);
    };

    function checkCoords(){
      if (parseInt($('#w').val())) return true;
      Swal.fire('Silahkan Crop Foto sebelum simpan','', 'warning')
      return false;
    };

  </script>
 