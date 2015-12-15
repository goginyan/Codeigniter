
<div class="content">
    <?php if(@$this->session->userdata['login'] ==''): ?>
  <div class="signup_wrap">
<div class="signin_form">
 <?php echo form_open("login/log"); ?>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="" />
  <label for="pass">Password:</label>
  <input type="password" id="pass" name="pass" value="" />
  <input type="submit" class="" value="Sign in" />
 <?php echo form_close(); ?>
   <?php endif ?>
</div><!--<div class="signin_form">-->
</div><!--<div class="signup_wrap">-->

  <h2>Welcome <?php echo $this->session->userdata('login'); ?>!</h2>
  <p>This section represents the area that only logged in members can access.</p>
  <h4><?php echo anchor('user/logout', 'Logout'); ?></h4>
</div><!--<div class="content">-->
