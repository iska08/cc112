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
$id_user = $_GET['id_user'];
?>

<div class="card-header">
    <h5 class="card-title">Input Data User</h5>
</div>
<div class="card-body ">
    <div class="row">
        <!-- class row digunakan sebelum membuat column  -->
        <div class="col-md-4">
            <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
            <form method="post" id="<?php if($id_user){?>form_edit_user<?php }else{?>form_tambah_user<?php } ?>">
                <?php
                $tampil_id_user = mysqli_query($kominfo, "select * from user where id='$id_user' ");
                $hasil_id_user = mysqli_fetch_array($tampil_id_user)
                ?>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input hidden name="id" value="<?php echo $id_user; ?>">
                    <input type="text" class="form-control" name="nama_user" value="<?php echo $hasil_id_user['nama_user']; ?>" required>
                </div>
                <div class="form-group">
                    <?php
                    if($id_user){
                    ?>
                        <button type="submit" name="edit_user" class="btn btn-info btn-sm">Edit User</button>
                        <a class="btn btn-warning btn-sm" id="batal_user">Batal</a>
                    <?php 
                    } else {
                    ?>
                        <button type="submit" name="tambah_user" class="btn btn-info btn-sm">Input User</button>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
        <br />
        <div class="col-md-8">
            <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
            <table id="user" class="table table-bordered">
                <thead class="">
                    <th width="1%">No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Hak Akses</th>
                    <th>Online</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    $no=1; $tampil_user = mysqli_query($kominfo, "select * from user order by id desc");
                    while($hasil_user = mysqli_fetch_array($tampil_user)){
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $hasil_user['username']; ?></td>
                            <td><?php echo $hasil_user['password']; ?></td>
                            <td><?php echo $hasil_user['nama']; ?></td>
                            <td><?php echo $hasil_user['email']; ?></td>
                            <td><?php echo $hasil_user['hak_akses']; ?></td>
                            <td><?php echo $hasil_user['online']; ?></td>
                            <td width="5%">
                                <div class="btn-group">
                                    <a id="edit_user" value="<?php echo $hasil_user['id']; ?>" class="btn btn-info btn-sm btn-sm">Edit</a>
                                    <a id="hapus_user" value="<?php echo $hasil_user['id']; ?>" class="btn btn-danger btn-sm hapus">Hapus</a>
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
        $('#user').DataTable({
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ]
        });
    });
</script>