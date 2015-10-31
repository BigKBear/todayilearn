<?php
require_once("application.php");
class requestTestCase extends PHPUnit_Framework_Testcase{

	function testGetArrayFromRequest(){

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

}