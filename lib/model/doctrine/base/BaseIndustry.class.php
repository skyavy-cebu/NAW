<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Industry', 'doctrine');

/**
 * BaseIndustry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $EventAttendee
 * @property Doctrine_Collection $ProfileIndustry
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method string              getName()            Returns the current record's "name" value
 * @method Doctrine_Collection getEventAttendee()   Returns the current record's "EventAttendee" collection
 * @method Doctrine_Collection getProfileIndustry() Returns the current record's "ProfileIndustry" collection
 * @method Industry            setId()              Sets the current record's "id" value
 * @method Industry            setName()            Sets the current record's "name" value
 * @method Industry            setEventAttendee()   Sets the current record's "EventAttendee" collection
 * @method Industry            setProfileIndustry() Sets the current record's "ProfileIndustry" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIndustry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('industry');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('EventAttendee', array(
             'local' => 'id',
             'foreign' => 'industry_id'));

        $this->hasMany('ProfileIndustry', array(
             'local' => 'id',
             'foreign' => 'industry_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}