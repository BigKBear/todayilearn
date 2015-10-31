<?php
require_once("application.php");
class requestTestCase extends PHPUnit_Framework_Testcase{

	function test(){

		$app = new Application();
		$this->assertTrue(is_array($app->getArrayFromPost()));

	}

}