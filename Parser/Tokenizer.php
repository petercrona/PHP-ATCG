<?php
namespace Parser;

class Tokenizer {

	private $code = '';
	private $charPointer = 0;
	private $nrChars = 0;

	private $charBuffer = '';

	function __construct($code) {
		$this->code = $code;
		$this->nrChars = strlen($code);
	}
	private $i = 0;
	public function readNextToken() {

		// End of file
		if ( ! isset($this->code[$this->charPointer])) {
			return null;
		}

		$this->skipWhitespace();
		$char = $this->code[$this->charPointer];
		
		if (ctype_alpha($char)) {
			return new Token(Token::WORD, $this->readWord());
		}

		else if (ctype_digit($char)) {
			return new Token(Token::DIGIT, $this->readInteger());
		}

		else if ($char == '"') {
			return new Token(Token::STRING, $this->readString());
		}

		else if ($this->isSymbol($char)) {
			return new Token(Token::SYMBOL, $this->readSymbol());
		}

		else {
			throw new \Exception('Unexpected char');
		}
	}

	private function readAndStoreChar() {
		// Read one char and store it in buffer
		if (isset($this->code[$this->charPointer])) {
			$this->charBuffer .= $this->code[$this->charPointer++];
		} else {
			var_dump($this->code);
			var_dump($this->charPointer); echo '<br />';
			throw new \Exception("EOF");
		}
	}

	private function skipChar() {
		$this->charPointer++;
	}

	private function hasMoreChars() {
		return isset($this->code[$this->charPointer]);
	}

	private function checkNextChar() {
		return $this->code[$this->charPointer];
	}

	private function flushCharBuffer() {
		$res = $this->charBuffer;
		$this->charBuffer = '';

		return $res;
	}

	private function readInteger() {
		// Read integers until symbol
		// 434+43 || 434 + 4323; (?)
		
		// Read first that we already know it's an digit
		$this->readAndStoreChar();

		// Read more digits if there are any
		while (\ctype_digit($this->code[$this->charPointer])) {
			$this->readAndStoreChar();
		}

		return $this->flushCharBuffer();

	}

	private function readSymbol() {
		// Read one symbol (shall we support => also?)
		// > || >= || => || + || -
		
		switch ($this->code[$this->charPointer]) {
			case '+':
			case '-':
			case '&':
				$this->readAndStoreChar();
				return $this->flushCharBuffer();
				break;
			
			case '>':
			case '<':
				$this->readAndStoreChar();
				if ($this->checkNextChar() == '=') {
					$this->readAndStoreChar();
				}
				
				return $this->flushCharBuffer();
				break;
		}
	}

	private function readString() {
		// Read chars until "
		// "hej"
		//
		// Skip first which is "
		$this->skipChar();

		// Read more digits if there are any
		while ($this->checkNextChar() != '"') {
			$this->readAndStoreChar();
		}

		return $this->flushCharBuffer();
	}

	private function readWord() {
		// Read until symbol
		// while( || while ( || forall i=2..4; a[i] > 4
		$this->readAndStoreChar();
		
		while ($this->hasMoreChars() && \ctype_alnum($this->checkNextChar())) {
			$this->readAndStoreChar();
		}

		return $this->flushCharBuffer();
	}

	private function skipWhitespace() {
		while ($this->code[$this->charPointer] == " ") {
			$this->charPointer++;
		}
	}

	private function isSymbol($str) {
		$symbols = array(
			'>', '<',
			'=',
			'&', '|'
		);
		
		if (in_array($str, $symbols)) {
			return true;
		}

		return false;
	}


}