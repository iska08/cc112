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
$id_kec = $_GET['id_kec'];
?>

<div class="card card-info card-outline">
    <div class="card-header">
        <h5 class="card-title">Input Data Kecamatan</h5>
    </div>
    <div class="card-body ">
        <div class="row">
            <!-- class row digunakan sebelum membuat column  -->
            <div class="col-md-4">
                <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <form method="post" id="<?php if($id_kec){?>form_edit_kec<?php }else{?>form_tambah_kec<?php } ?>">
                    <?php
                    $tampil_id_kec = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec' "); //ambil data dari tabel lokasi
                    $hasil_id_kec = mysqli_fetch_array($tampil_id_kec)
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kecamatan</label>
                        <input hidden name="id" value="<?php echo $id_kec; ?>">
                        <input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $hasil_id_kec['nama_kecamatan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <?php
                        if($id_kec){
                        ?>
                            <button type="submit" name="edit_kec" class="btn btn-info btn-sm">Edit Kecamatan</button>
                            <a class="btn btn-warning btn-sm" id="batal_kec">Batal</a>
                        <?php 
                        } else {
                        ?>
                            <button type="submit" name="tambah_kecamatan" class="btn btn-info btn-sm">Input Kecamatan</button>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
            <br />
            <div class="col-md-8">
                <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <table id="kec" class="table table-bordered">
                    <thead class="">
                        <th width="1%">No</th>
                        <th>Kecamatan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no=1; $tampil_kec = mysqli_query($kominfo, "select * from kecamatan order by nama_kecamatan"); //ambil data dari tabel lokasi
                        while($hasil_kec = mysqli_fetch_array($tampil_kec)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $hasil_kec['nama_kecamatan']; ?></td>
                                <td width="5%">
                                    <div class="btn-group">
                                        <a id="edit_kec" value="<?php echo $hasil_kec['id']; ?>" class="btn btn-info btn-sm btn-sm">Edit</a>
                                        <a id="hapus_kec" value="<?php echo $hasil_kec['id']; ?>" class="btn btn-danger btn-sm hapus">Hapus</a>
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
    <hr />
    <script>
        $(document).ready(function() {
            $('#kec').DataTable({
                "lengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ]
            });
        });
    </script>
</div>