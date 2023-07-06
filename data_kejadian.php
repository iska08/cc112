<?php
    if (empty($_SESSION['112_username'])){
        session_start();
        header("Location:/");
    }

    //koneksi
    include 'dbconfig.php';
    include 'fungsi_bulan.php';  
?>

<style>
/* ukuran peta */
#mapid {
    height: 600px;
    width: 100%;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline">
            <div class="card-header ">
                <center>
                    <h5 class="">Data Darurat Call Center 112 Kab. Sumenep
                        <?php if($_GET['dari_bulan'] || $_GET['sampai_bulan']){
                                if(empty($_GET['th'] && $_GET['kej'])){ ?>
                        <div>Semua Kejadian Kedaruratan</div><?php }else{ ?>
                        <div> KEJADIAN : <?php echo $_GET['kej']; ?></div>
                        <?php } ?>
                        <div> BULAN :
                            <?php echo kebulan($_GET['dari_bulan']) ?><?php if($_GET['sampai_bulan']){ echo " - " .kebulan($_GET['sampai_bulan']); } ?><?php if($_GET['th']){ echo " " .$_GET['th']; } ?>
                        </div>
                        <?php } ?>
                    </h5>
                </center>
            </div>
            <div class="card-body ">
                <div class="row">
                    <!-- class row digunakan sebelum membuat column  -->
                    <div class="col-md-12">
                        <form method="GET">
                            <div class="input-group input-group-sm">
                                <input hidden name="hal" value="data_kej">
                                <select class="form-control" id="bulan" name="dari_bulan">
                                    <?php if($_GET['dari_bulan']){ ?>
                                    <option value="<?php echo $_GET['dari_bulan']; ?>" selected>
                                        <?php echo kebulan($_GET['dari_bulan']);?></option>
                                    <option disabled>== Pilih Dari Bulan ==</option>
                                    <?php }else{ ?>
                                    <option disabled selected>== Pilih Dari Bulan ==</option>
                                    <?php } ?>
                                    <?php $tampil_bulan = mysqli_query($kominfo, "select * from lokasi GROUP BY bulan "); //ambil data dari tabel kecamatan
                            while($hasil_bulan = mysqli_fetch_array($tampil_bulan)){ ?>
                                    <option value="<?php echo $hasil_bulan['bulan']; ?>">
                                        <?php echo kebulan($hasil_bulan['bulan']); ?></option>
                                    <?php } ?>
                                    <option value="">==</option>
                                </select>
                                <select class="form-control" id="bulan" name="sampai_bulan">
                                    <?php if($_GET['sampai_bulan']){ ?>
                                    <option value="<?php echo $_GET['sampai_bulan']; ?>" selected>
                                        <?php echo kebulan($_GET['sampai_bulan']);?></option>
                                    <option disabled>== Pilih Sampai Bulan ==</option>
                                    <?php }else{ ?>
                                    <option disabled selected>== Pilih Sampai Bulan ==</option>
                                    <?php } ?>
                                    <?php $tampil_bulan = mysqli_query($kominfo, "select * from lokasi GROUP BY bulan  "); //ambil data dari tabel kecamatan
                            while($hasil_bulan = mysqli_fetch_array($tampil_bulan)){ ?>
                                    <option value="<?php echo $hasil_bulan['bulan']; ?>">
                                        <?php echo kebulan($hasil_bulan['bulan']); ?></option>
                                    <?php } ?>
                                    <option value="">==</option>
                                </select>
                                <select class="form-control" id="th" name="th">
                                    <?php if($_GET['th']){ ?>
                                    <option value="<?php echo $_GET['th']; ?>" selected><?php echo $_GET['th'];?>
                                    </option>
                                    <option disabled>== Pilih Dari Tahun ==</option>
                                    <?php }else{ ?>
                                    <option disabled selected>== Pilih Tahun ==</option>
                                    <?php } ?>
                                    <?php $tampil_tahun = mysqli_query($kominfo, "select * from lokasi GROUP BY  tahun "); //ambil data dari tabel kecamatan
                            while($hasil_tahun = mysqli_fetch_array($tampil_tahun)){ ?>
                                    <option value="<?php echo $hasil_tahun['tahun']; ?>">
                                        <?php echo $hasil_tahun['tahun']; ?></option>
                                    <?php } ?>
                                </select>
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

                <div class="row">
                    <!-- class row digunakan sebelum membuat column  -->
                    <div class="col-md-12">
                        <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->

                        <div class="table-responsive">
                            <table id="data_kej" class="table table-bordered">
                                <thead class="">
                                    <th width="1%">
                                        No.
                                    </th>
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
                                        Tanggal Terima
                                    </th>
                                    <th>
                                        Tanggal Selesai
                                    </th>
                                    <th>
                                        Keterangan
                                    </th>
                                    <th>
                                        Foto
                                    </th>

                                </thead>
                                <tbody>


                                    <?php 

                          $dari_bulan = $_GET['dari_bulan']; $sampai_bulan = $_GET['sampai_bulan'];  $th = $_GET['th']; $kej = $_GET['kej']; 
                          if($_GET['dari_bulan'] && $_GET['th']){ $tampil = mysqli_query($kominfo, "select * from lokasi  where  bulan='$dari_bulan' and tahun='$th'  order by id desc "); }
                          if($_GET['dari_bulan'] && $_GET['th'] && $_GET['kej']){ $tampil = mysqli_query($kominfo, "select * from lokasi  where  bulan='$dari_bulan' and tahun='$th' and kejadian='$kej' order by id desc "); }
                          if($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th']){ $tampil = mysqli_query($kominfo, "select * from lokasi  where bulan between '$dari_bulan' and '$sampai_bulan' and tahun='$th'  order by id desc "); }
                          if($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th'] && $_GET['kej']){ $tampil = mysqli_query($kominfo, "select * from lokasi  where bulan between '$dari_bulan' and '$sampai_bulan' and tahun='$th' and kejadian='$kej' order by id desc "); }

                         

                          $nomor=1;  while($hasil = mysqli_fetch_assoc($tampil)){ 
                          $jumlah = mysqli_num_rows($tampil);
                          ?>

                                    <tr>
                                        <td>
                                            <?php echo $nomor++; ?>
                                        </td>
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
                                            <?php echo $hasil['tanggal_selesai']; ?>
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
                                                    <div><a href="foto/<?php echo $foto1['nama_foto'] ?>" data-toggle="lightbox"><img class="img-thumbnail" src="foto/<?php echo $foto1['nama_foto'] ?>" alt="image" /></a>
                                                    </div>
                                                </div>
                                                <?php }  ?>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php } ?>

                                </tbody>
                                <hr />

                                <tr>
                                    <td colspan="7" align="center"><b>Jumlah Kejadian</b></td>
                                    <td>
                                        <b><?php echo $jumlah; ?></b>
                                    </td>
                                    <td colspan="2" align="center"><a target="blank"
                                            href="data_kejadian_pdf.php?<?php  echo "dari_bulan=" .$_GET['dari_bulan']; echo "&sampai_bulan=" .$_GET['sampai_bulan']; echo "&th=" .$_GET['th']; echo "&kej=" .$_GET['kej'];?>"
                                            aria-label="pdf" style="color:red;"><i class="far fa-file-pdf"></i></i></a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <script type="text/javascript">
    $(document).ready(function() {
        // program dependent ajax
        $("#kecamatan").on("change", function() {
            var kec_id = $(this).val();
            $.ajax({
                url: "wilayah.php",
                type: "POST",
                cache: false,
                data: {
                    kec_id: kec_id
                },
                success: function(data) {
                    $("#desa").html(data);
                    $('#dusun').html('<option value="">== Pilih Dusun ==</option>');
                }
            });
        });

        // kegiatan dependent ajax
        $("#desa").on("change", function() {
            var desa_id = $(this).val();
            $.ajax({
                url: "wilayah.php",
                type: "POST",
                cache: false,
                data: {
                    desa_id: desa_id
                },
                success: function(data) {
                    $("#dusun").html(data);
                }
            });
        });
        // sub kegiatan dependent ajax
        $("#dusun").on("change", function() {
            var dusun_id = $(this).val();
            $.ajax({
                url: "wilayah.php",
                type: "POST",
                cache: false,
                data: {
                    dusun_id: dusun_id
                },
                success: function(data) {
                    $("#").html(data);
                }
            });
        });
    });
    </script>
    <script>
    flatpickr("#tanggal_terima", {
        enableTime: true,
        dateFormat: "F Y ",
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