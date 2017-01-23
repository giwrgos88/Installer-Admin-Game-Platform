<?php
namespace Giwrgos88\Installer\Classes\Helpers;

class ENVGenerator {

	private $env;

	public function __construct() {

		$env = base_path() . '/.env';

		if (file_exists($env)) {
			$this->env = $env;
		} else {
			return false;
		}
	}

	protected function convertEnvToArray($file) {
		$string = file_get_contents($file);
		$string = preg_split('/\n+/', $string);
		$returnArray = array();
		foreach ($string as $one) {
			if (preg_match('/^(#\s)/', $one) === 1) {
				continue;
			}
			$entry = explode("=", $one, 2);
			$returnArray[$entry[0]] = isset($entry[1]) ? $entry[1] : null;

		}
		return array_filter($returnArray, function ($key) {return !empty($key);}, ARRAY_FILTER_USE_KEY);
	}

	protected function save($array) {
		if (is_array($array)) {
			$newArray = array();
			$c = 0;
			foreach ($array as $key => $value) {
				$newArray[$c] = $key . "=" . (preg_match('/\s/', $value) ? '"' . trim($value, '"') . '"' : $value);
				$c++;
			}
			$newArray = implode("\n", $newArray);
			file_put_contents($this->env, $newArray);
			return true;
		}
		return false;
	}

	protected function replaceData($envData, $data) {
		foreach ($data as $key => $value) {
			if (($key == "_token") || ($key == "daterange")) {continue;}
			if (!empty($value)) {
				$envData[$key] = $value;
			} else {
				$envData[$key] = "null";
			}
		}
		return $envData;
	}

	public function addEnviromentVariable($key, $value = null) {
		$envContent = $this->convertEnvToArray($this->env);
		if (gettype($value) == 'boolean') {
			$value = ($value) ? 'true' : 'false';
		}
		$envContent[$key] = is_null($value) ? 'null' : $value;
		return $this->save($envContent);
	}

	public function generateEnv(array $data = []) {
		$envContent = $this->convertEnvToArray($this->env);
		$envContent = $this->replaceData($envContent, $data);
		return $this->save($envContent);
	}
}