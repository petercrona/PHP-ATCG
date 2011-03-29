<?php

namespace Parser;

class Token {

	private $type;
	private $value;

	function __construct($type, $value) {
		$this->type = $type;
		$this->value = $value;
	}

	public function getType() {
		return $this->type;
	}

	public function getValue() {
		return $this->value;
	}

}
?>
