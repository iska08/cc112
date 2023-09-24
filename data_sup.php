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
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th {
        text-align: center; /* Rata tengah secara horizontal */
        vertical-align: middle; /* Rata tengah secara vertikal */
        background-color: #f2f2f2;
        padding: 10px;
        border: 1px solid #ddd;
    }
</style>
<?php
$hak_akses = $_SESSION['hak_akses'];
$nama = $_SESSION['nama'];
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline">
            <div class="card-header ">
                <center>
                    <h5 class="">
                        Data Support Call Center 112 Kab. Sumenep
                        <?php
                        if($_GET['dari_bulan'] || $_GET['sampai_bulan']) {
                            if(empty($_GET['th'])){
                                ?>
                                <div>Semua Kejadian Kedaruratan</div>
                                <?php
                            }
                            ?>
                            <div> BULAN : 
                                <?php echo kebulan($_GET['dari_bulan']) ?>
                                <?php
                                if($_GET['sampai_bulan']){
                                    echo " - " .kebulan($_GET['sampai_bulan']);
                                }
                                ?>
                                <?php
                                if($_GET['th']){
                                    echo " " .$_GET['th'];
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </h5>
                </center>
            </div>
            <div class="card-body ">
                <div class="row">
                    <!-- class row digunakan sebelum membuat column  -->
                    <div class="col-md-12">
                        <form method="GET">
                            <div class="input-group input-group-sm">
                                <input hidden name="hal" value="data_sup">
                                <select class="form-control" id="bulan" name="dari_bulan">
                                    <?php
                                    if($_GET['dari_bulan']){
                                        ?>
                                        <option value="<?php echo $_GET['dari_bulan']; ?>" selected>
                                            <?php echo kebulan($_GET['dari_bulan']);?>
                                        </option>
                                        <option disabled>== Pilih Dari Bulan ==</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option disabled selected>== Pilih Dari Bulan ==</option>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    $tampil_bulan = mysqli_query($kominfo, "SELECT * FROM tim GROUP BY bulan "); //ambil data dari tabel kecamatan
                                    while($hasil_bulan = mysqli_fetch_array($tampil_bulan)) {
                                        ?>
                                        <option value="<?php echo $hasil_bulan['bulan']; ?>">
                                            <?php echo kebulan($hasil_bulan['bulan']); ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    <option value="">==</option>
                                </select>
                                <select class="form-control" id="bulan" name="sampai_bulan">
                                    <?php
                                    if($_GET['sampai_bulan']){
                                        ?>
                                        <option value="<?php echo $_GET['sampai_bulan']; ?>" selected>
                                            <?php echo kebulan($_GET['sampai_bulan']);?>
                                        </option>
                                        <option disabled>== Pilih Sampai Bulan ==</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option disabled selected>== Pilih Sampai Bulan ==</option>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    $tampil_bulan = mysqli_query($kominfo, "SELECT * FROM tim GROUP BY bulan  "); //ambil data dari tabel kecamatan
                                    while($hasil_bulan = mysqli_fetch_array($tampil_bulan)) {
                                        ?>
                                        <option value="<?php echo $hasil_bulan['bulan']; ?>">
                                            <?php echo kebulan($hasil_bulan['bulan']); ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    <option value="">==</option>
                                </select>
                                <select class="form-control" id="th" name="th">
                                    <?php
                                    if($_GET['th']){
                                        ?>
                                        <option value="<?php echo $_GET['th']; ?>" selected>
                                            <?php echo $_GET['th'];?>
                                        </option>
                                        <option disabled>== Pilih Dari Tahun ==</option>
                                        <?php
                                        ?>
                                        <option disabled selected>== Pilih Tahun ==</option>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    $tampil_tahun = mysqli_query($kominfo, "SELECT * FROM tim GROUP BY tahun "); //ambil data dari tabel kecamatan
                                    while($hasil_tahun = mysqli_fetch_array($tampil_tahun)){
                                        ?>
                                        <option value="<?php echo $hasil_tahun['tahun']; ?>">
                                            <?php echo $hasil_tahun['tahun']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
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
                            <table id="data_sup" class="table table-bordered">
                                <thead class="">
                                    <th width="1%">No.</th>
                                    <th>Kejadian</th>
                                    <th>Kecamatan dan Desa</th>
                                    <th>Data Pelapor</th>
                                    <th>Alamat Kejadian</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Laporan Penyelesaian</th>
                                    <th>Foto</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $hak_akses = $_SESSION['hak_akses'];
                                    if($hak_akses=='Admin'){
                                        $dari_bulan = $_GET['dari_bulan'];
                                        $sampai_bulan = $_GET['sampai_bulan'];
                                        $th = $_GET['th'];
                                        if($_GET['dari_bulan'] && $_GET['th']) {
                                            ?>
                                            <?php
                                            $tampil = mysqli_query($kominfo, "SELECT * FROM tim WHERE bulan='$dari_bulan' AND tahun='$th' ORDER BY id DESC");
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if($_GET['dari_bulan'] && $_GET['th'] && $whereClause) {
                                            ?>
                                            <?php
                                            $tampil = mysqli_query($kominfo, "SELECT * FROM tim WHERE bulan='$dari_bulan' AND tahun='$th' AND $whereClause ORDER BY id DESC");
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if($_GET['dari_bulan'] && $_GET['sampai_bulan'] && $_GET['th']) {
                                            ?>
                                            <?php
                                            $tampil = mysqli_query($kominfo, "SELECT * FROM tim WHERE bulan BETWEEN '$dari_bulan' AND '$sampai_bulan' AND tahun='$th' ORDER BY id DESC ");
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $nomor=1;
                                        while($hasil = mysqli_fetch_assoc($tampil)){
                                            ?>
                                            <?php $jumlah = mysqli_num_rows($tampil); ?>
                                            <tr>
                                                <td><?php echo $nomor++; ?></td>
                                                <?php
                                                $id       = $hasil['id_lokasi'];
                                                $lokasi1  = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE id='$id'");
                                                $lokasi2  = mysqli_fetch_array($lokasi1);
                                                ?>
                                                <td><?php echo $lokasi2['kejadian']; ?></td>
                                                <td>
                                                    <strong>Kecamatan:</strong><br>
                                                    <?php
                                                    $id_kec = $lokasi2['kec'];
                                                    $kec1   = mysqli_query($kominfo, "SELECT * FROM kecamatan WHERE id='$id_kec'");
                                                    $kec2   = mysqli_fetch_array($kec1);
                                                    echo $kec2['nama_kecamatan'];
                                                    ?>
                                                    <br><br>
                                                    <strong>Desa:</strong><br>
                                                    <?php
                                                    $id_desa    = $lokasi2['desa'];
                                                    $desa1      = mysqli_query($kominfo, "SELECT * FROM desa WHERE id='$id_desa'");
                                                    $desa2      = mysqli_fetch_array($desa1);
                                                    echo $desa2['nama_desa'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <strong>Nama Pelapor:</strong><br>
                                                    <?php echo $lokasi2['nama_pelapor']; ?>
                                                    <br><br>
                                                    <strong>No. Telp Pelapor:</strong><br>
                                                    <?php echo $lokasi2['noTelp_pelapor']; ?>
                                                </td>
                                                <td><?php echo $lokasi2['alamat']; ?></td>
                                                <td>
                                                    <strong>Tanggal Terima:</strong><br>
                                                    <?php echo $lokasi2['tanggal_terima']; ?>
                                                    <br><br>
                                                    <strong>Tanggal Selesai:</strong><br>
                                                    <?php echo $lokasi2['tanggal_selesai']; ?>
                                                </td>
                                                <td><?php echo $hasil['ket']; ?></td>
                                                <td><?php echo $hasil['laporan']; ?></td>
                                                <td width="20%">
                                                    <div class="row">
                                                        <?php
                                                        $id_tim = $hasil['id'];
                                                        $lokasi_foto = mysqli_query($kominfo, "SELECT * FROM foto_tim WHERE id_tim='$id_tim'");
                                                        while($foto1 = mysqli_fetch_array($lokasi_foto)){
                                                            ?>
                                                            <div class="col text-center">
                                                                <div>
                                                                    <a href="foto/<?php echo $foto1['nama_foto'] ?>" data-toggle="lightbox">
                                                                        <img class="img-thumbnail" src="foto/<?php echo $foto1['nama_foto'] ?>" alt="image" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }elseif($hak_akses=='Tim'){
                                        $dari_bulan = isset($_GET['dari_bulan']) ? $_GET['dari_bulan'] : '';
                                        $sampai_bulan = isset($_GET['sampai_bulan']) ? $_GET['sampai_bulan'] : '';
                                        $th = isset($_GET['th']) ? $_GET['th'] : '';
                                        $query = 
                                                "SELECT
                                                    t.id,
                                                    t.id_lokasi,
                                                    t.opd_terkait,
                                                    t.ket,
                                                    t.laporan
                                                FROM tim AS t
                                                INNER JOIN opd_terkait AS opd ON t.opd_terkait = opd.id
                                                WHERE
                                                opd.nama_opd = '$nama'
                                                AND t.tahun = '$th'";
                                        if (!empty($dari_bulan) && !empty($sampai_bulan)) {
                                            $query .= " AND t.bulan BETWEEN '$dari_bulan' AND '$sampai_bulan'";
                                        } elseif (!empty($dari_bulan)) {
                                            $query .= " AND t.bulan = '$dari_bulan'";
                                        }
                                        $query .= " ORDER BY t.id DESC";
                                        $tampil = mysqli_query($kominfo, $query);
                                        $jumlah = mysqli_num_rows($tampil);
                                        $nomor = 1;
                                        while ($hasil = mysqli_fetch_assoc($tampil)) {
                                            ?>
                                            <?php $jumlah = mysqli_num_rows($tampil); ?>
                                            <tr>
                                                <td><?php echo $nomor++; ?></td>
                                                <?php
                                                $id       = $hasil['id_lokasi'];
                                                $lokasi1  = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE id='$id'");
                                                $lokasi2  = mysqli_fetch_array($lokasi1);
                                                ?>
                                                <td><?php echo $lokasi2['kejadian']; ?></td>
                                                <td>
                                                    <strong>Kecamatan:</strong><br>
                                                    <?php
                                                    $id_kec = $lokasi2['kec'];
                                                    $kec1 = mysqli_query($kominfo, "SELECT * FROM kecamatan WHERE id='$id_kec'");
                                                    $kec2 = mysqli_fetch_array($kec1);
                                                    echo $kec2['nama_kecamatan'];
                                                    ?>
                                                    <br><br>
                                                    <strong>Desa:</strong><br>
                                                    <?php
                                                    $id_desa    = $lokasi2['desa'];
                                                    $desa1      = mysqli_query($kominfo, "SELECT * FROM desa WHERE id='$id_desa'");
                                                    $desa2      = mysqli_fetch_array($desa1);
                                                    echo $desa2['nama_desa'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <strong>Nama Pelapor:</strong><br>
                                                    <?php echo $lokasi2['nama_pelapor']; ?>
                                                    <br><br>
                                                    <strong>No. Telp Pelapor:</strong><br>
                                                    <?php echo $lokasi2['noTelp_pelapor']; ?>
                                                </td>
                                                <td><?php echo $lokasi2['alamat']; ?></td>
                                                <td>
                                                    <strong>Tanggal Terima:</strong><br>
                                                    <?php echo $lokasi2['tanggal_terima']; ?>
                                                    <br><br>
                                                    <strong>Tanggal Selesai:</strong><br>
                                                    <?php echo $lokasi2['tanggal_selesai']; ?>
                                                </td>
                                                <td><?php echo $hasil['ket']; ?></td>
                                                <td><?php echo $hasil['laporan']; ?></td>
                                                <td width="20%">
                                                    <div class="row">
                                                        <?php
                                                        $id_tim = $hasil['id'];
                                                        $lokasi_foto = mysqli_query($kominfo, "SELECT * FROM foto_tim WHERE id_tim='$id_tim'");
                                                        while($foto1 = mysqli_fetch_array($lokasi_foto)){
                                                            ?>
                                                            <div class="col text-center">
                                                                <div>
                                                                    <a href="foto/<?php echo $foto1['nama_foto'] ?>" data-toggle="lightbox">
                                                                        <img class="img-thumbnail" src="foto/<?php echo $foto1['nama_foto'] ?>" alt="image" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <hr />
                                <tr>
                                    <td colspan="8" align="center"><b>Jumlah Kejadian: <?php echo $jumlah; ?></b></td>
                                    <td colspan="2" align="center">
                                        <a target="blank" href="data_sup_pdf.php?<?php  echo "dari_bulan=" .$_GET['dari_bulan']; echo "&sampai_bulan=" .$_GET['sampai_bulan']; echo "&th=" .$_GET['th'];?>" aria-label="pdf" style="color:red;"><i class="far fa-file-pdf"></i></i></a>
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
            $('#data_sup').DataTable({
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
</div>