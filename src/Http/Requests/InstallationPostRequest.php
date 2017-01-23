<?php

namespace Giwrgos88\Installer\Http\Requests;

use Giwrgos88\Installer\Http\Requests\Request;

class InstallationPostRequest extends Request {
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
			'DB_CONNECTION' => 'required|max:255',
			'DB_HOST' => 'required|max:255|required_with:DB_CONNECTION',
			'DB_PORT' => 'required|int|required_with:DB_CONNECTION',
			'DB_DATABASE' => 'required|max:255|required_with:DB_CONNECTION',
			'DB_USERNAME' => 'required|max:255|required_with:DB_CONNECTION',
			'DB_PASSWORD' => 'required|max:255|required_with:DB_CONNECTION',
			'MAIL_DRIVER' => 'required|max:255|required_with:DB_CONNECTION',
			'MAIL_HOST' => 'required|max:255',
			'MAIL_PORT' => 'required|int|required_with:MAIL_HOST',
			'MAIL_USERNAME' => 'max:255',
			'MAIL_PASSWORD' => 'max:255|required_with:MAIL_USERNAME',
			'FACEBOOK_APP_ID' => 'integer',
			'FACEBOOK_APP_SECRET_KEY' => 'max:255',
			'FACEBOOK_APP_URL' => 'required_with:FACEBOOK_APP_ID|url',
			'GOOGLE_CODE' => 'max:255',
			'APPLICATION_START_DATE' => 'date_format:d/m/Y H:i',
			'APPLICATION_END_DATE' => 'required_with:APPLICATION_END_DATE|date_format:d/m/Y H:i|after:APPLICATION_START_DATE',

		];
	}
}
