<?php
//require_once('database_class.php');
require_once('../akh.db.class.php');
require_once('../akh.db.table.class.php');

/* these tests suck but I am poking around to get the hang of it */

class DatabaseTests extends PHPUnit_Framework_TestCase {
    
     
    
     public function testDALConstructor(){
        //$this->markTestIncomplete();
        $config = array(
            "port" => "thirtythreeohsix"
            );
        
        $db = DAL_DB::getInstance($config);
        $this->expectOutputString('Database error. mysqli::mysqli() expects parameter 5 to be long, string given');
        $db->destroy();
    }
    
    public function testGetInstance(){
        /*
         *@covers Database::getInstance()
         *
        */
        $db = DAL_DB::getInstance();
        $this->assertEquals("DAL_DB",get_class($db));
  
    }
    public function testGetConnection(){
        //$this->markTestSkipped();
        $db = DAL_DB::getInstance();
        $link = $db->getConnection();
        $this->assertEquals("mysqli",get_class($link));
    }
    
    /*
    *@covers Database->createSkill()
    *@depends testGetInstance()
    *@uses Database
    */
    public function testCreateSkill(){
        $this->markTestSkipped();
        $skill = "Pwning";
        //$db = Database::getInstance();
        $this->assertTrue($db->createSkill($skill));
    }
    
    public function testModelLoader(){
        //$this->markTestSkipped();
        $post = new Post(DAL_DB::getInstance());
        $this->assertEquals("Post",get_class($post));
    }
    
    public function testCloneDatabase(){
        $db =DAL_DB::getInstance();
        $clone = clone($db);
        //Are these instances exactly the same?
        $this->assertTrue($clone->getInstance() === $db->getInstance());
    }
    
   

};