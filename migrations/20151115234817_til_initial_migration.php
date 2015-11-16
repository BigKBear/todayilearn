<?php

use Phinx\Migration\AbstractMigration;

class TilInitialMigration extends AbstractMigration
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
    public function change()
    {
        // create the table
        $posts = $this->table('posts');
        $posts->addColumn('post_id', 'integer')
              ->addColumn('username', 'string', array('limit' => 20))
              ->addColumn('post', 'string', array('limit' => 255))
              ->addColumn('updated_at', 'datetime')
              ->addColumn('created_at', 'datetime')
              ->create();

    }
}
