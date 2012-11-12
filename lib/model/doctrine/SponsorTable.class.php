<?php

/**
 * SponsorTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SponsorTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object SponsorTable
     */
    public static function getInstance(){
        return Doctrine_Core::getTable('Sponsor');
    }
    
    public static function getSponsor(){
      $q = Doctrine_Query::create()
        ->from('Sponsor s')
        ->orderBy('s.position ASC');
        return $q->execute();
    }
    
}