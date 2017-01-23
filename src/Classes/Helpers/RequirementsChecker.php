<?php

namespace Giwrgos88\Installer\Classes\Helpers;

class RequirementsChecker {

	public static function check(array $requirements) {
		$results = [];
		$requirements = array_keys($requirements);

		foreach ($requirements as $requirement) {
			if ($requirement == 'phpversion') {
				if (version_compare(phpversion(), '7.0.0', '>')) {
					$results['requirements'][$requirement] = true;
				} else {
					$results['requirements'][$requirement] = false;
					$results['errors'] = true;
				}
			} else {
				$results['requirements'][$requirement] = true;
				if (!extension_loaded($requirement)) {
					$results['requirements'][$requirement] = false;
					$results['errors'] = true;
				}
			}
		}
		return $results;
	}
}