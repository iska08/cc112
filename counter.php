
<?php
include 'dbconfig.php';
date_default_timezone_set("Asia/Jakarta");
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

 
// Jenis Browser
$browser = $_SERVER['HTTP_USER_AGENT'];
$chrome = '/Chrome/';
$firefox = '/Firefox/';
$ie = '/IE/';
if (preg_match($chrome, $browser))
    $data = "Chrome/Opera";
if (preg_match($firefox, $browser))
    $data = "Firefox";
if (preg_match($ie, $browser))
    $data = "IE";
 
// untuk mengambil informasi dari pengunjung
$ipaddress = $user_ip;
$browser = $data;
$tanggal = date('Y-m-d H:i:s');
$kunjungan = 1;
// Daftarkan Kedalam Session Lalu Simpan Ke Database
mysqli_query($kominfo,"INSERT INTO counterdb (tanggal,ip_address,counter,browser) VALUES ('".$tanggal."','".$ipaddress."','".$kunjungan."','".$browser."')");
// Hitung Jumlah Visitor
$kemarin  = date("Y-m-d H:i:s",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
$hari_ini  = mysqli_fetch_array(mysqli_query($kominfo,'SELECT sum(counter) AS hari_ini FROM counterdb WHERE tanggal="'.date("Y-m-d H:i:s").'"'));
$kemarin = mysqli_fetch_array(mysqli_query($kominfo,'SELECT sum(counter) AS kemarin FROM counterdb WHERE tanggal="'.$kemarin.'"'));
$sql = mysqli_fetch_array(mysqli_query($kominfo,'SELECT sum(counter) as total FROM counterdb'));
?>
