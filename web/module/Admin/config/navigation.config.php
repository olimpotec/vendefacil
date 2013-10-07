<?php
/*
 * Navigation container (config/array)

* Each element in the array will be passed to
* Zend\Navigation\Page\AbstractPage::factory() when constructing
* the navigation container below.
*/
$translator = new \Zend\I18n\Translator\Translator;

return  array('default' => array( 
		array(
			'label'      => 'Home',
			'title'      => 'Go Home',
			'module'     => 'default',
			'controller' => 'index',
			'action'     => 'index',
			'order'      => -100 // make sure home is the first page
		),
		array(
			'label'      => 'Special offer this week only!',
			'module'     => 'store',
			'controller' => 'offer',
			'action'     => 'amazing',
			'visible'    => false // not visible
		),
		array(
				'label'      => $translator->translate('Companies'),
				'module'     => 'Admin',
				'controller' => 'company',
				'action'     => 'index',
				'pages'      => array(
						array(
								'label'      => 'Foo Server',
								'module'     => 'Admin',
								'controller' => 'company',
								'action'     => 'add',
								'pages'      => array(
										array(
												'label'      => 'FAQ',
												'module'     => 'products',
												'controller' => 'server',
												'action'     => 'faq',
												'rel'        => array(
														'canonical' => 'http://www.example.com/?page=faq',
														'alternate' => array(
																'module'     => 'products',
																'controller' => 'server',
																'action'     => 'faq',
																'params'     => array('format' => 'xml')
														)
												)
										),
										array(
												'label'      => 'Editions',
												'module'     => 'products',
												'controller' => 'server',
												'action'     => 'editions'
										),
										array(
												'label'      => 'System Requirements',
												'module'     => 'products',
												'controller' => 'server',
												'action'     => 'requirements'
										)
								)
						),
						array(
								'label'      => 'Foo Studio',
								'module'     => 'products',
								'controller' => 'studio',
								'action'     => 'index',
								'pages'      => array(
										array(
												'label'      => 'Customer Stories',
												'module'     => 'products',
												'controller' => 'studio',
												'action'     => 'customers'
										),
										array(
												'label'      => 'Support',
												'module'     => 'products',
												'controller' => 'studio',
												'action'     => 'support'
										)
								)
						)
				)
		),
		array(
				'label'      => 'Company',
				'title'      => 'About us',
				'module'     => 'company',
				'controller' => 'about',
				'action'     => 'index',
				'pages'      => array(
						array(
								'label'      => 'Investor Relations',
								'module'     => 'company',
								'controller' => 'about',
								'action'     => 'investors'
						),
						array(
								'label'      => 'News',
								'class'      => 'rss', // class
								'module'     => 'company',
								'controller' => 'news',
								'action'     => 'index',
								'pages'      => array(
										array(
												'label'      => 'Press Releases',
												'module'     => 'company',
												'controller' => 'news',
												'action'     => 'press'
										),
										array(
												'label'      => 'Archive',
												'route'      => 'archive', // route
												'module'     => 'company',
												'controller' => 'news',
												'action'     => 'archive'
										)
								)
						)
				)
		),
		array(
				'label'      => 'Community',
				'module'     => 'community',
				'controller' => 'index',
				'action'     => 'index',
				'pages'      => array(
						array(
								'label'      => 'My Account',
								'module'     => 'community',
								'controller' => 'account',
								'action'     => 'index',
								'resource'   => 'mvc:community.account' // resource
						),
						array(
								'label' => 'Forums',
								'uri'   => 'http://forums.example.com/',
								'class' => 'external' // class
						)
				)
		),
		array(
				'label'      => 'Administration',
				'module'     => 'admin',
				'controller' => 'index',
				'action'     => 'index',
				'resource'   => 'mvc:admin', // resource
				'pages'      => array(
						array(
								'label'      => 'Write new article',
								'module'     => 'admin',
								'controller' => 'post',
								'aciton'     => 'write'
						)
				)
		)
));