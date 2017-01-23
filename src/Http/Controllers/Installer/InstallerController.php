<?php

namespace Giwrgos88\Installer\Http\Controllers\Installer;

use Artisan;
use Giwrgos88\Game\Core\Models\Admin\Users;
use Giwrgos88\Installer\Classes\Helpers\ENVGenerator;
use Giwrgos88\Installer\Classes\Helpers\PermissionsChecker;
use Giwrgos88\Installer\Classes\Helpers\RequirementsChecker;
use Giwrgos88\Installer\Http\Controllers\Controller;
use Giwrgos88\Installer\Http\Requests\InstallationPostRequest;
use Giwrgos88\Installer\Http\Requests\InstallationUserPostRequest;
use Session;
use Ultraware\Roles\Models\Role;

class InstallerController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function welcome() {
		Session::put('steps', 1);
		return view('installer::installer.steps.welcome');
	}

	public function requirements() {
		$requirements = RequirementsChecker::check(config('installer.requirements'));
		if (!isset($requirements['errors'])) {
			if (!Session::has('steps')) {
				Session::put('steps', 2);
			}
		}

		return view('installer::installer.steps.requirements', ['requirements' => $requirements, 'requirementsConfig' => config('installer.requirements')]);
	}

	public function permissions() {
		if (Session::get('steps') >= 3) {
			abort(404);
		}

		$permissions = PermissionsChecker::check(config('installer.permissions'));

		if (!isset($permissions['errors'])) {
			Session::put('steps', 3);
		}

		return view('installer::installer.steps.permissions', ['permissions' => $permissions]);
	}

	public function setup() {
		if (Session::get('steps') >= 4) {
			abort(404);
		}

		return view('installer::installer.steps.setup');
	}

	public function store(InstallationPostRequest $request) {
		$env = new ENVGenerator();
		if (!$env) {
			abort(500);
		}
		if ($env->generateEnv($request->all())) {
			Artisan::call('migrate');
			Artisan::call('db:seed');

			Session::put('steps', 4);
			return redirect()->route('Installer::user');
		}
		return redirect()->back()->withErrors(['error', trans('installer::installer.erros.wrong')]);
	}

	public function user() {
		if (Session::get('steps') >= 5) {
			abort(404);
		}

		return view('installer::installer.steps.user');
	}

	public function userStore(InstallationUserPostRequest $request) {
		$data = $request->all();
		$data['status'] = 'active';
		$user = Users::create($data);
		$super_admin = Role::where('slug', 'super.admin')->first();
		$user->attachRole($super_admin);
		$permissions = $super_admin->permissions;

		foreach ($permissions as $key => $permission) {
			$user->attachPermission($permission);
		}

		Session::put('steps', 5);
		return redirect()->route('Installer::final');
	}

	public function finish() {
		$env = new ENVGenerator();
		$env->addEnviromentVariable('APP_INSTALLER', true);

		return view('installer::installer.steps.final');
	}
}
