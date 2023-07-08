<?php
session_start();
if (empty($_SESSION['112_username'])){
  header("Location:/");
}
?>

<?php
//koneksi
include 'dbconfig.php';
$id_kej = $_GET['id_kej'];
?>

<div class="card-header">
  <h5 class="card-title">Input Data Kejadian</h5>
</div>    
<div class="card-body">
  <div class="row"> <!-- class row digunakan sebelum membuat column  -->
    <div class="col-md-4"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
      <form  method="post" id="<?php if($id_kej){?>form_edit_kej<?php }else{?>form_tambah_kej<?php } ?>">
        <?php
        $tampil_id_kej = mysqli_query($kominfo, "select * from kejadian where id='$id_kej' "); //ambil data dari tabel lokasi
        $hasil_id_kej = mysqli_fetch_array($tampil_id_kej)
        ?>
        <div class="form-group">
          <label for="exampleFormControlInput1">Kejadian</label>
          <input hidden name="id" value="<?php echo $id_kej; ?>">
          <input type="text" class="form-control" name="nama_kej" value="<?php echo $hasil_id_kej['nama_kejadian']; ?>" required>
        </div>
        <div class="form-group">
          <?php
          if($id_kej){
          ?>
            <button type="submit" name="edit_kej" class="btn btn-info btn-sm">Edit Kejadian</button>
            <a id="batal_kej" class="btn btn-warning btn-sm">Batal</a>
          <?php
          } else {
          ?>
            <button type="submit" name="tambah_kej" class="btn btn-info btn-sm">Input Kejadian</button>
          <?php
          }
          ?>
        </div>
      </form>
    </div>
    <br/>
    <br/>
    <div class="col-md-8"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
      <table id="kej" class="table table-bordered">
        <thead class="">
          <th width="1%">No</th>
          <th>Jenis Kejadian</th>
          <th></th>
        </thead>
        <tbody>
          <?php
          $noooo=1;
          $tampil_kej = mysqli_query($kominfo, "select * from kejadian order by id desc"); //ambil data dari tabel lokasi
          while($hasil_kej = mysqli_fetch_array($tampil_kej)){
          ?>
            <tr>
              <td>
                <?php echo $noooo++; ?>
              </td>
              <td>
                <?php echo $hasil_kej['nama_kejadian']; ?>
              </td>
              <td width="5%">
                <div class="btn-group">
                  <a id="edit_kej" class="btn btn-info btn-sm btn-sm" value="<?php echo $hasil_kej['id']; ?>">Edit</a>
                  <a id="hapus_kej"value="<?php echo $hasil_kej['id']; ?>" class="btn btn-danger btn-sm hapus">Hapus</a>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div> 
<br/>
<script>
  $(document).ready(function() {
    $('#kej').DataTable({
      "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
    });
  });
</script>