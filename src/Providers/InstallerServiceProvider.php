<?php

namespace Giwrgos88\Installer\Providers;

use App;
use Illuminate\Support\ServiceProvider;

/**
 * Class InstallerServiceProvider
 *
 * @package Giwrgos88\Installer\Providers;
 */

class InstallerServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * The provider classes that are use on the project.
	 *
	 * @var array
	 */
	protected $providers = [
		\Giwrgos88\Installer\Providers\AssetsServiceProvider::class,
		\Giwrgos88\Installer\Providers\RouteServiceProvider::class,
	];

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		/**
		 * Bind Package providers to Laravel's IOC container
		 */
		$this->registerProviders();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return [];
	}

	/**
	 * Bind Package Providers to Laravel's IOC container.
	 */
	private function registerProviders() {
		foreach ($this->providers as $key => $provider) {
			$this->app->register($provider);
		}
	}

	/**
	 * Define the routes for the application.
	 *
	 */
	public function map() {
	}
}
