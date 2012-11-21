<?php

class AdmSysConfiguration extends sfApplicationConfiguration
{
  public function configure(){
    sfProjectConfiguration::getActive()->loadHelpers(array('Mix'));
  }
}
