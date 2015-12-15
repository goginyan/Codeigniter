<div id="content">
<div class="signup_wrap">
<div class="signin_form">
 <?php echo form_open("login/log"); ?>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="" />
  <label for="pass">Password:</label>
  <input type="password" id="pass" name="pass" value="" />
  <input type="submit" class="" value="Sign in" />
 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
</div><!--<div class="signup_wrap">-->
<h1>Thank You for join Us!</h1>
<h3>Now you can visit  home page!</h3>

<h4><?php echo anchor('user/welcome', 'Welcome'); ?></h4>
</div><!--<div id="content">-->
