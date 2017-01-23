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
		\Collective\Html\HtmlServiceProvider::class,
		\Giwrgos88\Installer\Providers\AssetsServiceProvider::class,
		\Giwrgos88\Installer\Providers\RouteServiceProvider::class,
	];

	/**
	 * The faced array that are use on the project.
	 *
	 * @var array
	 */
	protected $facadeAliases = [
		'Form' => \Collective\Html\FormFacade::class,
		'Html' => \Collective\Html\HtmlFacade::class,
		'Input' => \Illuminate\Support\Facades\Input::class,
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

		$this->registerAlias();
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

	/**
	 * Register Allias
	 */
	public function registerAlias() {

		foreach ($this->facadeAliases as $alias => $facade) {
			$this->app->alias($alias, $facade);
		}
	}
}
