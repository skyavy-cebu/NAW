<script type="text/javascript">
  $(document).ready(function(){
    var d = new Date();
    var year = d.getFullYear();
    var startYear = d.getFullYear()-80;
    $('.dob').datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1967:"+year
    }).prop('readonly',true);
  });
</script>

<table id="ROF<?php echo $id; ?>" class="event_registration_table box">
<tbody>
  <tr>
    <td colspan="2">
      <label><input type="checkbox" onclick="copyCompany(<?php echo $id; ?>)"/> Check box if person is from your company</label>
    </td>
  </tr>
  <tr>
    <td>First Name (*)</td>
    <td><input id="other_<?php echo $id; ?>_fname" type="text" name="other[<?php echo $id; ?>][fname]"/></td>
  </tr>
  <tr>
    <td>Last Name (*)</td>
    <td><input id="other_<?php echo $id; ?>_lname" type="text" name="other[<?php echo $id; ?>][lname]"/></td>
  </tr>
  <tr>
    <td>Email Address (*)</td>
    <td><input id="other_<?php echo $id; ?>_email" type="text" name="other[<?php echo $id; ?>][email]"/></td>
  </tr>
  <tr>
    <td>State</td>
    <td><select class="state" id="other_<?php echo $id; ?>_state" name="other[<?php echo $id; ?>][state]" onchange="getCityOption('#other_<?php echo $id; ?>_state','#other_<?php echo $id; ?>_city')">
    <?php echo getStateOption(); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>City</td>
    <td><select id="other_<?php echo $id; ?>_city" name="other[<?php echo $id; ?>][city]">
    <?php echo getCityOption(); ?>
    </select></td>
  </tr>
  <tr>
    <td>Company</td>
    <td>
      <input type="text" id="other_<?php echo $id; ?>_company" name="other[<?php echo $id; ?>][company]"/>
    </td>
  </tr>
  <tr>
    <td>Date of Birth (*)</td>
    <td><input id="other_<?php echo $id; ?>_dob" type="text" name="other[<?php echo $id; ?>][dob]" class="dob"/></td>
  </tr>
</tbody>
</table>