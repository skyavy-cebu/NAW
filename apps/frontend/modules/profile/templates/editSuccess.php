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

<div id="content" class="content_dashboard_wrapper">
<h2>Edit Profile</h2>

<?php include_partial('form', array('form' => $form)) ?>
</div>
<?php include_component('home','sidebar',array()); ?>