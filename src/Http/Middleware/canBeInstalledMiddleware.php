<?php

namespace Giwrgos88\Installer\Http\Middleware;

use Closure;

class canBeInstalledMiddleware {

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

		if ($installer === false) {
			return $next($request);
		}
		abort(404);
	}
}