<?php

namespace Giwrgos88\Installer\Http\Middleware;

use Closure;
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
		switch (Session::get('steps')) {
		case 1:
			if ($request->url() != URL::route('Installer::requirements')) {
				return redirect()->route('Installer::requirements');
			}
			break;
		case 2:
			if ($request->url() != URL::route('Installer::permissions')) {
				return redirect()->route('Installer::permissions');
			}
			break;
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