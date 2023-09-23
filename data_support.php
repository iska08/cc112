<?php
session_start();
if (empty($_SESSION['112_username'])){
  header("Location:login.php");
}
//koneksi
include 'dbconfig.php';
$akses = $_SESSION['hak_akses'];
?>

<style>
  /* ukuran peta */
  #mapid {
    height: 600px;width:100%;
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

<script src="js/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
<div class="card card-info card-outline">
  <div class="card-header">
    <h5 class="card-title">Data Support Kejadian</h5>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php
        if($akses == 'Admin'){
          ?>
          <div>
            <button class="btn btn-info btn-sm" id="add_support">Input Tim</button>
          </div>
          <br/>
          <div class="table-responsive">
            <table id="tower" class="table table-bordered">
              <thead>
                <th>No.</th>
                <th>Kejadian</th>
                <th>Kecamatan dan Desa</th>
                <th>Data Pelapor</th>
                <th>Alamat Kejadian</th>
                <th>Tanggal</th>
                <th>OPD Terkait</th>
                <th>Detail Tim</th>
                <th>Keterangan</th>
                <th>Bantuan</th>
                <th>Foto</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php
                $nomor = 1;
                $tim = mysqli_query($kominfo, "SELECT * FROM tim ORDER BY id DESC");
                while($hasil = mysqli_fetch_array($tim)){
                ?>
                  <tr>
                    <td><?php echo $nomor++; ?></td>
                    <?php
                    $id       = $hasil['id_lokasi'];
                    $lokasi1  = mysqli_query($kominfo, "select * from lokasi where id='$id'");
                    $lokasi2  = mysqli_fetch_array($lokasi1);
                    ?>
                    <td><?php echo $lokasi2['kejadian']; ?></td>
                    <td>
                      <strong>Kecamatan:</strong><br>
                      <?php
                      $id_kec = $lokasi2['kec'];
                      $kec1   = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
                      $kec2   = mysqli_fetch_array($kec1);
                      echo $kec2['nama_kecamatan'];
                      ?>
                      <br><br>
                      <strong>Desa:</strong><br>
                      <?php
                      $id_desa  = $lokasi2['desa'];
                      $desa1    = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
                      $desa2    = mysqli_fetch_array($desa1);
                      echo $desa2['nama_desa'];
                      ?>
                    </td>
                    <td>
                      <strong>Nama Pelapor:</strong><br><?php echo $lokasi2['nama_pelapor']; ?><br><br>
                      <strong>No. Telp Pelapor:</strong><br><?php echo $lokasi2['noTelp_pelapor']; ?>
                    </td>
                    <td><?php echo $lokasi2['alamat']; ?></td>
                    <td>
                      <strong>Tanggal Terima:</strong><br>
                      <?php echo $lokasi2['tanggal_terima']; ?>
                      <br><br>
                      <strong>Tanggal Selesai:</strong><br>
                      <?php echo $lokasi2['tanggal_selesai']; ?>
                    </td>
                    <td>
                      <?php
                      $id_opd = $hasil['opd_terkait'];
                      $opd1   = mysqli_query($kominfo, "select * from opd_terkait where id='$id_opd'");
                      $opd2   = mysqli_fetch_array($opd1);
                      echo $opd2['nama_opd'];
                      ?>
                    </td>
                    <td>
                      <strong>Jumlah Anggota:</strong><br>
                      <?php echo $hasil['jumlah_tim']; ?>
                      <br><br>
                      <strong>Nama-nama Anggota:</strong><br>
                      <?php echo $hasil['nama_anggota']; ?>
                    </td>
                    <td><?php echo $hasil['ket']; ?></td>
                    <td>
                      <?php
                      if ($hasil['bantuan'] == "0") {
                        echo '<a class="btn btn-info btn-sm" href="bantuan.php?id=' . $hasil['id'] . '&action=bantuan">Kirim Bantuan</a>';
                      } elseif ($hasil['bantuan'] == "1") {
                        echo '<a class="btn btn-success btn-sm">Clear</a>';
                      }
                      ?>
                    </td>
                    <td width="20%">
                      <div class="row">
                        <?php
                        $id_tim       = $hasil['id'];
                        $lokasi_foto  = mysqli_query($kominfo, "select * from foto_tim where id_tim='$id_tim'");
                        while($foto1  = mysqli_fetch_array($lokasi_foto)){
                        ?>
                          <div class="col text-center">
                            <div>
                              <a href="foto/<?php echo $foto1['nama_foto'] ?>" data-toggle="lightbox">
                                <img class="img-thumbnail" src="foto/<?php echo $foto1['nama_foto'] ?>" />
                              </a>
                              <a style="position:absolute;top:10px;right:20px;" class="btn btn-danger btn-sm " id="hapus_foto_support" value="<?php echo $foto1['id']; ?>">Hapus</a>
                              <a style="position:absolute;top:10px;left:20px;" class="btn btn-danger btn-sm " data-target="#crop-modal_<?php echo $foto1['id']; ?>" data-toggle="modal">Edit</a>
                            </div>
                            <!-- Crop Modal -->
                            <div id="crop-modal_<?php echo $foto1['id']; ?>" class="modal fade" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <span class="close" data-dismiss="modal">X</span>
                                  </div>
                                  <h4 class="modal-title">Edit Foto</h4>
                                  <div align="center"class="modal-body">
                                    <img id="gambar" src="foto/<?php echo $foto1['nama_foto'] ?>" class="cropbox" alt="Foto">
                                    <form action="save.php?file=<?php echo $foto1['nama_foto'] ?>" method="post" onsubmit="return checkCoords();">
                                      <input type="hidden" id="x" name="x" />
                                      <input type="hidden" id="y" name="y" />
                                      <input type="hidden" id="w" name="w" />
                                      <input type="hidden" id="h" name="h" />
                                      <br>
                                      <input type="submit" value="Save Image" class="btn btn-info btn-sm">
                                      <br><br>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of #crop-modal -->
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                      <br/>
                      <!-- <form method="post" id="upload_foto"> -->
                      <form method="post" enctype="multipart/form-data" id="upload_foto_support" action="upload_support.php">
                        <input type="file" name="foto" data-icon="false" required>
                        <input hidden type="text" name="id" value="<?php echo $hasil['id']; ?>">
                        <input hidden type="text" name="kej" value="<?php echo $hasil['kejadian']; ?>">
                        <br/>
                        <br/>
                        <button type="submit" class="btn btn-info btn-sm" id="inputGroupFileAddon04">Upload</button>
                      </form>
                    </td>
                    <td width="5%">
                      <div class="btn-group">
                        <a class="btn btn-info btn-sm" id="edit_support" value="<?php echo $hasil['id']; ?>">Edit</a>
                        <a class="btn btn-danger btn-sm " id="hapus_support" value="<?php echo $hasil['id']; ?>">Hapus</a>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <?php
        }elseif($akses == 'Tim'){
          ?>
          <div class="table-responsive">
            <?php
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            if (strpos($userAgent, 'Mobile') !== false || strpos($userAgent, 'Android') !== false || strpos($userAgent, 'iPhone') !== false || strpos($userAgent, 'iPad') !== false) {
              ?>
              <table id="tower" class="table table-bordered">
                <thead>
                  <th>No.</th>
                  <th>Detail Kejadian</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                  $nomor = 1;
                  $nama = $_SESSION['nama'];
                  $tampil = mysqli_query($kominfo,
                            "SELECT t.id, t.id_lokasi, t.opd_terkait, t.jumlah_tim, t.nama_anggota, t.ket, t.laporan, t.bulan, t.tahun
                            FROM tim AS t
                            INNER JOIN opd_terkait AS o ON t.opd_terkait = o.id
                            WHERE o.nama_opd = '$nama'
                            ORDER BY id DESC");
                  while($hasil = mysqli_fetch_array($tampil)){
                  ?>
                    <tr>
                      <td><?php echo $nomor++; ?></td>
                      <?php
                      $id       = $hasil['id_lokasi'];
                      $lokasi1  = mysqli_query($kominfo, "select * from lokasi where id='$id'");
                      $lokasi2  = mysqli_fetch_array($lokasi1);
                      ?>
                      <td>
                        <strong>Kejadian:</strong><br>
                        <?php echo $lokasi2['kejadian']; ?>
                        <br><br>
                        <strong>Kecamatan:</strong><br>
                        <?php
                        $id_kec = $lokasi2['kec'];
                        $kec1   = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
                        $kec2   = mysqli_fetch_array($kec1);
                        echo $kec2['nama_kecamatan'];
                        ?>
                        <br><br>
                        <strong>Desa:</strong><br>
                        <?php
                        $id_desa  = $lokasi2['desa'];
                        $desa1    = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
                        $desa2    = mysqli_fetch_array($desa1);
                        echo $desa2['nama_desa'];
                        ?>
                        <br><br>
                        <strong>Nama Pelapor:</strong><br>
                        <?php echo $lokasi2['nama_pelapor']; ?>
                        <br><br>
                        <strong>No. Telp Pelapor:</strong><br>
                        <?php echo $lokasi2['noTelp_pelapor']; ?>
                        <br><br>
                        <strong>Alamat Kejadian:</strong><br>
                        <?php echo $lokasi2['alamat']; ?>
                        <br><br>
                        <strong>Tanggal Terima:</strong><br>
                        <?php echo $lokasi2['tanggal_terima']; ?>
                        <br><br>
                        <strong>Tanggal Selesai:</strong><br>
                        <?php echo $lokasi2['tanggal_selesai']; ?>
                        <br><br>
                        <strong>Keterangan:</strong><br>
                        <?php echo $hasil['ket']; ?>
                        <br><br>
                        <strong>Jumlah Tim:</strong><br>
                        <?php echo $hasil['jumlah_tim']; ?>
                        <br><br>
                        <?php
                        $lap = $hasil['laporan'];
                        if(empty($lap)){
                          ?>
                          <strong>Laporan Penyelesaian:</strong><br>
                          Belum Diisi<br><br>
                          <?php
                        }else{
                          ?>
                          <strong>Laporan Penyelesaian:</strong><br>
                          <?php echo $hasil['laporan']; ?><br><br>
                          <strong>Anggota yang Terlibat:</strong><br>
                          <?php
                          $tim = explode(',', $hasil['nama_anggota']);
                          foreach ($tim as $anggota) {
                            echo '- ' . $anggota . '<br>';
                          }
                          ?>
                          <br><br>
                          <a class="btn btn-success btn-sm " target="blank" href="laporan_support.php?<?php echo "id=" .$hasil['id'];?>" aria-label="pdf" style="color:white;">Unduh Laporan<br><i class="far fa-file-pdf"></i></a>
                          <?php
                        }
                        ?>
                        <br><br>
                        <strong>Foto Kejadian:</strong><br>
                        <div class="row">
                          <?php
                          $id_tim = $hasil['id'];
                          $lokasi_foto = mysqli_query($kominfo, "select * from foto where id_tim='$id_tim'");
                          while($foto1 = mysqli_fetch_array($lokasi_foto)){
                          ?>
                            <div class="col text-center">
                              <div>
                                <a href="foto/<?php echo $foto1['nama_foto'] ?>" data-toggle="lightbox">
                                  <img class="img-thumbnail" src="foto/<?php echo $foto1['nama_foto'] ?>" />
                                </a>
                                <a style="position:absolute;top:10px;right:20px;" class="btn btn-danger btn-sm " id="hapus_foto" value="<?php echo $foto1['id']; ?>">Hapus</a><a style="position:absolute;top:10px;left:20px;" class="btn btn-danger btn-sm " data-target="#crop-modal_<?php echo $foto1['id']; ?>" data-toggle="modal">Edit</a>
                              </div>
                              <!-- Crop Modal -->
                              <div id="crop-modal_<?php echo $foto1['id']; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <span class="close" data-dismiss="modal">X</span>
                                    </div>
                                    <h4 class="modal-title">Edit Foto</h4>
                                    <div align="center"class="modal-body">
                                      <img src="foto/<?php echo $foto1['nama_foto'] ?>" class="cropbox">
                                      <form action="save.php?file=<?php echo $foto1['nama_foto'] ?>" method="post" onsubmit="return checkCoords();">
                                        <input type="hidden" id="x" name="x" />
                                        <input type="hidden" id="y" name="y" />
                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <br>
                                        <input type="submit" value="Save Image" class="btn btn-info btn-sm">
                                        <br><br>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div><!-- end of #crop-modal -->
                            </div>
                          <?php
                          }
                          ?>
                        </div>
                        <br>
                        <!-- <form method="post" id="upload_foto"> -->
                        <form method="post" enctype="multipart/form-data" id="upload_foto" action="upload.php">
                          <input type="file" name="foto" data-icon="false" required>
                          <input hidden type="text" name="id" value="<?php echo $hasil['id']; ?>">
                          <input hidden type="text" name="kej" value="<?php echo $hasil['kejadian']; ?>">
                          <br/>
                          <br/>
                          <button type="submit" class="btn btn-info btn-sm" id="inputGroupFileAddon04">Upload</button>
                        </form>
                      </td>
                      <td width="5%">
                        <div class="btn-group">
                          <?php
                          $lap = $hasil['laporan'];
                          if(empty($lap)){
                            ?>
                            <a class="btn btn-info btn-sm" id="edit_support" value="<?php echo $hasil['id']; ?>">Input Laporan Penyelesaian</a>
                            <?php
                          }else{
                            ?>
                            <a class="btn btn-warning btn-sm" id="edit_support" value="<?php echo $hasil['id']; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" id="hapus_support" value="<?php echo $hasil['id']; ?>">Hapus</a>
                            <?php
                          }
                          ?>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <?php
            }else{
              ?>
              <table id="tower" class="table table-bordered">
                <thead>
                  <th>No.</th>
                  <th>Kejadian</th>
                  <th>Tanggal Terima</th>
                  <th>Tanggal Selesai</th>
                  <th>Jumlah Tim</th>
                  <th>Laporan</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                  $nomor = 1;
                  $nama = $_SESSION['nama'];
                  $tampil = mysqli_query($kominfo,
                            "SELECT t.id, t.id_lokasi, t.opd_terkait, t.jumlah_tim, t.nama_anggota, t.ket, t.laporan, t.bulan, t.tahun
                            FROM tim AS t
                            INNER JOIN opd_terkait AS o ON t.opd_terkait = o.id
                            WHERE o.nama_opd = '$nama'
                            ORDER BY id DESC");
                  while($hasil = mysqli_fetch_array($tampil)){
                  ?>
                    <tr>
                      <td><?php echo $nomor++; ?></td>
                      <?php
                      $id       = $hasil['id_lokasi'];
                      $lokasi1  = mysqli_query($kominfo, "select * from lokasi where id='$id'");
                      $lokasi2  = mysqli_fetch_array($lokasi1);
                      ?>
                      <td>
                        <strong>Kejadian:</strong><br>
                        <?php echo $lokasi2['kejadian']; ?>
                        <br>
                        <br>
                        <strong>Kecamatan:</strong><br>
                        <?php
                        $id_kec = $lokasi2['kec'];
                        $kec1   = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
                        $kec2   = mysqli_fetch_array($kec1);
                        echo $kec2['nama_kecamatan'];
                        ?>
                        <br>
                        <br>
                        <strong>Desa:</strong><br>
                        <?php
                        $id_desa  = $lokasi2['desa'];
                        $desa1    = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
                        $desa2    = mysqli_fetch_array($desa1);
                        echo $desa2['nama_desa']; ?>
                        <br>
                        <br>
                        <strong>Nama Pelapor:</strong><br>
                        <?php echo $lokasi2['nama_pelapor']; ?>
                        <br>
                        <br>
                        <strong>No. Telp Pelapor:</strong><br>
                        <?php echo $lokasi2['noTelp_pelapor']; ?>
                        <br>
                        <br>
                        <strong>Alamat Kejadian:</strong><br>
                        <?php echo $lokasi2['alamat']; ?>
                        <br>
                        <br>
                        <strong>Keterangan:</strong><br>
                        <?php echo $hasil['ket']; ?>
                      </td>
                      <td><?php echo $lokasi2['tanggal_terima']; ?></td>
                      <td><?php echo $lokasi2['tanggal_selesai']; ?></td>
                      <td><?php echo $hasil['jumlah_tim']; ?></td>
                      <?php
                      $lap = $hasil['laporan'];
                      if(empty($lap)){
                        ?>
                        <td>Belum ada Laporan</td>
                        <?php
                      }else{
                        ?>
                        <td>
                          <strong>Laporan Penyelesaian:</strong><br>
                          <?php echo $hasil['laporan']; ?><br><br>
                          <strong>Anggota yang Terlibat:</strong><br>
                          <?php
                          $tim = explode(',', $hasil['nama_anggota']);
                          foreach ($tim as $anggota) {
                            echo '- ' . $anggota . '<br>';
                          }
                          ?>
                          <br><br>
                          <a class="btn btn-success btn-sm " target="blank" href="laporan_support.php?<?php echo "id=" .$hasil['id'];?>" aria-label="pdf" style="color:white;">Unduh Laporan<br><i class="far fa-file-pdf"></i></a>
                        </td>
                        <?php
                      }
                      ?>
                      <td width="20%">
                        <div class="row">
                          <?php
                          $id_tim = $hasil['id'];
                          $lokasi_foto = mysqli_query($kominfo, "select * from foto_tim where id_tim='$id_tim'");
                          while($foto1 = mysqli_fetch_array($lokasi_foto)){
                          ?>
                            <div class="col text-center">
                              <div>
                                <a href="foto/<?php echo $foto1['nama_foto'] ?>" data-toggle="lightbox">
                                  <img class="img-thumbnail" src="foto/<?php echo $foto1['nama_foto'] ?>" />
                                </a>
                                <a style="position:absolute;top:10px;right:20px;" class="btn btn-danger btn-sm " id="hapus_foto" value="<?php echo $foto1['id']; ?>">Hapus</a><a style="position:absolute;top:10px;left:20px;" class="btn btn-danger btn-sm " data-target="#crop-modal_<?php echo $foto1['id']; ?>" data-toggle="modal">Edit</a>
                              </div>
                              <!-- Crop Modal -->
                              <div id="crop-modal_<?php echo $foto1['id']; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <span class="close" data-dismiss="modal">X</span>
                                    </div>
                                    <h4 class="modal-title">Edit Foto</h4>
                                    <div align="center"class="modal-body">
                                      <img src="foto/<?php echo $foto1['nama_foto'] ?>" class="cropbox">
                                      <form action="save.php?file=<?php echo $foto1['nama_foto'] ?>" method="post" onsubmit="return checkCoords();">
                                        <input type="hidden" id="x" name="x" />
                                        <input type="hidden" id="y" name="y" />
                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <br>
                                        <input type="submit" value="Save Image" class="btn btn-info btn-sm">
                                        <br><br>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div><!-- end of #crop-modal -->
                            </div>
                          <?php
                          }
                          ?>
                        </div>
                        <br/>
                        <!-- <form method="post" id="upload_foto"> -->
                        <form method="post" enctype="multipart/form-data" id="upload_foto" action="upload.php">
                          <input type="file" name="foto" data-icon="false" required>
                          <input hidden type="text" name="id" value="<?php echo $hasil['id']; ?>">
                          <input hidden type="text" name="kej" value="<?php echo $hasil['kejadian']; ?>">
                          <br/>
                          <br/>
                          <button type="submit" class="btn btn-info btn-sm" id="inputGroupFileAddon04">Upload</button>
                        </form>
                      </td>
                      <td width="5%">
                        <div class="btn-group">
                          <?php
                          $lap = $hasil['laporan'];
                          if(empty($lap)){
                            ?>
                            <a class="btn btn-info btn-sm" id="edit_support" value="<?php echo $hasil['id']; ?>">Input Laporan Penyelesaian</a>
                            <?php
                          }else{
                            ?>
                            <a class="btn btn-warning btn-sm" id="edit_support" value="<?php echo $hasil['id']; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" id="hapus_support" value="<?php echo $hasil['id']; ?>">Hapus</a>
                            <?php
                          }
                          ?>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <?php
            }
            ?>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#tower').DataTable({
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
  $(function(){
    $('.cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });
  });
  function updateCoords(c){
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };
  function checkCoords(){
    if (parseInt($('#w').val())) return true;
    Swal.fire('Silahkan Crop Foto sebelum simpan','', 'warning')
    return false;
  };
</script>