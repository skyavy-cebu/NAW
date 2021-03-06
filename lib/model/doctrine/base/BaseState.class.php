<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('State', 'doctrine');

/**
 * BaseState
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property Doctrine_Collection $Profile
 * @property Doctrine_Collection $City
 * 
 * @method integer             getId()      Returns the current record's "id" value
 * @method string              getCode()    Returns the current record's "code" value
 * @method string              getName()    Returns the current record's "name" value
 * @method Doctrine_Collection getProfile() Returns the current record's "Profile" collection
 * @method Doctrine_Collection getCity()    Returns the current record's "City" collection
 * @method State               setId()      Sets the current record's "id" value
 * @method State               setCode()    Sets the current record's "code" value
 * @method State               setName()    Sets the current record's "name" value
 * @method State               setProfile() Sets the current record's "Profile" collection
 * @method State               setCity()    Sets the current record's "City" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseState extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('state');
        $this->hasColumn('id', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 2,
             ));
        $this->hasColumn('code', 'string', 2, array(
             'type' => 'string',
             'notnull' => true,
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
        $this->hasMany('Profile', array(
             'local' => 'id',
             'foreign' => 'state_id'));

        $this->hasMany('City', array(
             'local' => 'id',
             'foreign' => 'state_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}