<?php
require_once dirname(__FILE__).'/../../SF/symfony/lib/autoload/sfCoreAutoload.class.php';

sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $plugins = array(
      'sfDoctrinePlugin',
      'sfThumbnailPlugin'
    );
    $this->enablePlugins($plugins);
  }
}
