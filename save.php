<?php
$file = $_GET['file'];	
$location = 'foto/'.$file;
$newFile = $file;
$targ_w = $targ_h = 400;	
$img_r = imagecreatefromjpeg($location);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
$targ_w,$targ_h,$_POST['w'],$_POST['h']);
imagejpeg($dst_r, 'foto/'.$newFile);		
header('location:admin.php?hal=lokasi');
?>