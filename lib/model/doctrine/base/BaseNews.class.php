<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('News', 'doctrine');

/**
 * BaseNews
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property timestamp $post_date
 * @property string $title
 * @property text $content
 * @property string $image_full
 * @property string $image_small
 * 
 * @method integer   getId()          Returns the current record's "id" value
 * @method timestamp getPostDate()    Returns the current record's "post_date" value
 * @method string    getTitle()       Returns the current record's "title" value
 * @method text      getContent()     Returns the current record's "content" value
 * @method string    getImageFull()   Returns the current record's "image_full" value
 * @method string    getImageSmall()  Returns the current record's "image_small" value
 * @method News      setId()          Sets the current record's "id" value
 * @method News      setPostDate()    Sets the current record's "post_date" value
 * @method News      setTitle()       Sets the current record's "title" value
 * @method News      setContent()     Sets the current record's "content" value
 * @method News      setImageFull()   Sets the current record's "image_full" value
 * @method News      setImageSmall()  Sets the current record's "image_small" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNews extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('news');
        $this->hasColumn('id', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 2,
             ));
        $this->hasColumn('post_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('title', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('content', 'text', null, array(
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
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}