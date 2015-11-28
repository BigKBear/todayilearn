<?php

use Phinx\Migration\AbstractMigration;

class TilTestData extends AbstractMigration
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
        $exists = $this->hasTable('posts');
        if ($exists) {
            $this->query("INSERT INTO `posts` (`post_id`, `username`, `post`, `updated_at`, `created_at`) VALUES".
                        "(1, 'tester', 'This is a test post.', '2015-11-24 00:06:08', '2015-11-24 00:00:00'),".
                        "(2, 'tester2', 'This is also a test post.', '2015-11-24 12:20:46', '2015-11-24 12:19:26'),".
                        "(3, 'tester', '<div><p>This is a post in HTML!</p></div>', '2015-11-24 14:09:02', '2015-11-24 14:09:02');");
        }
    }
    
    public function down()
    {
        $exists = $this->hasTable('posts');
        if ($exists) {
            $this->query("DELETE FROM `posts`;");
            $this->query("ALTER TABLE `posts` AUTO_INCREMENT = 1;");
        }
    }
}
