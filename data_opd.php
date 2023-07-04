<?php
session_start();
if (empty($_SESSION['112_username'])){header("Location:login.php");}
?>
<?php
    //koneksi
    include 'dbconfig.php';
    $id_opd = $_GET['id_opd'];
?>
<div class="card-header ">
                <h5 class="card-title">Input Data OPD/Terkait</h5>
</div>
<div class="card-body ">
    <div class="row"> <!-- class row digunakan sebelum membuat column  -->
        <div class="col-md-4"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <form  method="post" id="<?php if($id_opd){?>form_edit_opd<?php }else{?>form_tambah_opd<?php } ?>">
                    <?php $id_opd=$_GET['id_opd']; $tampil_id_opd = mysqli_query($kominfo, "select * from opd_terkait where id='$id_opd' "); //ambil data dari tabel lokasi
                         $hasil_id_opd = mysqli_fetch_array($tampil_id_opd) ?> 
                    <div class="form-group">
                        <label for="exampleFormControlInput1">OPD</label>
                        <input hidden name="id" value="<?php echo $id_opd; ?>">
                        <input type="text" class="form-control" name="nama_opd" value="<?php echo $hasil_id_opd['nama_opd']; ?>"required>
                    </div>                    
                    <div class="form-group">
                    	<?php if($id_opd){?>
                        <button type="submit" name="edit_opd" class="btn btn-info btn-sm">Edit OPD</button>
                        <a id="batal_opd" class="btn btn-warning btn-sm">Cancel</a>
                        <?php }else{?>
                        <button type="submit" name="tambah_opd" class="btn btn-info btn-sm">Input OPD</button>
                        <?php } ?>
                    </div>
                </form>
        </div>
        <br/>
        <br/>
        <div class="col-md-8"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <table id="opd" class="table table-bordered">
                    <thead>
                      <th width="1%">
                        No
                      </th>
                      <th>
                        OPD Terkait
                      </th>
                      <th>
                        
                      </th>
                    </thead>
                    <tbody>
                     
                        <?php $nooo=1; $tampil_opd = mysqli_query($kominfo, "select * from opd_terkait"); //ambil data dari tabel lokasi
                         while($hasil_opd = mysqli_fetch_array($tampil_opd)){ ?> 
                      <tr> 
                      	<td>
                         <?php  echo $nooo++; ?>
                        </td>
                        <td>
                         <?php echo $hasil_opd['nama_opd']; ?>
                        </td>
                        <td width="5%">
                          <div class="btn-group">  
                          <a id="edit_opd" class="btn btn-info btn-sm btn-sm" value="<?php echo $hasil_opd['id']; ?>">Edit</a>
                          <a id="hapus_opd" value="<?php echo $hasil_opd['id']; ?>" class="btn btn-danger btn-sm hapus">Hapus</a>
                          </div>
                        </td>
                      </tr>
                        <?php } ?>
                     
                    </tbody>
                </table>
        </div>
    </div>
</div>
<hr/>
<script>
$(document).ready(function() {
    $('#opd').DataTable({
        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
    });
} );
</script> 