<?php

namespace Test;

/**
 * Description of Annotations
 *
 * @author peter
 */
class Annotations {

	public function getContracts($class) {
		$res = array();
		$reflection = new \ReflectionClass($class);
		$methods = $reflection->getMethods();

		foreach ($methods as $method) {
			$res[$method->name] = $this->iterateAnnotations($method->getDocComment());
		}

		return $res;
	}

	private function iterateAnnotations($docs) {
		$res = array();

		//Go through each row
		$docs = explode("\n", $docs);
		$nrDocs = count($docs);

		for ($i = 0; $i < $nrDocs; $i++) {
			$startPos = strpos($docs[$i], '@');

			// Stop if not found
			if ($startPos !== false) {
				// Next row is new annotation or end
				if (
					strpos($docs[$i + 1], '@') ||
					strpos($docs[$i + 1], '*/')
				) {
					$anno = $this->extractValueFromAnnotation(substr($docs[$i], $startPos));
					foreach($anno as $an) {
						$res[$an['annotation']][] = $an['value'];
					}
				}
			}
		}

		return $res;
	}

	private function extractValueFromAnnotation($annotation) {
		$parts = \explode('&&', $annotation);
		$res = array();

		$annotation = '';
		foreach($parts as $part) {
			$data = explode('\\', $part);

			// Set annotation, only first part has it specified.
			if($annotation == '') {
				$annotation = rtrim(ltrim($data[0], '@'));
			}

			$data = \explode('\\', $part);
			$res[] = array('annotation' => $annotation, 'value' => rtrim(ltrim($data[1]), ' ;'));
		}
		
		return $res;
	}

}
