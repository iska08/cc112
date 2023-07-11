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
    <h5 class="card-title">Input Lokasi Kejadian</h5>
  </div>
  <div class="card-body ">
    <div class="row"> <!-- class row digunakan sebelum membuat column  -->
      <div class="col-md-3"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
        <form id="form_tambah_lokasi" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleFormControlInput1">Latitude, Longitude</label>
            <input type="text" class="form-control" id="latlong" name="latlong" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Kejadian</label>
            <select class="form-control select2-danger " name="kejadian" required>
              <option disabled selected>== Pilih Kejadian ==</option>
              <?php
              $tampil_kej = mysqli_query($kominfo, "select * from kejadian"); //ambil data dari tabel kecamatan
              while($hasil_kej = mysqli_fetch_array($tampil_kej)) {
              ?>
                <option value="<?php echo $hasil_kej['nama_kejadian']; ?>"><?php echo $hasil_kej['nama_kejadian']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Kecamatan</label>
            <select class="form-control" id="kecamatan" name="kec" required>
              <option disabled selected>== Pilih Kecamatan ==</option>
              <?php
              $tampil_kec = mysqli_query($kominfo, "select * from kecamatan"); //ambil data dari tabel kecamatan
              while($hasil_kec = mysqli_fetch_array($tampil_kec)) {
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
            <label for="exampleFormControlInput1">Tanggal Terima</label>
            <input type="text" class="form-control" id="tanggal_terima" name="tanggal_terima">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Selesai</label>
            <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Alamat</label>
            <input type="text" class="form-control" name="alamat">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Keterangan</label>
            <textarea class="form-control" name="ket" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Foto Kejadian</label>
            <input type="file" class="form-control" name="foto" data-icon="false" multiple required>
          </div>
          <div class="form-group">
            <button type="submit" name="tambah_lokasi" class="btn btn-info btn-sm">Tambah</button> <a class="btn btn-warning btn-sm" id="batal_lokasi">Batal</a>
          </div>
        </form>
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