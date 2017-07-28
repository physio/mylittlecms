<?php

namespace physio\mylittlecms;

use Illuminate\Support\ServiceProvider;

class mylittlecmsServiceProvider extends ServiceProvider
{
    protected $migrations = [
        //'ModifyUsersTable' => 'modify_users_table',
       // 'CreateMenusTable' => 'create_menus_table',
      //  'CreateAttachmentsTable' => 'create_attachments_table',
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
        $this->routes();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    public function routes()
    {
        // Register Middleware
        $router = app('router');
        //$router->aliasMiddleware('admin', \Afrittella\BackProject\Http\Middleware\Admin::class);
        //$router->aliasMiddleware('role', \Afrittella\BackProject\Http\Middleware\Role::class);
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }    
}