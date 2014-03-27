<?php

return array(

	'fetch' => PDO::FETCH_CLASS,
	'default' => 'ds_sqlsrv',

	'connections' => array(

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'database',
			'username'  => 'root',
			'password'  => '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'ds_sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'     => 'localhost:80',
			'database' => 'dststserver01',
			'username' => 'drugscan_dw',
			'password' => 'drugscan',
			'prefix'   => '',
		),

		'my_connection' => array(
			'driver' => 'mysql',
			'host' => 'localhost',
			'database' => 'webBBS',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
		),
	),

	'migrations' => 'migrations',

	'redis' => array(

		'cluster' => false,

		'default' => array(
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		),

	),

	

);
