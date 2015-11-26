<?php
namespace TIL;

class PostFactory  implements \TIL\FactoryInterface
{
    static public function get($data = null) {
        $instance = null;
        
        $instance = new Entity\Post($data);
        
        return $instance;
    }
}