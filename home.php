<?php
if (empty($_SESSION['112_username'])) {
  session_start();
  header("Location:/");
}
//koneksi
include 'dbconfig.php';
?>

<link rel="stylesheet"href="assets/css/MarkerCluster.css"/>
<link rel="stylesheet"href="assets/css/MarkerCluster.Default.css"/>
<script src="assets/js/leaflet.markercluster-src.js"></script>
<link href='css/leaflet.fullscreen.css'rel='stylesheet'/>
<script src='js/Leaflet.fullscreen.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript"src="https://www.gstatic.com/charts/loader.js"></script>
<div class="card card-primary card-outline">
  <div class="card-header ">
    <h5 class="card-title">Peta Lokasi Kejadian</h5>
  </div>
  <div class="card-body ">
    <div id="mapid"style="width: 100%; height: 600px;"></div>
    <script> //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token
      var mbAttr='Map data &copy; Designer : Bidang TI Kominfo Sumenep';
      var mbUrl='https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
      var jalan=L.tileLayer(mbUrl, {
        id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr
      });
      var googlemap=L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20, subdomains:['mt0', 'mt1', 'mt2', 'mt3'], attribution: mbAttr
      });
      var mymap=L.map('mapid', {
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
      var layerControl=L.control.layers(basemaps, overlays, {
        collapsed: false
      }).addTo(mymap);
      var LeafIcon=L.Icon.extend( {
        options: {
          iconSize: [38, 60],
          shadowSize: [0, 0],
          iconAnchor: [22, 60],
          shadowAnchor: [4, 62],
          popupAnchor: [-3, -76]
        }
      });
      var call_center=new LeafIcon( {
        iconUrl: '112.png'
      });
      <?php
      $tampil=mysqli_query($kominfo, "select * from lokasi  "); //ambil data dari tabel lokasi
      while($hasil=mysqli_fetch_array($tampil)) {
        $id_kec=$hasil['kec'];
        $hasil_kec=mysqli_query($kominfo, "select * from kecamatan where id='$id_kec' "); //ambil data dari tabel lokasi
        $kec=mysqli_fetch_array($hasil_kec);
        $id_desa=$hasil['desa'];
        $hasil_desa=mysqli_query($kominfo, "select * from desa where id='$id_desa' "); //ambil data dari tabel lokasi
        $desa=mysqli_fetch_array($hasil_desa);
      ?>
        //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
        //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>], {
          icon: call_center
        }).addTo(mymap).bindPopup(
          `<?php echo '<div><b>Kejadian</b> : '.$hasil['kejadian'].'</div><div><b>Tanggal</b> : '.$hasil['tanggal_terima'].'</div><div><b>Kecamatan</b> : '.$kec['nama_kecamatan'].'</div><div><b>Desa</b> : '.$desa['nama_desa'].'</div><div><b>Ket.</b> : '.$hasil['ket'].'</div>'; ?>
          <?php
          $id_foto=$hasil['id'];
          $tampil_foto=mysqli_query($kominfo, "select * from foto where id_lokasi='$id_foto' ");
          while($hasil_foto=mysqli_fetch_array($tampil_foto)) {
          ?>
            <img class="img-thumbnail"src="foto/<?php echo $hasil_foto['nama_foto'] ?>">
          <?php
          }
        ?> `
        )
      <?php
      }
      ?>
    </script>
    <br/>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Grafik Kejadian 
            </h3>
            <div class="card-tools">
              <button type="button"class="btn btn-tool"data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button"class="btn btn-tool"data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div style="width: 100%; height: 100%;"id="chart_div1"class="chart"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Chart Kejadian 
                </h3>
                <div class="card-tools">
                  <button type="button"class="btn btn-tool"data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button"class="btn btn-tool"data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="piechart"></div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          $(window).resize(function() {
            drawChart();
          });
          // Load google charts
          google.charts.load('current', {
            'packages':['corechart']
          });
          google.charts.setOnLoadCallback(drawChart);
          // Draw the chart and set the chart values
          function drawChart() {
            var data=google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <?php
              $tampil=mysqli_query($kominfo, "select * from lokasi GROUP BY kejadian "); //ambil data dari tabel lokasi
              while($hasil=mysqli_fetch_array($tampil)) {
                $nama_kej=$hasil['kejadian'];
                $tampil_1=mysqli_query($kominfo, "select * from lokasi where kejadian='$nama_kej' "); //ambil data dari tabel lokasi
                $hasil_1=mysqli_num_rows($tampil_1);
              ?>
                <?php echo "['"; ?>
                <?php echo $nama_kej; ?>
                <?php echo "',"; ?>
                <?php echo $hasil_1; ?>
                <?php echo "],"; ?>
              <?php
              }
              ?>
            ]);
            // Optional; add a title and set the width and height of the chart
            var options= {
              'width': null, 'height':500
            };
            // Display the chart inside the <div> element with id="piechart"
            var chart=new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
          }
          google.load("visualization", "1", {
            packages:["corechart"]
          });
          google.setOnLoadCallback(drawChart1);
          function drawChart1() {
            var data=google.visualization.arrayToDataTable([[
              'tahun', <?php $tampil=mysqli_query($kominfo, "select * from lokasi GROUP BY kejadian "); //ambil data dari tabel lokasi
              while($hasil=mysqli_fetch_array($tampil)) {
                $nama_kej=$hasil['kejadian'];
                $tampil_1=mysqli_query($kominfo, "select * from lokasi where kejadian='$nama_kej' "); //ambil data dari tabel lokasi
                $hasil_1=mysqli_num_rows($tampil_1); ?>
                <?php echo " ' "; ?>
                <?php echo $nama_kej; ?>
                <?php echo " ',"; ?>
              <?php
              }
              ?>
            ],
            [
              '2022', <?php $tampil=mysqli_query($kominfo, "select * from lokasi GROUP BY kejadian "); //ambil data dari tabel lokasi
              while($hasil=mysqli_fetch_array($tampil)) {
                $nama_kej=$hasil['kejadian'];
                $tampil_1=mysqli_query($kominfo, "select * from lokasi where kejadian='$nama_kej' "); //ambil data dari tabel lokasi
                $hasil_1=mysqli_num_rows($tampil_1); ?>
                <?php echo $hasil_1; ?>
                <?php echo ","; ?>
              <?php
              }
              ?>
            ]]);
            // Optional; add a title and set the width and height of the chart
            var options= {
              'width': null, 'height':500
            };
            var chart=new google.visualization.ColumnChart(document.getElementById('chart_div1'));
            chart.draw(data, options);
          }
        </script>
      </div>
    </div>
  </div>
</div>