<?php
namespace Parser;

class Tokenizer {

	private $code = '';
	private $charPointer = 0;

	function Tokenizer($code) {
		$this->code = $code;
	}

	private function readToken() {
		// Read one token
	}

	private function readAndStoreChar() {
		// Read one char and store it in buffer
	}

	private function readInteger() {
		// Read one integer
	}

	private function readSymbol() {
		// Read one symbol
	}

	private function readString() {
		// Read one string
	}

	private function readWord() {
		// Read one word, meaning language construct
	}


}