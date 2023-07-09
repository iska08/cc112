<?php
session_start();
if (empty($_SESSION['112_username'])){
  header("Location:/");
}
//koneksi
include 'dbconfig.php';
$id_kec = $_GET['id_kec'];
$id_desa = $_GET['id_desa'];
$id_kej = $_GET['id_kej'];
$id_opd = $_GET['id_opd'];
?>

<div class="row">
  <div class="col-12">
    <div class="card card-info card-outline"></div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    // program dependent ajax
    $("#kecamatan").on("change",function(){
      var kec_id = $(this).val();
      $.ajax({
        url :"wilayah.php",
        type:"POST",
        cache:false,
        data:{kec_id:kec_id},
        success:function(data){
          $("#desa").html(data);
          $('#dusun').html('<option value="">== Pilih Dusun ==</option>');
         }
      });
    });
    // kegiatan dependent ajax
    $("#desa").on("change", function(){
      var desa_id = $(this).val();
      $.ajax({
        url :"wilayah.php",
        type:"POST",
        cache:false,
        data:{desa_id:desa_id},
        success:function(data){
          $("#dusun").html(data);
        }
      });
    });
    // sub kegiatan dependent ajax
    $("#dusun").on("change", function(){
      var dusun_id = $(this).val();
      $.ajax({
        url :"wilayah.php",
        type:"POST",
        cache:false,
        data:{dusun_id:dusun_id},
        success:function(data){
          $("#").html(data);
        }
      });
    });
  });
</script>