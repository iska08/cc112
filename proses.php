<?php
session_start();
if (empty($_SESSION['112_username'])){
    header("Location:/");
}
?>

<?php
//koneksi
include 'dbconfig.php';
include 'compress.php';
switch ($_GET['action']) {
    case 'simpan_survey':
        $nama   = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $hp     = $_POST['hp'];
        $res1   = $_POST['res1'];
        $res2   = $_POST['res2'];
        $res3   = $_POST['res3'];
        //input data
        $insert_survey = mysqli_query($kominfo, "INSERT into survey set nama='$nama',alamat='$alamat',hp='$hp', res1='$res1',res2='$res2',res3='$res3' ");
        if ($insert_survey) {
            echo "Data responden anda berhasil disimpan";
        }
        break;
    case 'edit_foto':
        $file = $_GET['file'];
        $location = 'foto/'.$file;
        $newFile = $file;
        $targ_w = $targ_h = 400;
        $img_r = imagecreatefromjpeg($location);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
        imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
        $targ_w,$targ_h,$_POST['w'],$_POST['h']);
        $edit_foto = imagejpeg($dst_r, 'foto/'.$newFile);
        if ($edit_foto) {
            echo "Edit Foto Berhasil";
        }
        break;
    case 'simpan_foto':
        $rand = rand(10000000, 20000000);
        $id=$_POST['id'];
        $kej = str_replace(" ", "_",$_POST['kej']);
        $foto_kej = $rand.".".pathinfo($_FILES['foto']['name'] ,PATHINFO_EXTENSION);
        $foto = $_FILES['foto']['name'];
        $nama_foto = $_FILES['foto']['tmp_name'];
        $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        if ($extension=='jpg' || $extension=='jpeg') {
            $input_foto = mysqli_query($kominfo, "INSERT INTO foto SET id_lokasi='$id', nama_foto='$foto_kej' ");
            img_resize($nama_foto,400,"foto/",$foto_kej);
            if ($input_foto) {
                echo "Simpan Foto Berhasil";
            }
        } else {
            echo "Simpan Foto Gagal";
        }
        break;
    case 'hapus_foto':
        $id = $_POST["id"];
        $lokasi_foto = mysqli_query($kominfo, "select * from foto where id='$id'");
        $foto1 = mysqli_fetch_array($lokasi_foto);
        $file_path = 'foto/' . $foto1["nama_foto"];
        unlink($file_path);
        $hapus_foto =  mysqli_query($kominfo, "DELETE FROM foto WHERE id = '$id' ");
        if ($hapus_foto) {
            echo "Hapus Foto Berhasil";
        }
        break;
    // case 'simpan_lokasi':
    //     $tahun = date("Y");
    //     $bulan = date("m");
    //     $lat_long           = $_POST['latlong'];
    //     $alamat             = $_POST['alamat'];
    //     $desa               = $_POST['desa'];
    //     $kec                = $_POST['kec'];
    //     $kejadian           = $_POST['kejadian'];
    //     $ket                = $_POST['ket'];
    //     $tanggal_terima     = $_POST['tanggal_terima'];
    //     $tanggal_selesai    = $_POST['tanggal_selesai'];
    //     //input data
    //     $insert_lokasi = mysqli_query($kominfo, "INSERT INTO `lokasi` SET lat_long='$lat_long', alamat='$alamat',desa='$desa', tanggal_terima='$tanggal_terima',tanggal_selesai='$tanggal_selesai',kec='$kec',kejadian='$kejadian',  ket='$ket', bulan='$bulan', tahun='$tahun' ");
    //     if ($insert_lokasi) {
    //         echo "Simpan Lokasi Berhasil";
    //     } else {
    //         echo "Simpan Lokasi Masuk Gagal :" . mysqli_error($kominfo);
    //     }
    //     break;
    case 'simpan_lokasi':
        $tahun = date("Y");
        $bulan = date("m");
        $lat_long = $_POST['latlong'];
        $alamat = $_POST['alamat'];
        $desa = $_POST['desa'];
        $kec = $_POST['kec'];
        $kejadian = $_POST['kejadian'];
        $ket = $_POST['ket'];
        $tanggal_terima = $_POST['tanggal_terima'];
        $tanggal_selesai = $_POST['tanggal_selesai'];

        // Input data
        $insert_lokasi = mysqli_query($kominfo, "INSERT INTO `lokasi` SET lat_long='$lat_long', alamat='$alamat', desa='$desa', tanggal_terima='$tanggal_terima', tanggal_selesai='$tanggal_selesai', kec='$kec', kejadian='$kejadian', ket='$ket', bulan='$bulan', tahun='$tahun' ");

        if ($insert_lokasi) {
            echo "Simpan Lokasi Berhasil\n";
        } else {
            echo "Simpan Lokasi Masuk Gagal: " . mysqli_error($kominfo) . "\n";
            break;
        }

        // Simpan Foto
        $rand = rand(10000000, 20000000);
        $id = mysqli_insert_id($kominfo);
        $kej = str_replace(" ", "_", $_POST['kej']);
        $foto_kej = $rand . "." . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto = $_FILES['foto']['name'];
        $nama_foto = $_FILES['foto']['tmp_name'];
        $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

        if ($extension == 'jpg' || $extension == 'jpeg') {
            $input_foto = mysqli_query($kominfo, "INSERT INTO foto SET id_lokasi='$id', nama_foto='$foto_kej' ");
            img_resize($nama_foto, 400, "foto/", $foto_kej);
            if ($input_foto) {
                echo "Simpan Foto Berhasil\n";
            }
        } else {
            echo "Simpan Foto Gagal\n";
        }
        break;
    case 'edit_lokasi':
        $id_lokasi          = $_POST['id'];
        $lat_long           = $_POST['latlong'];
        $alamat             = $_POST['alamat'];
        $desa               = $_POST['desa'];
        $kec                = $_POST['kec'];
        $kejadian           = $_POST['kejadian'];
        $ket                = $_POST['ket'];
        $tanggal_terima     = $_POST['tanggal_terima'];
        $tanggal_selesai    = $_POST['tanggal_selesai'];
        //input data
        $update_lokasi = mysqli_query($kominfo, " UPDATE `lokasi` SET lat_long='$lat_long', alamat='$alamat',desa='$desa', tanggal_terima='$tanggal_terima',tanggal_selesai='$tanggal_selesai', kec='$kec',kejadian='$kejadian',  ket='$ket' WHERE id='$id_lokasi' ");
        if ($update_lokasi) {
            echo "Edit Lokasi Berhasil";
        } else {
            echo "Edit Lokasi Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'hapus_lokasi':
        $id = $_POST['id_lokasi'];
        $query = mysqli_query($kominfo, "DELETE FROM lokasi WHERE id='$id'");
        if ($query) {
            echo "Hapus Lokasi Berhasil";
        } else {
            echo "Hapus Lokasi Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'simpan_kec':
        $nama_kecamatan = $_POST['nama_kecamatan'];
        //input data
        $insert_kecamatan = mysqli_query($kominfo, "INSERT into kecamatan set nama_kecamatan='$nama_kecamatan' ");
        if ($insert_kecamatan) {
            echo "Tambah Kecamatan Berhasil";
        } else {
            echo "Tambah Kecamatan Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'simpan_desa':
        $nama_desa      = $_POST['nama_desa'];
        $id_kecamatan   = $_POST['id_kecamatan'];
        //input data
        $insert_desa = mysqli_query($kominfo, "INSERT into desa set id_kecamatan='$id_kecamatan',nama_desa='$nama_desa' ");
        if ($insert_desa) {
            echo "Tambah Desa Berhasil";
        } else {
            echo "Tambah Desa Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'simpan_opd':
        $nama_opd = $_POST['nama_opd'];
        //input data
        $insert_opd = mysqli_query($kominfo, "INSERT into opd_terkait set nama_opd='$nama_opd' ");
        if ($insert_opd) {
            echo "Tambah OPD Berhasil";
        } else {
            echo "Tambah OPD Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'simpan_kej':
        $nama_kej       = $_POST['nama_kej'];
        $opd_terkait    = $_POST['opd_terkait'];
        //input data
        $insert_kej = mysqli_query($kominfo, "INSERT into kejadian set nama_kejadian='$nama_kej',opd_terkait='$opd_terkait' ");
        if ($insert_kej) {
            echo "Tambah Kejadian Berhasil";
        } else {
            echo "Tambah Kejadian Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'edit_kec':
        $id_kec         = $_POST['id'];
        $nama_kecamatan = $_POST['nama_kecamatan'];
        //edit data kec
        $update_kec = mysqli_query($kominfo, " UPDATE `kecamatan` SET nama_kecamatan='$nama_kecamatan' WHERE id='$id_kec' ");
        if ($update_kec) {
            echo "Edit Kecamatan Berhasil";
        } else {
            echo "Edit Kecamatan Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'edit_kej':
        $id_kej = $_POST['id'];
        $nama_kejadian  = $_POST['nama_kej'];
        $opd_terkait    = $_POST['opd_terkait'];
        //edit data kec
        $update_kej = mysqli_query($kominfo, " UPDATE `kejadian` SET nama_kejadian='$nama_kejadian',opd_terkait='$opd_terkait' WHERE id='$id_kej' ");
        if ($update_kej) {
            echo "Edit Kejadian Berhasil";
        } else {
            echo "Edit Kejadian Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'edit_desa':
        $id_desa      = $_POST['id'];
        $id_kecamatan = $_POST['id_kecamatan'];
        $nama_desa    = $_POST['nama_desa'];
        //edit data desa
        $update_desa = mysqli_query($kominfo, " UPDATE `desa` SET id_kecamatan='$id_kecamatan',nama_desa='$nama_desa' WHERE id='$id_desa' ");
        if ($update_desa) {
            echo "Edit Desa Berhasil";
        } else {
            echo "Edit Desa Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'edit_opd':
        $id_opd   = $_POST['id'];
        $nama_opd = $_POST['nama_opd'];
        //edit data desa
        $update_opd = mysqli_query($kominfo, " UPDATE `opd_terkait` SET nama_opd='$nama_opd' WHERE id='$id_opd' ");
        if ($update_opd) {
            echo "Edit OPD Berhasil";
        } else {
            echo "Edit OPD Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'hapus_kec':
        $id_kec = $_POST['id_kec'];
        //input data
        $hapus_kec = mysqli_query($kominfo, " DELETE FROM `kecamatan` WHERE id='$id_kec' ");
        if ($hapus_kec) {
            echo "Hapus Kecamatan Berhasil";
        } else {
            echo "Hapus Kecamatan Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'hapus_kej':
        $id_kej = $_POST['id_kej'];
        $hapus_kej = mysqli_query($kominfo, " DELETE FROM kejadian WHERE id='$id_kej' ");
        if ($hapus_kej) {
            echo "Hapus Kejadian Berhasil";
        } else {
            echo "Hapus Kejadian Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'hapus_desa':
        $id_desa = $_POST['id_desa'];
        //input data
        $hapus_desa = mysqli_query($kominfo, " DELETE FROM `desa` WHERE id='$id_desa' ");
        if ($hapus_desa) {
            echo "Hapus Desa Berhasil";
        } else {
            echo "Hapus Desa Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'hapus_opd':
        $id_opd = $_POST['id_opd'];
        //input data
        $hapus_opd = mysqli_query($kominfo, " DELETE FROM `opd_tekait` WHERE id='$id_opd' ");
        if ($hapus_opd) {
            echo "Hapus OPD Berhasil";
        } else {
            echo "Hapus OPD Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'hapus_survey':
        $id_survey = $_POST['id_survey'];
        //input data
        $hapus_survey = mysqli_query($kominfo, " DELETE FROM `survey` WHERE id='$id_survey' ");
        if ($hapus_survey) {
            echo "Hapus Survey Berhasil";
        } else {
            echo "Hapus Survey Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'simpan_user':
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $nama       = $_POST['nama'];
        $email      = $_POST['email'];
        $hak_akses  = $_POST['hak_akses'];
        $online     = $_POST['online'];
        //input data
        $insert_user = mysqli_query($kominfo, "INSERT into user SET username='$username',password='$password',nama='$nama', email='$email',hak_akses='$hak_akses',online='$online' ");
        if ($insert_user) {
            echo "Data User berhasil disimpan";
        } else {
            echo "Data User tidak berhasil disimpan";
        }
        break;
    case 'edit_user':
        $id_user    = $_POST['id'];
        $username   = $_POST['username'];
        $nama       = $_POST['nama'];
        $email      = $_POST['email'];
        $hak_akses  = $_POST['hak_akses'];
        $online     = $_POST['online'];
        //input data
        $update_user = mysqli_query($kominfo, " UPDATE `user` SET username='$username',password='$password',nama='$nama', email='$email',hak_akses='$hak_akses',online='$online' WHERE id='$id_user' ");
        if ($update_user) {
            echo "Edit User Berhasil";
        } else {
            echo "Edit User Gagal :" . mysqli_error($kominfo);
        }
        break;
    case 'hapus_user':
        $id_user = $_POST['id_user'];
        $hapus_user = mysqli_query($kominfo, "DELETE FROM lokasi WHERE id='$id_user'");
        if ($hapus_user) {
            echo "Hapus User Berhasil";
        } else {
            echo "Hapus User Gagal :" . mysqli_error($kominfo);
        }
        break;
}
?>