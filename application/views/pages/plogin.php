<div class="container">

      <form class="form-signin" action="<?php echo base_url(); ?>login/auth" method="POST">
        <h2 class="form-signin-heading" style="text-align: center;">Login</h2>
        <input type="email" class="input-block-level" placeholder="Email" name="email">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Simpan sesi
        </label>
        <button class="btn btn-block btn-primary" type="submit">Login</button>
      </form>

    </div>