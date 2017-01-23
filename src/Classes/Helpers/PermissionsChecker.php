<?php

namespace Giwrgos88\Installer\Classes\Helpers;

class PermissionsChecker {

	public static function check(array $permissions) {
		$results = [];

		foreach ($permissions as $folder => $permission) {
			if (!(self::getPermission($folder) >= $permission)) {
				$results['folders'][$folder]['result'] = false;
				$results['folders'][$folder]['permission'] = $permission;
				$results['errors'] = true;
			} else {
				$results['folders'][$folder]['result'] = true;
				$results['folders'][$folder]['permission'] = $permission;
			}
		}
		return $results;
	}

	private static function getPermission($folder) {
		return substr(sprintf('%o', fileperms(base_path($folder))), -4);
	}
}