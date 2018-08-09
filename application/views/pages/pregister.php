<div class="container">

  <form action="<?php echo base_url(); ?>Register/registration" id="form_sample_1" class="form-signin"  method="post">
      <h2 class="form-signin-heading" style="text-align: center;">Daftar</h2>
        <input type="hidden" name="level" value="0">
        <div class="control-group">
          <label class="control-label">Name<span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="nama_user" data-required="1" class="span3 m-wrap"/>
            <span style="color:red;"><?php echo form_error('nama_user'); ?></span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Email<span class="required">*</span></label>
          <div class="controls">
            <input name="email" type="text" class="span3 m-wrap"/>
            <span class="text-danger" style="color:red;"><?php echo form_error('email'); ?></span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Password<span class="required">*</span></label>
          <div class="controls">
            <input type="password" name="password"  class="span3 m-wrap"/>
            <span class="text-danger" style="color:red;"><?php echo form_error('password'); ?></span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Konfirmasi Password<span class="required">*</span></label>
          <div class="controls">
            <input type="password" name="konfirmasi_password" class="span3 m-wrap"/>
            <span class="text-danger" style="color:red;"><?php echo form_error('konfirmasi_password'); ?></span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">NIP<span class="required">*</span></label>
          <div class="controls">
            <input type="number" name="nip" data-required="1" class="span3 m-wrap"/>
            <span style="color:red;"><?php echo form_error('nip'); ?></span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Departemen<span class="required">*</span></label>
          <select name="departemen"  required data-required="1" class="span3 m-wrap">
            <option disabled selected>Pilih</option>
            <option value="Bagian Umum">Bagian Umum</option>
           <option value="Kemahasiswaan">Kemahasiswaan</option>
           <option value="Keuangan">Kuangan</option>
           <option value="UPT TIK">UPT TIK</option>
           <option value="UPT Bahasa">UPT Bahasa</option>
         </select>
        </div>
        <div class="control-group">
          <label class="control-label">Jabatan<span class="required">*</span></label>
          <select name="jabatan" required data-required="1" class="span3 m-wrap">
            <option disabled selected>Pilih</option>
           <option value="kepala">Kepala Departemen</option>
           <option value="staff">Staff Departemen</option>
         </select>
        </div>
          <button type="submit" class="btn btn-primary">Daftar</button>
          <button type="button" class="btn">Batal</button>
  </form>
    </div>
