<?php
error_reporting(0);
function kebulan($data) {
	$bulan = array("0","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$hitung = count($bulan);
	for($x=1;$x<=$hitung;$x++) {
		if($data==$x) {
			$namabulan = $bulan[$x];
		}
	}
	return $namabulan;
}
function keangka($data) {
	$bulan = array("0","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$hitung = count($bulan);
	for($x=1;$x<=$hitung;$x++) {
		if($data==$bulan[$x]) {
			$angkabulan = $x;
		}
	}
	return $angkabulan;
}
?>
