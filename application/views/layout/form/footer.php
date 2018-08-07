
    	<script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.min.js"></script>
    	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
    	<script src="<?php echo base_url(); ?>vendors/bootstrap-notify.min.js"></script>

    	<?php 
    		if(isset($this->session->message)){
    	?>
    	<script type="text/javascript">
			$(document).ready(function(){
		      	$.notify({
		      	title: "Login Gagal : ",
		      	message: "Password/Email Salah",
		      	icon: 'fa fa-close' 
		      	},{
		      		type: "danger"
		     	});
		    });
		</script>
		<?php 
			}
		?>
  	</body>
</html>