<?php

Route::group([
    'namespace' => '\Physio\MyLittleCMS\Http\Controllers'
    ], function () {
        Route::get('/', 'HomeController@index');

        Route::get('contatti', 'ContactController@index');

        Route::post('contatti', ['as' => 'contatti_post', 'uses' => 'ContactController@store']);

        Route::get('/attivita/elenco/{title}', 'ServiceController@category');
        Route::get('/attivita/{slug}', 'ServiceController@show');

        Route::get('/speciali/{slug}', 'SpecialController@index');

        Route::get('/notizie/elenco', 'ArticleController@index');
        Route::get('/news/{slug}', 'ArticleController@show');
        Route::get('/notizie/dettaglio/{slug}', 'ArticleController@show');

        Route::get('/servizi/{slug}', 'ServiceController@index');
        Route::get('/servizi/elenco/{slug}', 'ServiceController@category');
        Route::get('/servizi/dettaglio/{slug}', 'ServiceController@show');

        Route::get('/eventi/elenco/{eventState}', 'EventController@index');
        Route::get('/eventi/dettaglio/{slug}', 'EventController@show');

        Route::get('/relatori', 'RelatorController@index');
        Route::get('/relatori/dettaglio/{surname}/{name}', 'RelatorController@show');

        Route::get('/team', 'TeamMemberController@elenco');
        Route::get('/team/dettaglio/{surname}/{name}', 'TeamMemberController@index');

        Route::get('/fornitori/{slug}', 'ProviderController@show');
        Route::get('/fornitori/', 'ProviderController@index');

        Route::get('/amministrazione-trasparente/elenco', 'AmministrazioneTrasparenteController@index');
        Route::get('/amministrazione-trasparente/detail/{slug}', 'AmministrazioneTrasparenteController@show');
        Route::get('/amministrazione-trasparente/doc/{doc_id}', 'AmministrazioneTrasparenteController@detail');

        /** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
        Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
        ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
    });


Route::group([
    'namespace'  => 'Physio\MyLittleCMS\Http\Controllers',
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'admin'],
    ], function () {
        CRUD::resource('category', 'Admin\CategoryCrudController');
        CRUD::resource('article', 'Admin\ArticleCrudController');
        CRUD::resource('presentation', 'Admin\PresentationCrudController');
        CRUD::resource('service', 'Admin\ServiceCrudController');
        CRUD::resource('event', 'Admin\EventCrudController');
        CRUD::resource('relator', 'Admin\RelatorCrudController');
        CRUD::resource('slide', 'Admin\SlideCrudController');
        CRUD::resource('teammember', 'Admin\TeammemberCrudController');
        CRUD::resource('testimonial', 'Admin\TestimonialCrudController');
        CRUD::resource('TrasparentAdminItem', 'Admin\TrasparentAdminItemCrudController');
        CRUD::resource('TrasparentAdminDocs', 'Admin\TrasparentAdminDocsCrudController');
        CRUD::resource('provider', 'Admin\ProviderCrudController');
        CRUD::resource('office_shift', 'Admin\Office_shiftCrudController');
    });
