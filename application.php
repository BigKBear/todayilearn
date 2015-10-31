<?php
    class Application{
        private $post= array();
        
        public function __construct($postarray){
           $this->post = $postarray;
        }
        function getArrayFromRequest(){
            return $this->post;
        }
        
        function testGetArrayHasNameKey(){
            return true;
        }
        
        function testGetArrayPostKeyIsString(){
            
        }
    }
?>