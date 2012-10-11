<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'  => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'      => 'My Web Application',
	// preloading 'log' component
	'preload'   => array(
		'log',
		'bootstrap', // preload the bootstrap component
	),
	// autoloading model and component classes
	'import'    => array(
		'application.models.*',
		'application.components.*',
	),
	'modules'   => array(
		// uncomment the following to enable the Gii tool

		'gii'=> array(
			'class'         => 'system.gii.GiiModule',
			'password'      => 'gggggg',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'     => false, // acess to all
			'generatorPaths'=> array(
				'bootstrap.gii',
			),
		),

	),
	// application components
	'components'=> array(
		'user'        => array(
			// enable cookie-based authentication
			'allowAutoLogin'=> true,
		),
		// uncomment the following to enable URLs in path-format

		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/

		//		'db'=>array(
		//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		//		),
		// uncomment the following to use a MySQL database

		/*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=k7715_yii',
			'emulatePrepare' => true,
			'username' => 'k7715_yii',
			'password' => '504f0b779f146',
			'charset' => 'utf8',
		),*/
		'db'          => array(
			'connectionString'   => 'mysql:host=localhost;dbname=k7715_yii',
			'emulatePrepare'     => true,
			'username'           => 'root',
			'password'           => 'gggggg',
			'charset'            => 'utf8',
			'enableProfiling'    => true, // включаем профайлер

			'enableParamLogging' => true, // показываем значения параметров
		),
		'errorHandler'=> array(
			// use 'site/error' action to display errors
			'errorAction'=> 'site/error',
		),
		'log'         => array(
			'class' => 'CLogRouter',
			'routes'=> array(
				array(
					// направляем результаты профайлинга в ProfileLogRoute (отображается
					// внизу страницы)
					'class'         => 'CProfileLogRoute',
					'levels'        => 'error, warning, trace, profile, info',
					'enabled'       => true,
					'showInFireBug' => true,

				),
				// uncomment the following to show log messages on web pages
				array(
					'class'         => 'CWebLogRoute',
					'levels'        => 'error, warning, trace, profile, info',
					'showInFireBug' => true,
					'enabled'       => true,
				),
				//				array(
				//					'class'         => 'CWebLogRoute',
				//					'categories'    => 'application',
				//					'showInFireBug' => true
				//				),

			),

			//			 array(
			//				'class' => 'CLogRouter',
			//				'routes' => array(
			//					array(
			//						'class' => 'CWebLogRoute',
			//						'categories' => 'application',
			//						'showInFireBug' => true
			//					),
			//				),
			//			),
		),
		'bootstrap'   => array(
			'class'=> 'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'    => array(
		// this is used in contact page
		'adminEmail'=> 'webmaster@example.com',
	),
);