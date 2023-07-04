
<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="img/smp1.png">
  <meta name="description" content="Data Tower di Kabupaten Sumenep">
  <meta name="author" content="Creative Tim">
  <title>Data ePJU </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="bg-default">

  <!-- Main content -->
  <div class="main-content">
   <br/>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card  border-0 mb-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class=""><center><img src="img/smp.png" width="80"></center></div>
              <hr/>
              <div class="text-center text-muted mb-4">
                <h5>login ePJU </h5>
              </div>
              <?php
include 'dbconfig.php';
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database

if(isset($_POST['submit'])){
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($kominfo,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

  $data = mysqli_fetch_assoc($login);
  $username = $data['username'];
  $foto_profile = $data['foto_profile'];
  $akses = $data['akses'];
  
  // cek jika user login sebagai admin
  if($data['username']){

    // buat session login dan username
    $_SESSION['pju_username'] = $username;
    $_SESSION['foto_profile'] = $foto_profile;
    $_SESSION['akses'] = $akses;
   

 $login_on = mysqli_query($kominfo,"update user set online ='1' where username='$username'");   
       // alihkan ke halaman dashboard admin
    echo "<script>window.location='data_mobile.php';</script>";

  // cek jika user login sebagai pegawai
  } else {

   
     echo '<div class="alert alert-warning" role="alert">
    <strong>Akun anda belum aktif atau belum terdaftar!</strong></div>';
  }
  } else {

   
     echo '<div class="alert alert-warning" role="alert"><strong>Password salah, Username salah atau belum terdaftar!</strong></div>';
  }
}
?>
              <form role="form" method="post">
                <div class="form-group mb-3">
                  
                    
                    <input class="form-control" name="username" placeholder="Username" required="required">
             
                </div>
                <div class="form-group">
                  
                    <input class="form-control" name="password" placeholder="Password" type="password" required="required">
                  
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-success my-4">Masuk</button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
     
        
          <div class="copyright text-center " style="color:#fff;">
            &copy; 2022 Bidang TI Diskominfo Sumenep
          </div>
        </div>
        
      
 
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>