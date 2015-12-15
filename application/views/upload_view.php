<!--
<script>
$(document).ready(function(){
	$('#images').on('change',function(){
		$('#multiple_upload_form').ajaxForm({
           
           	error:function(e){
			}
		}).submit();
	});
}); -->

</script>
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
   <br /><br />

   <?php echo @$error;?>
  <?php endif ?>
   
<?php
   if(($this->session->userdata('login')!="")) {
		echo "<span id='pic'>Welcome ".$this->session->userdata('login')."</span>";
	    echo "<p style='text-align: center;' id='img'><img src='./image/".@$prof. "'width='150' height='170' /></p>";
   } else {
		echo "<span id='pic'>You can upload your profile image after 'sign in'</span>";
	    echo "<p style='text-align: center;' id='img'><img src='./image/profil.jpg' width='150' height='170' /></p>";
   }
?>


<?php echo form_open_multipart('upload/do_upload',  array('id' => 'multiple_upload_form'));?>
<!--<input type="hidden" name="image_form_submit" value="1"/>-->
<div id="inp">
<input type="file" name="images" size="20" id="images" multiple />
<br>
<input type="submit" value="upload" id="sub" /> 
</div>
 <?php echo form_close(); ?>
 
 <h4><?php echo anchor('user/logout', 'Logout'); ?></h4>
 
 <h4><?php echo anchor('albums/all', 'Create Photo Album'); ?></h4>
  <h4><?php echo anchor('profile/get_smsg', 'View Send Messsage'); ?></h4>
    <h4><?php echo anchor('profile/get_inbox_msg', 'View Inbox'); ?></h4>
  <h4><?php echo anchor('profile/get_profile', 'View Profile'); ?></h4>

   </div>
  </div>
</div>