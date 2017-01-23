<?php

namespace Giwrgos88\Installer\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AssetsServiceProvider
 *
 * @package Giwrgos88\Installer\Providers;
 */

class AssetsServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * [path description]
	 * @param  integer $level  The number of parent directories to go up.
	 * @param  string  $path   The directory path
	 * @return string          Return the directory path
	 */
	private function path(int $level = 1, string $path): string {
		return dirname(__DIR__, $level) . $path;
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {

		/**
		 * Publish Package Config Files
		 */
		$this->publishConfigFiles();

		/**
		 * Publish Package Assets Files
		 */
		$this->publishAssetsFiles();

		/**
		 * Publish Package View Files
		 */
		$this->publishViewFiles();

		/**
		 * Load Localization Files
		 */
		$this->loadLocalization();
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
	 * Define the routes for the application.
	 *
	 */
	public function map() {
	}

	/**
	 * Publish Package Config Files
	 */
	private function publishConfigFiles() {
		$location = $this->path(2, '/config/');
		$files = scandir($location);

		foreach ($files as $key => $file) {
			$fileinfo = pathinfo($location . $file);
			if (isset($fileinfo['extension'])) {
				if ($fileinfo['extension'] == 'php') {
					$file = $fileinfo;
					$this->mergeConfigFrom(
						$location . $file['basename'], str_replace('.php', '', $file['basename']));

					$this->publishes([
						$location . $file['basename'] => config_path($file['basename']),
					], 'installer_config');
				}
			}
		}
	}

	/**
	 * Publish Package Assets Files
	 */
	private function publishAssetsFiles() {

		$this->publishes([
			$this->path(2, '/resources/assets/') => public_path(''),
		], 'installer_assets');
	}

	/**
	 * Publish Package View Files
	 */
	private function publishViewFiles() {
		$location = $this->path(2, '/resources/views/');
		$this->loadViewsFrom($location, 'installer');
	}

	/**
	 * Load Localization Files
	 */
	private function loadLocalization() {
		$location = $this->path(2, '/resources/lang/');
		$this->loadTranslationsFrom($location, 'installer');
	}
}
