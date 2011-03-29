<?php
namespace Parser;

class Tokenizer {

	private $code = '';
	private $charPointer = 0;

	function Tokenizer($code) {
		$this->code = $code;

		// Clean irrelevant stuff?
	}

	private function readNextToken() {
		
		skipWhitespace();
		$char = $code[$charPointer];
		
		if (endOfCode) {
			// We're done!
		}

		else if (ctype_alpha($char)) {
			// Read a word
		}

		else if (ctype_digit($char)) {
			// Read an integer
		}

		else if ($char == '"') {
			// Read a string
		}

		else if (isSymbol()) {
			// +,-,( and that kind of stuff
		}

		else {
			// Illegal char?
		}
	}

	private function readAndStoreChar() {
		// Read one char and store it in buffer
	}

	private function readInteger() {
		// Read integers until symbol
		// 434+43 || 434 + 4323; (?)
	}

	private function readSymbol() {
		// Read one symbol (shall we support => also?)
		// > || >= || => || + || -
	}

	private function readString() {
		// Read chars until "
		// "hej"
	}

	private function readWord() {
		// Read until symbol
		// while( || while ( || forall i=2..4; a[i] > 4
	}


}