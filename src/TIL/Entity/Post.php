<?php
namespace TIL\Entity;
 
class Post {
 
    protected $id;
    protected $username;
    protected $post;
    protected $updatedAt;
    protected $createdAt;
    
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