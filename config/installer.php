<?php

return [
	/*
		    |--------------------------------------------------------------------------
		    | Laravel 's Minimum Server Requirements
		    |--------------------------------------------------------------------------
	*/
	'requirements' => [
		'phpversion' => 'PHP version >= 7.0.0',
		'openssl' => 'OpenSSL PHP Extension',
		'pdo' => 'PDO PHP Extension',
		'mbstring' => 'Mbstring PHP Extension',
		'tokenizer' => 'Tokenizer PHP Extension',
	],
	/*
		    |--------------------------------------------------------------------------
		    | Folders Permissions
		    |--------------------------------------------------------------------------
	*/
	'permissions' => [
		'storage/app/' => '775',
		'storage/framework/' => '775',
		'storage/logs/' => '775',
		'bootstrap/cache/' => '775',
	],
];
