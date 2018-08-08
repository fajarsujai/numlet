<div class="span9">
	<div class="row-fluid">
		<div class="block">
			<div class="navbar navbar-inner block-header">
	            <div class="muted pull-left">Ajukan surat</div>
	        </div>
			<div class="block-content collapse in" style="padding: 10px">
				<form action="<?php echo base_url('dashboard') ?>/edit_surat?process=yes&&id=<?php echo $id ?>" method="POST">
					<label>Tujuan</label>
					<input type="text" class="input-block-level span4" placeholder="Tujuan" value="<?php echo $detail[0]['tujuan'] ?>" name="tujuan">
					<label>Penerima</label>
					<input type="text" class="input-block-level span4" placeholder="Penerima" value="<?php echo $detail[0]['penerima_srt'] ?>" name="penerima">
					<label>Perihal</label>
					<input type="text" class="input-block-level span4" placeholder="Perihal" value="<?php echo $detail[0]['perihal'] ?>" name="perihal">
					<label>Alamat</label>
					<textarea name="alamat" class="span4" id="" cols="30" rows="10"  class="input-block-level span4"><?php echo $detail[0]['alamat'] ?></textarea>
					<br>
					<input class="input-block-level btn btn-primary span4" type="submit" value="Ajukan"></input>
				</form>
			</div>
		</div>
	</div>
</div>