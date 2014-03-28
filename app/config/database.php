<?php

return array(

	'fetch' => PDO::FETCH_CLASS,
	'default' => 'mysql_work_dev',

	'connections' => array(

		'mysql_home' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'test',
			'username'  => 'admin',
			'password'  => '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'mysql_work_dev' => array(
			'driver' => 'mysql',
			'host' => 'localhost:81',
			'database' => 'test',
			'username' => 'admin',
			'password' => '',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
		),

		'mysql_work_prod' => array(
			'driver' => 'mysql',
			'host' => 'localhost',
			'database' => 'APM',
			'username' => 'admin',
			'password' => 'admin',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
		),

		'ds_sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'     => 'DSTSTSERVER01',
			'database' => '',
			'username' => 'drugscan_dw',
			'password' => 'drugscan',
			'prefix'   => '',
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
