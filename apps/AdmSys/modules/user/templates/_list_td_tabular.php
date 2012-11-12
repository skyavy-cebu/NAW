<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($profile->getCreatedAt()) ? format_date($profile->getCreatedAt(), "MM/dd/yyyy") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $profile->getTitle() ?>
	<?php echo $user['fname'] ?>
	<?php echo $user['lname'] ?>
</td>
<td class="sf_admin_text sf_admin_list_td_company">
  <?php echo $user['email'] ?>
</td>
<td class="sf_admin_text sf_admin_list_td_city_id">
  <?php
	$city = CityTable::getInstance()->findOneBy('id', $profile->getCityId());
	echo $city['name']; ?>
</td>
<td class="sf_admin_text sf_admin_list_td_company">
  <?php echo $profile->getCompany() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
	<?php echo $user['dob'] ?>
</td>
<td class="sf_admin_text sf_admin_list_td_attended">
  <?php echo 'attended' ?>
</td>