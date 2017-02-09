<?php

namespace Giwrgos88\Installer\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 *
 * @package Giwrgos88\Installer\Providers;
 */

class RouteServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * The middleware classes that are use
	 *  on the project.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'installer' => \Giwrgos88\Installer\Http\Middleware\InstallerMiddleware::class,
		'canBeInstalled' => \Giwrgos88\Installer\Http\Middleware\canBeInstalledMiddleware::class,
		'validate_steps' => \Giwrgos88\Installer\Http\Middleware\stepsValidatorMiddleware::class,
	];

	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Giwrgos88\Installer\Http\Controllers';

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		parent::boot();

		/**
		 * Include Package middlewares
		 */
		$this->registerMiddlewares($this->app['router']);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
	}

	/**
	 * Register middlewares on routes.
	 *
	 * @param  $router
	 * @return void
	 */
	public function registerMiddlewares($router) {
		foreach ($this->routeMiddleware as $middleware => $class) {
			$router->middleware($middleware, $class);
		}
	}

	/**
	 * Define the routes for the application.
	 *
	 */
	public function map() {
		$this->mapWebRoutes();
	}

	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @return void
	 */
	protected function mapWebRoutes() {
		$middleware = ['core_user', 'canBeInstalled'];
		if (config('core_game.SSL_ENABLED')) {
			$middleware[] = 'force_ssl';
		}
		Route::group([
			'middleware' => $middleware,
			'namespace' => $this->namespace,
		], function ($router) {
			require dirname(__DIR__, 2) . '/routes/web.php';
		});
	}
}
