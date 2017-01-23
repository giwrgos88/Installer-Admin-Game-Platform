<?php

namespace Giwrgos88\Installer\Http\Middleware;

use Closure;
use Giwrgos88\Installer\Classes\Helpers\PermissionsChecker;
use Giwrgos88\Installer\Classes\Helpers\RequirementsChecker;
use Session;
use URL;

class stepsValidatorMiddleware {

	/**
	 * Responsible for checking if the project has been
	 * installed
	 *
	 * @param  Http  $request
	 * @param  Closure $next
	 * @return Closure $next
	 */
	public function handle($request, Closure $next) {
		if (($request->url() == URL::route('Installer::welcome')) && (!$request->session()->has('steps'))) {
			return $next($request);
		} else if (!$request->session()->has('steps')) {
			if (($request->is('*/final')) || ($request->is('*/user')) || ($request->is('*/setup'))
				|| ($request->is('*/permissions')) || ($request->is('*/requirements'))) {
				return redirect()->route('Installer::welcome');
			}
			$requirements = RequirementsChecker::check(config('installer.requirements'));
			return redirect()->route('Installer::requirements');
		} else {
			$permissions = PermissionsChecker::check(config('installer.permissions'));
			if (isset($permissions['errors'])) {
				$request->session()->put('steps', 2);
				return redirect()->route('Installer::permissions');
			}

			switch (Session::get('steps')) {
			case 3:
				if ($request->url() != URL::route('Installer::setup')) {
					return redirect()->route('Installer::setup');
				}
				break;
			case 4:
				if ($request->url() != URL::route('Installer::user')) {
					return redirect()->route('Installer::user');
				}
				break;
			}

			return $next($request);
		}
	}
}