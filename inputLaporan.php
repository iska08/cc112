<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Call Center 112 Sumenep - Bismillah Melayani</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <link rel="stylesheet" href="assets/css/MarkerCluster.css" />
    <link rel="stylesheet" href="assets/css/MarkerCluster.Default.css" />
    <script src="assets/js/leaflet.markercluster-src.js"></script>
    <link href='css/leaflet.fullscreen.css' rel='stylesheet' />
    <script src='js/Leaflet.fullscreen.min.js'></script>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <style>
      /* ukuran peta */
      #mapid {
        height: 600px;
        width: 100%;
      }
    </style>
    <?php include 'dbconfig.php'; ?>
    <div class="card card-primary card-outline">
      <div class="card-header ">
        <h5 class="card-title">Input Lokasi Kejadian</h5>
      </div>
      <div class="card-body ">
        <div class="row">
          <!-- class row digunakan sebelum membuat column  -->
          <div class="col-md-3">
            <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
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
                <label for="exampleFormControlInput1">Nama Pelapor </label>
                <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nomor Telepon Pelapor </label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Waktu Kejadian</label>
                <input type="datetime-local" class="form-control" id="tanggal_terima" name="tanggal_terima" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Alamat Kejadian</label>
                <input type="text" class="form-control" name="alamat_kejadian" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Keterangan Kejadian</label>
                <textarea class="form-control" name="ket" cols="30" rows="5" required></textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Foto Kejadian</label>
                <input type="file" class="form-control" name="fotokejadian[]" multiple required>
              </div>
              <div class="form-group">
                <button type="submit" name="tambah_lokasi" class="btn btn-info btn-sm">Tambah</button>
                <a class="btn btn-warning btn-sm" id="batal_lokasi">Batal</a>
              </div>
            </form>
          </div>
          <br />
          <div class="col-md-9">
            <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
            <!-- peta akan ditampilkan dengan id = mapid -->
            <div id="mapid"></div>
            <br />
          </div>
        </div>
      </div>
      <script>
        var mbAttr = 'Map data &copy; Designer : Bidang TI Kominfo Sumenep';
        var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
        var jalan = L.tileLayer(mbUrl, {
          id: 'mapbox/streets-v11',
          tileSize: 512,
          zoomOffset: -1,
          attribution: mbAttr
        });
        var googlemap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
          maxZoom: 20,
          subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
          attribution: mbAttr
        });
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
        var overlays = {
        };
        var layerControl = L.control.layers(basemaps, overlays, {
          collapsed: false
        }).addTo(mymap);
        var popup = L.popup();
        // buat fungsi popup saat map diklik
        function onMapClick(e) {
          popup.setLatLng(e.latlng).setContent("koordinatnya adalah " + e.latlng.toString()).openOn(mymap); //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
          document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
        }
        mymap.on('click', onMapClick); //jalankan fungsi
      </script>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        // program dependent ajax
        $("#kecamatan").on("change", function () {
          var kec_id = $(this).val();
          $.ajax({
            url: "wilayah.php",
            type: "POST",
            cache: false,
            data: {
              kec_id: kec_id
            },
            success: function (data) {
              $("#desa").html(data);
              $('#dusun').html('<option value="">== Pilih Dusun ==</option>');
            }
          });
        });
        // kegiatan dependent ajax
        $("#desa").on("change", function () {
          var desa_id = $(this).val();
          $.ajax({
            url: "wilayah.php",
            type: "POST",
            cache: false,
            data: {
              desa_id: desa_id
            },
            success: function (data) {
              $("#dusun").html(data);
            }
          });
        });
        // sub kegiatan dependent ajax
        $("#dusun").on("change", function () {
          var dusun_id = $(this).val();
          $.ajax({
            url: "wilayah.php",
            type: "POST",
            cache: false,
            data: {
              dusun_id: dusun_id
            },
            success: function (data) {
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
  </body>
</html>