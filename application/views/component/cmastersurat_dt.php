 <script type="text/javascript">
	var table;
    $(document).ready(function() {
	 
	        //datatables
    table = $('#example').DataTable({ 
	 
	            "processing": true, 
	            "serverSide": true, 
	            "order": [], 
	             
	            "ajax": {
	                "url": "<?php echo site_url('dashboard/api_mastersurat')?>",
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
				reload_table();
			}

		})
		reload_table(); 
	}
</script>
<script type="text/javascript">
	function tolak_surat(id){
		save_method = "update";

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/api_surat?action=tolak&&id="+id,
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
	function detail_surat(id){
		save_method = "update";

		$.ajax({
			url:"<?php echo base_url(); ?>dashboard/api_surat?action=detail&&id="+id,
			type:"GET",
			dataType :"JSON",
			success: function(data){
				$('#no_surat').text(data[0].no_surat);
				$('#perihal').text(data[0].perihal);
				$('#tujuan').text(data[0].tujuan);
				$('#pererima').text(data[0].penerima_srt);
				$('#alamat').text(data[0].alamat);
				$('#status').text(data[0].status);
				$('#waktu').text(data[0].waktu_dibuat);
				$('#detail_surat').modal('show');
			}

		})
	}
</script>
<script type="text/javascript">
	function reload_table()
	{
		table.ajax.reload(null,false);
	}
</script>
<script src="<?php echo base_url(); ?>assets/DT_bootstrap.js"></script>