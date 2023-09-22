<?php
session_start();
if (empty($_SESSION['112_username'])){
  header("Location:/");
}
//koneksi
include 'dbconfig.php';
?>

<style>
  /* ukuran peta */
  #mapid {
    height: 600px;width:100%;
  }
</style>

<div class="card card-primary card-outline">
  <div class="card-header">
    <h5 class="card-title">Input Tim Support Kejadian</h5>
  </div>
  <div class="card-body ">
    <div class="row"> <!-- class row digunakan sebelum membuat column  -->
      <div class="col-md-3"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
        <?php
        $hak_akses = $_SESSION['hak_akses'];
        if($hak_akses=='Admin'){
          ?>
          <form id="form_pencarian" method="get">
            <div class="form-group">
              <label for="exampleFormControlInput1">Tanggal Kejadian</label>
              <select class="form-control" id="id_lokasi" name="id_lokasi" required>
                <option disabled selected>== Pilih Tanggal Kejadian ==</option>
                <?php
                $tampil_tgl = mysqli_query($kominfo, "select * from lokasi order by id desc"); //ambil data dari tabel kecamatan
                while($hasil_tgl = mysqli_fetch_array($tampil_tgl)) {
                ?>
                  <option value="<?php echo $hasil_tgl['id']; ?>"><?php echo $hasil_tgl['tanggal_terima']; ?> - <?php echo $hasil_tgl['kejadian']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-info btn-flat">Cari</button>
          </form>
          <hr>
          <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">Latitude, Longitude</label>
              <input disabled type="text" class="form-control" id="latlong" name="latlong" value="<?php echo $hasil_tgl['lat_long']; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Kejadian</label>
              <input disabled type="text" class="form-control" id="kejadian" name="kejadian" value="<?php echo $hasil_tgl['kejadian']; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Kecamatan</label>
              <?php
              $id_kec = $hasil_tgl['kec'];
              $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec' order by nama_kecamatan");
              $kec2 = mysqli_fetch_array($kec1)
              ?>
              <input disabled type="text" class="form-control" id="kec" name="kec" value="<?php echo $kec2['nama_kecamatan']; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Desa</label>
              <?php
              $id_desa = $hasil_tgl['desa'];
              $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa' order by nama_desa");
              $desa2 = mysqli_fetch_array($desa1)
              ?>
              <input disabled type="text" class="form-control" id="desa" name="desa" value="<?php echo $desa2['nama_desa']; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Pelapor</label>
              <input disabled type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" value="<?php echo $hasil_tgl['nama_pelapor']; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nomor Telepon Pelapor</label>
              <input disabled type="text" class="form-control" id="noTelp_pelapor" name="noTelp_pelapor" value="<?php echo $hasil_tgl['noTelp_pelapor']; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Alamat Kejadian</label>
              <input disabled type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $hasil_tgl['alamat']; ?>" required>
            </div>
          </form>
          <form id="form_tambah_support" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_lokasi_hidden" name="id_lokasi_hidden" value="">
            <div class="form-group">
              <label for="exampleFormControlInput1">Tim Bantuan</label>
              <select class="form-control" id="opd_terkait" name="opd_terkait" required>
                <option disabled selected>== Pilih Tim ==</option>
                <?php
                $tampil_opd = mysqli_query($kominfo, "select * from opd_terkait order by nama_opd asc");
                while($hasil_opd = mysqli_fetch_array($tampil_opd)) {
                  ?>
                  <option value="<?php echo $hasil_opd['id']; ?>"><?php echo $hasil_opd['nama_opd']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Jumlah Tim</label>
              <input type="number" min=0 class="form-control" id="jumlah_tim" name="jumlah_tim" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Keterangan</label>
              <textarea class="form-control" name="ket" cols="30" rows="5" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" name="tambah_lokasi" class="btn btn-info btn-sm">Tambah</button> <a class="btn btn-warning btn-sm" id="batal_lokasi">Batal</a>
            </div>
          </form>
          <script>
            // Menangani submit form pencarian
            document.getElementById('form_pencarian').addEventListener('submit', function (e) {
              e.preventDefault();
              var id_lokasi = document.getElementById('id_lokasi').value;
              $.ajax({
                url: 'get_data_by_id.php',
                type: 'POST',
                data: { id_lokasi: id_lokasi },
                dataType: 'json',
                success: function (data) {
                  // Mengisi data ke dalam kolom yang di-disable
                  document.getElementById('latlong').value = data.lat_long;
                  document.getElementById('kejadian').value = data.kejadian;
                  document.getElementById('kec').value = data.nama_kecamatan;
                  document.getElementById('desa').value = data.nama_desa;
                  document.getElementById('nama_pelapor').value = data.nama_pelapor;
                  document.getElementById('noTelp_pelapor').value = data.noTelp_pelapor;
                  document.getElementById('alamat').value = data.alamat;
                  document.getElementById('id_lokasi_hidden').value = id_lokasi;
                },
                error: function () {
                  alert('Terjadi kesalahan saat mengambil data.');
                }
              });
            });
          </script>
          <?php
        }
        ?>
      </div>
      <br/>
      <div class="col-md-9">
        <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
        <!-- peta akan ditampilkan dengan id = mapid -->
        <div id="mapid"></div>
        <br/>
      </div>
    </div>
  </div>
  <script>
    //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token  
    var mbAttr = 'Map data &copy; Designer : Bidang TI Kominfo Sumenep';
    var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
    var jalan = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
    var googlemap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'],attribution: mbAttr });
    var mymap = L.map('mapid', {
      center: [-6.974209829879984, 114.93917780339002],
      zoom: 9,
      layers: [googlemap],
      fullscreenControl: {pseudoFullscreen: false}
    });
    var basemaps = {
      'Google Map': googlemap,
      'Jalan Map': jalan,
    };
    var overlays = {};
    var layerControl = L.control.layers(basemaps,overlays,{collapsed: false}).addTo(mymap);
    // buat variabel berisi fugnsi L.popup
    var popup = L.popup();
    // buat fungsi popup saat map diklik
    function onMapClick(e) {
      popup.setLatLng(e.latlng).setContent("koordinatnya adalah " + e.latlng.toString()).openOn(mymap);  //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
      document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
    }
    mymap.on('click', onMapClick); //jalankan fungsi
  </script>
</div>
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