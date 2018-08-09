<style media="screen">
	.list{
		list-style-type: none;
		font-size: 20px;
		margin: 10px;
	}
</style>
<div class="span9">
	<div class="row-fluid">
		<div class="block">
			<div class="navbar navbar-inner block-header">
	            <div class="muted pull-left">Data User</div>
	        </div>
			<div class="block-content collapse in" style="padding: 10px">
				<ul class="list">
					<li>Nama :<?php echo $profile[0]['nama_user'] ?></li><br>
					<li>Email :<?php echo $profile[0]['email'] ?></li><br>
					<li>NIP :<?php echo $profile[0]['nip'] ?></li><br>
					<li>Jabatan :<?php echo $profile[0]['jabatan'] ?></li><br>
					<li>Departemen :<?php echo $profile[0]['departemen'] ?></li><br>
					<li><a class="btn btn-default" href="#" id="ubahData">Ubah Data</a> | <a class="btn btn-danger" href="#" id="ubah_pass">Ubah Password</a></li>
				</ul>
			</div>
			</div>
	</div>
</div>


			<div class="modal hide fade" id="modal_pass">
				<div class="modal-header">
					<button type="button" class="close close_pass" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Modal header</h3>
				</div>
				<div class="modal-body">
					<form action="sdad">
						<label>Ubah Password</label>
						<input type="text" name="jabatan" class="input-block-level span12">
						<label>Konfirmasi Ubah Password</label>
						<input type="text" name="departemen" class="input-block-level span12">
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-default close_pass">Close</a>
					<a href="#" class="btn btn-primary">Save changes</a>
				</form>
				</div>
			</div>


		<div class="modal hide fade" id="modal">
		  <div class="modal-header">
		    <button type="button" class="close close_data" data-dismiss="modal" aria-hidden="true">&times;</button>
		    <h3>Modal header</h3>
		  </div>
		  <div class="modal-body">
				<form action="sdad">
					<input type="hidden" name="id" value="<?php echo $profile[0]['id'] ?>">
					<label>Nama</label>
					<input type="text" name="nama_user" class="input-block-level span12"  value="<?php echo $profile[0]['nama_user'] ?>">
					<label>Email</label>
					<input type="email" name="email" class="input-block-level span12"  value="<?php echo $profile[0]['email'] ?>" disabled>
					<label>NIP</label>
					<input type="text" name="nip" class="input-block-level span12"  value="<?php echo $profile[0]['nip'] ?>">
					<label>Jabatan</label>
					<input type="text" name="jabatan" class="input-block-level span12"  value="<?php echo $profile[0]['jabatan'] ?>" disabled>
					<label>Departemen</label>
					<input type="text" name="departemen" class="input-block-level span12"  value="<?php echo $profile[0]['departemen'] ?>" disabled>
		  </div>
		  <div class="modal-footer">
		    <a href="#" class="btn btn-default close_data">Close</a>
		    <a href="#" class="btn btn-primary">Save changes</a>
			</form>
		  </div>
		</div>
