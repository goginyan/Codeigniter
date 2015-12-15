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
 <div class="horizontal">
   <ul>
   <li><?php echo anchor('albums/all', 'ALL'); ?></li>
   <li><?php echo anchor('albums/addalb', 'CREATE ALBUM'); ?></li>
   <li><?php echo anchor('albums/addphoto', 'UPLOAD PHOTO'); ?></li>
    </ul>
</div>
 <h3><?php echo @$mess ;?></h3>
 <br>
  <?php echo form_open_multipart('albums/upload_photo',  array('id' => 'multiple_upload_form'));?>
 <br>
 
  <label for="photo">Choose Photo:</label>
  <br>
 <input type="file" name="photo" size="20"  multiple />
<br><br>
<input type="submit" name ="add_pic" value="add photo" />

<?php echo form_close(); ?>

</div>