<?php
    include 'header.php';
    include 'dbconfig.php';
    include 'fungsi_bulan.php';
   
?>
<link href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/navbar-top-fixed.css" rel="stylesheet">
<link rel="stylesheet" href="css/wizard.css">
<style type="text/css">
@media screen and (max-width: 1000px) {
    .mobile-space {
        margin-top: 50px;
    }

    .mobile-space_1 {
        margin-top: 50px;
    }

    .logo {
        height: 40px;
    }

    .gbr {
        width: 50%;
        height: 50%;
    }

    .chart {
        width: 100%;
        min-height: 300px;
    }
}

@media screen and (max-width: 600px) {
    .mobile-space {
        margin-top: 30px;
    }

    .mobile-space_1 {
        margin-top: 0px;
    }

    .logo {
        height: 30px;
    }

    .gbr {
        width: 100%;
    }
}

@media screen and (max-width: 1000px) {
    .mapid {
        height: 300px;
        width: 100%;
    }
}

@media screen and (min-width: 1200px) {
    .mapid {
        height: 600px;
        width: 100%;
    }
}

@media screen and (min-width: 1200px) {
    .mobile-space {
        margin-top: 190px;
    }

    .logo {
        height: 90px;
    }

    .gbr {
        height: 200px;
    }

    .chart {
        width: 100%;
        min-height: 500px;
    }
}
</style>

<body>

    <div class="fixed-top container" style="background-color: #fff;">

        <center><a href="https://ekominfo.sumenepkab.go.id/cc112/"><img src="img/cc112_ok1.jpg" class="img-fluid"></a>
        </center>
        <form action="index.php" method="GET">
            <div class="input-group input-group-sm">
                <input hidden name="hal" value="data_kej">
                <input type="text" class="form-control" name="cari" placeholder="Cari kejadian dan lokasi">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Cari</button>
                </span>
            </div>
        </form>
    </div>

    <main role="main" class="mobile-space">
        <div class="container-fluid">
            <div class="container">
                <?php 
if($_GET['cari']){
    $cari = $_GET['cari']; ?>
                <br />
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            Hasil pencarian : <?php echo $cari; ?>
                        </h3>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <!-- class row digunakan sebelum membuat column  -->
                            <div class="col-md-12">
                                <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->

                                <div class="table-responsive">
                                    <table id="data_kej" class="table table-bordered">
                                        <thead class="">

                                            <th>
                                                Kejadian
                                            </th>
                                            <th>
                                                Kecamatan
                                            </th>
                                            <th>
                                                Desa
                                            </th>
                                            <th>
                                                Alamat
                                            </th>
                                            <th>
                                                Tanggal
                                            </th>
                                            <th>
                                                Keterangan
                                            </th>
                                            <th>
                                                Foto
                                            </th>

                                        </thead>
                                        <tbody>
                                            <?php $tampil = mysqli_query($kominfo, "select * from lokasi where ket like '%".$cari."%' or kejadian like '%".$cari."%' or alamat like '%".$cari."%' order by id desc "); //ambil data dari tabel lokasi perusahaan
                          $nomor=1;  while($hasil = mysqli_fetch_assoc($tampil)){ 
                          $jumlah = mysqli_num_rows($tampil);
                          ?>

                                            <tr>
                                                <td>
                                                    <?php echo $hasil['kejadian']; ?>
                                                </td>
                                                <td>
                                                    <?php $id_kec=$hasil['kec']; 
                            $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'"); 
                            $kec2 = mysqli_fetch_array($kec1);
                            echo $kec2['nama_kecamatan']; ?>
                                                </td>
                                                <td>
                                                    <?php $id_desa=$hasil['desa']; 
                            $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'"); 
                            $desa2 = mysqli_fetch_array($desa1);
                            echo $desa2['nama_desa']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $hasil['alamat']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $hasil['tanggal_terima']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $hasil['ket']; ?>
                                                </td>
                                                <td width="20%">
                                                    <div class="row">
                                                        <?php $id_lokasi=$hasil['id']; 
                            $lokasi_foto = mysqli_query($kominfo, "select * from foto where id_lokasi='$id_lokasi'"); 
                            while($foto1 = mysqli_fetch_array($lokasi_foto)){?>
                                                        <div class="col text-center">
                                                            <div><a href="foto/<?php echo $foto1['nama_foto'] ?>"
                                                                    data-toggle="lightbox"><img class="img-thumbnail"
                                                                        src="foto/<?php echo $foto1['nama_foto'] ?>" /></a>
                                                            </div>
                                                        </div>
                                                        <?php }  ?>
                                                    </div>
                                                </td>

                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <br />




                <div class="card card-primary card-outline mobile-space_1">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Kejadian Terbaru
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <!-- class row digunakan sebelum membuat column  -->
                            <div class="row mb-2">
                                <?php
$tampil_awal = mysqli_query($kominfo, "select * from lokasi order by id desc LIMIT 2  ");	
while($hasil = mysqli_fetch_array($tampil_awal)){   
?>
                                <div class="col-md-6">
                                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                        <div class="card-body d-flex flex-column align-items-start">
                                            <strong
                                                class="d-inline-block mb-2 text-primary"><?php echo $hasil['kejadian']; ?></strong>
                                            <h3 class="mb-0">
                                                <?php $id_kec=$hasil['kec']; $tampil_id_kec = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec' "); //ambil data dari tabel lokasi
                $hasil_id_kec = mysqli_fetch_array($tampil_id_kec) ?>
                                                <a class="text-dark"
                                                    href="#"><?php echo $hasil_id_kec['nama_kecamatan']; ?></a>
                                            </h3>
                                            <div class="mb-1 text-muted"><?php echo $hasil['tanggal_terima']; ?></div>
                                            <p class="card-text mb-auto"><?php echo $hasil['ket']; ?></p>
                                            <a href="#"></a>
                                        </div>
                                        <?php $id_foto=$hasil['id']; $tampil_foto = mysqli_query($kominfo, "select * from foto where id_lokasi='$id_foto' ");  while($hasil_foto = mysqli_fetch_array($tampil_foto)){ ?>
                                        <img src="foto/<?php echo $hasil_foto['nama_foto'] ?>" class="gbr">
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Peta Lokasi Kejadian
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <!-- class row digunakan sebelum membuat column  -->

                            <div class="col-md-6">
                                <form method="GET">
                                    <div class="input-group input-group-sm">
                                        <input hidden name="hal" value="data_kej">
                                        <select class="form-control" id="bulan" name="bulan">
                                            <?php if($_GET['bulan']){ ?>
                                            <option value="<?php echo $_GET['bulan']; ?>" selected>
                                                <?php echo kebulan($_GET['bulan']);?></option>
                                            <option disabled>== Pilih Bulan ==</option>
                                            <?php }else{ ?>
                                            <option disabled selected>== Pilih Bulan ==</option>
                                            <?php } ?>
                                            <?php $tampil_bulan = mysqli_query($kominfo, "select * from lokasi GROUP BY bulan "); //ambil data dari tabel kecamatan
                            while($hasil_bulan = mysqli_fetch_array($tampil_bulan)){ ?>
                                            <option value="<?php echo $hasil_bulan['bulan']; ?>">
                                                <?php echo kebulan($hasil_bulan['bulan']); ?></option>
                                            <?php } ?>
                                            <option value="">== Semua Bulan ==</option>
                                        </select>
                                        <select class="form-control" id="bulan" name="th">
                                            <?php if($_GET['th']){ ?>
                                            <option selected><?php echo $_GET['th'];?></option>
                                            <option disabled>== Pilih Tahun ==</option>
                                            <?php }else{ ?>
                                            <option disabled selected>== Pilih Tahun ==</option>
                                            <?php } ?>
                                            <?php $tampil_bulan = mysqli_query($kominfo, "select * from lokasi GROUP BY tahun "); //ambil data dari tabel kecamatan
                            while($hasil_bulan = mysqli_fetch_array($tampil_bulan)){ ?>
                                            <option value="<?php echo $hasil_bulan['tahun']; ?>">
                                                <?php echo $hasil_bulan['tahun']; ?></option>
                                            <?php } ?>
                                            <option value="">== Semua Tahun ==</option>
                                        </select>
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat">Submit</button>
                                        </span>
                                    </div>

                                </form>
                            </div>

                            <div class="col-md-4">
                                <form method="GET">
                                    <div class="input-group input-group-sm">
                                        <input hidden name="hal" value="data_kej">
                                        <select class="form-control" id="kej" name="kej">
                                            <?php if($_GET['kej']){ ?>
                                            <option selected><?php echo $_GET['kej'];?></option>
                                            <option disabled>== Pilih Kejadian ==</option>
                                            <?php }else{ ?>
                                            <option disabled selected>== Pilih Kejadian ==</option>
                                            <?php } ?>
                                            <?php $tampil_kej = mysqli_query($kominfo, "select * from kejadian"); //ambil data dari tabel kecamatan
                            while($hasil_kej = mysqli_fetch_array($tampil_kej)){ ?>
                                            <option value="<?php echo $hasil_kej['nama_kejadian']; ?>">
                                                <?php echo $hasil_kej['nama_kejadian']; ?></option>
                                            <?php } ?>
                                            <option value="">== Semua Kejadian ==</option>
                                        </select>
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat">Submit</button>
                                        </span>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <hr />
                        <div id="mapid" class="mapid"></div>
                    </div>
                </div>
                <script>
                //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token  
                var mbAttr = '&copy; 2022 Bidang TI Kominfo Sumenep';
                var mbUrl =
                    'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
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

                var LeafIcon = L.Icon.extend({
                    options: {
                        iconSize: [38, 60],
                        shadowSize: [0, 0],
                        iconAnchor: [22, 60],
                        shadowAnchor: [4, 62],
                        popupAnchor: [-3, -76]
                    }
                });

                var call_center = new LeafIcon({
                    iconUrl: '112.png'
                });

                <?php  
        
        if($_GET['kej']){ $kej = $_GET['kej']; $tampil = mysqli_query($kominfo, "select * from lokasi where kejadian='$kej' ");} //ambil data dari tabel lokasi
        else{$tampil = mysqli_query($kominfo, "select * from lokasi ");}
        if($_GET['bulan'] || $_GET['th']){ $bulan = $_GET['bulan']; $tahun = $_GET['th']; $tampil = mysqli_query($kominfo, "select * from lokasi where bulan='$bulan' OR tahun='$tahun' ");} //ambil data dari tabel lokasi
        if($_GET['bulan'] && $_GET['th']){$bulan = $_GET['bulan']; $tahun = $_GET['th']; $tampil = mysqli_query($kominfo, "select * from lokasi where bulan='$bulan' AND tahun='$tahun' ");} //ambil data dari tabel lokasi        
        while($hasil = mysqli_fetch_array($tampil)){   
        $id_kec = $hasil['kec'];
        $hasil_kec = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec' "); //ambil data dari tabel lokasi
        $kec = mysqli_fetch_array($hasil_kec); 
        $id_desa = $hasil['desa'];
        $hasil_desa = mysqli_query($kominfo, "select * from desa where id='$id_desa' "); //ambil data dari tabel lokasi
        $desa = mysqli_fetch_array($hasil_desa); ?>

                //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
                //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan

                L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>], {
                        icon: call_center
                    }).addTo(mymap)


                    //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
                    .bindPopup(
                        `<?php echo '<div><b>Kejadian</b> : '.$hasil['kejadian'].'</div><div><b>Tanggal</b> : '.$hasil['tanggal_terima'].'</div><div><b>Kecamatan</b> : '.$kec['nama_kecamatan'].'</div><div><b>Desa</b> : '.$desa['nama_desa'].'</div><div><b>Ket.</b> : '.$hasil['ket'].'</div>'; ?><?php $id_foto=$hasil['id']; $tampil_foto = mysqli_query($kominfo, "select * from foto where id_lokasi='$id_foto' ");  while($hasil_foto = mysqli_fetch_array($tampil_foto)){ ?><img class="img-thumbnail" src="foto/<?php echo $hasil_foto['nama_foto'] ?>"><?php } ?> `
                    )


                <?php } ?>
                </script>


                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline">

                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Grafik Kejadian
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div id="chart_div1" class="chart"></div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline">

                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Presentasi Kejadian
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div id="piechart" class="mapid"></div>
                            </div>

                        </div>

                    </div>
                </div>

                <br />
                <div class="text-center">


                    <img src="logo/sumenep.png" class="logo ">
                    <img src="logo/kominfo.png" class="logo ">
                    <img src="logo/polri.png" class="logo ">
                    <img src="logo/satpolpp.png" class="logo ">
                    <img src="logo/damkar.png" class="logo ">
                    <img src="logo/linmas.png" class="logo ">
                    <img src="logo/puskesmas.png" class="logo ">
                    <img src="logo/rsud.png" class="logo ">
                    <img src="logo/bpbd.png" class="logo ">
                    <img src="logo/basarnas.png" class="logo ">
                    <img src="logo/dlh.png" class="logo ">
                    <img src="logo/dishub.png" class="logo ">
                    <img src="logo/rapi.png" class="logo ">
                    <img src="logo/pln.png" class="logo ">
                    <img src="logo/telkom.jpg" class="logo ">
                    <img src="logo/putr.png" class="logo ">



                </div>

            </div>
        </div>
    </main>
    <?php } ?>
    <?php include 'footer.php';?>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    $(window).resize(function() {
        drawChart();
    });
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php $tampil = mysqli_query($kominfo, "select * from lokasi GROUP BY kejadian "); //ambil data dari tabel lokasi
                    while($hasil = mysqli_fetch_array($tampil)){ $nama_kej=$hasil['kejadian']; $tampil_1 = mysqli_query($kominfo, "select * from lokasi where kejadian='$nama_kej' "); //ambil data dari tabel lokasi
                    $hasil_1 = mysqli_num_rows($tampil_1);?><?php echo "['"; ?><?php echo $nama_kej;?> <?php echo "',";?> <?php echo $hasil_1; ?> <?php echo "],";?> <?php } ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'width': null
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }




    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart1);

    function drawChart1() {
        var data = google.visualization.arrayToDataTable([

            ['tahun',
                <?php $tampil = mysqli_query($kominfo, "select * from lokasi GROUP BY kejadian "); //ambil data dari tabel lokasi
                    while($hasil = mysqli_fetch_array($tampil)){ $nama_kej=$hasil['kejadian']; $tampil_1 = mysqli_query($kominfo, "select * from lokasi where kejadian='$nama_kej' "); //ambil data dari tabel lokasi
                    $hasil_1 = mysqli_num_rows($tampil_1);?><?php echo " ' ";?><?php echo $nama_kej;?> <?php echo " ',";?> <?php } ?>
            ],

            <?php $tampil_tahun = mysqli_query($kominfo, "select * from lokasi GROUP BY tahun ");//ambil data dari tabel lokasi
            while($hasil_tahun = mysqli_fetch_array($tampil_tahun)){ $nama_kej=$hasil['kejadian']; ?>[
                '<?php $tahun=$hasil_tahun['tahun']; echo $tahun; ?>',
                <?php $tampil = mysqli_query($kominfo, "select * from lokasi GROUP BY kejadian ");//ambil data dari tabel lokasi
            while($hasil = mysqli_fetch_array($tampil)){ $nama_kej=$hasil['kejadian']; 
            $tampil_1 = mysqli_query($kominfo, "select * from lokasi where kejadian='$nama_kej' and tahun='$tahun'  "); //ambil data dari tabel lokasi
            $hasil_1 = mysqli_num_rows($tampil_1);?> <?php if($hasil_1){echo $hasil_1;}else{echo "0";} ?> <?php echo ",";?><?php } ?>
            ], <?php } ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'width': null,
            'height': 600
        };


        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
    }
    </script>
    <script>
    $(document).ready(function() {
        $('#data_kej').DataTable({
            "lengthMenu": [
                [10, 20, 30, -1],
                [10, 20, 30, "All"]
            ]
        });
    });
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
    </script>