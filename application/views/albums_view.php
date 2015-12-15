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
   <li> <?php echo anchor('albums/all', 'ALL'); ?> </li>
   <li><?php echo anchor('albums/addalb', 'CREATE ALBUM'); ?></li>
   <li><?php echo anchor('albums/addphoto', 'UPLOAD PHOTO'); ?></li>
    </ul>
</div>

 <?php echo form_open_multipart('albums/upload_photo',  array('id' => 'multiple_upload_form'));?>
 <br><br>
 <label for="album">Album Name:</label>
  <br>
 <input type="text" name="album" size="20" id="album" placeholder="input album name" multiple />
 <br><br>
 <label for="descr">Album Description:</label>
 <br>
  <textarea name="descr" >Enter text here...</textarea><!--<div class="signin_form">-->
  <br>
  <label for="photo">Choose a Photo:</label>
 <br>
 <input type="file" name="photo" size="20"  multiple />
<br><br>
<input type="submit" name ="add_album" value="add album" />

<?php echo form_close(); ?>

 <br><br>
</div>
