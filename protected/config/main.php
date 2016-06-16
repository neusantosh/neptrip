<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'NepTrip',

	// preloading 'log' component
	'preload'=>array('log'),
	'theme'=> 'bootstrap',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.yii-mail.YiiMailMessage',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		'session' => array(
       		 'autoStart'=>true,
    	),
		
	),




	// application components
	'components'=>array(
		'bootstrap'=>array(
        	'class'=>'bootstrap.components.Bootstrap',
         ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// 'fontawesome'=>array(
	 //        'class'=>'ext.fontawesome.components.FontAwesome',
	 //        'publishAwesome'=>FALSE
  //   	),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
     		'caseSensitive'=>false,       
			'rules'=>array(
				'about-us'	=> 'pages/index',
				'dashboard' => 'users/dashboard',
				'hotels'=>'hotels/index',
			    'hotels/<id:\d+>'=>'hotels/view',
			    'hotels/<slug>'=>'hotels/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',				
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
			
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),

		'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'php',
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false
 		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'neu.santosh@gmail.com',
		'itemsperpage' => 10,
	),
);
