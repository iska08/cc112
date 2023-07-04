<?php
include 'dbconfig.php';
 
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
 

// Hitung Jumlah Visitor
$kemarin  = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
$hari_ini  = mysqli_fetch_array(mysqli_query($kominfo,'SELECT sum(counter) AS hari_ini FROM counterdb WHERE tanggal="'.date("Y-m-d").'"'));
$kemarin = mysqli_fetch_array(mysqli_query($kominfo,'SELECT sum(counter) AS kemarin FROM counterdb WHERE tanggal="'.$kemarin.'"'));
$sql = mysqli_fetch_array(mysqli_query($kominfo,'SELECT sum(counter) as total FROM counterdb'));
?>
<div class="card card-info card-outline">
<div class="card-header ">
                <h5 class="card-title">Data Pengunjung</h5>
</div>
<div class="card-body ">
<div class="row"> <!-- class row digunakan sebelum membuat column  -->         
<div class="col-md-12"> 
<table id="counter1" class="table table-bordered">
	<tr>
		<th>Browser</th>
		<th>Ip</th>
		<th>Jumlah Pegunjung Hari ini</th>
		<th>Jumlah Pengunjung Kemarin</th>
		<th>Total pengunjung</th>
	</tr>
 
	<tr>
		<td>
			<?php echo "".$data."";?>
		</td>
		<td>
			<?php echo "".$_SERVER['REMOTE_ADDR']."";?>
		</td>
		<td>
			 <p><?php echo "".$hari_ini['hari_ini'].""; ?></p>
		</td>
		<td>
			<p><?php echo "".$kemarin['kemarin'].""; ?></p>
		</td>
		<td>
			<p><?php echo "".$sql['total']."";?></p>
		</td>
	</tr>
</table>
<hr/>
<table id="counter" class="table table-bordered">
	<thead class="">
	
		<th>No</th>
		<th>IP</th>
		<th>Tanggal</th>
		<th>Browser</th>
		<th>Jumlah Pegunjung</th>
		
	
	</thead>
    <tbody>
 
	<?php $no=0; ?>
	<?php $sql="SELECT * FROM counterdb";
		  $sqli=mysqli_query($kominfo,$sql);
 
		  $total = mysqli_fetch_array(mysqli_query($kominfo,'SELECT sum(counter) as jumlah FROM counterdb'));
	 ?>
	 <?php while ($tampil=mysqli_fetch_array($sqli)) {  ?>
	 <?php $no++;?>
	<tr>
		<td>
			<?php echo "$no"; ?>
		</td>
		<td>
			<?php echo "$tampil[ip_address]";?>
		</td>
		<td>
			<?php echo "$tampil[tanggal]";?>
		</td>
		<td>
			<?php echo "$tampil[browser]";?>
		</td>
		<td>
			<?php echo "$tampil[counter]";?>
		</td>
	</tr>
	 <?php } ?> 
	</tbody>
	<tr>
	   <td colspan="4"><center><b>Total Visitor</b></center></td>
	   <td><b><?php echo "".$total['jumlah']."";?></b></td>
    </tr>
</table>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#counter').DataTable({
        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
    });
} );
</script> 