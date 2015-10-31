<?php
require_once("application.php");
class requestTestCase extends PHPUnit_Framework_Testcase{

	function testGetArrayFormRequest(){

		$app = new Application();

		$this->assertTrue(is_array($app->getArrayFromRequest()));

	}

	function testGetArrayHasNameKey(){

		$app = new Application();
		$array = $app->getArrayFromRequest();
		$this->assertTrue(array_key_exists('username',$array));


	}

	function testGetArrayNameKeyIsString(){

		$app = new Application();
		$array = $app->getArrayFromRequest();
		$this->assertTrue(is_string($array['username']));


	}

	function testGetArrayPostKeyIsString(){

		$app = new Application();
		$array = $app->getArrayFromRequest();
		$this->assertTrue(is_string($array['post']));
	}

	function testGetFormRequestUsername(){

		$app = new Application();
		$_POST['username'] = "steve";        
        $array = $app->getArrayFromRequest();
		$this->assertEquals("steve",$array['username']);

	}

	function testGetFormRequestPost(){

		$app = new Application();
		$_POST['post'] = "Today I learnt that you can only treat your friends so badly before they quit working for you and go and work for Halutte(sp)";
        $array = $app->getArrayFromRequest();
		$this->assertEquals("Today I learnt that you can only treat your friends so badly before they quit working for you and go and work for Halutte(sp)",$array['post']);
	}

}