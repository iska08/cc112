<?php
session_start();
if (empty($_SESSION['112_username'])){
  header("Location:login.php");
}
//koneksi
include 'dbconfig.php';
$hak_akses = $_SESSION['hak_akses'];
?>

<style>
  /* ukuran peta */
  #mapid {
    height: 600px;width:100%;
  }
</style>
<?php 
if(isset($_GET['id_support'])){
  $id_support=$_GET['id_support'];
  ?>
  <div class="card card-primary card-outline">
    <?php if($hak_akses=='Admin'){
      ?>
      <div class="card-header ">
        <h5 class="card-title">Edit Support Kejadian</h5>
      </div>
      <div class="card-body ">
        <div class="row"> <!-- class row digunakan sebelum membuat column  -->
          <div class="col-md-4"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
            <form  id="form_edit_support" method="post">
              <?php
              $tampil_tim     = mysqli_query($kominfo, "select * from tim where id='$id_support' ");
              $hasil_tim      = mysqli_fetch_array($tampil_tim);
              $id_lokasi      = $hasil_tim['id_lokasi'];
              $tampil_lokasi  = mysqli_query($kominfo, "select * from lokasi where id='$id_lokasi' ");
              $hasil_lokasi   = mysqli_fetch_array($tampil_lokasi);
              ?>
              <div class="form-group">
                <label for="exampleFormControlInput1">Latitude, Longitude</label>
                <input disabled type="text" class="form-control" id="latlong" name="latlong" value="<?php echo $hasil_lokasi['lat_long']; ?>">
                <input hidden type="text" name="id" value="<?php echo $hasil_tim['id']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Kejadian</label>
                <input disabled type="text" class="form-control" id="kejadian" name="kejadian" value="<?php echo $hasil_lokasi['kejadian']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Kecamatan</label>
                <?php
                $id_kec = $hasil_lokasi['kec'];
                $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
                $kec2 = mysqli_fetch_array($kec1)
                ?>
                <input disabled type="text" class="form-control" id="kec" name="kec" value="<?php echo $kec2['nama_kecamatan']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Desa</label>
                <?php
                $id_desa = $hasil_lokasi['desa'];
                $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
                $desa2 = mysqli_fetch_array($desa1)
                ?>
                <input disabled type="text" class="form-control" id="desa" name="desa" value="<?php echo $desa2['nama_desa']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama Pelapor</label>
                <input disabled type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" value="<?php echo $hasil_lokasi['nama_pelapor']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nomor Telepon Pelapor</label>
                <input disabled type="text" class="form-control" id="noTelp_pelapor" name="noTelp_pelapor" value="<?php echo $hasil_lokasi['noTelp_pelapor']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Terima</label>
                <input disabled type="text" class="form-control" id="tanggal_terima" name="tanggal_terima" value="<?php echo $hasil_lokasi['tanggal_terima']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Selesai</label>
                <input disabled type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo $hasil_lokasi['tanggal_selesai']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Alamat Kejadian</label>
                <input disabled type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $hasil_lokasi['alamat']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">OPD Terkait</label>
                <?php
                $id_opd = $hasil_tim['opd_terkait'];
                $opd1 = mysqli_query($kominfo, "select * from opd_terkait where id='$id_opd'");
                $opd2 = mysqli_fetch_array($opd1)
                ?>
                <select class="form-control" name="opd_terkait">
                  <option value="<?php echo $opd2['id']; ?>"><?php echo $opd2['nama_opd']; ?></option>
                  <option disabled >== Pilih OPD Terkait ==</option>
                  <?php
                  $tampil_per = mysqli_query($kominfo, "select * from opd_terkait order by nama_opd");
                  while($hasil_per = mysqli_fetch_array($tampil_per)){
                  ?>
                    <option value="<?php echo $hasil_per['id']; ?>"><?php echo $hasil_per['nama_opd']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Jumlah Tim</label>
                <input type="number" class="form-control" name="jumlah_tim" value="<?php echo $hasil_tim['jumlah_tim']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Keterangan</label>
                <textarea class="form-control" name="ket" cols="30" rows="5"><?php echo $hasil_tim['ket']; ?></textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="edit_support" class="btn btn-info btn-sm">Edit</button> <a class="btn btn-warning btn-sm" id="batal_support">Batal</a>
              </div>
            </form>
          </div>
          <br/>
          <div class="col-md-8">
            <div id="mapid"></div>
            <br/>
          </div>
        </div>
      </div>
      <?php
    }elseif($hak_akses=='Tim'){
      ?>
      <div class="card-header ">
        <h5 class="card-title">Input Laporan Kejadian</h5>
      </div>
      <div class="card-body ">
        <div class="row"> <!-- class row digunakan sebelum membuat column  -->
          <div class="col-md-4"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
            <form  id="form_edit_support" method="post">
              <?php
              $tampil_support = mysqli_query($kominfo, "select * from tim where id='$id_support' "); //ambil data dari tabel lokasi
              $hasil_support  = mysqli_fetch_array($tampil_support)
              ?>
              <div class="form-group">
                <label for="exampleFormControlInput1">Laporan Penyelesaian</label>
                <textarea class="form-control" name="laporan" cols="30" rows="5"><?php echo $hasil_support['laporan']; ?></textarea>
                <input hidden type="text" name="id" value="<?php echo $hasil_support['id']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Anggota yang Terlibat</label>
                <div id="tim-container">
                  <?php
                  $tim = explode(',', $hasil_support['nama_anggota']);
                  $maxTim = intval($hasil_support['jumlah_tim']);
                  $timCount = count($tim);
                  foreach ($tim as $anggota) {
                    echo '<div class="input-group mb-3">';
                    echo '<input type="text" class="form-control" name="nama_anggota[]" value="' . $anggota . '">';
                    echo '<div class="input-group-append">';
                    echo '<button type="button" class="btn btn-danger remove-tim">-</button>';
                    echo '</div>';
                    echo '</div>';
                  }
                  ?>
                </div>
                <button type="button" id="add-tim" class="btn btn-primary" <?php echo ($timCount >= $maxTim) ? 'disabled' : ''; ?>>+</button>
              </div>
              <div class="form-group">
                <?php
                if(empty($lap) && empty($tim)){
                  ?>
                  <button type="submit" name="edit_support" class="btn btn-info btn-sm">Input Laporan</button> <a class="btn btn-warning btn-sm" id="batal_support">Batal</a>
                  <?php
                }else{
                  ?>
                  <button type="submit" name="edit_support" class="btn btn-info btn-sm">Edit Laporan</button> <a class="btn btn-warning btn-sm" id="batal_support">Batal</a>
                  <?php
                }
                ?>
              </div>
            </form>
          </div>
          <br/>
          <div class="col-md-8">
            <div id="mapid"></div>
            <br/>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      var maxTim = <?php echo $maxTim; ?>;
      var timCount = <?php echo $timCount; ?>;
      $("#add-tim").click(function () {
        if (timCount < maxTim) {
          // Tambahkan input anggota tim
          var inputGroup = '<div class="input-group mb-3">';
          inputGroup += '<input type="text" class="form-control" name="nama_anggota[]">';
          inputGroup += '<div class="input-group-append">';
          inputGroup += '<button type="button" class="btn btn-danger remove-tim">-</button>';
          inputGroup += '</div>';
          inputGroup += '</div>';
          $("#tim-container").append(inputGroup);
          timCount++;
          // Disable tombol tambah jika sudah mencapai batas maksimal
          if (timCount >= maxTim) {
            $("#add-tim").prop("disabled", true);
          }
        }
      });
      // Hapus input anggota tim
      $("#tim-container").on("click", ".remove-tim", function () {
        $(this).closest(".input-group").remove();
        timCount--;
        // Aktifkan kembali tombol tambah jika masih di bawah batas maksimal
        if (timCount < maxTim) {
          $("#add-tim").prop("disabled", false);
        }
      });
    });
  </script>
  <script>
    //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token
    var mbAttr = 'Map data &copy; Designer : Bidang TI Kominfo Sumenep';
    var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
    var jalan = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
    var googlemap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'],attribution: mbAttr });
    <?php
    $tampil = mysqli_query($kominfo, "select * from lokasi where id='$id_lokasi' "); //ambil data dari tabel lokasi
    while($hasil = mysqli_fetch_array($tampil)){
    ?>
      var mymap = L.map('mapid', {
        center: [<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>],
        zoom: 17,
        layers: [googlemap],
        fullscreenControl: {pseudoFullscreen: false}
      });
    <?php
    }
    ?>
    var basemaps = {
      'Google Map': googlemap,
      'Jalan Map': jalan,
    };
    var overlays = {};
    var layerControl = L.control.layers(basemaps,overlays,{collapsed: false}).addTo(mymap);
    var LeafIcon = L.Icon.extend({
      options: {
        shadowUrl: 'tower.png',
        iconSize:     [38, 60],
        shadowSize:   [0, 0],
        iconAnchor:   [22, 60],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
      }
    });
    var greenIcon = new LeafIcon({iconUrl: '112.png'});
    // buat variabel berisi fugnsi L.popup
    var popup = L.popup();
    <?php
    $tampil = mysqli_query($kominfo, "select * from lokasi where id='$id_lokasi' "); //ambil data dari tabel lokasi
    while($hasil = mysqli_fetch_array($tampil)) {
      $id_kec = $hasil['kec'];
      $hasil_kec = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec' "); //ambil data dari tabel lokasi
      $kec = mysqli_fetch_array($hasil_kec);
      $id_desa = $hasil['desa'];
      $hasil_desa = mysqli_query($kominfo, "select * from desa where id='$id_desa' "); //ambil data dari tabel lokasi
      $desa = mysqli_fetch_array($hasil_desa);
    ?>
      //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
      //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
      L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>],{icon: greenIcon}).addTo(mymap)
      //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
      .bindPopup(`<?php echo '<div><b>Kejadian</b> : '.$hasil['kejadian'].'</div><div><b>Kecamatan</b> : '.$kec['nama_kecamatan'].'</div><div><b>Desa</b> : '.$desa['nama_desa'].'</div><div><b>Ket.</b> : '.$hasil['ket'].'</div>'; ?>`)
    <?php
    }
    ?>
  </script>
  <?php
  }
  ?>
  <script type="text/javascript">
    $(document).ready(function() {
      // program dependent ajax
      $("#kecamatan").on("change",function() {
        var kec_id = $(this).val();
        $.ajax({
          url :"wilayah.php",
          type:"POST",
          cache:false,
          data:{kec_id:kec_id},
          success:function(data) {
            $("#desa").html(data);
            $('#dusun').html('<option value="">== Pilih Dusun ==</option>');
          }
        });
      });
      // kegiatan dependent ajax
      $("#desa").on("change", function() {
        var desa_id = $(this).val();
        $.ajax({
          url :"wilayah.php",
          type:"POST",
          cache:false,
          data:{desa_id:desa_id},
          success:function(data) {
            $("#dusun").html(data);
          }
        });
      });
      // sub kegiatan dependent ajax
      $("#dusun").on("change", function() {
        var dusun_id = $(this).val();
        $.ajax({
          url :"wilayah.php",
          type:"POST",
          cache:false,
          data:{dusun_id:dusun_id},
          success:function(data) {
            $("#").html(data);
          }
        });
      });
    });
  </script>
  <script>
    flatpickr("#tanggal_terima", {
      enableTime: true,
      dateFormat: "d F Y H:i",
      "locale": "id"
    });
  </script>
  <script>
    flatpickr("#tanggal_selesai", {
      enableTime: true,
      dateFormat: "d F Y H:i",
      "locale": "id"
    });
  </script>