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
   <div class="container">
  
    <h2>Inbox</h2>
<table class="table table-hover table-bordered sectionTable">
    <tr class="danger">
        <th>FROM:</th>
        <th>Subject</th>
        <th>Message</th>
    </tr>
  
    
      <?php foreach($message as $msg){ ?>
   
    <tr>
        <td><?php echo @$msg->login; ?></td>
        <td><?php echo @$msg->subject; ?> </td> 
        <td><?php echo @$msg->message; ?>
    </tr>
  <?php }?>
</table>
   </div>