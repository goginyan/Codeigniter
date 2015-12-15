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
  
  <h2>Update Your Password</h2>

<?php echo form_open("login/update_password"); ?>
 <label for="password">New Password</label>
 <br>
 <input type="hidden" name="key" value="<?php echo $key; ?>" />
  <input type="password" name="password" value="" />
  <br>
   <label for="password_conf">New Password Again</label>
   <br>
   <input type="password" name="password_conf" value="" />
   <br>
  <input type="submit" name="submit" value="Update My Password" />
  
  <?php echo form_close(); ?>
  
  <?php echo validation_errors('<span class="error">', '</span>');
       
      if(isset($error)){
        
        echo '<p class="error">'. $error.'</p>';
        
      }
  
  ?>
</div>