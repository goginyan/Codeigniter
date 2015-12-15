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
  
  <h2> We send message to <?php echo $email; ?> address </h2>
  <?php foreach($accessToken as $key) { ?>
 
  <h4><?php echo anchor('login/reset_password_form/'. $key->accessToken,'link'); ?></h4>
<?php } ?>
</div>