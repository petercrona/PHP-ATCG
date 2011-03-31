<?php
namespace Parser;

class Tokenizer {

	private $code = '';
	private $charPointer = 0;
	private $nrChars = 0;

	function __construct($code) {
		$this->code = $code;
		$this->nrChars = strlen($code);
	}

	public function readNextToken() {

		$this->skipWhitespace();

		// End of file
		if ( ! isset($this->code[$this->charPointer])) {
			return null;
		}
		$char = $this->code[$this->charPointer];

		if (ctype_alpha($char)) {
			$this->readWord();
		}

		else if (ctype_digit($char)) {
			$this->readInteger();
		}

		else if ($char == '"') {
			$this->readString();
		}

		else if ($this->isSymbol($char)) {
			$this->readSymbol();
		}

		else {
			// Illegal char?
		}

		$this->charPointer++;
		return 1;
	}

	private function readAndStoreChar() {
		// Read one char and store it in buffer
		echo "read and store<br />";
	}

	private function readInteger() {
		// Read integers until symbol
		// 434+43 || 434 + 4323; (?)
		echo "read integer<br />";
	}

	private function readSymbol() {
		// Read one symbol (shall we support => also?)
		// > || >= || => || + || -
		echo "read symbol<br />";
	}

	private function readString() {
		// Read chars until "
		// "hej"
		echo "read string<br />";
	}

	private function readWord() {
		// Read until symbol
		// while( || while ( || forall i=2..4; a[i] > 4
		echo "read word<br />";
	}

	private function skipWhitespace() {
		
	}

	private function isSymbol($str) {
		if ($str == '>') {
			return true;
		}

		return false;
	}


}