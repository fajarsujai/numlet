<script type="text/javascript">
  $(document).ready(function() {
     $("#ubahData").click(function() {
       $("#modal").modal("show")
     })
     $("#ubah_pass").click(function() {
       $("#modal_pass").modal("show")
     })
     $(".close_data").click(function(){
       $("#modal").modal("hide")
     })
     $(".close_pass").click(function(){
       $("#modal_pass").modal("hide")
     })
   });
</script>


<script src="<?php echo base_url(); ?>assets/DT_bootstrap.js"></script>
