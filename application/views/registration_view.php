<div id="content">
<div class="signup_wrap">
<div class="signin_form">
 <?php echo form_open("login/log"); ?>
  <label for="email">Login/Email:</label>
  <input type="text" id="email" name="email" value="" required />
  <label for="password">Password:</label>
  <input type="password" id="pass" name="pass" value="" required />
  <input type="submit" class="sign" value="Sign in" />
  <?php echo anchor('login/reset_password', 'Forgot Password?'); ?>
 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
</div><!--<div class="signup_wrap">-->
<div class="reg_form">
<div class="form_title">Sign Up</div>
 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("login/registration"); ?>
  <p>
  <label for="first_name">First Name:</label>
  <input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" />
  </p>

  <p>
  <label for="last_name">Last Name:</label>
  <input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" />
  </p>

  <p>
  <label for="user_name">Login:</label>
  <input type="text" id="login" name="login" value="<?php echo set_value('login'); ?>" />
  </p>
  <p>
  <label for="email_address">Your Email:</label>
  <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" />
  </p>
  <p>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
  </p>
  <p>
  <label for="con_password">Confirm Password:</label>
  <input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" />
  </p>
  <p>
  <input type="submit" class="greenButton" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->

