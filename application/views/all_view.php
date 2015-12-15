<div id="content">

 <div class="signup_wrap">
    <?php if(@$this->session->userdata['login'] ==''): ?> 
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

  <input type="submit" id="delete" name = "delete[]" value="delete" />
  <br>
 <?php foreach($album as $name){ ?>
 
 
 <div class="img">
<input type="checkbox" id="checkbox" name="checkbox[]" value="<?php echo $name->album_id; ?>" /> 
 <a  href="<?php echo base_url();?>albums/viewphoto/<?php echo $name->album_id; ?>"/><img src="../image/<?php echo $name->photo; ?>" alt="Album photo" width="110" height="90"></a>
 <div class="desc"><?php echo $name->descr; ?></div>
 <br><br>
</div>
 
  <?php }?>
   
 <?php echo form_close(); ?>
 
 
 
 
 <?php echo form_open_multipart('albums/upload_photo',  array('id' => 'multiple'));?>
 
 <label for="album">Select Album:</label>
 <br>
 
 <select name="select">
    <option>Select Album</option>
    <?php foreach($album as $albums){ ?>
    
    <option value="<?php echo $albums->album_id; ?>"><?php echo $albums->album_name; ?></option>
    <?php }?>  
 </select>
 
  <br><br>
  <label for="photo">Choose Photo:</label>
  <br>
 <input type="file" name="photo" size="20"  multiple />
<br><br>
<input type="submit" name ="add_photo" value="add photo" />

<?php echo form_close(); ?>
 
 
 </div>