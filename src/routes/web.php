<?php

Route::group(['namespace' => '\physio\mylittlecms\Http\Controllers'], function () {
	Route::get('/news', 'ArticleController@index');

});

