<?php
require_once("application.php");
class requestTestCase extends PHPUnit__Framework_Testcase{

	function testGetArrayFromPost(){

		$app = new Application();
		$this->assertTrue(is_array($app->getArrayFromPost()));

	}

}