<?php

Route::singularResourceParameters();

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::resource('courses', 'CoursesController');
