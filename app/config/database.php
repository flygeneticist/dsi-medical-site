<?php

return array(

	'fetch' => PDO::FETCH_CLASS,
	'default' => 'mysql_work_prod',

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
			'database' => 'dsimedic_APM',
			'username' => 'dsimedic_admin1',
			'password' => 'ZF?7CzC5$H2$',
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
