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
$id_survey = $_GET['id_survey'];
?>

<div class="card card-info card-outline">
    <div class="card-header">
        <h5 class="card-title">Input Data Survey</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- class row digunakan sebelum membuat column  -->
            <div class="col-md-4">
                <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <form method="post" id="<?php if($id_survey){?>form_edit_survey<?php }else{?>form_tambah_survey<?php } ?>">
                    <?php
                    $tampil_id_survey = mysqli_query($kominfo, "select * from survey where id='$id_survey' ");
                    $hasil_id_survey = mysqli_fetch_array($tampil_id_survey)
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input hidden name="id" value="<?php echo $id_survey; ?>">
                        <input type="text" class="form-control" name="nama" value="<?php echo $hasil_id_survey['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $hasil_id_survey['alamat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">No. HP</label>
                        <input type="text" class="form-control" name="hp" value="<?php echo $hasil_id_survey['hp']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai 1</label>
                        <input type="range" class="form-control" name="res1" value="<?php echo $hasil_id_survey['res1']; ?>" step="10" min="0" max="100" required>
                        <output for="res1"><?php echo $hasil_id_survey['res1']; ?></output>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai 2</label>
                        <input type="range" class="form-control" name="res2" value="<?php echo $hasil_id_survey['res2']; ?>" step="10" min="0" max="100" required>
                        <output for="res2"><?php echo $hasil_id_survey['res2']; ?></output>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kritik/Saran</label>
                        <input type="text" class="form-control" name="res3" value="<?php echo $hasil_id_survey['res3']; ?>" required>
                    </div>
                    <div class="form-group">
                        <?php
                        if($id_survey){
                        ?>
                            <button type="submit" name="edit_survey" class="btn btn-info btn-sm">Edit Survey</button>
                            <a class="btn btn-warning btn-sm" id="batal_survey">Batal</a>
                        <?php 
                        } else {
                        ?>
                            <button type="submit" name="tambah_survey" class="btn btn-info btn-sm">Input Survey</button>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
            <br />
            <div class="col-md-8">
                <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <table id="survey" class="table table-bordered">
                    <thead class="">
                        <th width="1%">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Nilai 1</th>
                        <th>Nilai 2</th>
                        <th>Kritik/Saran</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no=1; $tampil_survey = mysqli_query($kominfo, "select * from survey order by id desc");
                        while($hasil_survey = mysqli_fetch_array($tampil_survey)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $hasil_survey['nama']; ?></td>
                                <td><?php echo $hasil_survey['alamat']; ?></td>
                                <td><?php echo $hasil_survey['hp']; ?></td>
                                <td><?php echo $hasil_survey['res1']; ?></td>
                                <td><?php echo $hasil_survey['res2']; ?></td>
                                <td><?php echo $hasil_survey['res3']; ?></td>
                                <td width="5%">
                                    <div class="btn-group">
                                        <a id="edit_survey" value="<?php echo $hasil_survey['id']; ?>" class="btn btn-info btn-sm btn-sm">Edit</a>
                                        <a id="hapus_survey" value="<?php echo $hasil_survey['id']; ?>" class="btn btn-danger btn-sm hapus">Hapus</a>
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
            // Fungsi untuk memperbarui nilai output saat slider digeser
            $('input[type="range"]').on('input', function() {
                $(this).next('output').val(this.value);
            });

            $('#survey').DataTable({
                "lengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ]
            });
        });
    </script>
</div>