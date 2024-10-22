<?php
   
namespace CarvingIT\Hierarchies;
use Illuminate\Support\ServiceProvider;
class HierarchiesServiceProvider extends ServiceProvider{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        /*
        $this->publishes([
            __DIR__.'/config/hierarchies.php' => config_path('hierarchies.php'),
        ]);
        */

        $this->publishesMigrations([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ]);

        $this->loadViewsFrom(__DIR__.'/views', 'hierarchies');

    }
    public function register(){
    }
}
?>
