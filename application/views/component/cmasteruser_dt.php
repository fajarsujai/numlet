 <script type="text/javascript">
	var table;
    $(document).ready(function() {
	 
	        //datatables
    table = $('#example').DataTable({ 
	 
	            "processing": true, 
	            "serverSide": true, 
	            "order": [], 
	             
	            "ajax": {
	                "url": "<?php echo site_url('dashboard/api_masteruser')?>",
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
<script type="text/javascript">
	function aktivasi_user(id){
		save_method = "update";

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/api_user?action=aktivasi&&id="+id,
			type:"GET",
			dataType :"JSON",
			success: function(data){
				reload_table();
			}

		})
		reload_table(); 
	}
</script>
<script type="text/javascript">
	function nonaktif_user(id){
		save_method = "update";

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/api_user?action=nonaktif&&id="+id,
			type:"GET",
			dataType :"JSON",
			success: function(data){
				reload_table();
			}

		})
		reload_table(); 
	}
</script>
<script type="text/javascript">
	function reload_table()
	{
		table.ajax.reload(null,false);
	}
</script>
<script src="<?php echo base_url(); ?>assets/DT_bootstrap.js"></script>