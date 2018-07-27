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
         <form action="#" id="form_sample_1" class="form-horizontal">
           <fieldset>
             <div class="alert alert-error hide">
               <button class="close" data-dismiss="alert"></button>
               You have some form errors. Please check below.
             </div>
             <div class="alert alert-success hide">
               <button class="close" data-dismiss="alert"></button>
               Your form validation is successful!
             </div>
               <div class="control-group">
                 <label class="control-label">Name<span class="required">*</span></label>
                 <div class="controls">
                   <input type="text" name="name" data-required="1" class="span6 m-wrap"/>
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Email<span class="required">*</span></label>
                 <div class="controls">
                   <input name="email" type="text" class="span6 m-wrap"/>
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Password<span class="required">*</span></label>
                 <div class="controls">
                   <input type="password" name="password" data-required="1" class="span6 m-wrap"/>
                 </div>
               </div>
               <div class="control-group">
                 <label class="control-label">Konfirmasi Password<span class="required">*</span></label>
                 <div class="controls">
                   <input type="password" name="konfirmasi_password" data-required="1" class="span6 m-wrap"/>
                 </div>
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
