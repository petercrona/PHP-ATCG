<?php
namespace Test;

class ParamsTest {

	public static function test($types) {
		$res = true;

		foreach ($types as $type) {

			if($res !== true) {
				return false;
			}

			switch ($type) {
				case 'string':
					$res = is_int($type);
					echo '<li>Check if param is string, if so:</li>';
					break;

				case 'int':
					$res = is_int($type);
					echo '<li>Check if param is int, if so:</li>';
					break;

			}
		}

		return $res;
	}

}

?>
