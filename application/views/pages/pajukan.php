<div class="span9">
	<div class="row-fluid">
		<div class="block">
			<div class="navbar navbar-inner block-header">
	            <div class="muted pull-left">Ajukan surat</div>
	        </div>
			<div class="block-content collapse in" style="padding: 10px">
				<form action="<?php echo base_url(); ?>Home/postAjukan" method="post" autocomplete="off">
					<label>Tujuan</label>
					<input type="text" class="input-block-level span4" placeholder="Tujuan" name="tujuan">
					<label>Penerima</label>
					<input type="text" class="input-block-level span4" placeholder="Penerima" name="penerima">
					<label>Perihal</label>
					<input type="text" class="input-block-level span4" placeholder="Perihal" name="perihal">
					<label>Penanggung Jawab</label>
					<input type="text" class="input-block-level span4" placeholder="Penanggung Jawab" name="penanggungjwb">
					<label>Alamat</label>
					<textarea class="span4" id="" cols="30" rows="10"  class="input-block-level span4" name="alamat"></textarea>
					<br>
					<input class="input-block-level btn btn-primary span4" type="submit" value="Ajukan"></input>
				</form>
			</div>
		</div>
	</div>
</div>
