<?php
  if (empty($_SESSION['112_username'])){
    session_start();
    header("Location:/");
  }
?>
<div class="row">
    <div class="col-12">
        <div id="lokasi"></div>
    </div>
</div>
<?php include 'ajax.php'; ?>