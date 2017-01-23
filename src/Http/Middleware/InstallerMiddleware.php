<?php

namespace Giwrgos88\Installer\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class InstallerMiddleware {

	/**
	 * Responsible for checking if the project has been
	 * installed
	 *
	 * @param  Http  $request
	 * @param  Closure $next
	 * @return Closure $next
	 */
	public function handle($request, Closure $next) {

		$installer = strtolower(getenv('APP_INSTALLER')) == 'true' ? true : false;

		if ($installer === true) {
			return $next($request);
		}

		return Redirect::to('/install');

	}
}