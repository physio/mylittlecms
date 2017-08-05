<?php

namespace Physio\MyLittleCMS;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;


use Physio\MyLittleCMS\Models\Article;

class MyLittleCMSServiceProvider extends ServiceProvider
{
    protected $migrations = [
        //'ModifyUsersTable' => 'modify_users_table',
    'CreateCategoriesTable' => 'create_categories_table',
    'CreateArticlesTable' => 'create_articles_table',
      //  'CreateSocialAccountsTable' => 'create_social_accounts_table',
     //   'UsersAddSocial' => 'users_add_social'
    ];


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'MyLittleCMS');
        $this->routes();
        $this->loadMigrationsFrom(__DIR__. '/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/MyLittleCMS'),
            ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Backpack\Base\BaseServiceProvider::class);
        $this->app->register(\Backpack\CRUD\CrudServiceProvider::class);
        $this->app->register(\Backpack\PermissionManager\PermissionManagerServiceProvider::class);
        $this->app->register(\Cviebrock\EloquentSluggable\ServiceProvider::class);
        $this->app->register(\Backpack\LangFileManager\LangFileManagerServiceProvider::class);
    }


    public function routes()
    {
        // Register Middleware
        $router = app('router');
        //$router->aliasMiddleware('admin', \Afrittella\BackProject\Http\Middleware\Admin::class);
        //$router->aliasMiddleware('role', \Afrittella\BackProject\Http\Middleware\Role::class);
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }   


    public function handleMigrations()
    {
        foreach ($this->migrations as $class => $file) {
            if (!class_exists($class)) {
                $timestamp = date('Y_m_d_His', time());
                $this->publishes([
                    __DIR__ . '/../database/migrations/' . $file . '.php' =>
                    database_path('migrations/' . $timestamp . '_' . $file . '.php')
                    ], 'migrations');
            }
        }
    }    
}