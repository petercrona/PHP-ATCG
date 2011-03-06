<?php
namespace Test;

require './User.php';
require './Post.php';
require './Annotations.php';
require './Tests/ParamsTest.php';
require './Tests/ResultHasKeysTest.php';
require './Tests/ResultHasTypeTest.php';
require './Tests/InDBTest.php';
require './Tests/NotInDBTest.php';
require './Tests/EqualsTest.php';

use Test\TestGenerator,
	Test\Annotations,
	Test\Test,
	Test\ParamsTest;

/**
 * Description of TestGenerator
 *
 * @author peter
 */
class TestGenerator {

	private $annotation;

	public function __construct(Annotations $annotation) {
		$this->annotation = $annotation;
	}
	
	public function generateTest($class) {
		$annotation = $this->annotation;
		$specs = $annotation->getContracts($class);

		$methodTest = '';
		echo '<h1>Test class ' . $class . '</h1>';
		foreach($specs as $method => $spec) {
			echo '<h2>Test method ' . $method . ':</h2><ul>';
			echo '<li>Given that<ul>';
			$methodTest .= $this->compileAnnotation($spec['requires']);
			echo '</ul></li></ul><ul><li>Check that</li><ul>';
			$methodTest .= $this->compileAnnotation($spec['ensures']);
			echo '</ul></li></ul>';
		}
	}

	private function compileAnnotation($value) {
		foreach($value as $val) {
			// Split into several
			$class = '\\Test\\'.\ucfirst($this->getClass($val)) . 'Test';
			$params = $this->getParams($val);
			call_user_func($class.'::test', $params);
		}
	}

	private function getClass($value) {
		return substr($value, 0, strpos($value, '('));
	}

	private function getParams($value) {
		$params = substr($value, strpos($value, '(')+1, strlen($value) - strpos($value, '(') -2  );
		$res_whitespace = explode(',', $params);

		//Clean whitspaces
		$res = array();
		foreach($res_whitespace as $elem) {
			$res[] = \trim($elem);
		}

		return $res;
	}

}

$gen = new TestGenerator(new Annotations());
$gen->generateTest('\Test\User');
$gen->generateTest('\Test\Post');
