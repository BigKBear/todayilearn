<?php
require_once("application.php");
class requestTestCase extends PHPUnit__Framework_Testcase{

	function testGetArrayFromRequest(){

		$app = new Application();
<<<<<<< HEAD
		$this->assertTrue(is_array($app->getArrayFromRequest());

	}

	function testGetArrayHasNameKey(){

		$app = new Application();
		$this->assertTrue(array_key_exists(key,($app->getArrayFromRequest());
=======
		$this->assertTrue(is_array($app->getArrayFromPost()));
>>>>>>> 03e1ceb025448f33960a0498db6a7ac7ed829c04

	}

}