 <script>
    function myFunction(objButton) {
       
        document.getElementById("to").value=objButton.value;
        
}

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
  </div>
 </div>
 <?php echo form_close(); ?>
  <?php endif ?>
   <div class="container">
  
    <h2>Users Data</h2>
<table class="table table-hover table-bordered sectionTable">
    <tr class="danger">
        <th>Profile Image</th>
        <th>First Name</th>
        <th>Last Name</th> 
        <th>Send Mail</th>
    </tr>
  
    
      <?php foreach($prof as $profile){ ?>
   
    <tr>
        <td>
            <img src='<?php echo base_url();?>/image/<?php echo $profile->img; ?>' title='profile' style='cursor:pointer;margin-right: 3px; width: 50px; height: 50px;'>
        </td>
        <td><?php echo $profile->first_name; ?> </td> 
        <td><?php echo $profile->last_name; ?>
      
        </td>
        <td>
     <button type="button"  onclick="myFunction(this)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"  value="<?php echo $profile->id; ?>">
      Send Email  </button>
    
        </td>
 
    </tr>
  <?php }?>
  <!-- Modal -->
     
       <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Mail</h4>
        </div>
        <div class="modal-body">
   
           
           <div class="form-group">
             <?php echo form_open("profile/send_msg"); ?>
           
           <input type="hidden" class="form-control" name="to" id="to" value="" required>
           <input type="hidden" class="form-control" name="from" value="<?php echo $this->session->userdata('user_id'); ?>">
  
      </div>
      <div class="form-group">
         <label for="subject">Subject:</label>
        <input type="text" class="form-control" name="subject"  value="" required>
      </div>
      <div class="form-group">
         <label for="subject">Message:</label>
         <textarea rows="4" cols="50"  class="form-control"  name="message"></textarea>
      </div>
       <div class="form-group">
        <input type="submit" class="btn btn-info btn-sm" value="Submit" name ="subuser" >
        <?php echo form_close(); ?> 
       </div>
         
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    
    </div>
  </div>
   
</div>

</table>
 <h4><?php echo anchor('upload', 'View Profile'); ?></h4>
 <h4><?php echo anchor('user/logout', 'Logout'); ?></h4>
</div>
