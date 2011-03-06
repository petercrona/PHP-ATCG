<?php
namespace Test;
/**
 * Description of InDb
 *
 * @author peter
 */
class NotInDBTest {
	public static function test($string) {
		echo '<li>DB has NOT entry in table "' . $string[0] .
			'", use WHERE-clause "' . $string[1] . '"';
		echo '</li>';
	}
}
?>
