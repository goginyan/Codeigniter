<div id="content">
  <?php if(@$this->session->userdata['login'] ==''): ?> 
 <div class="signup_wrap">
  
  <div class="signin_form">
    
<?php echo form_open("login/log"); ?>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="" />
  <label for="pass">Password:</label>
  <input type="password" id="pass" name="pass" value="" />
  <input type="submit" class="" value="Sign in" />
  </div>
 </div>
  <?php echo form_close(); ?>
  <?php endif ?>

  <h2><?php echo $msg; ?></h2>
  <?php echo anchor('profile/get_profile', 'Users'); ?>
</div>