<?php

namespace Parser;

/**
 * Description of Main
 *
 * @author peter
 */
class Index
{
    public static function main()
	{
		$tokenizer = new Tokenizer('a > b > c');
		$parser = new Parser($tokenizer);
		
		$programModel = $parser->parseProgram();
	}
}

// Do stuff to initilize program run
spl_autoload_register(function($class) {
	include substr($class, 1+strpos($class, '\\')).'.php';
});

// Start program
Index::main();