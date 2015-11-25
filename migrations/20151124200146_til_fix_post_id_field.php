<?php

use Phinx\Migration\AbstractMigration;

class TilFixPostIdField extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
     
    public function up()
    {
        
    }
    public function change()
    {
        // drop the table
        $exists = $this->hasTable('posts');
        if ($exists) {
            $this->dropTable('posts');
        }
        
    	// create the table
    	$posts = $this->table('posts', array('id' => 'post_id'));
    	$posts->addColumn('username', 'string', array('limit' => 20))
    		  ->addColumn('post', 'string', array('limit' => 255))
    		  ->addColumn('updated_at', 'datetime')
    		  ->addColumn('created_at', 'datetime')
    		  ->create();
    
    }
    
    public function down()
    {
        $posts = $this->table('posts', array('id' => false, 'primary_key' => array('post_id')));
	    $posts->addColumn('post_id', 'integer')
		  ->addColumn('username', 'string', array('limit' => 20))
		  ->addColumn('post', 'string', array('limit' => 255))
		  ->addColumn('updated_at', 'datetime')
		  ->addColumn('created_at', 'datetime')
		  ->create();
    }
}
