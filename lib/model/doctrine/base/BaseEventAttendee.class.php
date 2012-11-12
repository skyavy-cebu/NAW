<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('EventAttendee', 'doctrine');

/**
 * BaseEventAttendee
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $event_id
 * @property integer $user_id
 * @property integer $industry_id
 * @property enum $paid
 * @property Event $Event
 * @property Industry $Industry
 * @property User $User
 * 
 * @method integer       getId()          Returns the current record's "id" value
 * @method integer       getEventId()     Returns the current record's "event_id" value
 * @method integer       getUserId()      Returns the current record's "user_id" value
 * @method integer       getIndustryId()  Returns the current record's "industry_id" value
 * @method enum          getPaid()        Returns the current record's "paid" value
 * @method Event         getEvent()       Returns the current record's "Event" value
 * @method Industry      getIndustry()    Returns the current record's "Industry" value
 * @method User          getUser()        Returns the current record's "User" value
 * @method EventAttendee setId()          Sets the current record's "id" value
 * @method EventAttendee setEventId()     Sets the current record's "event_id" value
 * @method EventAttendee setUserId()      Sets the current record's "user_id" value
 * @method EventAttendee setIndustryId()  Sets the current record's "industry_id" value
 * @method EventAttendee setPaid()        Sets the current record's "paid" value
 * @method EventAttendee setEvent()       Sets the current record's "Event" value
 * @method EventAttendee setIndustry()    Sets the current record's "Industry" value
 * @method EventAttendee setUser()        Sets the current record's "User" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEventAttendee extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('event_attendee');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('event_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => 0,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => 0,
             'length' => 4,
             ));
        $this->hasColumn('industry_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => 0,
             'length' => 4,
             ));
        $this->hasColumn('paid', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 0,
              1 => 1,
             ),
             'notnull' => true,
             'default' => 0,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Event', array(
             'local' => 'event_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Industry', array(
             'local' => 'industry_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}