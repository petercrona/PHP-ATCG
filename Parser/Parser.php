<?php
namespace Parser;

class Parser {

	private $tokenizer = null;

	function Parser(Tokenizer $tokenizer) {
		$this->tokenizer = $tokenizer;
	}

	public function parseProgram() {
		

	}

	private function parseNormalSpecification() {
		// Read everything that should exist, exception if not exist
	}

	private function parseExceptionalSpecification() {
		// Read everything that should exist, exception if not exist
	}

	private function parseForallStatement() {
		// Read everything that should exist, exception if not exist
	}

	private function parseExistStatement() {
		// Read everything that should exist, exception if not exist
	}

	private function parseExpression() {
		// Read expression such as comparison
	}

}
?>