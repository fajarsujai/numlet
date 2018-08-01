<div class="container">
  <!-- validation -->
    <div class="row-fluid">
      <!-- block -->
            <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Pendaftaran</div>
            </div>
        <div class="block-content collapse in">
         <div class="span12">
         <!-- BEGIN FORM-->
         <form action="<?php echo base_url(); ?>Register/registration" id="form_sample_1" class="form-vertical"  method="post">
           <fieldset>
               <div class="control-group">
                 <label class="control-label">Name<span class="required">*</span></label>
                 <div class="controls">
                   <input type="text" name="nama_user" data-required="1" class="span6 m-wrap"/>
                   <span style="color:red;"><?php echo form_error('nama_user'); ?></span>
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Email<span class="required">*</span></label>
                 <div class="controls">
                   <input name="email" type="text" class="span6 m-wrap"/>
                   <span class="text-danger" style="color:red;"><?php echo form_error('email'); ?></span>
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Password<span class="required">*</span></label>
                 <div class="controls">
                   <input type="password" name="password"  class="span6 m-wrap"/>
                   <span class="text-danger" style="color:red;"><?php echo form_error('password'); ?></span>
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Konfirmasi Password<span class="required">*</span></label>
                 <div class="controls">
                   <input type="password" name="konfirmasi_password" class="span6 m-wrap"/>
                   <span class="text-danger" style="color:red;"><?php echo form_error('konfirmasi_password'); ?></span>
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">NIP<span class="required">*</span></label>
                 <div class="controls">
                   <input type="number" name="nip" data-required="1" class="span6 m-wrap"/>
                   <span style="color:red;"><?php echo form_error('nip'); ?></span>
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Departemen<span class="required">*</span></label>
                 <select name="departemen"  required data-required="1" class="span6 m-wrap">
                   <option disabled selected>Pilih</option>
                   <option value="bagian_umum">Bagian Umum</option>
                  <option value="kemahasiswaan">Kemahasiswaan</option>
                  <option value="keuangan">Kuangan</option>
                  <option value="upt_tik">UPT TIK</option>
                  <option value="upt_bahasa">UPT Bahasa</option>
                </select>
               </div>
               <div class="control-group">
                 <label class="control-label">Jabatan<span class="required">*</span></label>
                 <select name="jabatan" required data-required="1" class="span6 m-wrap">
                   <option disabled selected>Pilih</option>
                  <option value="kepala">Kepala Departemen</option>
                  <option value="staff">Staff Departemen</option>
                </select>
               </div>
                 <button type="submit" class="btn btn-primary">Daftar</button>
                 <button type="button" class="btn">Batal</button>
           </fieldset>
         </form>
         <!-- END FORM-->
       </div>
      </div>
    </div>
    <!-- /block -->
  </div>
       <!-- /validation -->
</div>
