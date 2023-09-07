<?php
if (empty($_SESSION['112_username'])) {
  session_start();
  header("Location:login.php");
}
?>

<div class="card-outline">
  <div id="data_kec"></div>
  <div id="data_desa"></div>
  <div id="data_opd"></div>
  <div id="data_kej"></div>
  <div id="data_survey"></div>
  <div id="data_user"></div>
</div>

<?php include 'ajax.php'; ?>