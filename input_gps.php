<?php 
session_start();
if (empty($_SESSION['112_username'])) {
    header("Location:/");
}
//koneksi
include 'dbconfig.php';
?>

<script>
    if(!navigator.geolocation){
        alert('Your Browser does not support HTML5 Geo Location. Please Use Newer Version Browsers');
    }
    navigator.geolocation.getCurrentPosition(success, error);
    function success(position){
        var latitude  = position.coords.latitude;
        var longitude = position.coords.longitude;
        var accuracy  = position.coords.accuracy;
        document.getElementById("latlong").value  = "LatLng("+latitude+ ", " +longitude+ ")";
        document.getElementById("acc").value  = accuracy;
    }
    function error(err){
        alert('ERROR(' + err.code + '): ' + err.message);
    }
</script>
<body>
    <center>
        <div class="card-body px-lg-5 py-lg-5">
            <div class="">
                <center>
                    <img src="img/smp.png" width="80">
                </center>
            </div>
            <hr/>
            <div class="text-center text-muted mb-4">
                <h3>Input Data PJU</h3>
            </div>
            <hr/>
            <div class="card-body lead">
                <div class="row"> <!-- class row digunakan sebelum membuat column  -->
                    <div class="col-xl"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                        <form id="form_tambah_input_gps"  method="post">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Latitude, Longitude</label>
                                <input type="text" class="form-control" id="latlong" name="latlong" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">ID PJU</label>
                                <input type="text" class="form-control" name="id_pju">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Kecamatan</label>
                                <select class="form-control" id="kecamatan" name="kec" required>
                                    <option disabled selected>== Pilih Kecamatan ==</option>
                                    <?php
                                    $tampil_kec = mysqli_query($kominfo, "select * from kecamatan"); //ambil data dari tabel kecamatan
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
                                <select class="form-control" id="desa" name="desa" required>
                                    <option disabled selected>== Pilih Desa ==</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Dusun</label>
                                <select class="form-control" id="dusun" name="dusun">
                                    <option disabled selected>== Pilih Dusun ==</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jenis PJU</label>
                                <input type="text" class="form-control" name="jenis" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tinggi PJU</label>
                                <input type="text" class="form-control" name="tinggi" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Status</label>
                                <select class="form-control" name="status" required>
                                    <option disabled selected>== Pilih Status ==</option>
                                    <option>Aktif</option>
                                    <option>Non Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Keterangan</label>
                                <textarea class="form-control" name="ket" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="tambah_lokasi_input_gps" class="btn btn-info">Tambah</button>
                            </div>
                            <div class="form-group">
                                <a href="logout_mobile.php" class="btn btn-warning">Log Out</a>
                            </div>
                        </form>
                    </div>
                    <br/>
                    <br/>
                </div>
            </center>
        </div>
    </center>
</body>