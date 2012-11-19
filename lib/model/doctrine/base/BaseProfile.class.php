<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Profile', 'doctrine');

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $company
 * @property integer $city_id
 * @property string $address
 * @property text $ido
 * @property text $to_meet
 * @property string $image_full
 * @property string $image_small
 * @property string $linkedin_url
 * @property string $fb_url
 * @property string $twitter_url
 * @property string $olio_url
 * @property User $User
 * @property State $State
 * @property City $City
 * 
 * @method integer getId()           Returns the current record's "id" value
 * @method string  getTitle()        Returns the current record's "title" value
 * @method string  getCompany()      Returns the current record's "company" value
 * @method integer getCityId()       Returns the current record's "city_id" value
 * @method string  getAddress()      Returns the current record's "address" value
 * @method text    getIdo()          Returns the current record's "ido" value
 * @method text    getToMeet()       Returns the current record's "to_meet" value
 * @method string  getImageFull()    Returns the current record's "image_full" value
 * @method string  getImageSmall()   Returns the current record's "image_small" value
 * @method string  getLinkedinUrl()  Returns the current record's "linkedin_url" value
 * @method string  getFbUrl()        Returns the current record's "fb_url" value
 * @method string  getTwitterUrl()   Returns the current record's "twitter_url" value
 * @method string  getOlioUrl()      Returns the current record's "olio_url" value
 * @method User    getUser()         Returns the current record's "User" value
 * @method State   getState()        Returns the current record's "State" value
 * @method City    getCity()         Returns the current record's "City" value
 * @method Profile setId()           Sets the current record's "id" value
 * @method Profile setTitle()        Sets the current record's "title" value
 * @method Profile setCompany()      Sets the current record's "company" value
 * @method Profile setCityId()       Sets the current record's "city_id" value
 * @method Profile setAddress()      Sets the current record's "address" value
 * @method Profile setIdo()          Sets the current record's "ido" value
 * @method Profile setToMeet()       Sets the current record's "to_meet" value
 * @method Profile setImageFull()    Sets the current record's "image_full" value
 * @method Profile setImageSmall()   Sets the current record's "image_small" value
 * @method Profile setLinkedinUrl()  Sets the current record's "linkedin_url" value
 * @method Profile setFbUrl()        Sets the current record's "fb_url" value
 * @method Profile setTwitterUrl()   Sets the current record's "twitter_url" value
 * @method Profile setOlioUrl()      Sets the current record's "olio_url" value
 * @method Profile setUser()         Sets the current record's "User" value
 * @method Profile setState()        Sets the current record's "State" value
 * @method Profile setCity()         Sets the current record's "City" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 5, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 5,
             ));
        $this->hasColumn('company', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('city_id', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => 0,
             'length' => 2,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('ido', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('to_meet', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('image_full', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('image_small', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('linkedin_url', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('fb_url', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('twitter_url', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('olio_url', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('State', array(
             'local' => 'state_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('City', array(
             'local' => 'city_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}