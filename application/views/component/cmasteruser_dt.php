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
	function konfirmasi_surat(id){
		save_method = "update";

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/api_surat?action=konfirmasi&&id="+id,
			type:"GET",
			dataType :"JSON",
			success: function(data){
				$('#namajasa').text(data[0].item_name);
				$('#username').text(data[0].item_seller_user_id[0].user_name);
				$('#kategori').text(data[0].item_category_id[0].category_name);
				$('#subkategori').text(data[0].item_subcategory_id[0].subcategory_name);
				$('#price').text(data[0].item_price);
				$('#itemdetail').modal('show');
			}
		})
	}
</script>

<script src="<?php echo base_url(); ?>assets/DT_bootstrap.js"></script>