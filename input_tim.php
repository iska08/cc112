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
    <h5 class="card-title">Tambah Tim Bantuan</h5>
  </div>
  <div class="card-body ">
    <div class="row"> <!-- class row digunakan sebelum membuat column  -->
      <div class="col-md-3"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
        <?php
        $tim=$_GET['id'];
        $hak_akses = $_SESSION['hak_akses'];
        if($hak_akses=='Admin'){
          ?>
          <form method="GET">
            <label for="exampleFormControlInput1">Pilih Kejadian</label>
            <div class="input-group input-group-sm">
              <input hidden name="hal" value="input_tim">
              <select class="form-control" id="bulan" name="id">
                <option disabled >== Pilih Kejadian ==</option>
                <?php $tampil_kej = mysqli_query($kominfo, "select * from lokasi ORDER BY id desc ");
                while($hasil_kej = mysqli_fetch_array($tampil_kej)){
                  ?>
                  <option value="<?php echo $hasil_kej['id']; ?>"><?php echo $hasil_kej['tanggal_terima']; ?> - <?php echo $hasil_kej['kejadian']; ?></option>
                  <?php
                }
                ?>
              </select>
              <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">Submit</button>
              </span>
            </div>
          </form>
          <hr/>
          <?php
          $tampil_kej_tim = mysqli_query($kominfo, "select * from lokasi where id='$tim' ");
          $hasil_kej_tim = mysqli_fetch_array($tampil_kej_tim);
          ?>
          <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">Latitude, Longitude</label>
              <input disabled type="text" value="<?php echo $hasil_kej_tim['lat_long']; ?>" class="form-control" id="latlong" name="latlong" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Kejadian</label>
              <input disabled type="text" value="<?php echo $hasil_kej_tim['kejadian']; ?>" class="form-control" name="kejadian" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Kecamatan</label>
              <?php
              $id_kec=$hasil_kej_tim['kec'];
              $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
              $kec2 = mysqli_fetch_array($kec1);
              ?>
              <input disabled type="text" value="<?php echo $kec2['nama_kecamatan']; ?>" class="form-control" name="kecamatan" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Desa</label>
              <?php
              $id_desa=$hasil_kej_tim['desa'];
              $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
              $desa2 = mysqli_fetch_array($desa1);
              ?>
              <input disabled type="text" value="<?php echo $desa2['nama_desa']; ?>" class="form-control" name="desa" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Pelapor</label>
              <input disabled type="text" value="<?php echo $hasil_kej_tim['nama_pelapor']; ?>" class="form-control" name="nama_pelapor" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nomor Telepon Pelapor</label>             
              <input disabled type="text" value="<?php echo $hasil_kej_tim['noTelp_pelapor']; ?>" class="form-control" name="noTelp_pelapor" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Tanggal Terima</label>
              <input type="text" disabled value="<?php echo $hasil_kej_tim['tanggal_terima']; ?>" class="form-control" id="tanggal_terima" name="tanggal_terima" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Tanggal Selesai</label>
              <input type="text" disabled value="<?php echo $hasil_kej_tim['tanggal_selesai']; ?>" class="form-control" id="tanggal_terima" name="tanggal_selesai" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Alamat Kejadian</label>
              <input type="text" disabled value="<?php echo $hasil_kej_tim['alamat']; ?>" class="form-control" id="tanggal_terima" name="alamat" required>
            </div>
          </form>
          <form id="form_tambah_tim" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_lokasi" value="<?php echo $tim['id']; ?>">
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
              <button type="submit" name="tambah_tim" class="btn btn-info btn-sm">Tambah</button> <a href="?hal=lokasi" class="btn btn-warning btn-sm" id="batal_tim">Batal</a>
            </div>
          </form>
          <?php
        }
        ?>
      </div>
      <br/>
      <div class="col-md-9">
        <div id="mapid"></div>
        <br/>
      </div>
    </div>
  </div>
  <script>
    $year = new Date().getFullYear();
    var mbAttr = '&copy; ' + $year + ' Bidang TI Kominfo Sumenep';
    var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
    var jalan = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
    var googlemap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'],attribution: mbAttr });
    var mymap = L.map('mapid', {
      center: [-6.974209829879984, 114.93917780339002],
      zoom: 9,
      layers: [googlemap],
      fullscreenControl: {
        pseudoFullscreen: false
      }
    });
    var basemaps = {
      'Google Map': googlemap,
      'Jalan Map': jalan,
    };
    var overlays = {};
    var layerControl = L.control.layers(
      basemaps, overlays, {
        collapsed: false
      }).addTo(mymap);
      var LeafIcon=L.Icon.extend({
        options: {
          iconSize: [38, 60],
          shadowSize: [0, 0],
          iconAnchor: [22, 60],
          shadowAnchor: [4, 62],
          popupAnchor: [-3, -76]
        }
      });
      var call_center=new LeafIcon({
        iconUrl: '112.png'
      });
      <?php
      $hasil_tim = mysqli_query($kominfo, "select * from lokasi where id='$tim' ");
      $tim = mysqli_fetch_array($hasil_tim);
      ?>
      L.marker([
        <?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $tim['lat_long']); ?>
      ],{icon: call_center}).addTo(mymap);
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