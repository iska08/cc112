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
    <h5 class="card-title">Data Lokasi Kejadian</h5>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php
        if($akses=='Admin'){
          ?>
          <div>
            <button class="btn btn-info btn-sm" id="add_lokasi">Input Lokasi</button>
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
                <th>Keterangan</th>
                <th>Jumlah Tim</th>
                <th>Laporan</th>
                <th>Approve</th>
                <th>Foto</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php
                $nomor = 1;
                $kejadian = $_SESSION['kejadian'];
                $data = explode(",", $kejadian);
                // print_r($data);
                // Membuat bagian WHERE untuk mengambil data berdasarkan nilai dalam array
                $whereClause = "";
                foreach ($data as $value) {
                  $value = mysqli_real_escape_string($kominfo, $value); // Hindari SQL injection
                  if ($whereClause !== "") {
                      $whereClause .= " OR ";
                  }
                  $whereClause .= "kejadian = '$value'";
                }
                $hak_akses = $_SESSION['hak_akses'];
                if($hak_akses=='Admin'){
                  $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi ORDER BY id DESC");
                }elseif($hak_akses=='Tim'){
                  $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE $whereClause ORDER BY id DESC");
                }
                // $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE $whereClause ORDER BY id DESC");
                while($hasil = mysqli_fetch_array($tampil)){
                ?>
                  <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $hasil['kejadian']; ?></td>
                    <td>
                      <strong>Kecamatan:</strong><br>
                      <?php
                      $id_kec=$hasil['kec'];
                      $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
                      $kec2 = mysqli_fetch_array($kec1);
                      echo $kec2['nama_kecamatan'];
                      ?>
                      <br><br>
                      <strong>Desa:</strong><br>
                      <?php
                      $id_desa=$hasil['desa'];
                      $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
                      $desa2 = mysqli_fetch_array($desa1);
                      echo $desa2['nama_desa']; ?>
                    </td>
                    <td>
                      <strong>Nama Pelapor:</strong><br><?php echo $hasil['nama_pelapor']; ?><br><br>
                      <strong>No. Telp Pelapor:</strong><br><?php echo $hasil['noTelp_pelapor']; ?>
                    </td>
                    <td><?php echo $hasil['alamat']; ?></td>
                    <td>
                      <strong>Tanggal Terima:</strong><br>
                      <?php echo $hasil['tanggal_terima']; ?>
                      <br><br>
                      <strong>Tanggal Selesai:</strong><br>
                      <?php echo $hasil['tanggal_selesai']; ?>
                    </td>
                    <td><?php echo $hasil['ket']; ?></td>
                    <td><?php echo $hasil['jumlah_tim']; ?></td>
                    <?php
                    $tglSelesai = $hasil['tanggal_selesai'];
                    $lap        = $hasil['laporan'];
                    if(empty($tglSelesai) && empty($lap)){
                      ?>
                      <td>
                        <button class="btn btn-info btn-sm" id="add_tim">Input Tim</button>
                      </td>
                      <?php
                    }else{
                      ?>
                      <td>
                        <strong>Laporan Penyelesaian:</strong><br>
                        <?php echo $hasil['laporan']; ?><br><br>
                        <strong>Anggota yang Terlibat:</strong><br>
                        <?php echo $hasil['tim']; ?><br><br>
                        <a class="btn btn-success btn-sm " target="blank" href="laporan.php?id=<?php echo $hasil['id']; ?>" aria-label="pdf" style="color:white;">Unduh Laporan<br><i class="far fa-file-pdf"></i></a>
                        <br><br>
                        <button class="btn btn-info btn-sm" id="add_tim">Input Tim</button>
                      </td>
                      <?php
                    }
                    ?>
                    <td>
                      <?php
                      if ($hasil['approve'] == "0") {
                        echo '<a class="btn btn-info btn-sm" href="approve_process.php?id=' . $hasil['id'] . '&action=approve">Approve</a>';
                        echo '<a class="btn btn-warning btn-sm" href="approve_process.php?id=' . $hasil['id'] . '&action=reject">Reject</a>';
                      } elseif ($hasil['approve'] == "1") {
                        echo '<a class="btn btn-success btn-sm">Approved</a>';
                      } elseif ($hasil['approve'] == "2") {
                        echo '<a class="btn btn-danger btn-sm">Rejected</a>';
                      }
                      ?>
                    </td>
                    <td width="20%">
                      <div class="row">
                        <?php
                        $id_lokasi=$hasil['id'];
                        $lokasi_foto = mysqli_query($kominfo, "select * from foto where id_lokasi='$id_lokasi'");
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
                        <a class="btn btn-info btn-sm" id="edit_lokasi" value="<?php echo $hasil['id']; ?>">Edit</a>
                        <a class="btn btn-danger btn-sm " id="hapus_lokasi" value="<?php echo $hasil['id']; ?>">Hapus</a>
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
        }elseif($akses=='Tim'){
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
                  $kejadian = $_SESSION['kejadian'];
                  $data = explode(",", $kejadian);
                  $whereClause = "";
                  foreach ($data as $value) {
                      $value = mysqli_real_escape_string($kominfo, $value);
                      if ($whereClause !== "") {
                          $whereClause .= " OR ";
                      }
                      $whereClause .= "kejadian = '$value' and approve = '1'";
                  }
                  $hak_akses = $_SESSION['hak_akses'];
                  if($hak_akses=='Admin'){
                    $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi ORDER BY id DESC");
                  }elseif($hak_akses=='Tim'){
                    $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE $whereClause ORDER BY id DESC");
                  }
                  while($hasil = mysqli_fetch_array($tampil)){
                  ?>
                    <tr>
                      <td><?php echo $nomor++; ?></td>
                      <td>
                        <strong>Kejadian:</strong><br>
                        <?php echo $hasil['kejadian']; ?>
                        <br><br>
                        <strong>Kecamatan:</strong><br>
                        <?php
                        $id_kec=$hasil['kec'];
                        $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
                        $kec2 = mysqli_fetch_array($kec1);
                        echo $kec2['nama_kecamatan'];
                        ?>
                        <br><br>
                        <strong>Desa:</strong><br>
                        <?php
                        $id_desa=$hasil['desa'];
                        $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
                        $desa2 = mysqli_fetch_array($desa1);
                        echo $desa2['nama_desa'];
                        ?>
                        <br><br>
                        <strong>Nama Pelapor:</strong><br>
                        <?php echo $hasil['nama_pelapor']; ?>
                        <br><br>
                        <strong>No. Telp Pelapor:</strong><br>
                        <?php echo $hasil['noTelp_pelapor']; ?>
                        <br><br>
                        <strong>Alamat Kejadian:</strong><br>
                        <?php echo $hasil['alamat']; ?>
                        <br><br>
                        <strong>Keterangan:</strong><br>
                        <?php echo $hasil['ket']; ?>
                        <br><br>
                        <strong>Tanggal Terima:</strong><br>
                        <?php echo $hasil['tanggal_terima']; ?>
                        <br><br>
                        <strong>Tanggal Selesai:</strong><br>
                        <?php echo $hasil['tanggal_selesai']; ?>
                        <br><br>
                        <strong>Jumlah Tim:</strong><br>
                        <?php echo $hasil['jumlah_tim']; ?>
                        <br><br>
                        <?php
                        $tglSelesai = $hasil['tanggal_selesai'];
                        $lap        = $hasil['laporan'];
                        if(empty($tglSelesai) && empty($lap)){
                          ?>
                          <strong>Laporan Penyelesaian:</strong><br>
                          Belum Diisi<br><br>
                          <strong>Anggota yang Terlibat:</strong><br>
                          Belum Diisi<br><br>
                          <?php
                        }else{
                          ?>
                          <strong>Laporan Penyelesaian:</strong><br>
                          <?php echo $hasil['laporan']; ?><br><br>
                          <strong>Anggota yang Terlibat:</strong><br>
                          <?php echo $hasil['tim']; ?><br><br>
                          <a class="btn btn-success btn-sm " target="blank" href="laporan.php?<?php echo "id=" .$hasil['id'];?>" aria-label="pdf" style="color:white;">Unduh Laporan<br><i class="far fa-file-pdf"></i></a>
                          <?php
                        }
                        ?>
                        <br><br>
                        <strong>Foto Kejadian:</strong><br>
                        <div class="row">
                          <?php
                          $id_lokasi=$hasil['id'];
                          $lokasi_foto = mysqli_query($kominfo, "select * from foto where id_lokasi='$id_lokasi'");
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
                          $tglSelesai = $hasil['tanggal_selesai'];
                          $lap        = $hasil['laporan'];
                          if(empty($tglSelesai) && empty($lap)){
                            ?>
                            <a class="btn btn-info btn-sm" id="edit_lokasi" value="<?php echo $hasil['id']; ?>">Input Laporan Penyelesaian</a>
                            <?php
                          }else{
                            ?>
                            <a class="btn btn-warning btn-sm" id="edit_lokasi" value="<?php echo $hasil['id']; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" id="hapus_lokasi" value="<?php echo $hasil['id']; ?>">Hapus</a>
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
                  $kejadian = $_SESSION['kejadian'];
                  $data = explode(",", $kejadian);
                  // print_r($data);
                  // Membuat bagian WHERE untuk mengambil data berdasarkan nilai dalam array
                  $whereClause = "";
                  foreach ($data as $value) {
                      $value = mysqli_real_escape_string($kominfo, $value); // Hindari SQL injection
                      if ($whereClause !== "") {
                          $whereClause .= " OR ";
                      }
                      $whereClause .= "kejadian = '$value' and approve = '1'";
                  }
                  $hak_akses = $_SESSION['hak_akses'];
                  if($hak_akses=='Admin'){
                    $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi ORDER BY id DESC");
                  }elseif($hak_akses=='Tim'){
                    $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE $whereClause ORDER BY id DESC");
                  }
                  // $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE $whereClause ORDER BY id DESC");
                  while($hasil = mysqli_fetch_array($tampil)){
                  ?>
                    <tr>
                      <td><?php echo $nomor++; ?></td>
                      <td>
                        <strong>Kejadian:</strong><br>
                        <?php echo $hasil['kejadian']; ?>
                        <br>
                        <br>
                        <strong>Kecamatan:</strong><br>
                        <?php
                        $id_kec=$hasil['kec'];
                        $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
                        $kec2 = mysqli_fetch_array($kec1);
                        echo $kec2['nama_kecamatan'];
                        ?>
                        <br>
                        <br>
                        <strong>Desa:</strong><br>
                        <?php
                        $id_desa=$hasil['desa'];
                        $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
                        $desa2 = mysqli_fetch_array($desa1);
                        echo $desa2['nama_desa']; ?>
                        <br>
                        <br>
                        <strong>Nama Pelapor:</strong><br>
                        <?php echo $hasil['nama_pelapor']; ?>
                        <br>
                        <br>
                        <strong>No. Telp Pelapor:</strong><br>
                        <?php echo $hasil['noTelp_pelapor']; ?>
                        <br>
                        <br>
                        <strong>Alamat Kejadian:</strong><br>
                        <?php echo $hasil['alamat']; ?>
                        <br>
                        <br>
                        <strong>Keterangan:</strong><br>
                        <?php echo $hasil['ket']; ?>
                      </td>
                      <td><?php echo $hasil['tanggal_terima']; ?></td>
                      <td><?php echo $hasil['tanggal_selesai']; ?></td>
                      <td><?php echo $hasil['jumlah_tim']; ?></td>
                      <?php
                      $tglSelesai = $hasil['tanggal_selesai'];
                      $lap        = $hasil['laporan'];
                      if(empty($tglSelesai) && empty($lap)){
                        ?>
                        <td></td>
                        <?php
                      }else{
                        ?>
                        <td>
                          <strong>Laporan Penyelesaian:</strong><br>
                          <?php echo $hasil['laporan']; ?><br><br>
                          <strong>Anggota yang Terlibat:</strong><br>
                          <?php echo $hasil['tim']; ?><br><br>
                          <a class="btn btn-success btn-sm " target="blank" href="laporan.php?<?php echo "id=" .$hasil['id'];?>" aria-label="pdf" style="color:white;">Unduh Laporan<br><i class="far fa-file-pdf"></i></a>
                        </td>
                        <?php
                      }
                      ?>
                      <td width="20%">
                        <div class="row">
                          <?php
                          $id_lokasi=$hasil['id'];
                          $lokasi_foto = mysqli_query($kominfo, "select * from foto where id_lokasi='$id_lokasi'");
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
                          $tglSelesai = $hasil['tanggal_selesai'];
                          $lap        = $hasil['laporan'];
                          if(empty($tglSelesai) && empty($lap)){
                            ?>
                            <a class="btn btn-info btn-sm" id="edit_lokasi" value="<?php echo $hasil['id']; ?>">Input Laporan Penyelesaian</a>
                            <?php
                          }else{
                            ?>
                            <a class="btn btn-warning btn-sm" id="edit_lokasi" value="<?php echo $hasil['id']; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" id="hapus_lokasi" value="<?php echo $hasil['id']; ?>">Hapus</a>
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
          }elseif($akses=='Call Center'){
            ?>
            <div>
              <button class="btn btn-info btn-sm" id="add_lokasi">Input Lokasi</button>
            </div>
            <br/>
            <div class="table-responsive">
              <table id="tower" class="table table-bordered">
                <thead>
                  <th>No.</th>
                  <th>Kejadian</th>
                  <th>Kecamatan</th>
                  <th>Desa</th>
                  <th>Data Pelapor</th>
                  <th>Tanggal Terima</th>
                  <th>Tanggal Selesai</th>
                  <th>Alamat Kejadian</th>
                  <th>Keterangan</th>
                </thead>
                <tbody>
                  <?php
                  $nomor = 1;
                  $kejadian = $_SESSION['kejadian'];
                  $data = explode(",", $kejadian);
                  // print_r($data);
                  // Membuat bagian WHERE untuk mengambil data berdasarkan nilai dalam array
                  $whereClause = "";
                  foreach ($data as $value) {
                    $value = mysqli_real_escape_string($kominfo, $value); // Hindari SQL injection
                    if ($whereClause !== "") {
                        $whereClause .= " OR ";
                    }
                    $whereClause .= "kejadian = '$value'";
                  }
                  $hak_akses = $_SESSION['hak_akses'];
                  if($hak_akses=='Admin'){
                    $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi ORDER BY id DESC");
                  }elseif($hak_akses=='Tim'){
                    $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE $whereClause ORDER BY id DESC");
                  }elseif($hak_akses=='Call Center'){
                    $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi ORDER BY id DESC");
                  }
                  // $tampil = mysqli_query($kominfo, "SELECT * FROM lokasi WHERE $whereClause ORDER BY id DESC");
                  while($hasil = mysqli_fetch_array($tampil)){
                  ?>
                    <tr>
                      <td><?php echo $nomor++; ?></td>
                      <td><?php echo $hasil['kejadian']; ?></td>
                      <td>
                        <?php
                        $id_kec=$hasil['kec'];
                        $kec1 = mysqli_query($kominfo, "select * from kecamatan where id='$id_kec'");
                        $kec2 = mysqli_fetch_array($kec1);
                        echo $kec2['nama_kecamatan'];
                        ?>
                      </td>
                      <td>
                        <?php
                        $id_desa=$hasil['desa'];
                        $desa1 = mysqli_query($kominfo, "select * from desa where id='$id_desa'");
                        $desa2 = mysqli_fetch_array($desa1);
                        echo $desa2['nama_desa']; ?>
                      </td>
                      <td>
                        <strong>Nama Pelapor:</strong><br><?php echo $hasil['nama_pelapor']; ?><br><br>
                        <strong>No. Telp Pelapor:</strong><br><?php echo $hasil['noTelp_pelapor']; ?>
                      </td>
                      <td><?php echo $hasil['tanggal_terima']; ?></td>
                      <td><?php echo $hasil['tanggal_selesai']; ?></td>
                      <td><?php echo $hasil['alamat']; ?></td>
                      <td><?php echo $hasil['ket']; ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
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