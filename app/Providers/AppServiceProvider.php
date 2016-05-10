<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('set', function($expression) {
            $expression = trim($expression, '()');
            return "<?php $expression; ?>";
        });

        // 通过config取得当前使用的主题
        $theme = 'default';
        View::addNamespace($theme, base_path() . '/resources/views/' . $theme);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
