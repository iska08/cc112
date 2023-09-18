<?php
session_start();
if (empty($_SESSION['112_username'])){
  header("Location:/");
}
?>

<?php
//koneksi
include 'dbconfig.php';
error_reporting(0);
$id_desa = $_GET['id_desa'];
?>

<div class="card card-info card-outline">
  <div class="card-header ">
    <h5 class="card-title">Input Data Desa</h5>
  </div>
  <div class="card-body ">
    <div class="row"> <!-- class row digunakan sebelum membuat column  -->
      <div class="col-md-4"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
        <form  method="post" id="<?php if($id_desa){?>form_edit_desa<?php }else{?>form_tambah_desa<?php } ?>">
          <div class="form-group">
            <label for="exampleFormControlInput1">Kecamatan</label>
            <?php
            $tampil_id_desa = mysqli_query($kominfo, "select * from desa where id='$id_desa' "); //ambil data dari tabel lokasi
            $hasil_id_desa = mysqli_fetch_array($tampil_id_desa)
            ?>
            <?php
            $id_kec1=$hasil_id_desa['id_kecamatan'];
            $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec1' "); //ambil data dari tabel lokasi
            $kec2 = mysqli_fetch_array($kec1)
            ?>
            <select class="form-control" name="id_kecamatan">
              <?php if($id_desa){ ?>
                <option selected value="<?php echo $kec2['id']; ?>"><?php echo $kec2['nama_kecamatan']; ?></option>
                <option disabled >== Pilih Kecamatan ==</option>
              <?php }else{?>
                <option disabled selected>== Pilih Kecamatan ==</option>
              <?php } ?>
              <?php
              $tampil_kec = mysqli_query($kominfo, "select * from kecamatan order by nama_kecamatan"); //ambil data dari tabel kecamatan
              while($hasil_kec = mysqli_fetch_array($tampil_kec)){
              ?>
                <option value="<?php echo $hasil_kec['id']; ?>"><?php echo $hasil_kec['nama_kecamatan']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Desa</label>
            <input hidden name="id" value="<?php echo $id_desa; ?>">
            <input type="text" class="form-control" name="nama_desa" value="<?php echo $hasil_id_desa['nama_desa']; ?>" required>
          </div>
          <div class="form-group">
            <?php if($id_desa){ ?>
              <button type="submit" name="edit_desa" class="btn btn-info btn-sm">Edit Desa</button>
              <a id="batal_desa" class="btn btn-warning btn-sm">Batal</a>
            <?php }else{ ?>
              <button type="submit" name="tambah_desa" class="btn btn-info btn-sm">Input Desa</button>
            <?php } ?>
          </div>
        </form>
      </div>
      <br/>
      <div class="col-md-8"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
        <table id="desa" class="table table-bordered">
          <thead class="">
            <th width="1%">No</th>
            <th>Desa</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php
            $noo=1;
            $tampil_desa = mysqli_query($kominfo, "select * from desa order by nama_desa"); //ambil data dari tabel lokasi
            while($hasil_desa = mysqli_fetch_array($tampil_desa)){
            ?>
              <tr>
                <td><?php  echo $noo++; ?></td>
                <td><?php echo $hasil_desa['nama_desa']; ?></td>
                <td width="5%">
                  <div class="btn-group">
                    <a id="edit_desa" class="btn btn-info btn-sm btn-sm" value="<?php echo $hasil_desa['id']; ?>">Edit</a>
                    <a id="hapus_desa" value="<?php echo $hasil_desa['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
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
  <hr/>
  <script>
    $(document).ready(function() {
      $('#desa').DataTable({
        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      // program dependent ajax
      $("#kecamatan").on("change",function(){
        var kec_id = $(this).val();
        $.ajax({
          url :"wilayah.php",
          type:"POST",
          cache:false,
          data:{kec_id:kec_id},
          success:function(data){
            $("#desa").html(data);
            $('#dusun').html('<option value="">== Pilih Dusun ==</option>');
          }
        });
      });
      // kegiatan dependent ajax
      $("#desa").on("change", function(){
        var desa_id = $(this).val();
        $.ajax({
          url :"wilayah.php",
          type:"POST",
          cache:false,
          data:{desa_id:desa_id},
          success:function(data){
            $("#dusun").html(data);
          }
        });
      });
      // sub kegiatan dependent ajax
      $("#dusun").on("change", function(){
        var dusun_id = $(this).val();
        $.ajax({
          url :"wilayah.php",
          type:"POST",
          cache:false,
          data:{dusun_id:dusun_id},
          success:function(data){
            $("#").html(data);
          }
        });
      });
    });
  </script>
</div>