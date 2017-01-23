<?php

namespace Giwrgos88\Installer\Http\Requests;

use Giwrgos88\Installer\Http\Requests\Request;

class InstallationUserPostRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'password' => $this->getUserPasswordRule('password'),
			'password_confirmation' => $this->getUserPasswordRule('password_confirmation'),
		];
	}

	private function getUserPasswordRule($type) {
		if ((!empty($this->request->get('password'))) && (!empty($this->request->get('password_confirmation')))) {
			if ($type == 'password') {
				return 'required|confirmed|between:6,50|confirmed';
			}

			return 'required|same:password';
		}

		return 'between:6,50';
	}

}
