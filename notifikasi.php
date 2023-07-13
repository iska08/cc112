<script type="text/javascript">
    function tampil_button_notif() {
           $.ajax({
                url:"<?php echo base_url() ?>index.php/peminjaman_buku/untuk_buttonnya",
                method: 'post',
                dataType: 'json',
                success: function(data)
                {
                    $("#button_notif").val(data.jumlah_total);
                    console.log(data.jumlah_total)
                }
            });
          }  
          function tampil_isi_notif() {
            $.ajax({
            url:"<?php echo base_url() ?>index.php/peminjaman_buku/untuk_isinya",
            success: function(html)
            { 
            $('#button_isi').html(html);
            }
            });
          }    
</script>