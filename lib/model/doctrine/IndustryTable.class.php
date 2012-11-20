<?php

/**
 * IndustryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class IndustryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object IndustryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Industry');
    }
    
    public function getIndustryList($param=array()){
      $q = Doctrine_Query::create()
        ->from('Industry c');
      
      $pager = new sfDoctrinePager('Industry', 10);
      $pager->setQuery($q);
      $pager->setPage($param['curPage']);
      $pager->init();
      return $pager;
    }
		
		public function getAllIndustry(){
      $q = Doctrine_Query::create()
        ->from('Industry');
      $fetch = $q->fetchArray(array(),Doctrine::HYDRATE_ARRAY);
      return array_merge($fetch);
    }
}