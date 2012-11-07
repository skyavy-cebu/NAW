<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($user->getCreatedAt()) ? format_date($user->getCreatedAt(), "MM/dd/yyyy") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $user->getFname() ?>
  <?php echo $user->getLname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $user->getEmail() ?>
</td>

<td class="sf_admin_text sf_admin_list_td_city">
 <?php $city = CityTable::getInstance()->findOneBy('id', trim($profile['city_id']));
				echo $city['name'];
			//	echo $profile['city_id'] ?>
</td>
<td class="sf_admin_text sf_admin_list_td_company">
  <?php echo $profile['company'] ?>
</td>
<td class="sf_admin_date sf_admin_list_td_dob">
  <?php echo false !== strtotime($user->getDob()) ? format_date($user->getDob(), "MM/dd/yyyy") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_attended">
  <?php echo 'attended' ?>
</td>