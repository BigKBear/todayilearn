<?php
require_once("application.php");
class requestTestCase extends PHPUnit__Framework_Testcase{

	function testGetArrayFromRequest(){

		$app = new Application();
		$this->assertTrue(is_array($app->getArrayFromRequest());

	}

	function testGetArrayHasNameKey(){

		$app = new Application();
		$this->assertTrue(array_key_exists(key,($app->getArrayFromRequest());

	}

}