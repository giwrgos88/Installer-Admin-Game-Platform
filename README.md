# Installer Admin Game Platform

Package installer for Core Package for Web Games.

- [Publish assets files](#publish-assets-files)


#### Publish assets files
Run the command to publish the assets of the package
```php
php artisan vendor:publish --provider="Giwrgos88\Installer\Providers\AssetsServiceProvider" --tag=installer_config
php artisan vendor:publish --provider="Giwrgos88\Installer\Providers\AssetsServiceProvider" --tag=installer_assets
```