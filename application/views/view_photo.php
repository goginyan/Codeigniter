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
 <?php echo @$error;?>
 <?php echo form_open("albums/delete"); ?>
 
  <input type="submit" id="delete" name = "deletephoto[]" value="delete photo" />
  <br>

 
 <?php foreach($photos as $photo){ ?>
 <div class="img">
  <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />
 <input type="checkbox" id="checkbox" name="check[]" value="<?php echo @$photo->image_id; ?>" /> 
 <a><img src="<?php echo base_url();?>/image/<?php echo @$photo->url; ?>" alt="Album photo" width="110" height="90"></a>
</div>
  <?php }?> 
 <?php echo form_close(); ?>
 
 
 
 <?php echo form_open_multipart('albums/upload_photo/'.$photo->album_id);?>
 <br><br>
 
  <label for="photo">Choose Photo:</label>
  <br>
 <input type="file" name="images[]"  multiple  />
<br><br>
<input type="submit" name ="add_pic" value="add photo" />

<?php echo form_close(); ?>

 
</div>