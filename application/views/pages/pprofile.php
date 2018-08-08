<div class="span9">
	<div class="row-fluid">
		<div class="block">
			<div class="navbar navbar-inner block-header">
	            <div class="muted pull-left">Data User</div>
	        </div>
			<div class="block-content collapse in" style="padding: 10px">
				<form action="sdad">
					<?php
        		foreach($data->result_array() as $i):
            $id=$i['id'];
            $nama_user=$i['nama_user'];
            $email=$i['e-mail'];
            $password=$i['password'];
					endforeach;
					?>
					<input type="hidden" name="id" value="$id">
					<label>Nama</label>
					<input type="text" class="input-block-level span4" placeholder="Nama" value="$nama_user">
					<label>Email</label>
					<input type="email" class="input-block-level span4" placeholder="Email" value="$email">
					<label>Password	</label>
					<input type="password" class="input-block-level span4" placeholder="Password" value="$password">
					<button class="btn btn-primary" type="submit">Update</button>
			`	</form>
			</div>
			</div>

	</div>
</div>
