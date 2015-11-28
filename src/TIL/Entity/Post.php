<?php
namespace TIL\Entity;
 
class Post {
 
    protected $id;
    protected $username;
    protected $post;
    protected $updatedAt;
    protected $createdAt;
    
    public function __construct($postData = null) {
        if(is_array($postData)) {
            if(array_key_exists('post_id', $postData)) {
                $this->setId($postData['post_id']);
            }
            
            if(array_key_exists('username', $postData)) {
                $this->setUser($postData['username']);
            }
            
            if(array_key_exists('post', $postData)) {
                $this->setPost($postData['post']);
            }
            
            if(array_key_exists('created_at', $postData)) {
                $createdAt = \DateTime::createFromFormat("Y-m-d H:i:s", $postData["created_at"]);
                $this->setCreatedAt($createdAt);
            }
            
            if(array_key_exists('updated_at', $postData)) {
                $updatedAt = \DateTime::createFromFormat("Y-m-d H:i:s", $postData["updated_at"]);
                $this->setUpdatedAt($updatedAt);
            }
        }
    }
    
    public function getId()     {
        return $this->post_id;
    }
 
    public function setId($id)
    {
        $this->post_id = $id;
    }
 
    public function getUser()
    {
        return $this->username;
    }
 
    public function setUser($username)
    {
        $this->username = $username;
    }
    
    public function getPost()
    {
        return $this->post;
    }
 
    public function setPost($post)
    {
        $this->post = $post;
    }
    
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
 
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updated_at = $updatedAt;
    }
 
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->created_at = $createdAt;
    }
}