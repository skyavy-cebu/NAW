<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('City', 'doctrine');

/**
 * BaseCity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $state_id
 * @property string $name
 * @property State $State
 * @property Doctrine_Collection $Profile
 * @property Doctrine_Collection $Event
 * 
 * @method integer             getId()       Returns the current record's "id" value
 * @method integer             getStateId()  Returns the current record's "state_id" value
 * @method string              getName()     Returns the current record's "name" value
 * @method State               getState()    Returns the current record's "State" value
 * @method Doctrine_Collection getProfile()  Returns the current record's "Profile" collection
 * @method Doctrine_Collection getEvent()    Returns the current record's "Event" collection
 * @method City                setId()       Sets the current record's "id" value
 * @method City                setStateId()  Sets the current record's "state_id" value
 * @method City                setName()     Sets the current record's "name" value
 * @method City                setState()    Sets the current record's "State" value
 * @method City                setProfile()  Sets the current record's "Profile" collection
 * @method City                setEvent()    Sets the current record's "Event" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCity extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('city');
        $this->hasColumn('id', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 2,
             ));
        $this->hasColumn('state_id', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => 0,
             'length' => 2,
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
        $this->hasOne('State', array(
             'local' => 'state_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Profile', array(
             'local' => 'id',
             'foreign' => 'city_id'));

        $this->hasMany('Event', array(
             'local' => 'id',
             'foreign' => 'city_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}