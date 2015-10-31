<?php
require_once("application.php");
class requestTestCase extends PHPUnit_Framework_Testcase{

	function testGetArrayFromRequest(){

		$app = new Application();
		$this->assertTrue(is_array($app->getArrayFromPost()));

	}

}