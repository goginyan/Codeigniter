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
  
  <h2>Reset Password</h2>
<?php echo form_open("login/reset_password"); ?>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" />
  <br>
  <input type="submit" name="submit" value="Reset My Password" />
  <?php echo form_close(); ?>
  
  <?php echo validation_errors('<span class="error">', '</span>');
       
      if(isset($error)){
        
        echo '<p class="error">'. $error.'</p>';
        
      }
  
  ?>
</div>