<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public static function createRouter(\Nette\DI\Container $container)
	{
		$router = new RouteList();
		

		//sitemap
		$router[] = new Route('sitemap.xml', array(
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'sitemap'
		));
		
		//admin
		$router[] = new Route('admin/prihlaseni[/<id>]', array(
			'module' => 'Admin',
			'presenter' => 'Sign',
			'action' => 'in',
			'id' => NULL,
		));		
		
		$router[] = new Route('admin/<presenter>/<action>[/<id>]', array(
			'module' => 'Admin',
			'presenter' => 'Admin',
			'action' => 'default',
			'id' => NULL,
		));		
		
		

		//front
		/*$router[] = new Route('clanek[/<id>]', array(
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'article',
			// 'id' => NULL,
			'id' => array(
				Route::VALUE => NULL,
				Route::FILTER_IN => callback($container->getService('posts'), 'routeFilterIn'),
				Route::FILTER_OUT => callback($container->getService('posts'), 'routeFilterOut')
			)
		));*/
		/*$router[] = new Route('hashtag/<hashtag>', array(
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'hashtag',
			// 'id' => NULL,
			'hashtag' => NULL
		));*/
		/*$router[] = new Route('hledat[/<id>]', array(
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'search',
			'id' => NULL
		));*/

		//admin
		/*$router[] = new Route('admin/prihlaseni[/<id>]', array(
			'module' => 'Admin',
			'presenter' => 'Sign',
			'action' => 'in',
			'id' => NULL,
		));*/
		/*$router[] = new Route('admin/novy-clanek[/<id>]', array(
			'module' => 'Admin',
			'presenter' => 'Post',
			'action' => 'addpost',
			'id' => NULL,
		));*/

		/*$router[] = new Route('admin/uprava-clanku[/<id>]', array(
			'module' => 'Admin',
			'presenter' => 'Post',
			'action' => 'editpost',
			'id' => NULL,
		));

		$router[] = new Route('admin/zmena-pozadi', array(
			'module' => 'Admin',
			'presenter' => 'Admin',
			'action' => 'backgroundbottom',
			'id' => NULL,
		));*/
		
		/*$router[] = new Route('admin/<presenter>/<action>[/<id>]', array(
			'module' => 'Admin',
			'presenter' => 'Admin',
			'action' => 'default',
			'id' => NULL,
		));*/


		//other
		$router[] = new Route('<presenter>/<action>[/<id>]', array(
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'default',
			'id' => NULL,
		));
		return $router;
	}

}
