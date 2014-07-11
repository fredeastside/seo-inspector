<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SEO inspector',
	'language'=>'ru',
	'id'=>'fredrsf',
	'theme'=>'production',

	// preloading 'log' component
	'preload'=>array('log', 'AttachmentBehavior', 'yiiuserimg'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',

		'application.modules.user.*',
	    'application.modules.user.models.*',
	    'application.modules.user.components.*',

	    'application.modules.rights.*',
	    'application.modules.rights.models.*',
	    'application.modules.rights.components.*',

        'application.modules.form.*',
        'application.modules.form.models.*',
        'application.modules.form.components.*',

        'application.modules.news.*',
        'application.modules.news.models.*',
        'application.modules.news.components.*',

        'application.extensions.yii-mail.YiiMailMessage',
    ),

	'modules'=>array(
        'admin' => array(
            //'layoutPath' => Yii::getPathOfAlias('webroot.themes.admin.views.layouts'),
            'layout' => 'admin'
        ),
		'user' => array(
	        'tableUsers' => 'tbl_users',
	        'tableProfiles' => 'tbl_profiles',
	        'tableProfileFields' => 'tbl_profiles_fields',
	    ),

	    'rights'=>array(
            //'layout'=>'webroot.themes.admin.views.layouts.admin',
            'appLayout'=>'webroot.themes.admin.views.layouts.admin'
        ),
		// uncomment the following to enable the Gii tool

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'111',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1', '::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),

        'form' => array(
            'tableForm' => 'tbl_forms',
        ),
        'news'
	),

	// application components
	'components'=>array(
		'user'=>array(
		    'class'=>'RWebUser',
		    'allowAutoLogin'=>true,
		    'loginUrl' => array('/user/login'),
            //'defaultController' => 'admin',
		  ),
		  'authManager'=>array(
		    'class'=>'RDbAuthManager',
		    'defaultRoles' => array('Guest'),
		  ),
		// uncomment the following to enable URLs in path-format

		/*'urlManager'=>array(
            'showScriptName' => false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/

		'db'=>require(dirname(__FILE__) . '/db.php'),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// array(
    //                 'class'=>'CEmailLogRoute',
    //                 'levels'=>'error, warning',
    //                 'emails'=>'kaznakhovskiy.s@venta-group.ru',
    //             ),
				// uncomment the following to show log messages on web pages

				array(
					'class'=>'CWebLogRoute',
				),

			),
		),
		'cache'=>array(
			'class'=>'system.caching.CDummyCache',
            /*'class'=>'system.caching.CMemCache',
            'servers'=>array(
                array('host'=>'localhost', 'port'=>11211, 'weight'=>60),
            ),*/
        ),

        'mail'=>array(
            'class'=>'ext.yii-mail.YiiMail',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);