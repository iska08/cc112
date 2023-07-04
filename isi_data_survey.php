<?php
    //koneksi
    include 'dbconfig.php';    
    if (isset($_GET['id_survey'])) {
      $id_survey = $_GET['id_survey'];
      // Lanjutkan dengan penggunaan $id_survey di sini
    } else {
      // Atur tindakan yang akan diambil jika $_GET['id_survey'] tidak ada
    }
?>
<div class="card-header ">
    <h5 class="card-title">Data Survey</h5>
</div>
<div class="card-body ">

    <div class="col-md-12">
        <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
        <table id="survey" class="table table-bordered">
            <thead class="">
                <th width="1%">
                    No
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Alamat
                </th>
                <th>
                    No. HP
                </th>
                <th>
                    Nilai 1
                </th>
                <th>
                    Nilai 2
                </th>
                <th>
                    Kritik/saran
                </th>
                <th>

                </th>
            </thead>
            <tbody>

                <?php $noo=1; $tampil_survey = mysqli_query($kominfo, "select * from survey"); //ambil data dari tabel lokasi
                         while($hasil_survey = mysqli_fetch_array($tampil_survey)){ 
                         $jumlah = mysqli_num_rows($tampil_survey);
                          ?>
                <tr>
                    <td>
                        <?php  echo $noo++; ?>
                    </td>
                    <td>
                        <?php echo $hasil_survey['nama']; ?>
                    </td>
                    <td>
                        <?php echo $hasil_survey['alamat']; ?>
                    </td>
                    <td>
                        <?php echo $hasil_survey['hp']; ?>
                    </td>
                    <td>
                        <?php echo $hasil_survey['res1']; ?>
                    </td>
                    <td>
                        <?php echo $hasil_survey['res2']; ?>
                    </td>
                    <td>
                        <?php echo $hasil_survey['res3']; ?>
                    </td>
                    <td width="5%">
                        <div class="btn-group">

                            <a id="hapus" value="<?php echo $hasil_survey['id']; ?>"
                                class="btn btn-danger btn-sm hapus">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tr>
                <td colspan="6" align="center"><b>Jumlah Responden</b></td>
                <td>
                    <b><?php echo $jumlah; ?></b>
                </td>
                <td colspan="2" align="center"><a target="blank" href="data_survey_pdf.php" aria-label="pdf"
                        style="color:red;"><i class="far fa-file-pdf"></i></i></a></td>
            </tr>

        </table>
    </div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#survey').DataTable({
        "lengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ]
    });
});
</script>