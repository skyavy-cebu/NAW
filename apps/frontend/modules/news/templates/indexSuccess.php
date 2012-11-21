<div id="content" class="content_dashboard_wrapper news">

  <h2 class="text_gray upcoming_events_margin text_museosans500">NEWS</h2>
  <?php if($newsList): ?>
  <ul class="per_block_ul_separator">
    <?php foreach($newsList as $x => $news): ?>
    <li>
      <div class="calendar_date">
        <div class="calendar_month_shortened"><?php echo date('M',strtotime($news->getPostDate())) ?></div>
        <div class="calendar_day"><h1><?php echo date('d',strtotime($news->getPostDate())) ?></h1></div>
      </div>
      <div class="event_info">
        <ul>
          <li class="event_name"><a href="<?php echo url_for('news/'.$news->getId()); ?>"><?php echo $news->getTitle(); ?></a></li>
          <li class="event_date_time"><?php echo date('m/d/Y h:i a',strtotime($news->getPostDate())); ?></li>
        </ul>
      </div>
      <div class="clear"></div>
      <div class="event_info_3">
        <div class="event_long_description">
          <?php echo $news->getRawValue()->getContent(); ?><br />
          <a href="<?php echo url_for('news/'.$news->getId()); ?>" alt="" class="text_dark_blue">View More</a>
        </div>
       </div>
        <div class="clear"></div>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
  
</div>
<?php include_component('home','sidebar'); ?>