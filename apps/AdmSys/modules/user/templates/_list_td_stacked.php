<td colspan="15">
  <?php echo __('%%id%% - %%title%% - %%company%% - %%state_id%% - %%city_id%% - %%address%% - %%ido%% - %%to_meet%% - %%image_full%% - %%image_small%% - %%linkedin_url%% - %%fb_url%% - %%twitter_url%% - %%created_at%% - %%updated_at%%', array('%%id%%' => link_to($profile->getId(), 'profile_edit', $profile), '%%title%%' => $profile->getTitle(), '%%company%%' => $profile->getCompany(), '%%state_id%%' => $profile->getStateId(), '%%city_id%%' => $profile->getCityId(), '%%address%%' => $profile->getAddress(), '%%ido%%' => $profile->getIdo(), '%%to_meet%%' => $profile->getToMeet(), '%%image_full%%' => $profile->getImageFull(), '%%image_small%%' => $profile->getImageSmall(), '%%linkedin_url%%' => $profile->getLinkedinUrl(), '%%fb_url%%' => $profile->getFbUrl(), '%%twitter_url%%' => $profile->getTwitterUrl(), '%%created_at%%' => false !== strtotime($profile->getCreatedAt()) ? format_date($profile->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($profile->getUpdatedAt()) ? format_date($profile->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
