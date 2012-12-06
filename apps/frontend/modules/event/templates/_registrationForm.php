<script type="text/javascript">
  $(document).ready(function(){
    getRegisterOtherForm();
  });
  
  function getRegisterOtherForm(){
    count = $('.event_registration_table.box').length;
    if(count > 4){
      return false;
    }
    if(count == 4){
      $('.add_another').hide();
    }
    $.get('/frontend_dev.php/event/registerOtherForm',{id:count},function(form){
      $('.register_others').append(form);
    });
  }
  
  function copyCompany(id){
    var company = $('#event_company').val();
    $('#other_'+id+'_company').val(company);
  }  
  
  function goSubmit(){
    var error = '';
    $('.event_registration_table.box').each(function(index){
      var email = $('#other_'+index+'_email').val();
      var dob = $('#other_'+index+'_dob').val();
      var fname = $('#other_'+index+'_fname').val();
      var lname = $('#other_'+index+'_lname').val();
      if(email){
        if(!is_email(email)){
         error += 'Please enter valid email<br />'; 
        }
        if(fname == ''){
          error += 'Please enter first name<br />'; 
        }
        if(lname == ''){
          error += 'Please enter last name<br />'; 
        }
        if(dob == ''){
          error += 'Please enter date of birth<br />'; 
        }
      }
    });
    if(error != ''){
      $('.display_form_errr').html(error);
      scrollTop();
      return false;
    }
    
}
</script>

<div class="error hide"></div>

<form method="post" name="event_form" class="event_form" action="<?php echo url_for('/event/register/'.$event->getId()) ?>" onsubmit="return goSubmit();">
<div class="display_form_errr">
<?php if ($form->hasErrors()): ?>
  <ul class="shop_list_error">
  <?php foreach($form->getErrorSchema()->getErrors() as $x => $error): ?>
  <li><span>*</span> <?php echo $error; ?></li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php echo $form->renderHiddenFields(); ?>
</div>

<table class="event_registration_table">
<tbody>
  <tr>
    <td>First Name (*)</td>
    <td><?php echo $form['fname']; ?></td>
  </tr>
  <tr>
    <td>Last Name (*)</td>
    <td><?php echo $form['lname']; ?></td>
  </tr>
  <tr>
    <td>Email Address (*)</td>
    <td><?php echo $form['email']; ?></td>
  </tr>
  <tr>
    <td>State</td>
    <td><?php echo $form['state']; ?></td>
  </tr>
  <tr>
    <td>City</td>
    <td><?php echo $form['city']; ?></td>
  </tr>
  <tr>
    <td>Company</td>
    <td><?php echo $form['company']; ?></td>
  </tr>
  <tr>
    <td>Date of Birth (*)</td>
    <td><?php echo $form['dob']; ?></td>
  </tr>
  <tr>
    <td>Industry</td>
    <td><?php echo $form['industry']; ?></td>
  </tr>
  <tr>
    <td>Payment Method (*)</td>
    <td><?php echo $form['payment_method']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody>
</table>

<?php if($sf_context->getUser()->isAuthenticated()): ?>
<strong>Register Others</strong>
<div class="register_others"></div>
<div><input class="add_another" type="button" value="Add Another" onclick="getRegisterOtherForm()"/></div>
<?php endif; ?>

<br /><br />
<div align="center" style="width:600px;">
  <input type="Submit" value="Register"/>
</div>
</form>