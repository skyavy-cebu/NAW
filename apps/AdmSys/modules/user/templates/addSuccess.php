<script>
  $(document).ready(function(){
    $('#profile_state_id').change(function(){
      var state_id = $(this).val();
      $.get('/profile/ajax/city/'+state_id,function(data){
        $('#profile_city_id').html(data);
      });
    });
  });
</script>

<div id="sf_admin_content">
  <h2>Add User</h2>
 
<form method="post" name="user_form" class="user_form" enctype="multipart/form-data" action="<?php echo url_for('/AdmSys_dev.php/user/add') ?>">
<div class="display_form_errr">
<?php if ($form->hasErrors()): ?>
  <ul class="shop_list_error">
  <?php foreach($form->getErrorSchema()->getErrors() as $error): ?>
  <li><span>*</span> <?php echo $error; ?></li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php echo $form->renderHiddenFields(); ?>
</div>

<table style="width:600px;">
<tbody>
  <tr>
    <td>Name</td>
    <td><?php echo $form['fname']; ?> &nbsp; <?php echo $form['lname']; ?></td>
  </tr>
  <tr>
    <td>Title</td>
    <td><?php echo $form['title']; ?></td>
  </tr>
  <tr>
    <td>Company</td>
    <td><?php echo $form['company']; ?></td>
  </tr>
  <tr>
    <td>State</td>
    <td><?php echo $form['state_id']; ?></td>
  </tr>
  <tr>
    <td>City</td>
    <td><?php echo $form['city_id']; ?></td>
  </tr>
  <tr>
    <td>My Industry</td>
    <td>
      <?php echo $form['my_industry1']; ?> <br />
      <?php echo $form['my_industry2']; ?>
    </td>
  </tr>
  <tr>
    <td>What I do</td>
    <td><?php echo $form['ido']; ?></td>
  </tr>
  <tr>
    <td>Industry I want to meet</td>
    <td> 
      <?php echo $form['industries_meet1']; ?> <br />
      <?php echo $form['industries_meet2']; ?> <br />
      <?php echo $form['industries_meet3']; ?> <br />
      <?php echo $form['industries_meet4']; ?> <br />
    </td>
  </tr>
  <tr>
    <td>Who I want to meet</td>
    <td><?php echo $form['to_meet']; ?></td>
  </tr>
  <tr>
    <td>Upload Profile Photo</td>
    <td><input type="file" class="profile_photo" name="profile[photo]"></td>
  </tr>
  <tr>
    <td>Linked In Profile URL</td>
    <td><?php echo $form['linkedin_url']; ?></td>
  </tr>
  <tr>
    <td>Facebook Profile URL</td>
    <td><?php echo $form['fb_url']; ?></td>
  </tr>
  <tr>
    <td>Twitter Profile URL</td>
    <td><?php echo $form['twitter_url']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> 
  <tr>
    <td>New Login Email</td>
    <td><?php echo $form['email1']; ?></td>
  </tr>  
  <tr>
    <td>Email Confirm</td>
    <td><?php echo $form['email2']; ?></td>
  </tr>  
  <tr>
    <td>Password</td>
    <td><?php echo $form['pass1']; ?></td>
  </tr>
  <tr>
    <td>Password Confirm</td>
    <td><?php echo $form['pass2']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="Submit" value="Submit"/></td>
  </tr>
</tbody>
</table>
 
<br /><br />
 
  <br />
  <div><a href="<?php echo url_for('/AdmSys.php/user'); ?>">Back to User List</a></div>
  <br />
</div>