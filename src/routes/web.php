<?php

Route::group(['namespace' => '\Physio\MyLittleCMS\Http\Controllers'], function () {
	Route::get('/news', 'ArticleController@index');




// Admin Interface Routes
	Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
	{
  // Backpack\CRUD: Define the resources for the entities you want to CRUD.

		CRUD::resource('testimonial', 'Admin\TestimonialCrudController');
		CRUD::resource('presentation', 'Admin\PresentationCrudController');
		CRUD::resource('slide', 'Admin\SlideCrudController');  
		CRUD::resource('activity', 'Admin\ActivityCrudController');  
		CRUD::resource('relator', 'Admin\RelatorCrudController'); 
		CRUD::resource('event', 'Admin\EventCrudController'); 
		CRUD::resource('teammember', 'Admin\TeammemberCrudController');  
		CRUD::resource('TrasparentAdminItem', 'Admin\TrasparentAdminItemCrudController');
		CRUD::resource('TrasparentAdminDocs', 'Admin\TrasparentAdminDocsCrudController'); 
		CRUD::resource('provider', 'Admin\ProviderCrudController');                             	  	
  // [...] other routes
	});

});


Route::group([
            'namespace'  => 'Physio\MyLittleCMS\Http\Controllers',
            'prefix'     => config('backpack.base.route_prefix', 'admin'),
            'middleware' => ['web', 'admin'],
    ], function () {
		CRUD::resource('category', 'Admin\CategoryCrudController');
		CRUD::resource('article', 'Admin\ArticleCrudController');
    });

