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
					$res = is_string($type);
					echo '<li>Param is string</li>';
					break;

				case 'int':
					$res = is_int($type);
					echo '<li>Param is int</li>';
					break;

			}
		}

		return $res;
	}

}

?>
