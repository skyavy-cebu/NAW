<script>
  $(document).ready(function(){
    $('#news_post_date').prop('readonly',true);
    CKEDITOR.replace('news_content');
    $('#news_post_date').datetimepicker({
      timeFormat: "hh:mmtt"
    });
  });
</script>

<style>
  #news_title{
    width:500px;
  }
  
  #news_post_date{
    width:120px;
  }
</style>

<div id="sf_admin_content">
<h2>Add News</h2><br />

<form method="post" name="loc_form" class="loc_form" action="<?php echo url_for('/AdmSys_dev.php/news/add') ?>">
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

<table>
<tbody>
  <tr>
    <td>Post Date</td>
    <td><?php echo $form['post_date']; ?><img src="/images/calendar.png" /></td>
  </tr>
  <tr>
    <td>Title</td>
    <td><?php echo $form['title']; ?></td>
  </tr>
  <tr>
    <td>Body</td>
    <td><?php echo $form['content']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="Submit" value="Submit"/></td>
  </tr>
</tbody>
</table>

</form>

<br />
<a href="<?php echo url_for('/AdmSys.php/news'); ?>">Back to Location</a>
</div>