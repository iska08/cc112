<?php
if (empty($_SESSION['112_username'])) {
    session_start();
    header("Location:login.php");
}
?>

<div class="card card-info card-outline">
    <div id="data_survey"></div>
</div>
<script>
    $(document).ready(function() {
        //load data mahasiswa saat aplikasi dijalankan
        data_survey();
        //hapus survey
        $("#data_survey").on("click", "#hapus", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus survey?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_survey = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_survey',
                        type: 'post',
                        data: {
                            id_survey: id_survey
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            data_survey();
                        }
                    });
                }
            });
        });
    })
    function data_survey() {
        $.ajax({
            url: 'isi_data_survey.php',
            type: 'get',
            success: function(data) {
                $('#data_survey').html(data);
            }
        });
    }
</script>