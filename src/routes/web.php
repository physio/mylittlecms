<?php

Route::group(['namespace' => '\Physio\MyLittleCMS\Http\Controllers'], function () {
	Route::get('/news', 'ArticleController@index');

});

