<?php
namespace App\Modules\Teacher\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class TeacherServiceProvider extends ServiceProvider
{
	/**
	 * Register the Teacher module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Teacher\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Teacher module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('teacher', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('teacher', realpath(__DIR__.'/../Resources/Views'));
	}
}
