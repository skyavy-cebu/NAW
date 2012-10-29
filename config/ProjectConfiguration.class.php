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

	public function setWebDir($webDir) {
		if (isset($_SERVER['HTTP_HOST'])) {
			$host = $_SERVER['HTTP_HOST']; //sfContext::getInstance()->getRequest()->getHost();
			switch ($host) {
				case 'cfi.csm-j.com':
				case 'cfiweb01.csm-j.com':
					sfConfig::add(array(
						'sf_web_dir' => sfConfig::get('sf_root_dir') . '/../../../web/petboard.co.jp',
						'sf_upload_dir' => sfConfig::get('sf_root_dir') . '/../../../web/petboard.co.jp/uploads'
					));
					break;
				case 'petboard.localhost':
					sfConfig::add(array(
						'sf_web_dir' => sfConfig::get('sf_root_dir') . '/../../web/petboard.co.jp',
						'sf_upload_dir' => sfConfig::get('sf_root_dir') . '/../../web/petboard.co.jp/uploads'
					));
					break;
				default:
					parent::setWebDir($webDir);
			}
		}
	}
}
