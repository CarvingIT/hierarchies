<?php
   
namespace CarvingIT\Hierarchies;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

class HierarchiesServiceProvider extends ServiceProvider{
    public function boot(){
       
        $base_path = Config::get('hierarchies.base_path');
        $middleware = Config::get('hierarchies.middleware');

        Route::group(['prefix'=> $base_path, 'middleware'=> $middleware], function () {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });

        $this->publishes([
            __DIR__.'/config/hierarchies.php' => config_path('hierarchies.php'),
        ]);

        $this->publishesMigrations([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ]);

        $this->loadViewsFrom(__DIR__.'/views', 'hierarchies');

    }
    public function register(){
    }
}
?>
