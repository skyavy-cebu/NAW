<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('User', 'doctrine');

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $email
 * @property string $pass
 * @property string $fname
 * @property string $lname
 * @property date $dob
 * @property enum $type_id
 * @property integer $app_type
 * @property string $app_id
 * @property string $activation
 * @property timestamp $last_login_at
 * @property enum $active
 * @property Profile $Profile
 * @property Doctrine_Collection $EventAttendee
 * @property Doctrine_Collection $ProfileIndustry
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method string              getEmail()           Returns the current record's "email" value
 * @method string              getPass()            Returns the current record's "pass" value
 * @method string              getFname()           Returns the current record's "fname" value
 * @method string              getLname()           Returns the current record's "lname" value
 * @method date                getDob()             Returns the current record's "dob" value
 * @method enum                getTypeId()          Returns the current record's "type_id" value
 * @method integer             getAppType()         Returns the current record's "app_type" value
 * @method string              getAppId()           Returns the current record's "app_id" value
 * @method string              getActivation()      Returns the current record's "activation" value
 * @method timestamp           getLastLoginAt()     Returns the current record's "last_login_at" value
 * @method enum                getActive()          Returns the current record's "active" value
 * @method Profile             getProfile()         Returns the current record's "Profile" value
 * @method Doctrine_Collection getEventAttendee()   Returns the current record's "EventAttendee" collection
 * @method Doctrine_Collection getProfileIndustry() Returns the current record's "ProfileIndustry" collection
 * @method User                setId()              Sets the current record's "id" value
 * @method User                setEmail()           Sets the current record's "email" value
 * @method User                setPass()            Sets the current record's "pass" value
 * @method User                setFname()           Sets the current record's "fname" value
 * @method User                setLname()           Sets the current record's "lname" value
 * @method User                setDob()             Sets the current record's "dob" value
 * @method User                setTypeId()          Sets the current record's "type_id" value
 * @method User                setAppType()         Sets the current record's "app_type" value
 * @method User                setAppId()           Sets the current record's "app_id" value
 * @method User                setActivation()      Sets the current record's "activation" value
 * @method User                setLastLoginAt()     Sets the current record's "last_login_at" value
 * @method User                setActive()          Sets the current record's "active" value
 * @method User                setProfile()         Sets the current record's "Profile" value
 * @method User                setEventAttendee()   Sets the current record's "EventAttendee" collection
 * @method User                setProfileIndustry() Sets the current record's "ProfileIndustry" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('email', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 150,
             ));
        $this->hasColumn('pass', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 32,
             ));
        $this->hasColumn('fname', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('lname', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('dob', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('type_id', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 0,
              1 => 1,
             ),
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('app_type', 'integer', 1, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('app_id', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('activation', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('last_login_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('active', 'enum', null, array(
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
        $this->hasOne('Profile', array(
             'local' => 'id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('EventAttendee', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('ProfileIndustry', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}