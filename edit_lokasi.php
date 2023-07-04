<?php
    session_start();
    if (empty($_SESSION['112_username'])){header("Location:login.php");}
    //koneksi
    include 'dbconfig.php';

?>
 
    <style>
        /* ukuran peta */
        #mapid {
            height: 600px;width:100%;
        }
        .jumbotron{
            
        }
        
    </style>
<?php 
if(isset($_GET['id_lokasi'])){
$id_lokasi=$_GET['id_lokasi'];
?>
<div class="card card-primary card-outline"> 
<div class="card-header "><h5 class="card-title">Edit Lokasi Kejadian</h5></div>
<div class="card-body ">
<div class="row"> <!-- class row digunakan sebelum membuat column  -->
        
        <div class="col-md-4"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <form  id="form_edit_lokasi" method="post">

                     <?php $tampil_lokasi = mysqli_query($kominfo, "select * from lokasi where id='$id_lokasi' "); //ambil data dari tabel lokasi
                      $hasil_lokasi = mysqli_fetch_array($tampil_lokasi) ?>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Latitude, Longitude</label>
                        <input type="text" class="form-control" id="latlong" name="latlong" value="<?php echo $hasil_lokasi['lat_long']; ?>">
                        <input hidden type="text" name="id" value="<?php echo $hasil_lokasi['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kejadian</label>                       
                        <select class="form-control" name="kejadian">
                            <option value="<?php echo $hasil_lokasi['kejadian']; ?>"><?php echo $hasil_lokasi['kejadian']; ?></option>
                            <option disabled >== Pilih Kejadian ==</option>
                            <?php $tampil_per = mysqli_query($kominfo, "select * from kejadian"); //ambil data dari tabel kecamatan
                            while($hasil_per = mysqli_fetch_array($tampil_per)){ ?> 
                            <option value="<?php echo $hasil_per['nama_kejadian']; ?>"><?php echo $hasil_per['nama_kejadian']; ?></option>
                             <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kecamatan</label>
                        <select class="form-control" id="kecamatan" name="kec">
                            <?php $id_kec=$hasil_lokasi['kec']; 
                            $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'"); 
                            $kec2 = mysqli_fetch_array($kec1)?>
                            <option value="<?php echo $kec2['id']; ?>"><?php echo $kec2['nama_kecamatan']; ?></option>
                            <option disabled >== Pilih Kecamatan ==</option>
                            <?php $tampil_kec = mysqli_query($kominfo, "select * from kecamatan"); //ambil data dari tabel kecamatan
                            while($hasil_kec = mysqli_fetch_array($tampil_kec)){ ?> 
                            <option value="<?php echo $hasil_kec['id']; ?>"><?php echo $hasil_kec['nama_kecamatan']; ?></option>
                             <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Desa</label>
                        <select class="form-control" id="desa" name="desa">
                            <?php $id_desa=$hasil_lokasi['desa']; 
                            $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'"); 
                            $desa2 = mysqli_fetch_array($desa1)?>
                            <option value="<?php echo $desa2['id']; ?>"><?php echo $desa2['nama_desa']; ?></option>
                            <option disabled >== Pilih Desa ==</option>
                            
                        </select>
                    </div> 
                    <div class="form-group">
                         <label for="exampleFormControlInput1">Tanggal Terima</label>
                         <input type="text" class="form-control" id="tanggal_terima" name="tanggal_terima" value="<?php echo $hasil_lokasi['tanggal_terima']; ?>">
                    </div>
                    <div class="form-group">
                         <label for="exampleFormControlInput1">Tanggal Selesai</label>
                         <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo $hasil_lokasi['tanggal_selesai']; ?>">
                    </div>
                     <div class="form-group">
                        <label for="exampleFormControlInput1">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $hasil_lokasi['alamat']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <textarea class="form-control" name="ket" cols="30" rows="5"><?php echo $hasil_lokasi['ket']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="edit_lokasi" class="btn btn-info btn-sm">Edit</button> <a class="btn btn-warning btn-sm" id="batal_lokasi">Batal</a>
                    </div>
                </form>
        </div>
        <br/>        
        <div class="col-md-8"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
            <!-- peta akan ditampilkan dengan id = mapid -->
            <div id="mapid"></div>
            <br/> 
        </div>

</div>
</div>
</div>

    <script>
        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token  
        var mbAttr = 'Map data &copy; Designer : Bidang TI Kominfo Sumenep';
        var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

    
        var jalan = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
    
        var googlemap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'],attribution: mbAttr });
         <?php
        
        $tampil = mysqli_query($kominfo, "select * from lokasi where id='$id_lokasi' "); //ambil data dari tabel lokasi
        while($hasil = mysqli_fetch_array($tampil)){ ?>

        var mymap = L.map('mapid', {
        center: [<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>],
        zoom: 17,
        layers: [googlemap],
        fullscreenControl: {pseudoFullscreen: false}
        });

        <?php } ?>

        var basemaps = {
        'Google Map': googlemap,
        'Jalan Map': jalan,
        };

         var overlays = {
        
         };

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

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("koordinatnya adalah " + e.latlng
                    .toString()
                    ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                .openOn(mymap);

            document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
        }
        mymap.on('click', onMapClick); //jalankan fungsi

        

        <?php
        
        $tampil = mysqli_query($kominfo, "select * from lokasi where id='$id_lokasi' "); //ambil data dari tabel lokasi
        while($hasil = mysqli_fetch_array($tampil)){   
        $id_kec = $hasil['kec'];
        $hasil_kec = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec' "); //ambil data dari tabel lokasi
        $kec = mysqli_fetch_array($hasil_kec); 
        $id_desa = $hasil['desa'];
        $hasil_desa = mysqli_query($kominfo, "select * from desa where id='$id_desa' "); //ambil data dari tabel lokasi
        $desa = mysqli_fetch_array($hasil_desa); ?>  

        //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
        //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>],{icon: greenIcon}).addTo(mymap)

                //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
                .bindPopup(`<?php echo '<div><b>Kejadian</b> : '.$hasil['kejadian'].'</div><div><b>Kecamatan</b> : '.$kec['nama_kecamatan'].'</div><div><b>Desa</b> : '.$desa['nama_desa'].'</div><div><b>Ket.</b> : '.$hasil['ket'].'</div>'; ?>`)

        <?php } ?>

    </script>
<?php } ?>
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