<?php
if (empty($_SESSION['112_username'])){
    session_start();
    header("Location:/");
}
?>
<script>
    $(document).ready(function() {
        lokasi();
        //Load form add
        $("#lokasi").on("click", "#add_lokasi", function() {
            $.ajax({
                url: 'input_lokasi.php',
                type: 'get',
                success: function(data) {
                    $('#lokasi').html(data);
                }
            });
        });
        //Load form edit
        $("#lokasi").on("click", "#edit_lokasi", function() {
            var id_lokasi = $(this).attr("value");
            $.ajax({
                url: 'edit_lokasi.php',
                type: 'get',
                data: {
                    id_lokasi: id_lokasi
                },
                success: function(data) {
                    $('#lokasi').html(data);
                }
            });
        });
        //simpan
        $("#lokasi").on("submit", "#form_tambah_lokasi", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_lokasi',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    lokasi();
                }
            });
        });
        //simpan
        $("#lokasi").on("submit", "#upload_foto", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_foto',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    var imageUrl = data;
                    $("#gambar").attr("src", imageUrl);
                    Swal.fire((data), '', 'success');
                    lokasi();
                }
            });
        });
        //simpan
        $("#lokasi").on("submit", "#edit_foto", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_foto',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    alert((data), '', 'success')
                    lokasi();
                }
            });
        });
        //edit approve
        $("#lokasi").on("submit", "#edit_approve", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_approve',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    lokasi();
                }
            });
        });
        //edit data
        $("#lokasi").on("submit", "#form_edit_lokasi", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_lokasi',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    lokasi();
                }
            });
        });
        //button batal
        $("#lokasi").on("click", "#batal_lokasi", function() {
            lokasi();
        });
        //hapus
        $("#lokasi").on("click", "#hapus_lokasi", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus lokasi?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_lokasi = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_lokasi',
                        type: 'post',
                        data: {
                            id_lokasi: id_lokasi
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            lokasi();
                        }
                    });
                }
            });
        });
        $("#lokasi").on("click", "#hapus_foto", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus foto?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_foto',
                        type: 'post',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            lokasi();
                        }
                    });
                }
            });
        });
    })
    function lokasi() {
        $.ajax({
            url: 'data_lokasi.php',
            type: 'get',
            success: function(data) {
                $('#lokasi').html(data);
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        support();
        //add tim
        $("#support").on("click", "#add_support", function() {
            $.ajax({
                url: 'input_support.php',
                type: 'get',
                success: function(data) {
                    $('#support').html(data);
                }
            });
        });
        //simpan tim
        $("#support").on("submit", "#form_tambah_support", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_support',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    support();
                }
            });
        });
        $("#support").on("click", "#edit_support", function() {
            var id_support = $(this).attr("value");
            $.ajax({
                url: 'edit_support.php',
                type: 'get',
                data: {
                    id_support: id_support
                },
                success: function(data) {
                    $('#support').html(data);
                }
            });
        });
        $("#support").on("submit", "#form_edit_support", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_support',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    support();
                }
            });
        });
        //button batal
        $("#support").on("click", "#batal_support", function() {
            support();
        });
        //hapus
        $("#support").on("click", "#hapus_support", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus support?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_support = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_support',
                        type: 'post',
                        data: {
                            id_support: id_support
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            support();
                        }
                    });
                }
            });
        });
        //simpan foto
        $("#support").on("submit", "#upload_foto_support", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_foto_support',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    var imageUrl = data;
                    $("#gambar").attr("src", imageUrl);
                    Swal.fire((data), '', 'success');
                    support();
                }
            });
        });
        //simpan
        $("#support").on("submit", "#edit_foto_support", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_foto_support',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    alert((data), '', 'success')
                    support();
                }
            });
        });
        $("#support").on("click", "#hapus_foto_support", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus foto support?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_foto_support',
                        type: 'post',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            support();
                        }
                    });
                }
            });
        });
    })
    function support() {
        $.ajax({
            url: 'data_support.php',
            type: 'get',
            success: function(data) {
                $('#support').html(data);
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        //load data
        data_kec();
        data_desa();
        data_opd();
        data_kej();
        data_user();
        data_survey();
        //Load form edit kec
        $("#data_kec").on("click", "#edit_kec", function() {
            var id_kec = $(this).attr("value");
            $.ajax({
                url: 'data_kec.php',
                type: 'get',
                data: {
                    id_kec: id_kec
                },
                success: function(data) {
                    $('#data_kec').html(data);
                }
            });
        });
        //simpan kec
        $("#data_kec").on("submit", "#form_tambah_kec", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_kec',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_kec();
                }
            });
        });
        //edit data kec
        $("#data_kec").on("submit", "#form_edit_kec", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_kec',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_kec();
                }
            });
        });
        //button batal kec
        $("#data_kec").on("click", "#batal_kec", function() {
            data_kec();
        });
        //hapus kec
        $("#data_kec").on("click", "#hapus_kec", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus Kecamatan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_kec = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_kec',
                        type: 'post',
                        data: {
                            id_kec: id_kec
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            data_kec();
                        }
                    });
                }
            });
        });
        //Load form edit desa
        $("#data_desa").on("click", "#edit_desa", function() {
            var id_desa = $(this).attr("value");
            $.ajax({
                url: 'data_desa.php',
                type: 'get',
                data: {
                    id_desa: id_desa
                },
                success: function(data) {
                    $('#data_desa').html(data);
                }
            });
        });
        //simpan desa
        $("#data_desa").on("submit", "#form_tambah_desa", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_desa',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_desa();
                }
            });
        });
        //edit data desa
        $("#data_desa").on("submit", "#form_edit_desa", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_desa',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_desa();
                }
            });
        });
        //button batal desa
        $("#data_desa").on("click", "#batal_desa", function() {
            data_desa();
        });
        //hapus desa
        $("#data_desa").on("click", "#hapus_desa", function() {

            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus desa?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_desa = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_desa',
                        type: 'post',
                        data: {
                            id_desa: id_desa
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            data_desa();
                        }
                    });
                }
            });
        });
        //Load form edit kej
        $("#data_kej").on("click", "#edit_kej", function() {
            var id_kej = $(this).attr("value");
            $.ajax({
                url: 'data_kej.php',
                type: 'get',
                data: {
                    id_kej: id_kej
                },
                success: function(data) {
                    $('#data_kej').html(data);
                }
            });
        });
        //simpan kej
        $("#data_kej").on("submit", "#form_tambah_kej", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_kej',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_kej();
                }
            });
        });
        //edit data kej
        $("#data_kej").on("submit", "#form_edit_kej", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_kej',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_kej();
                }
            });
        });
        //button batal kej
        $("#data_kej").on("click", "#batal_kej", function() {
            data_kej();
        });
        //hapus kej
        $("#data_kej").on("click", "#hapus_kej", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus Kejadian?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_kej = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_kej',
                        type: 'post',
                        data: {
                            id_kej: id_kej
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            data_kej();
                        }
                    });
                }
            });
        });
        //Load form edit opd
        $("#data_opd").on("click", "#edit_opd", function() {
            var id_opd = $(this).attr("value");
            $.ajax({
                url: 'data_opd.php',
                type: 'get',
                data: {
                    id_opd: id_opd
                },
                success: function(data) {
                    $('#data_opd').html(data);
                }
            });
        });
        //simpan opd
        $("#data_opd").on("submit", "#form_tambah_opd", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_opd',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_opd();
                }
            });
        });
        //edit data opd
        $("#data_opd").on("submit", "#form_edit_opd", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_opd',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_opd();
                }
            });
        });
        //button batal opd
        $("#data_opd").on("click", "#batal_opd", function() {
            data_opd();
        });
        //hapus opd
        $("#data_opd").on("click", "#hapus_opd", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus OPD ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_opd = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_opd',
                        type: 'post',
                        data: {
                            id_opd: id_opd
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            data_opd();
                        }
                    });
                }
            });
        });
        //Load form edit user
        $("#data_user").on("click", "#edit_user", function() {
            var id_user = $(this).attr("value");
            $.ajax({
                url: 'data_user.php',
                type: 'get',
                data: {
                    id_user: id_user
                },
                success: function(data) {
                    $('#data_user').html(data);
                }
            });
        });
        //simpan user
        $("#data_user").on("submit", "#form_tambah_user", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_user',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_user();
                }
            });
        });
        //edit data user
        $("#data_user").on("submit", "#form_edit_user", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_user',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_user();
                }
            });
        });
        //button batal user
        $("#data_user").on("click", "#batal_user", function() {
            data_user();
        });
        //hapus user
        $("#data_user").on("click", "#hapus_user", function() {
            Swal.fire({
                title: 'Perhatian!',
                text: "Anda mau menghapus User?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_user = $(this).attr("value");
                    $.ajax({
                        url: 'proses.php?action=hapus_user',
                        type: 'post',
                        data: {
                            id_user: id_user
                        },
                        success: function(data) {
                            Swal.fire((data), '', 'warning')
                            data_user();
                        }
                    });
                }
            });
        });
        //load form edit survey
        $("#data_survey").on("click", "#edit_survey", function() {
            var id_survey = $(this).attr("value");
            $.ajax({
                url: 'isi_data_survey.php',
                type: 'get',
                data: {
                    id_survey: id_survey
                },
                success: function(data) {
                    $('#data_survey').html(data);
                }
            });
        });
        //simpan survey
        $("#data_survey").on("submit", "#form_tambah_survey", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=simpan_survey',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_survey();
                }
            });
        });
        //edit data survey
        $("#data_survey").on("submit", "#form_edit_survey", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'proses.php?action=edit_survey',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.fire((data), '', 'success')
                    data_survey();
                }
            });
        });
        //button batal survey
        $("#data_survey").on("click", "#batal_survey", function() {
            data_survey();
        });
        //hapus survey
        $("#data_survey").on("click", "#hapus_survey", function() {
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
    function data_kec() {
        $.ajax({
            url: 'data_kec.php',
            type: 'get',
            success: function(data) {
                $('#data_kec').html(data);
            }
        });
    }
    function data_desa() {
        $.ajax({
            url: 'data_desa.php',
            type: 'get',
            success: function(data) {
                $('#data_desa').html(data);
            }
        });
    }
    function data_opd() {
        $.ajax({
            url: 'data_opd.php',
            type: 'get',
            success: function(data) {
                $('#data_opd').html(data);
            }
        });
    }
    function data_kej() {
        $.ajax({
            url: 'data_kej.php',
            type: 'get',
            success: function(data) {
                $('#data_kej').html(data);
            }
        });
    }
    function data_user() {
        $.ajax({
            url: 'data_user.php',
            type: 'get',
            success: function(data) {
                $('#data_user').html(data);
            }
        });
    }
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