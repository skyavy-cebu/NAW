<script>
  $(document).ready(function(){
    $('#profile_state_id').change(function(){
      var state_id = $(this).val();
      $.get('/profile/ajax/city/'+state_id,function(data){
        $('#profile_city_id').html(data);
      });
    });
    
    $('.profile_pic_form').ajaxForm({
      dataType:'json',
      success: profile_pic_success
    });
    
     $('.profile_pic_form .profile_photo').change(function(){
      $('.profile_pic_form .submit').prop('disabled',false);
    });
    
    function profile_pic_success(data){
      $('.profile_pic a').attr('attr',data.image_full);
      $('.profile_pic img').attr('src','/uploads/user/'+data.image_full);
      $('.profile_pic_form .profile_photo').val('');
      $('.profile_pic_form .submit').prop('disabled',true);
    }
    
    if('<?php echo $focus; ?>' == 'user'){
      $("html, body").animate({ scrollTop: 900 }, 'slow');
    }
  });
</script>

<div id="content" class="content_dashboard_wrapper">

<h2>Change Photo</h2>

<?php $image_full = $profile->getImageFull(); ?>
<?php if($image_full): ?>
<span class="profile_pic">
  <img class="profile_pic" src="/uploads/user/<?php echo $image_full; ?>"></span>
<?php else: ?>
<span class="profile_pic">
  <img src="/images/default.png"></span>
<?php endif; ?>

<form name="profile_pic_form" class="profile_pic_form" method="post" enctype="multipart/form-data" action="<?php echo url_for('profile/uploadPic'); ?>">
  <input type="file" class="profile_photo" name="profile[photo]">
  <input type="submit" class="submit" value="Upload" disabled="disabled"/>
</form>

<br /><br />

<h2>Edit Profile</h2>

<?php include_partial('form', array('form' => $form)) ?>

<br /><br />
<h2>Edit Account Settings</h2>
<form method="post" name="user_form" class="user_form" action="<?php echo url_for('profile/edit') ?>">
<div class="display_form_errr">
<?php if ($form2->hasErrors()): ?>
  <ul class="shop_list_error">
  <?php foreach($form2->getErrorSchema()->getErrors() as $error): ?>
  <li><span>*</span> <?php echo $error; ?></li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php echo $form2->renderHiddenFields(); ?>
</div>

<table>
<tbody>
  <tr>
    <td>Email</td>
    <td><?php echo $form2['email1']; ?></td>
  </tr>
  <tr>
    <td>Email Confirm</td>
    <td><?php echo $form2['email2']; ?></td>
  </tr>
  <tr>
    <td>Current Password</td>
    <td><?php echo $form2['pass1']; ?></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td><?php echo $form2['pass2']; ?></td>
  </tr>
  <tr>
    <td>Re-Enter Password</td>
    <td><?php echo $form2['pass3']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="submit-form" type="submit" value="Save"/></td>
  </tr>
</tbody>
</table>

</form>

</div>
<?php include_component('home','sidebar'); ?>