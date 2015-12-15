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
 <?php echo form_close(); ?>
  <?php endif ?>
<br /><br />
<h3>Your file was successfully uploaded!</h3>

<ul>
 
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</div>
</div>
</div>