<script type="text/javascript">
 var table;
   $(document).ready(function() {

         //datatables
   table = $('#example').DataTable({

             "processing": true,
             "serverSide": true,
             "order": [],

             "ajax": {
                 "url": "<?php echo site_url('home/apiArsipSurat')?>",
                 "type": "POST"
             },


             "columnDefs": [
             {
                 "targets": [ 0 ],
                 "orderable": false,
             },
             ],

     });

 });
</script>
<!--<script type="text/javascript">
 $(document).ready(function() {
     $('#example').DataTable();
 } );
</script>-->
<script src="<?php echo base_url(); ?>assets/DT_bootstrap.js"></script>