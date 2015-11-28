<?php
namespace TIL\Repository;

use Doctrine\DBAL\Connection;
use TIL;
use TIL\Entity\Post;

class PostRepository implements \TIL\RepositoryInterface
{
    protected $db;
    
    public function __construct(Connection $db = null)
    {
        if($db === null) {
            $config = new \Doctrine\DBAL\Configuration();
            
            $connectionParams = $this->global_config["dbs"]["development"];
            
            $this->db = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
        } else {
            $this->db = $db;
        }
    }
 
    /**
     * Returns a post given its id.
     * @param integer $id
     * 
     * @return \TIL\Entity\Post|false An entity object if found, false otherwise.
     */
    public function find($id)
    {
        $postData = $this->db->fetchAssoc('SELECT * FROM posts WHERE post_id = ?', array($id));
        return $postData ? $this->buildPost($postData) : FALSE;
    }
    
    /**
     * Returns a collection of posts, sorted by date.
     * @param integer $limit    The number of posts to return.
     * @param integer $offset   The number of posts to skip. This will help with basic pagination, if and when
     * @param array $orderBy    Optionally, the order by info, in the $column => $direction format.
     *
     * @return array A collection of posts with the post ids as keys.
     */
    public function findAll($limit = null, $offset = 0, $orderBy = array())
    {
        // Provide a default orderBy. In our case, it's the creation date starting with the most recent
        if (!$orderBy) {
            $orderBy = array('created_at' => 'DESC');
        }
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('p.*')
            ->from('posts', 'p')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->orderBy('p.' . key($orderBy), current($orderBy));
        $statement = $queryBuilder->execute();
        $postsData = $statement->fetchAll();
        $posts = array();
        foreach ($postsData as $postData) {
            $postId = $postData['post_id'];
            $posts[$postId] = $this->buildPost($postData);
        }
        return $posts;
    }
    
    /**
     * Saves a post to the database.
     * @param \TIL\Entity\Post $post
     */
    public function save($post)
    {
        // Our trusty upsert type operation :-)
        $postData = array(
            'username' => $post->getUser(),
            'post' => $post->getPost(),
            'updated_at' => $post->getUpdatedAt()->format('Y-m-d H:i:s'),
            'created_at' => $post->getCreatedAt()->format('Y-m-d H:i:s'),
        );
        
        if ($post->getId()) {
            // so if we got a post with this id already, update it
            $this->db->update('posts', $postData, array('post_id' => $post->getId()));
        } else {
            // if it's a new post, we will insert it into the database
            //$postData['created_at'] = time();
            //$postData['updated_at'] = $postData['created_at'];
            $this->db->insert('posts', $postData);
            // Get the id of the newly created post and set it on the entity.
            $id = $this->db->lastInsertId();
            $post->setId($id);
        }
    }
    
    /**
     * Deletes a post.
     *
     * @param \TIL\Entity\Post $post
     */
    public function delete($post)
    {
        return $this->db->delete('posts', array('post_id' => $post->getId()));
    }
    
    /**
     * Returns the total number of posts.
     * @return integer The total number of posts.
     */
    public function getCount() {
        return $this->db->fetchColumn('SELECT COUNT(post_id) FROM posts');
    }
    
    /**
     * Instantiates an post entity and sets its properties using db data.
     *
     * @param array $postData
     *   The array of db data.
     *
     * @return \TIL\Entity\Post
     */
    protected function buildPost($postData)
    {
        $post = new Post($postData);
        
        return $post;
    }
}