<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'My Web Application',
	// preloading 'log' component
	'preload' => array(
		'log',
		'bootstrap', // preload the bootstrap component
	),
	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
	),
	'modules' => array(
		// uncomment the following to enable the Gii tool

		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'gggggg',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => false, // acess to all
			'generatorPaths' => array(
				'bootstrap.gii',
			),
		),
		'admin',
		'webshell' => array(
			'class' => 'ext.yiiext.modules.webshell.WebShellModule',
			// when typing 'exit', user will be redirected to this URL
			'exitUrl' => '/',
			// custom wterm options
			'wtermOptions' => array(
				// linux-like command prompt
				'PS1' => '%',
			),
			// additional commands (see below)
			'commands' => array(
				'test' => array('js:function(){return "Hello, world!";}', 'Just a test.'),
			),
			// uncomment to disable yiic
			// 'useYiic' => false,
			// adding custom yiic commands not from protected/commands dir
			'yiicCommandMap' => array(
				'email' => array(
					'class' => 'ext.mailer.MailerCommand',
					'from' => 'sam@rmcreative.ru',
				),
			),
		),
	),
	// application components
	'components' => array(
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
		'authManager' => array(
			'class' => 'CDbAuthManager',
			'connectionID' => 'db',
		),
		// uncomment the following to enable URLs in path-format

		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				'webshell' => 'webshell',
				'webshell/<controller:\w+>' => 'webshell/<controller>',
				'webshell/<controller:\w+>/<action:\w+>' => 'webshell/<controller>/<action>',
			),
		),
		//		'db'=>array(
		//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		//		),
		// uncomment the following to use a MySQL database

		/* 'db'=>array(
		  'connectionString' => 'mysql:host=localhost;dbname=k7715_yii',
		  'emulatePrepare' => true,
		  'username' => 'k7715_yii',
		  'password' => '504f0b779f146',
		  'charset' => 'utf8',
		  ), */
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=k7715_yii',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'gggggg',
			'charset' => 'utf8',
			'enableProfiling' => true, // включаем профайлер

			'enableParamLogging' => true, // показываем значения параметров
		),
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					// направляем результаты профайлинга в ProfileLogRoute (отображается
					// внизу страницы)
					'class' => 'CProfileLogRoute',
					'levels' => 'error, warning, trace, profile, info',
					'enabled' => true,
				// 'showInFireBug' => true,
				),
				// uncomment the following to show log messages on web pages
				array(
					'class' => 'CWebLogRoute',
					'levels' => 'error, warning, trace, profile, info',
					//     'showInFireBug' => true,
					'enabled' => true,
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
		'bootstrap' => array(
			'class' => 'ext.bootstrap.components.Bootstrap',
			'responsiveCss' => true, // assuming you extracted bootstrap under extensions
		),
		'widgetFactory' => array(
			'widgets' => array(
				'CLinkPager' => array(
					'pageSize' => 15,
				),
				'TbLabel' => array(
					'type' => 'warning'
				),
			),
		),
		'curl' => array(
			'class' => 'ext.Curl',
			'options' => array(/* additional curl options */)
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
	),
);